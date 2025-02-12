<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Business;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Mail;
use Carbon\Carbon;

class UserForgetController extends Controller
{
     //
    public function viewForm() {
        return view('user.changepassword');
    }
    
    public function userForgetView() {
        return view('user.auth.forgetpassword');
    }
    
    public function submitCustomerForgetPassword(Request $request ){
        
        if(Session::get('user')['type'] == 'USER'){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            
            $customer = Customer::find(Session::get('user')['id']);
            $customer->password = Hash::make($request->new_password);
            $customer->save();
            Session::flush();
            return redirect()->route('user.login');
        }
        elseif(Session::get('user')['type'] == 'BUSINESS'){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            
            $customer = Business::find(Session::get('user')['id']);
            $customer->password = Hash::make($request->new_password);
            $customer->save();
            Session::flush();
            return redirect()->route('company.login');
        }
        else{
            return redirect()->route('home');
        }
        
    }
    
    public function emailVerify(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:customers',
         ]);
        $token = Str::random(64);
        $email = $request->email;
        DB::table('password_resets')->insert([
          'email' => $email, 
          'token' => $token, 
          'created_at' => Carbon::now()
        ]);
       
        Mail::send('emails.forget_password_user', ['token' => $token], function($message) use($email){
              $message->to($email);
              $message->subject('Refer Review - Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function showResetPasswordForm($token) { 
         
         return view('user.auth.recoverpassword', ['token' => $token]);
    }
    public function submitResetsPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email, 
                'token' => $request->token
                ])
            ->first();
  
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
  
        $user = Customer::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
        
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect('user/login')->with('message', 'Your password has been changed!');
    }
}
