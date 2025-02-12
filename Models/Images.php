<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';

     protected $fillable = [

        'comp_id',
        'images'
    ];
    
    public function get_customer()
    {
        return $this->belongsTo(Customer::class,'comp_id','id');
    }
}
