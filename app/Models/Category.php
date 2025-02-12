<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name','image'
    ];
    
    public function sub_category() {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
    public function sub_categories() {
        return $this->belongsTo(SubCategory::class,'id','category_id');
    }
    
}
