<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class SupportEmail extends Controller
{
    function getEmails(){
        $getEmail = ContactUs::all();
        return view('admin.email.email-list',compact('getEmail'));
    }
    function viewEmail($id){
        $email = ContactUs::find($id);
        
        return view('admin.email.view-email',compact('email'));
    }
    function rpyEmail(){
        
        return view('admin.email.reply_email');
    }
}
