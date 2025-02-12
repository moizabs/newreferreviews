<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Business;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Mail;
use Carbon\Carbon;



class ForgetPassword extends Controller
{
    public function viewForm() {
        return view ('company.changepassword');
    }
    
    public function companyForgetView() {
        
        return view('company.auth.forgetpassword');
    }
    
    
    public function submitCompanyForgetPassword(Request $request ){
        
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
    
    public function emailVerify(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:businesses',
         ]);
        
        $token = Str::random(64);
        $email = $request->email;
        DB::table('password_resets')->insert([
          'email' => $email, 
          'token' => $token, 
          'created_at' => Carbon::now()
        ]);
        Mail::send('emails.forget_password_company', ['token' => $token], function($message) use($email){
              $message->to($email);
              $message->subject('Refer Review - Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
        
    }
    
    public function showResetPasswordForm($token) { 
        
        return view('company.auth.recoverpassword', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:businesses',
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
        $user = Business::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
        
     
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
      
            return redirect('company/login')->with('message', 'Your password has been changed!');
        
  
          
    }
}
