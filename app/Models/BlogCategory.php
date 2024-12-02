<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];

    // Define the relationship with the Blog model
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }

    // Add cascading delete logic
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            // Delete all related blogs when the category is deleted
            $category->blogs()->delete();
        });
    }
}
