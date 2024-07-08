<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Classification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();
        return view('posts', ['posts' => $posts, 'title' => 'All Posts']);
    }

    public function get($slug)
    {
        $classification = Classification::where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->first();
        $category = Category::where('slug', $slug)->first();

        // Determine which model has a matching slug
        if ($classification) {

            // Handle logic for Classification
            return view('posts', ['posts' => $classification->posts, 'title' => $classification->title]);
        } elseif ($category) {

            // Handle logic for Category
            return view('posts', ['posts' => $category->posts, 'title' => $category->title]);
        } elseif ($post) {
            // Fetch related posts based on title similarity

            $relatedPosts = Post::where('classification_id', $post->classification_id)
                ->where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();

            // Fetch related category posts
            $relatedCategoryPosts = Post::where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();

            // Handle logic for Post
            return view('post-details', [
                'post' => $post,
                'relatedPosts' => $relatedPosts,
                'relatedCategoryPosts' => $relatedCategoryPosts
            ]);
        } else {
            // Handle case where no matching record is found
            abort(404);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}