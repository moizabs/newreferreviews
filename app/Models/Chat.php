<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    
    protected $fillable = [
        'business_id',
        'user_id',
        'message',
        'message_date',
        'message_time',
        'status', //0=sent; 1=deliver; 2=seen 
        'message_by', //BUSINESS or USER
    ];
    public function buss_info()
    {
        return $this->hasOne(Business::class,'id','business_id');

    }
    public function cust_info()
    {
        return $this->hasOne(Customer::class,'id','user_id');

    }
}
