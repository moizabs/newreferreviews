<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'comp_id',
        'background_img'
    ];
    
   
}
