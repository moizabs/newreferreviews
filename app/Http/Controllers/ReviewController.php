<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Session;

class ReviewController extends Controller
{

    public function addReview(Request $request){
        if(Session::get('user')) { 
            if($request->reviewId > 0)
            {
                $review = Review::find($request->reviewId);
            }
            else{
                $review = new Review();
            }
    
            $review->user_id = Session::get('user')['id'];
            $review->comp_id = $request->comp_id;
            $review->title = $request->title;
            $review->review = $request->review;
            $review->rating = $request->rating;
            $review->save();
    
           return "save";
           
        } else {
            return redirect()->route('user.login');
        }
        

        
    }

    public function reply(Request $request, $rev_id) {
        if(Session::get('user')) { 
            $review =Review::where('id',$rev_id)->first();
            $review->reply = $request->reply;
            $review->save();
    
            return redirect()->back();
            
        } else {
            return redirect()->route('user.login');
        }

    }
    
     public function likeReview($rev_id)
    {
        if(Session::get('user')) { 
            $reviewkLike = Review::find($rev_id);
    
            if($reviewkLike->like == 0){
                $value = 1;
                $reviewkLike->like = $value;
            }else{
                $value = 0;
                $reviewkLike->like = $value;
            }
            $reviewkLike->update();
            
            return back();
            
        } else {
            return redirect()->route('user.login');
        }
    }
    
}
