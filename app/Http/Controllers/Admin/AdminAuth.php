<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Hash;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin.auth.admin_login');
    }

    public function loginSubmit(Request $request)
    {
         // validate the request
         $this->validate($request, [
          
          'email' => 'required|email',
          'password' => 'required'
       ]);       
        $admin = Admin::where('email', '=', $request->email)->first();

        if ($admin) {

            if (Hash::check($request->password, $admin->password)) {
                Session::put('admin', $admin);

                return redirect()->route('admin.dashbord');
            } else {
                return back()->with('fail', 'Password not Matches');
            }
        } else {
            return back()->with('fail', 'Invalid Email');
        }
    }

    public function logout()
    {
        if(Session::has('admin')) {
            Session::flush();
            return redirect()->route('admin.login');
        }else {
             return redirect()->route('admin.dashbord');
        }
        
    }
}
