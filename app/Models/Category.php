<?php

namespace App\Models;

use App\UseSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, UseSlug;

    protected $fillable = ['slug', 'title'];

    public function getRouteKeyName()
    {
        return 'slug'; // Set the route key to 'slug'
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}