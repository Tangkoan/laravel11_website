<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'portfolio_name',
        'portfolio_title',
        'portfolio_description',
        'portfolio_image',
    ];
    //
}
