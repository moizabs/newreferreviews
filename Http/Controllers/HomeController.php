<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Review;
use App\Models\Images;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\BackgroundImage;
use App\Models\comp_cate_subcate;
use App\Models\Zipcode;
use App\Models\ContactUs;
use App\Models\ChatController;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Mail\ContactUs as EmailContectUs;
use Mail;
use DB;

class HomeController extends Controller
{
    public function viewAllCate(){
        $categories = Category::with(['sub_category'])->get();
        // $sub_categories = SubCategory::all();
         
        return view('allcategories',compact('categories'));
    } 
    
    public function allCompanies(Request $request){
        
            $search = $request->search;
            $cate_id = $request->category_id;
            
            $companies = Business::with('avg','get_category')
            ->where('status',1)
            ->where(function ($q) use ($search){
                if($search){
                    
                $q
                ->orWhere('comp_name','LIKE',"%". $search ."%")
                ->orWhere('name','LIKE',"%". $search ."%");
                }
            })
            ->where(function ($q2) use ($cate_id){
                if($cate_id){
                    $q2->orWhere('category_id','LIKE',"%". $cate_id ."%");
                }
            })
            ->orderBy('created_at','ASC')
            ->paginate(18);
            
            //  $company_test = DB::table('businesses')
            // ->leftJoin('reviews','reviews.comp_id','=','businesses.id')
            // ->select(DB::raw('businesses.*','AVG(reviews.rating) as totalRating,comp_id'))
            // ->groupBy('businesses.id')
            // ->orderByDesc('totalRating')
            // ->get();
            
            // echo '<pre>';
            // print_r($company_test);
            // exit();
            return view('all_companies',compact('companies'));
            
        
       
    }
    
    public function index(Request $request){
        $search = $request->search;
        $companies = Business::with('avg','get_category')->withAvg('avg','rating')
            ->where('status',1)
            ->orderBy('avg_avg_rating','DESC')
            ->limit(9)
            ->get();

        $top_rated_companies = Review::with('get_business')
            ->where('status',1)
            ->select(DB::raw('AVG(rating) as totalRating'),DB::raw('COUNT(review) as totalReview'),'comp_id')
            ->orderBy('totalReview', 'DESC')
            ->groupBy('comp_id')
            ->limit(10)
            ->get()
            ->toArray();


        $latestReview = Review::with('get_customer','get_business')
            ->where('status',1)
            ->latest()
            ->paginate(9);
        
        $categories = Category::all();
        $count = Category::count();
        $total = ($count > 0) ? round($count/2) : 1;
        $total2 = ($count > 0) ? round($count-$total) : 1;
        $category1 = Category::skip(0)->take($total)->get();
        $category2 = Category::skip($total)->take($total2)->get();
        // echo "<pre>";
        // print_r($companies->toArray());exit();

        return view('home',compact('companies','latestReview','top_rated_companies','categories','category2','category1'));
    }
    
    public function searchAllCompanies(Request $request){
        $input = $request->all();
        $data = Business::where('comp_name','LIKE',"%{$input['query']}%")
            ->where('name','LIKE',"%{$input['query']}%")
            ->get();
           
   
        return response()->json($data);
    }
    
    public function searchCompanies(Request $request){
        $companies = Business::with('avg','get_category')->withAvg('avg','rating')
            ->where('status',1)
            ->where(function ($q) use ($search){
                $q
                ->where('comp_name','LIKE',"%". $search ."%")
                ->where('name','LIKE',"%". $search ."%");
            })
            ->orderBy('avg_avg_rating','DESC')
            ->limit(9)
            ->get();

        $top_rated_companies = Review::with('get_business')
            ->where('status',1)
            ->select(DB::raw('AVG(rating) as totalRating'),'comp_id')
            ->groupBy('comp_id')
            ->orderBy('totalRating', 'DESC')
            ->limit(10)
            ->get()
            ->toArray();



        // $latestReview = collect(Review::with('get_customer')->latest()->get()->toArray());
        $latestReview = Review::with('get_customer','get_business')
            ->where('status',1)
            ->latest()
            ->paginate(9);
        
        $categories = Category::all();
        $count = Category::count();
        $total = $count/2;
        $total2 = $count-$total;
        $category1 = Category::skip(0)->take($total)->get();
        $category2 = Category::skip($total)->take($total2)->get();

        return view('home',compact('companies','latestReview','top_rated_companies','categories','category2','category1'));
    }

