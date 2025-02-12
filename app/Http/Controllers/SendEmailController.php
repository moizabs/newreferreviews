<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function send_email(Request $request){
        echo '<pre>';
        print_r($request->all());
        exit();
    }
}
