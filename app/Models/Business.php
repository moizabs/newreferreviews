<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'businesses';

    protected $fillable = [
        'name',
        'comp_name',
        'mc_num',
        'dot_num',
        'email',
        'phone',
        'city',
        'state',
        'postalcode',
        'address',
       ' location',
        'desire_name',
        'subcategory_id',
        'hours',
        'image',
        'message',
        'website',
        'status',
        'type',
        'button_text'
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
        return $this->hasMany(Review::class,'comp_id','id');
    }
    
    public function company_hours()
    {
        return $this->hasMany(CompHours::class,'comp_id','id');
    }
    
    public function company_category()
    {
        return $this->hasMany(comp_cate_subcate::class,'comp_id','id');
    }
    public function company_category2()
    {
        return $this->belongsToMany(comp_cate_subcate::class,'comp_id','id');
    }
    
    public function comp_category()
    {
        return $this->hasMany(comp_cate_subcate::class,'comp_id','id');
    }
    
    public function get_category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function get_category2()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function businessdetail_reqprice()
    {
        return $this->hasMany(RequestPrice::class,'comp_id','id');
    }

    public function avg()
    {
        return $this->hasMany(Review::class,'comp_id','id')
        ->select(DB::raw('AVG(rating) as totalRating'),'comp_id')
        ->groupBy('comp_id');
    }
        
    public function count_review()
    {
        return $this->hasMany(Review::class,'comp_id','id')
        ->select(DB::raw('COUNT(review) as totalReview'),'comp_id')
        ->groupBy('comp_id');
    }
    
     public function get_images()
    {
        return $this->hasMany(Images::class,'comp_id','id');
    }

    public function countReview()
    {
        return $this->hasMany(Review::class,'comp_id','id')
        ->select(DB::raw('COUNT(review) as totalReview'),'comp_id')
        ->groupBy('comp_id');
    }
    
    public function last_msg(){
        if(Session::has('user'))
        {
            $id = Session::get('user')['id'];
        }
        else{
            $id = 0;
        }
        return $this->hasOne(Chat::class,'business_id','id')
        ->where('user_id',$id)
        ->orderBy('created_at','DESC') ;
    }
    
    public function business_chat(){
        return $this->hasOne(Chat::class,'business_id','id')
        ->orderBy('created_at','DESC') ;
    }
    
    public function last_msg2(){
        
        return $this->hasMany(Chat::class,'business_id','id')
        ->orderBy('created_at','DESC');
    }
    
}
