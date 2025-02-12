<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Images;
use App\Models\BackgroundImage;


class ImagesController extends Controller
{
    public function addImages(Request $request)
    {
        $comp_id = Session::get('user')['id'];
        
        // echo '<pre>';
        // print_r( $request->all());
        // echo '</pre>';
        // exit();
         if($request->hasFile('images'))
            {
                foreach($request->file('images') as $file){
                    $images = new Images;
        
                    $destination = 'public/companyImages';
                    $filename = time().'-'.$file->getClientOriginalName();
                    $path = $file->storeAs($destination,$filename);
                    $images->comp_id = $comp_id;
                    $images->images =  $filename;
                    $images->save();
                }


              
            }
        return back();

    }
    
    public function addBackgroundImages(Request $request)
    {
        $comp_id = Session::get('user')['id'];
        
        // echo '<pre>';
        // print_r( $request->all());
        // echo '</pre>';
        // exit();
         if($request->hasFile('images'))
            {
                foreach($request->file('images') as $file){
                    $images = new BackgroundImage;
        
                    $destination = 'public/companyBackgroundImages';
                    $filename = time().'-'.$file->getClientOriginalName();
                    $path = $file->storeAs($destination,$filename);
                    $images->comp_id = $comp_id;
                    $images->background_img =  $filename;
                    $images->save();
                }


              
            }
        return back();

    }
}
