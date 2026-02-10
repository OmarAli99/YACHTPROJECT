<?php

namespace App\Models;

use App\Models\Yacht;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   protected $fillable = [
    'customer_name',
    'customer_phone',
    'trip_date',
    'trip_time',
    'status',
    'notes',
       
    ];
}
