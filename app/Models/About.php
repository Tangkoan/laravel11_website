<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'title', 'short_title', 'short_description', 'long_description', 'about_image', // ឬ 'home_about'
    ];
}
