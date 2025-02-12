<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Review;
use App\Models\RequestPrice;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'email',
        'review',

        'role',

        'comp_name',
        'comp_mc_num',
        'comp_email',
        'comp_phone',
        'comp_name',
        'comp_city',
        'comp_state',
        'comp_address',
        'comp_desire_name',
        'comp_image',
        'google_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function reviewGet()
    {
        return $this->hasMany(Review::class,'id','comp_id');
    }
    
    public function userDetail_request_price()
    {
        return $this->hasMany(RequestPrice::class,'id','comp_id');
    }
}
