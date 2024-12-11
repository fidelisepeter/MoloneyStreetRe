<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
            'parent_id' => 'nullable|exists:comments,id',
            'quoted_comment_id' => 'nullable|exists:comments,id'
        ]);

        // Create a new comment
        $post->comments()->create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_id' => auth()->id(), // If the user is logged in
            'content' => $request->message,
            'parent_id' => $request->parent_id,  // This can be null if it's a root comment
            'quoted_comment_id' => $request->quoted_comment_id,
        ]);

        // Redirect back to the post with a success message
        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    public function reply(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'required|exists:comments,id',
            'quoted_comment_id' => 'required|exists:comments,id'
        ]);

        // Create a new reply comment
        Comment::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_id' => auth()->id(), // If the user is logged in
            'content' => $request->message,
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id,
            'quoted_comment_id' => $request->quoted_comment_id,
        ]);

        // Redirect back to the post with a success message
        return redirect()->back()->with('success', 'Reply posted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}