<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Chat;

class AdminChatController extends Controller
{
    //
    public function chats(){
        if(\Request::segment(3) == 'businesses'){
            $data = Business::whereHas('business_chat')->get();
        }
        if(\Request::segment(3) == 'customers'){
            $data = Customer::whereHas('customer_chat')->get();
        }
        
        return view('admin.chat.chats',compact('data'));
    }
    
    public function viewChats(Request $request){
        if($request->url == 'businesses'){
            $buss_id = $request->buss_id;
            $bussiness = Business::where('id',$buss_id)->with(['last_msg2'])->whereHas('last_msg2')->get();
            $chats = Chat::where('business_id',$buss_id)->with(['cust_info'])->get()->unique('business_id');
            echo '<pre>';
            print_r($chats->toArray());
            exit();
            return view('admin.chat.customer_conversation',compact('chats'));
        }else{
            $user_id = $request->user_id;
            $customer = Customer::where('id',$user_id)->with(['last_msg2'])->whereHas('last_msg2')->get();
            $chats = Chat::where('user_id',$user_id)->with(['buss_info'])->get()->unique('user_id');
            echo '<pre>';
            print_r($chats->toArray());
            exit();
            return view('admin.chat.customer_conversation',compact('chats'));
            
        }
    }
}
