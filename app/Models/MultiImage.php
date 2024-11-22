<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Database\Eloquent\HasFactory;

class MultiImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'title', 'short_title', 'short_description', 'long_description', 'about_image', // ឬ 'home_about'
    // ];
}
