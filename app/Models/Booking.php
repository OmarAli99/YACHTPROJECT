<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'trip_date',
        'trip_time',
        'occasion',
        'guests_count',
        'total_price',
        'paid_amount',
        'remaining_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'trip_date'        => 'date',
        'total_price'      => 'decimal:2',
        'paid_amount'      => 'decimal:2',
        'remaining_amount' => 'decimal:2',
        'guests_count'     => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Booking $booking) {
            $total = (float) ($booking->total_price ?? 0);
            $paid = (float) ($booking->paid_amount ?? 0);
            $booking->remaining_amount = max(0, $total - $paid);
        });
    }
}