    public function companyProfile(Request $request, $comp_id){

        if(Session::has('user')) {
            
            $userId = Session::get('user');
            
            $search = $request->search;
    
            $company = Business::with(['get_category','company_hours'])->find($comp_id);
            // echo '<pre>';
            // print_r($company->company_hours->toArray());
            // exit();
            $reviews = Review::with('get_customer')
            ->where('comp_id',$comp_id)
            ->where('status',1)
            ->orderBy('created_at','DESC')
            ->get()
            ->toArray();
            $comp_image = Images::with('get_customer')
            ->where('comp_id',$comp_id)
            ->get();
            
            $comp_back_image = BackgroundImage::where('comp_id', $comp_id)
            ->first();
            
            
            $totalRating = Review::where('comp_id', $comp_id )
                ->where('status',1)
                ->selectRaw('AVG(rating) as total')
                ->get()
                ->toArray();
            
            $totalreviews = Review::where('comp_id', $comp_id) ->where('status',1)->count();
    
            $total = 0;
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            
            $hasReview = Review::where('comp_id',$comp_id)
            ->where('user_id',$userId['id'])
            ->where('status',1)
            ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
            ->first();
           
            return view('profile',compact('company','reviews','total','comp_image','hasReview','comp_back_image','totalreviews'));

        } else{
            
            $search = $request->search;
            $company = Business::with(['get_category','company_hours'])->find($comp_id);
            
            $reviews = Review::with('get_customer')
            ->where('comp_id',$comp_id)
            ->where('status',1)
            ->orderBy('created_at','DESC')
            ->get()
            ->toArray();
            
            $comp_image = Images::with('get_customer')
            ->where('comp_id',$comp_id)
            ->get();
            
            $totalRating = Review::where('comp_id','=', $comp_id )
                ->where('status',1)
                ->selectRaw('AVG(rating) as total')
                ->get()
                ->toArray();
    
            $total = 0;
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            $totalreviews = Review::where('comp_id', $comp_id) ->where('status',1)->count();
            $hasReview = Review::where('comp_id',$comp_id) ->where('status',1)
            ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
            ->first();
            
            return view('company_profile',compact('company','reviews','total','comp_image','hasReview','totalreviews'));
        }

    }
    
    public function companyProfile2(Request $request){
        $comp_id = $request->cate_id;
        if(Session::has('user')) {
            
            $userId = Session::get('user');
            
            $search = $request->search;
    
            $company = Business::with('get_category')->find($comp_id);
            $reviews = Review::with('get_customer')
            ->where('comp_id',$comp_id)
            ->where('status',1)
            ->orderBy('created_at','DESC')
            ->get()
            ->toArray();
            $comp_image = Images::with('get_customer')
            ->where('comp_id',$comp_id)
            ->get();
            
            $comp_back_image = BackgroundImage::where('comp_id', $comp_id)
            ->first();
            
            
            $totalRating = Review::where('comp_id', $comp_id )
                ->where('status',1)
                ->selectRaw('AVG(rating) as total')
                ->get()
                ->toArray();
            
            $totalreviews = Review::where('comp_id', $comp_id)->where('status',1)->count();
    
            $total = 0;
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            
            $hasReview = Review::where('comp_id',$comp_id)
            ->where('status',1)
            ->where('user_id',$userId['id'])
            ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
            ->first();
           
            return view('profile',compact('company','reviews','total','comp_image','hasReview','comp_back_image','totalreviews'));

        } else{
            
            $search = $request->search;
            $company = Business::with('get_category')->find($comp_id);
            
            $reviews = Review::with('get_customer')
            ->where('comp_id',$comp_id)
            ->where('status',1)
            ->orderBy('created_at','DESC')
            ->get()
            ->toArray();
            
            $comp_image = Images::with('get_customer')
            ->where('comp_id',$comp_id)
            ->get();
            
            $totalRating = Review::where('comp_id','=', $comp_id )
                ->where('status',1)
                ->selectRaw('AVG(rating) as total')
                ->get()
                ->toArray();
    
            $total = 0;
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            $totalreviews = Review::where('comp_id', $comp_id) ->where('status',1)->count();
            $hasReview = Review::where('comp_id',$comp_id)
            ->where('status',1)
            ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
            ->first();
            
            return view('company_profile',compact('company','reviews','total','comp_image','hasReview','totalreviews'));
        }

    }
    
