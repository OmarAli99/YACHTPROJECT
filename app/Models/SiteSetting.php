<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['hero_image', 'about_image', 'trips_images', 'hero_title', 'about_text'];
    protected $casts = [
    'trips_images' => 'array',
    'about_image' => 'array',
];
}
