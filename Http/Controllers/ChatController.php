<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\RequestPrice;
use App\Models\Chat;
use App\Models\Business;
use App\Models\Customer;
use App\Mail\ChatEmail;
use App\Mail\BussinessChatEmail;
use Mail;

use Carbon\Carbon;


class ChatController extends Controller
{
    public function userChatInterface(){
        if(Session::get('user')['type'] == "USER"){
            
            $user_info = Session::get('user');
            $all_bussiness = Business::with(['last_msg'])->whereHas('last_msg')->get();
            return view('chat.user_chat_view',compact('all_bussiness'));
        }else{
             return redirect()->route('user.login');
        }
    }
    public function getUserChat(Request $request){
        if(Session::get('user')['type'] == "USER"){
            $buss_id = decrypt($request->buss_id);
            $user_id = Session::get('user')['id'] ? Session::get('user')['id'] : 0 ;
            $get_chat = Chat::where('business_id',$buss_id)->where('user_id',$user_id)
            ->orderBy('created_at','DESC')
            ->get();
            
            return view('ajax.user_chat_conversation',compact('get_chat','buss_id'));
        }else{
            return redirect()->route('user.login');
        }
        
    }
    public function userSendMsg(Request $request){
        if(Session::get('user')['type'] == "USER"){
            $user_info = Session::get('user');
            $buss_id = decrypt($request->buss_id);
            $user_id = $user_info['id'] ? $user_info['id'] : 0 ;
            $date = Carbon::now();
            $chat = new Chat();
            $chat->business_id = $buss_id;
            $chat->user_id = $user_id;
            $chat->message = $request->msg;
            $chat->message_date = Carbon::parse($date)->format("m/d/Y");
            $chat->message_time = Carbon::parse($date)->format("h:i A");
            $chat->status = 0;
            $chat->message_by =$user_info['type'];
            $chat->save();
            // Send Mail for Notification
            $buss_info = Business::find($buss_id);
            Mail::to($user_info['email'])->send(new ChatEmail($buss_info));
            
            
        }
        return "Save";
    }
    
    public function businessChatInterface(){
        if(Session::get('user')['type'] == "BUSINESS"){
            
            $all_customer = Customer::with(['last_msg'])->whereHas('last_msg')->get();
            return view('chat.business_chat_view',compact('all_customer'));
           
        }else{
             return redirect()->route('company.login');
        }
    }
    public function getBusinessChat(Request $request){
         if(Session::get('user')['type'] == "BUSINESS"){
            
            $user_id = decrypt($request->user_id);
            $buss_id = Session::get('user')['id'] ? Session::get('user')['id'] : 0 ;
            $get_chat = Chat::where('business_id',$buss_id)->where('user_id',$user_id)
            ->orderBy('created_at','DESC')
            ->get();
            // echo '<pre>';
            // print_r($get_chat->toArray());
            // exit();
            return view('ajax.business_chat_conversation',compact('get_chat','user_id'));
        }else{
             return redirect()->route('company.login');
        }
        
    }
    public function businessSendMsg(Request $request){
        if(Session::get('user')['type'] == "BUSINESS"){
            $user_info = Session::get('user');
            $user_id = decrypt($request->user_id);
            
            $buss_id = $user_info['id'] ? $user_info['id'] : 0 ;
            $date = Carbon::now();
            $chat = new Chat();
            $chat->business_id = $buss_id;
            $chat->user_id = $user_id;
            $chat->message = $request->msg;
            $chat->message_date = Carbon::parse($date)->format("m/d/Y");
            $chat->message_time = Carbon::parse($date)->format("h:i A");
            $chat->status = 0;
            $chat->message_by =$user_info['type'];
            $user_info1 = Customer::find($user_id);
            Mail::to($user_info['email'])->send(new BussinessChatEmail($user_info1));
            $chat->save();
        }
        return "Save";
    }
}
