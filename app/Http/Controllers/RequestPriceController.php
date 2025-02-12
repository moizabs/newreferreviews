<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RequestPriceController;
use App\Models\RequestPrice;
use App\Models\Customer;
use App\Models\Business;
use App\Models\Chat;
use Mail;
use App\Mail\RequestPrice as RequestPriceMail;
use Str;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RequestPriceController extends Controller
{
    public function index(){
          $requestPrice = RequestPrice::with('get_business','get_customer')
   
          ->latest()
          ->paginate(10);
        
        // echo '<pre>';
        // print_r($requestPrice->toArray());
        // echo '</pre>';
        return view('admin.requestprice',compact('requestPrice')); 
    }
   
    
    public function addRequestPrice(Request $request){
        if(Session::get('user')) {   
            $user_info = Session::get('user');
            
            $validator = \Validator::make($request->all(), [
                // 'pickup_loca'          => 'required',
                // 'dilvery_loca'         => 'required',
                // 'veh_year'             => 'required',
                // 'veh_make'             => 'required',
                // 'veh_model'            => 'required',
                // 'trailor_type'         => 'required',
                // 'veh_condition'        => 'required',
            ]);
            $date = Carbon::now();
            $req_price = new RequestPrice;
            // Add Request Price 
            $req_price->user_id = $request->user_id;
            $req_price->comp_id = $request->comp_id;
            $req_price->pickup_loca = $request->pickup_loca;
            $req_price->dilvery_loca = $request->dilvery_loca;
            $req_price->veh_year = $request->veh_year;
            $req_price->veh_make = $request->veh_make;
            $req_price->veh_model = $request->veh_model;
            $req_price->trailer_types = $request->trailor_type;
            $req_price->veh_condition = $request->veh_condition;
            $req_price->message = $request->message;
            $req_price->save();
            
            // Add In Chat Table
            
            
            $saveChat = new Chat;
            $saveChat->user_id = $request->user_id;
            $saveChat->business_id = $request->comp_id;
            $saveChat->message = $request->message;
            $saveChat->message_date = Carbon::parse($date)->format("m/d/Y");
            $saveChat->message_time = Carbon::parse($date)->format("h:i A");
            $saveChat->status = 0;
            $saveChat->message_by = $user_info['type'];
            $saveChat->save();
            
            $customer = Customer::find($request->user_id);
            $business = Business::find($request->comp_id);
            
            
            $nameC = Str::ucfirst($customer->first_name.' '.$customer->last_name);
            $emailC = $customer->email;
            if($req_price->veh_year || $req_price->veh_make || $req_price->veh_model)
            {
                $vehicle = $req_price->veh_year.' '.$req_price->veh_make.' '.$req_price->veh_model;
            }
            else{
                $vehicle = '';
            }
            $details = [
                'email' => $emailC,
                'name' => $nameC,
                'pickup' => $req_price->pickup_loca,
                'delivery' => $req_price->dilvery_loca,
                'vehicle' => $vehicle,
                'type' => $req_price->trailer_types == 1 ? 'Open' : 'Enclosed',
                'condition' => $req_price->veh_condition ? 'Running' : 'Non-Running',
                'message' => $req_price->message,
            ];
            if($customer)
            {
                if(isset($business->email))
                {
                    $email = $business->email;
                    $name = $business->comp_name;
                    $noti = new Notification;
                    $noti->business_id = $business->id;
                    $noti->request_price_id = $req_price->id;
                    $noti->view = 0;
                    $noti->save();
                    Mail::to($email,$name)
                    ->send(new RequestPriceMail($details));
                    
                }
            }
             
             
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
            return response()->json(['success'=>'Record is successfully added']);
            
        } else {
            return redirect()->route('user.login');
        }
    
        
        
       
    }
    
    public function getNoti(Request $request)
    {
        if(Session::get('user')) {    
            $noti = '';
            $id = Session::get('user')['id'];
            // echo "<pre>";
            // print_r($noti);
            // exit();
            if(Session::has('user'))
            {
                $noti = Notification::with(['reqPrice.get_customer'])
                ->where($request->auth,$id)
                ->orderBy('id','DESC')
                ->skip(0)->take(10)->get()->toArray();
                $count = Notification::where($request->auth,$id)->where('view',0)->count();
                if($noti)
                {
                    foreach($noti as $key => $value)
                    {
                        $noti[$key]['created_at'] = Carbon::parse($value['created_at'])->format('M,Y d h:i:s A');
                    }
                }
            }
            return response()->json([
                'noti'=>$noti,
                'count'=>$count,
                'status'=>true,
                'status_code'=>200
            ]);
        } 
    }
    
    public function viewNoti(Request $request)
    {
        if(Session::get('user')) { 
            
            $noti = Notification::find($request->notiId);
            $noti->view = 1;
            $noti->save();
            
            return "View this notification!";
        } else {
            return redirect()->route('user.login');
        }
    }
     public function viewNotification(Request $request)
    {
        
        $noti = '';
        $auth = '';
        if(Session::get('user')['type'] == 'BUSINESS'){
            
            $auth = 'business_id';
        }else{
            $auth = 'customer_id';
        }
        $id = Session::get('user')['id'];
        // echo "<pre>";
        // print_r($auth);
        // exit();
        
        if(Session::has('user'))
        {
            $noti = Notification::with(['reqPrice.get_customer'])
            ->whereHas('reqPrice.get_customer', function($data) use ($auth,$id){
                $data->where($auth,$id);
            })
            ->orderBy('id','DESC')
            ->skip(0)->take(10)->get();
            
            
        }
        
        return view('allnotification',compact('noti'));
    }
}
