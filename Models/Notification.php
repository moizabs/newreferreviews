<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    
    protected $fillable = [
        'business_id',
        'customer_id',
        'request_price_id',
        'view'
    ];
    
    public function reqPrice()
    {
        return $this->belongsTo(RequestPrice::class,'request_price_id','id');
    }
}