    public function companyReviewProfile(Request $request, $comp_id){
        
        $company = Business::with('get_category')->find($comp_id);
        
        return view('postreview',compact('company'));
        // if(Session::has('user')) {
            
        //     $userId = Session::get('user')['id'];
            
        //     $search = $request->search;
    
        //     $company = Business::with('get_category')->find($comp_id);
        //     $reviews = Review::with('get_customer')
        //     ->where('comp_id',$comp_id)
        //     ->where('status',1)
        //     ->orderBy('created_at','DESC')
        //     ->get()
        //     ->toArray();
        //     $comp_image = Images::with('get_customer')
        //     ->where('comp_id',$comp_id)
        //     ->get();
            
        //     $comp_back_image = BackgroundImage::where('comp_id', $comp_id)
        //     ->first();
            
            
        //     $totalRating = Review::where('comp_id', $comp_id )
        //         ->selectRaw('AVG(rating) as total')
        //         ->get()
        //         ->toArray();
            
        //     $totalreviews = Review::where('comp_id', $comp_id)->count();
    
        //     $total = 0;
        //     if ($totalRating) {
        //         $total = number_format($totalRating[0]['total']);
        //     }
            
        //     $hasReview = Review::where('comp_id',$comp_id)
        //     ->where('user_id',$userId)
        //     ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
        //     ->first();
           
    
        //     // echo "<pre>";
        //     // print_r($comp_back_image);
        //     // exit();
            
        //     return view('profile',compact('company','reviews','total','comp_image','hasReview','comp_back_image','totalreviews'));

        // } else{

            
            
        //     $search = $request->search;
    
        //     $company = Business::with('get_category')->find($comp_id);
        //     $reviews = Review::with('get_customer')
        //     ->where('comp_id',$comp_id)
        //     ->where('status',1)
        //     ->orderBy('created_at','DESC')
        //     ->get()
        //     ->toArray();
            
        //     $comp_image = Images::with('get_customer')
        //     ->where('comp_id',$comp_id)
        //     ->get();
            
            
        //     $totalRating = Review::where('comp_id','=', $comp_id )
        //             ->selectRaw('AVG(rating) as total')
        //             ->get()
        //             ->toArray();
    
        //     $total = 0;
        //     if ($totalRating) {
        //         $total = number_format($totalRating[0]['total']);
        //     }
            
        //     $hasReview = Review::where('comp_id',$comp_id)
        //     ->where('created_at', '>', Carbon::now()->subDay()->toDateTimeString())
        //     ->first();
            
        //     return view('company_profile',compact('company','reviews','total','comp_image','hasReview'));
        // }

    }
    
    public function SearchProfile(Request $request){
        if(Session::has('user')) {
            $search = $request->search;
            $company = Business::where('comp_name','LIKE',"%{$search}%")
                ->orWhere('name','LIKE',"%{$search}%")->first();
            $comp_id = $company->id;
            $reviews = Review::with('get_customer')
            ->where('comp_id',$comp_id)
            ->where('status',1)
            ->latest()
            ->get()
            ->toArray();
            $comp_image = Images::with('get_customer')
            ->where('comp_id',$comp_id)
            ->get();
            $totalRating = Review::where('comp_id','=', $comp_id )
                    ->selectRaw('AVG(rating) as total')
                    ->where('status',1)
                    ->latest()
                    ->get()
                    ->toArray();
    
            $total = 0;
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            return view('profile',compact('company','reviews','total','comp_image'));
            
        } else{
            return redirect()->route('user.login');
        }

    }
    
    public function writeReview(Request $request){
        $categories = Category::select('id','name')->get();
        return view('writereview',compact('categories'));
    }
    
    public function privacyPolicy(Request $request){
        return view('privacypolicy');
    }
    
    public function contactUs(Request $request){
        return view('contact_us');
    }
    public function submitContactUs(Request $request){
        $detail = [
            'name'=>$request->name,
            'email'=>$request->email,
            'title'=>$request->title,
            'message'=>$request->message,
            ];
        // $name 
        // $email
        // $title
        // $message
        
        $contact_us = new ContactUs();
        
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->title = $request->title;
        $contact_us->message = $request->message;
        $contact_us->save();
        // echo '<pre>';
        // print_r($userDetail);
        // exit();
        Mail::to($detail['email'])->send(new EmailContectUs($detail));
        return back();
    }
    
    public function termCondition(Request $request){
        return view('termsandconditions');
    }

