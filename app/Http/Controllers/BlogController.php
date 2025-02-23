<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index')->with([
            'articles' => Post::all()->sortByDesc('updated_at'),
        ]);
    }

    public function categories()
    {
        return view('admin.blog.categories')->with([
            'categories' => Category::all()->sortByDesc('updated_at'),
        ]);
    }

    public function create()
    {

        $users = [];
        $classifications = Classification::all();

        $categories = Category::all();
        return view('admin.blog.create')->with([
            'users' => $users,
            'categories' => $categories,
            'classifications' => $classifications,
        ]);
    }

    public function edit($id)
    {

        $article = Post::findOrFail($id);
        $classifications = Classification::all();
        $categories = Category::all();
        // dd($article);

        return view('admin.blog.edit')->with([
            'article' => $article,
            'categories' => $categories,
            'classifications' => $classifications,
        ]);
    }

    public function store(Request $request)
    {
        // Debugging request data
        // dd($request->all());

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|string',
            // 'allow_comments' => 'required|boolean',
            'category_id' => 'required|integer',
            'classification_id' => 'nullable|integer',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048' // Allow only image files with a max size of 2MB
        ]);

        $imagePath = '';

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = 'uploads/' . $request->file('image')->store('images', 'public_uploads'); // Save to 'uploads/' directory in 'public_upload' disk
        }

        // Create the post
        $post = Post::create([
            'title' => $request->title,
            'classification_id' => $request->classification_id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'allow_comments' => $request->allow_comments == 'yes' ? true : false,
            'image' => $imagePath,
            'content' => $request->content,
            'tags' => $request->tags ?? null,
            'user_id' => Auth::id(),
            'user_name' => Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : 'Admin',
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // 'description' => 'required|string',
            'type' => 'required|string',
            'allow_comments' => 'required|in:yes,no',
            'category_id' => 'required|integer',
            'classification_id' => 'nullable|integer',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $imagePath = $post->image;

        // Handle file upload
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public_upload')->delete($post->image); // Delete old image
            }
            $imagePath = 'uploads/' . $request->file('image')->store('uploads', 'public_upload'); // Save new image
            $post->image = $imagePath;
        }

        // Update article
        $post->update([
            'title' => $request->title,
            'classification_id' => $request->classification_id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'allow_comments' => $request->allow_comments == 'yes' ? true : false,
            'image' => $imagePath,
            'content' => $request->content,
            'tags' => $request->tags ?? null,
            // 'user_id' => Auth::id(),
            // 'user_name' => Auth::user() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : 'Admin',
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Article updated successfully!');
    }

    public function delete($id)
    {

        $article = Post::findOrFail($id);
        $article->destroy();
        return redirect()->route('admin.blog.index')->with('success', 'Article deleted successfully!');
    }

    public function store_category(Request $request)
    {

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048' // Allow only image files with a max size of 2MB
        ]);

        $imagePath = '';

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = 'uploads/' . $request->file('image')->store('images', 'public_uploads'); // Save to 'uploads/' directory in 'public_upload' disk
        }

        // Create the post
        $category = Category::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.blog.categories')->with('success', 'Category created successfully.');
    }

    public function update_category(Request $request, $id)
    {

        dd($request->all());
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048' // Allow only image files with a max size of 2MB
        ]);

        $category = Category::findOrFail($id);
        $imagePath = $category->image;

        // Handle file upload

        if ($request->hasFile('image')) {
            $imagePath = 'uploads/' . $request->file('image')->store('images', 'public_uploads'); // Save to 'uploads/' directory in 'public_upload' disk
        }

        // Create the post
        $category->update([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.blog.categories')->with('success', 'Category updated successfully.');
    }

    public function delete_category($id)
    {
        $article = Category::findOrFail($id);
        $article->destroy();
        return redirect()->route('admin.blog.index')->with('success', 'Category deleted successfully!');
    }
}
