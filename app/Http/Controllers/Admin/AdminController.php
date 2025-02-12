<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Business;
use App\Models\Review;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function adminDashboard(Request $request)
    {
        $totalReviews = Review::count();
        $latestReviews = Review::whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->count();
        $totalCustomer = Customer::count();
        $latestCustomer = Customer::whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->count();
        $totalBusiness = Business::count();
        $latestBusiness = Business::whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->count();
        $recentUsers = Customer::limit(15)
        ->latest()
        ->get();
        // echo '<pre>';
        // print_r($latestReviews);
        // exit();
        
        return view('admin.admin_dashboard',compact('recentUsers','totalReviews','latestReviews','totalCustomer','latestCustomer','totalBusiness','latestBusiness'));
    }

    public function customerList(Request $request)
    {
        $search = $request->search;
        $customers = Customer::with('count_reviews')
        ->where('first_name','LIKE',"%". $search ."%")
        ->orWhere('last_name','LIKE',"%". $search ."%")
        ->orWhere('id','LIKE',"%". $search ."%")
        ->latest()
        ->orderBy('created_at', 'DESC')
        ->paginate(15);
        // echo '<pre>';
        // print_r($customers->toArray());
        // exit();
        return view('admin.customers_reviews',compact('customers'));
    }

// Search Customer 
     public function searchCustomerList(Request $request)
    {
        
        $search ='';
        if($request->search){
            $search = $request->search;
            
        }
        
        $customers = Customer::with('count_reviews')
        ->where('first_name','LIKE',"%". $search ."%")
        ->latest()
        ->orderBy('created_at', 'DESC')
        ->paginate(15);

        return view('admin.customers_reviews',compact('customers'));
    }

    public function BusinessList(Request $request)
    {
        $search = $request->search;
        $companies = Business::with(['avg','countReview'])
        ->where('comp_name','LIKE','%'.$search.'%')
        ->latest()
        ->paginate(10);
        
        return view('admin.businesses_reviews',compact('companies'));
    }

    public function allReviews(Request $request)
    {
        $search = $request->search;
        $all = Review::with(['get_business','get_customer'])->get();
        if(\Request::segment(2) == 'reviews_list_active')
        {
            $reviews = Review::with(['get_business','get_customer'])
            ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
             ->orderBy('created_at', 'DESC')
            ->paginate(15);
        }
        else if(\Request::segment(2) == 'reviews_list_pending')
        {
            $reviews = Review::with(['get_business','get_customer'])
            ->where('status',0)
             ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        }
        else if(\Request::segment(2) == 'reviews_list_publish')
        {
            $reviews = Review::with(['get_business','get_customer'])
             ->where('status',1)
             ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        }
        else{
            $reviews = '';
        }
       

        return view('admin.activereviewlist',compact('reviews','all'));
       
    }
    
     public function searchReviews(Request $request)
    {
        $search = $request->search;
        if(\Request::segment(2) == 'reviews_list_active_search')
        {
            $reviews = Review::with(['get_business','get_customer'])
            ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
             ->orderBy('created_at', 'DESC')
            ->paginate(15);
        }
        else if(\Request::segment(2) == 'reviews_list_pending_search')
        {
            $reviews = Review::with(['get_business','get_customer'])
            ->where('status',0)
             ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        }
        else if(\Request::segment(2) == 'reviews_list_publish_search')
        {
            $reviews = Review::with(['get_business','get_customer'])
             ->where('status',1)
             ->where(function ($q2) use ($search){
                $q2->whereHas('get_business',function ($q) use ($search){
                    $q->where('comp_name','LIKE','%'.$search.'%');
                })->orWhereHas('get_customer',function ($q) use ($search){
                    $q->where('first_name','LIKE','%'.$search.'%');
                });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        }
        else{
            $reviews = '';
        }
    
       

        return view('ajax.review_search',compact('reviews'));
        
    }
    
    public function searchReviewsList(Request $request)
    {
        $search = $request->search;
        
        $reviews = Review::with(['get_business','get_customer'])
        ->where(function ($q2) use ($search){
            $q2->whereHas('get_business',function ($q) use ($search){
                $q->where('comp_name','LIKE','%'.$search.'%');
            })->orWhereHas('get_customer',function ($q) use ($search){
                $q->where('first_name','LIKE','%'.$search.'%');
            });
        })
         ->orderBy('created_at', 'DESC')
        ->paginate(15);

        $pending_reviews = Review::with(['get_business','get_customer'])
        ->where('status',0)
        ->orWhere(function ($q2) use ($search){
            $q2->whereHas('get_business',function ($q) use ($search){
                $q->where('comp_name','LIKE','%'.$search.'%');
            })->orWhereHas('get_customer',function ($q) use ($search){
                $q->where('first_name','LIKE','%'.$search.'%');
            });
        })
        ->orderBy('created_at', 'DESC')
        ->paginate(15);


        $publish_reviews = Review::with(['get_business','get_customer'])
        ->where('status',1)
        ->orWhere(function ($q2) use ($search){
            $q2->whereHas('get_business',function ($q) use ($search){
                $q->where('comp_name','LIKE','%'.$search.'%');
            })->orWhereHas('get_customer',function ($q) use ($search){
                $q->where('first_name','LIKE','%'.$search.'%');
            });
        })
        ->orderBy('created_at', 'DESC')
        ->paginate(15);

        // echo "<pre>";
        // print_r($reviews);
        // exit();

        
        return view('ajax.review_search',compact('reviews','pending_reviews','publish_reviews'));
    }

    public function viewProfile(Request $request,$id)
    {
        $customerDetail = Customer::find($id);
        $reviews = Review::with('get_business')
        ->where('user_id',$id)
        ->orderBy('created_at','DESC')
        ->paginate(10);
        // echo '<pre>';
        // print_r( $customerDetail->toArray());
        // echo '</pre>';
        return view('admin.customer_view_profile',compact('customerDetail','reviews'));
    }

    public function editBusinessProfile(Request $request,$id)
    {
        $companyDetail = Customer::find($id);
        $reviews = Review::with('get_customer')
        ->where('comp_id',$id)
        ->latest()
        ->paginate(10);
        
        return view('admin.edit_business_profile',compact('companyDetail','reviews'));
    }
    
   
    
}
