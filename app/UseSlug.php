<?php

namespace App;

use Illuminate\Support\Str;

trait UseSlug
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = $model->generateUniqueSlug($model->title, $model->id);
        });
    }

    public function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $uniqueSlug = $slug;
        $counter = 1;

        while ($this->slugExists($uniqueSlug, $id)) {
            $uniqueSlug = $slug . '-' . $counter;
            $counter++;
        }

        return $uniqueSlug;
    }

    public function slugExists($slug, $id = null)
    {
        $query = static::where('slug', $slug);

        if ($id) {
            $query->where('id', '!=', $id);
        }

        return $query->exists();
    }
}