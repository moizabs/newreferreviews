<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Hash;

class UserController extends Controller
{

    public function index(){
        if(Session::get('user')) { 
            
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
    
    public function riviewHistory(){
        if(Session::get('user')) { 
            $user_id = Session::get('user')['id'];
            
            $user_Reviews = Review::where('user_id',$user_id)
            ->with('get_business')
            ->latest()
            ->paginate(15);
            
            // echo '<pre>';
            // print_r($users_review->toArray());
            // echo '</pre>';
            
            return view('user.user_reviews',compact('user_Reviews'));
            
        } else {
            return redirect()->route('user.login');
        }
    }


    public function userProfile(Request $request){
        if(Session::get('user')) { 
            
            $user = Session::get('user');
    
            return view('user.userProfile',compact('user'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function userEditProfile(Request $request){
        if(Session::get('user')) { 
            
            if(Session::has('user')){
                    $user = Session::get('user');
                    
                  
                    $customer = Customer::find($user->id );
        
                    $customer->first_name = $request->first_name;
                    $customer->last_name = $request->last_name;
                    $customer->phone= $request->phone;
                    $customer->save();
                    $userSession = Session::put('user', $customer);
                    $user = Session::get('user');
                    return back()->with('success','Profile Updated');
                
                 return back();
            }
        } else {
            return redirect()->route('user.login');
        }
        
    }
    
    public function addImage(Request $request){
        
       
            $user = Session::get('user');
            $customer = Customer::find($user->id );
            
            if($request->hasFile('image'))
            {
                    $destination = 'public/userProfile';
                    $img = $request->file('image');
                    $filename = time().'-'.$img->getClientOriginalName();
                    $path = $img->storeAs($destination,$filename);
                    $customer->image =  $filename;
                    $customer->save();
                    
                    
            }
            Session::put('user',$customer);
            Session::get('user');
                
            return back()->with('success','Profile Updated');
                
       
    }


    public function registerView(){
           
        return view('user.auth.register');
    }

    public function loginView(){
        return view('user.login');
    }

    public function loginSubmit(Request $request){
        
        // validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);        
        $user = Customer::where('email','=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session()->put('user', $user);
                return redirect()->route('home');

            } else {
                return back()->with('fail', 'Password not Matches');
            }
        } else {
            return back()->with('fail', 'Invalid Email');

        }
    }



    public function registerSubmit(Request $request){
        $validator = Validator::make($request->all(), [
    
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|unique:customers,email',
          'password' => 'required|min:8'
       ]);

        if($validator->passes()) { 
            
            $user = new Customer();
    
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
    
            if($request->hasFile('image'))
            {
                $destination = 'public/userProfile';
                $img = $request->file('image');
                $filename = time().'-'.$img->getClientOriginalName();
                $path = $img->storeAs($destination,$filename);
                $user->image =  $filename;
            }
    
            $user->save();
            return redirect()
                ->route('user.login')
                ->with('success','You have successfully registered, Login to access your profile');
      }
      else{
          return back()->withErrors($validator)->withInput();
      }
    }

    public function userLogout() {
        if(Session::has('user')) {
            
        Session::flush();
        return redirect()->route('user.login');
        }
        else{
             return redirect()->route('user.login');
        }

    }
}
