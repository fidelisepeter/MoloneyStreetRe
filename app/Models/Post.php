<?php

namespace App\Models;

use App\UseSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, UseSlug;

    protected $fillable = ['slug', 'title', 'content', 'type', 'tags', 'user_id', 'user_name', 'image', 'allow_comments', 'category_id', 'classification_id'];


    public function getRouteKeyName()
    {
        return 'slug'; // Set the route key to 'slug'
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}