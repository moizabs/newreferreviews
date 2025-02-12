<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Images;
use App\Models\RequestPrice;

use Illuminate\Support\Facades\Session;
use DB;

class Customer extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'phone',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function get_review()
    {
        return $this->hasMany(Review::class,'id','user_id');
    }
    
    
    public function count_reviews()
    {
        return $this->hasMany(Review::class,'user_id','id');

    }
    
     public function userdetail_reqprice()
    {
        return $this->hasMany(RequestPrice::class,'user_id','id');

    }
     public function last_msg(){
        if(Session::has('user'))
        {
            $id = Session::get('user')['id'];
        }
        else{
            $id = 0;
        }
        return $this->hasOne(Chat::class,'user_id','id')
        ->where('business_id',$id)
        ->orderBy('created_at','DESC') ;
    }
    public function last_msg2(){
        
        return $this->hasMany(Chat::class,'user_id','id')
        ->orderBy('created_at','DESC') ;
    }
    public function customer_chat(){
        
        return $this->hasOne(Chat::class,'user_id','id')
        ->orderBy('created_at','DESC') ;
    }
}
