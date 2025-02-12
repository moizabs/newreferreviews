<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Customer;

class RequestPrice extends Model
{
    use HasFactory;
    
    protected $table = 'request_prices';
    
     protected $fillable = [

        'user_id',
        'comp_id',
        'pickup_loca',
        'dilvery_loca',
        'veh_year',
        'veh_make',
        'veh_model',
        'trailer_types',
        'veh_condition',


    ];
    
    public function get_business()
    {
        return $this->belongsTo(Business::class,'comp_id','id');
    }
    
    public function get_customer()
    {
        return $this->belongsTo(Customer::class,'user_id','id');
    }
}
