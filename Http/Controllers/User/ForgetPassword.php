<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class ForgetPassword extends Controller
{
    //
    public function viewForm() {
        if(Session::get('user')) { 
            
            return view ('user.changepassword');
        } else {
            return redirect()->route('user.login');
        }
    }
    
    public function submitForgetPassword(Request $request ){
        if(Session::get('user')) { 
            
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
        } else {
            return redirect()->route('user.login');
        }
    
    }
}