    public function searchWithRating(Request $request){
        $rating = Review::with('get_customer')
        
        ->where('comp_id',$request->id)
        ->where(function ($q) use ($request){
            if($request->rating)
            {
                $q->where('rating',$request->rating);
            }
        })
        ->where('status',1)
        ->latest()
        ->get()
        ->toArray();
        

        return view('ajax/rating',compact('rating'));
    }
    
    public function CompByCateId(Request $request,$cate_id){
        $categories = Category::with(['sub_category'])->find($cate_id);
        $popular_comp = Business::with(['comp_category.get_category'])->where('status',1)->whereHas('comp_category')->latest()->take(10)->get();
        $cate_comp = comp_cate_subcate::with(['comp_info.avg','comp_info.count_review'])
        ->select( DB::raw('DISTINCT(comp_id)') )
        ->whereHas('comp_info',function($q){
            $q->where('status',1);
        })
        ->where('cate_id',$request->cate_id)
        ->paginate(10);
        
        return view('company_subcategories',compact('categories','popular_comp','cate_comp'));
    }
    
    public function GetCompByCateId(Request $request){
        
        $cate_id = $request->cate_id;
        $comp_id = '';
        $comp_name = $request->SearchBox;
        if($request->compId){
            $comp_id = $request->compId;
        }else{
            $get_comp_id = Business::where('comp_name',$comp_name) 
            ->where('status',1)->first();
            $comp_id = $get_comp_id->id;
        }
        $categories = Category::with(['sub_category'])->find($cate_id);
        $popular_comp = Business::with(['comp_category.get_category'])->whereHas('comp_category')->latest()->take(10)->get();
        
        $cate_comp = comp_cate_subcate::select('comp_id')->with(['comp_info.avg','comp_info.count_review'])->distinct()
        ->where('cate_id',$cate_id)
        ->paginate(10);
        
        $searched_buss = Business::with(['avg','count_review'])
        ->where(function($query) use ($comp_id) {
            $query->where('id',$comp_id);
        })->first();
        // echo '<pre>';
        // print_r($cate_comp->toArray());
        // exit();
        
        return view('get_company_subcategories',compact('categories','popular_comp','cate_comp','searched_buss'));
    }
    
    public function SearchByComp(Request $request){
        $seachVal = $request->seachVal;
        $cate_id = $request->cate_id;
        $categories = Category::where('name','like','%'.$cate_id.'%')->get();
        $business = Business::with(['company_category.get_category2'])
        ->where(function($q1) use ($seachVal){
            $q1->where('comp_name','like','%'.$seachVal.'%')
            ->where('name','LIKE','%'.$seachVal.'%');
        })
        ->where('status',1)
        ->get();
        
        
        return response()->json($business);
    }
    public function SearchByCate(Request $request){
        $seachVal = $request->seachVal;
        $cate_id = $request->cate_id;
        $data=[];
        $categories = Category::where('name','like','%'.$cate_id.'%')->get();
        $business = Business::with(['company_category.get_category2'])
        ->where(function($q1) use ($seachVal){
            $q1->where('comp_name','like','%'.$seachVal.'%')
            ->where('name','LIKE','%'.$seachVal.'%');
        })
        ->where('status',1)
        ->get();
        // foreach($business as $val){
        //     foreach($val->company_category as $val1){
        //             $data['company_category'] = $val1;
        //         foreach($val1->get_category2 as $val2 ){
        //              $data['get_category2'] = $val2;
        //         }
        //     }
        // }
        // echo '<pre>';
        // print_r($data['get_category2']);
        
        // print_r($business[0]->company_category[0]->get_category2->id->toArray());
        
        // exit();
        return response()->json($business);
    }

    public function getValue(Request $request){
        $city = $request->comp_city;
        $state = $request->comp_state;
        $postal_code = $request->comp_postalcode;
        
        $zipcode1 = Zipcode::select('city','statefull','zipcode')
        ->where(function($q) use ($city){
            $q
            ->where('city','like', '%'.$city.'%');
            
        })
        ->where(function($q1) use ($state){
            $q1
            ->where('statefull','like', '%'.$state.'%');
           
        })
        ->where(function($q2) use ($postal_code){
            $q2
            ->where('zipcode','like',$postal_code.'%');
             
        })
        ->skip(0)
        ->take(10)
        ->get();
        $zipcode ='';
        
        if($city){
            $zipcode = $zipcode1->unique('city');
        }
        if($state){
            $zipcode = $zipcode1->unique('statefull');
        
        }
        if($postal_code){
            $zipcode = $zipcode1->unique('zipcode');
        }
        
        return response()->json($zipcode);
        
    
    }



}
