<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Business;
use App\Models\Customer;

class Review extends Model
{
    use HasFactory;

      protected $table = 'reviews';

       protected $fillable = [
        'user_id',
        'comp_id',
        'title',
        'review',
        'rating',
        'status',
        'reply',
        'like',
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
