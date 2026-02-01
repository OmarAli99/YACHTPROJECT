<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title', 'description', 'address', 'phone', 'email',
        'facebook', 'instagram', 'tiktok',  'map_url'
    ];
}
