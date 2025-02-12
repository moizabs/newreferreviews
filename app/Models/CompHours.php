<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompHours extends Model
{
    use HasFactory;
    protected $table = 'comp_hours';

    protected $fillable = [
        'comp_id',
        'hours',
        'day_val',
    ];
}
