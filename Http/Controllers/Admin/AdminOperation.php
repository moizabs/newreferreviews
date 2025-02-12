<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Business;
use App\Models\Review;
use App\Models\RequestPrice;
use Session;


class AdminOperation extends Controller
{
    public function onReviews(Request $request,$id)
    {
        $reviewsDetails = Review::find($id);

        if($reviewsDetails->status == 0){
            $value = 1;
            $reviewsDetails->status = $value;


        }else{
            $value = 0;
            $reviewsDetails->status = $value;

        }
        $reviewsDetails->update();;
        return back();
    }

    public function onBussinessProfile(Request $request,$id)
    {
        $companyDetails = Business::find($id);

        if($companyDetails->status == 0){
            $value = 1;
            $companyDetails->status = $value;


        }else{
            $value = 0;
            $companyDetails->status = $value;

        }
        $companyDetails->update();;
        return back();
    }

    public function onAllReviews($id)
    {
        
        $reviewDetails = Review::find($id);
       
        if($reviewDetails->status == 0){
            $value = 1;
            $reviewDetails->status = $value;
        }else{
            $value = 0;
            $reviewDetails->status = $value;

        }
        $reviewDetails->save();
       
        return back()->with('message','Review Status Updated ') ;
    }
    
    public function reqPriceApproved($id)
    {
        $reqPrice = RequestPrice::find($id);

        if($reqPrice->status == 0){
            $value = 1;
            $reqPrice->status = $value;
        }else{
            $value = 0;
            $reqPrice->status = $value;

        }
        $reqPrice->update();
        return back();
    }
    
    public function editCustomerReview(Request $request,$id)
    {
        $editReview = Review::find($id);
        
        
        if($request->review){

            $editReview->review = $request->review;
        }
        if($request->title){

            $editReview->title = $request->title;
        }

        $editReview->update();
        return back();
    }
    
      public function viewBusinessReview(Request $request,$id)
    {
        $business = Business::find($id);
       
        return view('admin.business_profile',compact('business'));
    }
}

