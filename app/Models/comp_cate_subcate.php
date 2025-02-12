<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comp_cate_subcate extends Model
{
    use HasFactory;
    protected $table = 'comp_cate_subcates';

    protected $fillable = [
        'comp_id',
        'cate_id',
        'sub_cate_id',
    ];
    
    public function get_category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
    public function get_category2()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
   
    public function get_sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_cate_id','id');
    }
    public function get_sub_category2()
    {
        return $this->hasMany(SELF::class,'id','cate_id');
    }
    
    public function comp_info()
    {
        return $this->belongsTo(Business::class,'comp_id','id');
    }
    
}
