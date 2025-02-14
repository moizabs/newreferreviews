<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\EmailVerification;

class UserController extends Controller
{

    public function email_verification_view()
    {
        return view('user.auth.email_verification');
    }

    public function index()
    {
        if (Session::get('user')) {

            return view('home');
        } else {
            return redirect()->route('user.login');
        }
    }

    // public function registerView()
    // {
    //     $categories = '';
    //     echo '<pre>';
    //     print_r($categories);
    //     exit();
    //     return view('user.auth.register',compact('categories'));
    // }

    public function riviewHistory()
    {
        if (Session::get('user')) {
            $user_id = Session::get('user')['id'];

            $user_Reviews = Review::where('user_id', $user_id)
                ->with('get_business')
                ->latest()
                ->paginate(15);

            // echo '<pre>';
            // print_r($users_review->toArray());
            // echo '</pre>';

            return view('user.user_reviews', compact('user_Reviews'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function userProfile(Request $request)
    {
        if (Session::get('user')) {

            $user = Session::get('user');

            return view('user.userProfile', compact('user'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function userEditProfile(Request $request)
    {
        if (Session::get('user')) {

            if (Session::has('user')) {
                $user = Session::get('user');
                $customer = Customer::find($user->id);
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->phone = $request->phone;
                $customer->save();
                $userSession = Session::put('user', $customer);
                $user = Session::get('user');
                return back()->with('success', 'Profile Updated');
                return back();
            }
        } else {
            return redirect()->route('user.login');
        }
    }

    public function addImage(Request $request)
    {
        $user = Session::get('user');
        $customer = Customer::find($user->id);

        if ($request->hasFile('image')) {
            $destination = 'public/userProfile';
            $img = $request->file('image');
            $filename = time() . '-' . $img->getClientOriginalName();
            $path = $img->storeAs($destination, $filename);
            $customer->image =  $filename;
            $customer->save();
        }
        Session::put('user', $customer);
        Session::get('user');

        return back()->with('success', 'Profile Updated');
    }

    public function registerView()
    {
        return view('user.auth.register');
    }

    public function loginView()
    {
        return view('user.login');
    }

    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Customer::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if($user->email_verified_at){
                    session()->put('user', $user);
                    return redirect()->route('home');
                }else{
                    Mail::to($user->email)->send(new EmailVerification($user));
                    return view('user.auth.email_verification', ['customer_email' => $user->email, 'customer_id' => $user->id,]);
                    // return redirect()->route('user.register')->with('error', 'Please verify your email before proceeding.');
                }
            } else {
                return back()->with('fail', 'Password not Matches');
            }
        } else {
            return back()->with('fail', 'Invalid Email');
        }
    }

    public function registerSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3|max:25|alpha',
            'last_name' => 'required|string|min:3|max:25|alpha',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(60),
        ]);

        if ($user) {
            Mail::to($user->email)->send(new EmailVerification($user));
            return view('user.auth.email_verification', ['customer_email' => $user->email, 'customer_id' => $user->id,]);
        }

    }

    public function resendVerification($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        if ($customer->email_verified_at) {
            return redirect()->route('user.login')->with('message', 'Your email is already verified.');
        }

        $customer->verification_token = Str::random(60);
        $customer->save();

        Mail::to($customer->email)->send(new EmailVerification($customer));
        return view('user.auth.email_verification', ['customer_email' => $customer->email, 'customer_id' => $customer->id,])->with('message', 'A new verification email has been sent. Please check your inbox.');
    }

    public function verifyEmail($token)
    {
        $user = Customer::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('user.register')
                ->with('error', 'Invalid token!');
        }

        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        return redirect()->route('user.login')
            ->with('success', 'Email successfully verified!');
    }

    public function userLogout()
    {
        if (Session::has('user')) {

            Session::flush();
            return redirect()->route('user.login');
        } else {
            return redirect()->route('user.login');
        }
    }
}
