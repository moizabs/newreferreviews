<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Models\Business;
use App\Models\Review;
use App\Models\Company;
use App\Models\Images;
use App\Models\BackgroundImage;
use App\Models\Category;
use App\Models\CompHours;
use App\Models\SubCategory;
use App\Models\comp_cate_subcate;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function profile(Request $request)
    {
        $comp_id = Session::get('user')['id'];
        $company = Business::with(['company_hours'])->where('id',$comp_id)->first();
        // echo '<pre>';
        // print_r($company->company_hours->toArray());
        // exit();
        if ($comp_id) {
            $reviews = Review::where('comp_id', $comp_id)
            ->where('status',1)
            ->with('get_customer')
            ->orderBy('created_at','DESC')
            ->get()
            ->toArray();
            
            $totalreviews = Review::where('comp_id', $comp_id)->where('status',1)->count();
            
            $comp_image = Images::where('comp_id', $comp_id)
            ->with('get_customer')
            ->get();
            
            $comp_back_image = BackgroundImage::where('comp_id', $comp_id)
            ->first();
                
            $totalRating = Review::where('comp_id',$comp_id)->where('status',1)->selectRaw('AVG(rating) as total')
            ->get()
            ->toArray();
            $day = Carbon::parse()->format('D');
            $time = Carbon::parse()->format('h:i a');
            
            // $comp_hours = CompHours::where('comp_id',$comp_id)
            // ->where('weekday',$day)
            // ->whereTime('start_time','>=',$time)
            // ->whereTime('end_time','<=',$time)
            // ->first();
            // echo '<pre>';
            // print_r($day);
            // exit();
            // $status = '';
            // if(isset($comp_hours->id))
            // {
            //     $status = 'Open';
            // }
            // else{
            //     $status = 'Closed';
            // }
            
            
            $total = '';
            
            if ($totalRating) {
                $total = number_format($totalRating[0]['total']);
            }
            
            return view('company.profile',compact('company','reviews','total','comp_image','totalreviews','comp_back_image'));
        } else {
            return redirect()->route('company.login');
        }
    }

    public function searchWithRating(Request $request)
    {
        $rating = Review::with('get_customer')
        ->where('comp_id',$request->id)
        ->where('rating',$request->rating)
        ->get()
        ->toArray();

        return view('ajax/rating',compact('rating'));
    }

    public function loginView()
    {
            return view('company.login');
       
    }

    public function loginSubmit(Request $request)
    {
         // validate the request
        $this->validate($request,
            [
                'comp_email' => 'required|email',
                'password' => 'required'
            ]
            
        );        
       
        $company = Business::where('email', '=', $request->comp_email)->first();

        if ($company) {
            if (Hash::check($request->password, $company->password)) {
                Session::put('user', $company);

                return redirect()->route('home');
            } else {
                return back()->with('fail', 'Password not Matches');
            }
        } else {
            return back()->with('fail', 'Invalid Email');
        }
    }

    public function registerView()
    {
        $categories = Category::all();
        return view('auth.register',compact('categories'));
    }

    public function registerSubmit(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
          'comp_name' => 'required|unique:businesses,comp_name',
        //   'comp_mc_num' => 'required|unique:businesses,mc_num',
          'comp_email' => 'required|unique:businesses,email',
          'password' => 'required|min:8',
          
          
      ]);
      if($validator->passes())
      {
          
        $company = new Business;
        $company->name = $request->name;
        $company->comp_name = $request->comp_name;
        // $company->mc_num = $request->comp_mc_num;
        $company->email = $request->comp_email;
        $company->password = Hash::make($request->password);
        // $company->city = $request->comp_city;
        // $company->state = $request->comp_state;
        // $company->desire_name = $request->comp_desire_name;
        // $company->message = $request->comp_message;
        // $company->address = $request->comp_address;
        // $company->website = $request->website;
        $company->phone = $request->pnumber;
        // $company->dot_num = $request->dot_num;
        // $company->category_id = $request->category_id;

        

        if($request->hasFile('image'))
        {
            $destination = 'public/companyLogo';
            $img = $request->file('image');
            $filename = time().'-'.$img->getClientOriginalName();
            $path = $img->storeAs($destination,$filename);
            $company->image =  $filename;
        }


        $company->save();


        return redirect()
            ->route('company.login')
            ->with('success','You have successfully registered, Login to access your profile');
      }
      else{
          return back()->withErrors($validator)->withInput();
      }


    }

    public function updateSubmit(Request $request,$id )
    {
        // $id = Session::get('user')['id'];
        
        // $companyUpdate->name = $request->name;
        // $companyUpdate->mc_num = $request->comp_mc_num;
        // $companyUpdate->subcategory_id = $request->subcategory_id;
        // $companyUpdate->password = Hash::make($request->password);
        // $company->desire_name = $request->comp_desire_name;
        // $companyUpdate->dot_num = $request->dot_num;
        // $companyUpdate->category_id = $request->category_id;
        
        
        $companyUpdate = Business::find($id);
        $companyUpdate->comp_name = $request->comp_name;
        $companyUpdate->email = $request->comp_email;
        $companyUpdate->city = $request->comp_city;
        $companyUpdate->state = $request->comp_state;
        $companyUpdate->postalcode = $request->comp_postcode;
        $companyUpdate->address = $request->comp_address;
        $companyUpdate->phone = $request->phone;
        $companyUpdate->website = $request->comp_website;
        $companyUpdate->message = $request->comp_message;
        if($request->category_id){
            foreach ($request->category_id as $key => $item){
                
                $comp_cate_subcate = new comp_cate_subcate();
                $check_cate_subcate = $comp_cate_subcate
                ->where('comp_id',$id)
                ->where('cate_id',$item)
                ->where('sub_cate_id',$request->subcategory_id[$key])
                ->get();
                if($check_cate_subcate){
                   
                    $comp_cate_subcate->comp_id = $id;
                    $comp_cate_subcate->cate_id = $item;
                    $comp_cate_subcate->sub_cate_id = $request->subcategory_id[$key];
                    $comp_cate_subcate->save();
                }
            }
        }
        
        if(isset($request->BusinessHours)){
            foreach ($request->BusinessHours as $key => $item){
                $hour = new CompHours();
                $hour->comp_id = $id;
                $hour->day_val = $request->BusinessHoursDay[$key];
                $hour->weekday = $request->BusinessDays[$key];
                $hour->start_time = $request->BusinessDaysStart[$key];
                $hour->end_time = $request->BusinessDaysEnd[$key];
                $hour->status = $request->BusinessDaysStatus[$key];
                $hour->hours = $item;
                $hour->save();
            }
        }

        if($request->hasFile('image'))
        {
            $destination = 'public/companyLogo';
            $img = $request->file('image');
            $filename = time().'-'.$img->getClientOriginalName();
            $path = $img->storeAs($destination,$filename);
            $companyUpdate->image =  $filename;
        }
        $companyUpdate->save();
        Session::put('user', $companyUpdate);
        Session::get('user');
        return back()
            ->with('status','You have successfully registered, Login to access your profile');

    }
    
    public function removeHours($id){
        $hour = CompHours::find($id);
        $hour->delete();
        return back();
    }
    
    public function removeSubCate($id){
        $comp_sub_cate = comp_cate_subcate::find($id);
        $comp_sub_cate->delete();
        return back();
    }
    
    public function editView(Request $request, $id)     {
        
        $company = Business::with(['company_hours','company_category.get_category','company_category.get_sub_category'])->find($id);
        return view('company.edit', compact('company'));

    }

    public function categoryList(Request $request)
    {
       
        $search = $request->category;
       
        $data = Category::where('name', 'LIKE', '%'.$search.'%')
        ->skip(0)
        ->take(10)
        ->get();
        
        return Response::json($data);
        
    }
    public function subcategoryList(Request $request)
    {
        $comp_id = $request->cat_id;
        $data = SubCategory::with(['category'])
        ->where('category_id',$comp_id)
        ->get();
        // echo '<pre>';
        // print_r($data->toArray());
        // exit();
        return Response::json($data);
        
    }
    
    public function changeBtnName(Request $request){
        $comp_id = Session::get('user')['id'];
        $company = Business::where('id',$comp_id)->first();
        if($comp_id){
            $company->button_text = $request->reqPriInput;
            $company->save();
        }
        return back();
    }

    public function logout()
    {
        if(Session::has('user')) {
            Session::flush();
            return redirect()->route('company.login');
        } else {
             return redirect()->route('company.login');
        }
    }
    
}
