<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'price',
        'duration',
        'description',
        'features',
        'image',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'price'       => 'decimal:2',
        'sort_order'  => 'integer',
    ];
}
