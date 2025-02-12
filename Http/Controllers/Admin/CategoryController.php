<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with(['sub_category'])->orderBy('id','ASC')->get();
        // echo '<pre>';
        // print_r($categories->toArray());
        // exit();
        return view('admin.add_category',compact('categories')); 
    }
    
    public function addCategory(Request $request){
        
        $validator = Validator::make($request->all(), [
          'category' => 'required',
          'image' => 'required|mimes:png,jpg,jpeg,SVG|image',
        ]);
      
        if($validator->passes())
        {
        
          $category = new Category;
          $category->name = Str::ucfirst($request->category); 
          
          if($request->hasFile('image')){
            $destination = 'public/categoryImage';
            $img = $request->file('image');
            $filename = time().'-'.$img->getClientOriginalName();
            $path = $img->storeAs($destination,$filename);
            $category->image =  $filename;
        }
        $category->save();
        return redirect()
            ->route('admin.addCategory')
            ->with('success','Category Added! Successfully ');
      }
      else{
        return back()->withErrors($validator);
      }
    }
    
    public function editCategory(Request $request){
        
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        $cate_id = $request->cate_id;
        
        $image = $request->image_name == '' ? 'required|mimes:png,jpg,jpeg,SVG|image' : '';
        $validator = Validator::make($request->all(), [
          'category' => 'required',
          'image' => $image,
        ]);
        
      
        if($validator->passes())
        {
            $category = Category::find($cate_id);
           
            $category->name = Str::ucfirst($request->category); 
          
            if($request->hasFile('image')){
                $destination = 'public/categoryImage';
                $img = $request->file('image');
                $filename = time().'-'.$img->getClientOriginalName();
                $path = $img->storeAs($destination,$filename);
                $category->image = $filename;
              
            }
            else{
                $category->image = $request->image_name;
            }
        $category->save();
        return redirect()
            ->route('admin.addCategory')
            ->with('success','Category Update! Successfully');
      }
      else{
        return back()->withErrors($validator);
      }
    }
    
    public function AddSubCate(Request $request){
        
        $cate_id = $request->cate_id;
        
        // $image = $request->image_name == '' ? 'required|mimes:png,jpg,jpeg,SVG|image' : '';
        $validator = Validator::make($request->all(), [
          'sub_category' => 'required',
        ]);
        
      
        if($validator->passes())
        {
            $subcategory = new SubCategory;
            
            $subcategory->name = Str::ucfirst($request->sub_category); 
            $subcategory->category_id= $request->cate_id; 
          
            // if($request->hasFile('image')){
            //     $destination = 'public/categoryImage';
            //     $img = $request->file('image');
            //     $filename = time().'-'.$img->getClientOriginalName();
            //     $path = $img->storeAs($destination,$filename);
            //     $category->image = $filename;
              
            // }
            // else{
            //     $category->image = $request->image_name;
            // }
        $subcategory->save();
        return redirect()
            ->route('admin.addCategory')
            ->with('success','Sub Category Update! Successfully');
      }
      else{
        return back()->withErrors($validator);
      }
    }
    
    public function getCate(Request $request){
        $cate_id = $request->cate_id;
        $category = Category::find($cate_id);
        
        return response()->json(['category'=>$category]);
    }
    
    public function delCate(Request $request) {
        $cate_id = $request->cate_id;
        $category = Category::find($cate_id);
        $category->delete();
        return redirect()
            ->route('admin.addCategory')
            ->with('success','Category Deleted! Successfully ');
       
    }
    public function delSubCate(Request $request) {
        $subcate_id = $request->subcate_id;
        $subcategory = SubCategory::find($subcate_id);
        $subcategory->delete();
        // echo '<pre>';
        // print_r($subcategory->all());
        // exit();
        return redirect()
            ->route('admin.addCategory')
            ->with('delete','SubCategory Deleted! Successfully ');
       
    }
}
