<?php

use App\Models\Post;
use GuzzleHttp\Client;
use App\Models\Category;
use App\Models\Classification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\YouTubeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;

Auth::routes();

Route::get('/reset-site', function () {})->name('reset-site');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');

// Route::get('/login', [LoginController::class, 'contact'])->name('home.contact');



Route::prefix('posts')->group(function () {
    // Route to list all posts
    Route::get('/', [PostController::class, 'index'])->name('posts.index');

    // Route to show a specific post
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');

    // Route to create a new post (form)
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');

    // Route to store a new post (form submission)
    Route::post('/', [PostController::class, 'store'])->name('posts.store');

    // Route to edit an existing post (form)
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Route to update an existing post (form submission)
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');

    // Route to delete a post
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::prefix('categories')->group(function () {
    // Route to list all categories
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

    // Route to show a specific category
    Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // Route to create a new category (form)
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');

    // Route to store a new category (form submission)
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');

    // Route to edit an existing category (form)
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

    // Route to update an existing category (form submission)
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');

    // Route to delete a category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::post('/comments/{post}/reply', [CommentController::class, 'reply'])->name('comments.reply');
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');



Route::prefix('classifications')->group(function () {
    // Route to list all classifications
    Route::get('/', [ClassificationController::class, 'index'])->name('classifications.index');

    // Route to show a specific classification
    Route::get('/{classification}', [ClassificationController::class, 'show'])->name('classifications.show');

    // Route to create a new classification (form)
    Route::get('/create', [ClassificationController::class, 'create'])->name('classifications.create');

    // Route to store a new classification (form submission)
    Route::post('/', [ClassificationController::class, 'store'])->name('classifications.store');

    // Route to edit an existing classification (form)
    Route::get('/{classification}/edit', [ClassificationController::class, 'edit'])->name('classifications.edit');

    // Route to update an existing classification (form submission)
    Route::put('/{classification}', [ClassificationController::class, 'update'])->name('classifications.update');

    // Route to delete a classification
    Route::delete('/{classification}', [ClassificationController::class, 'destroy'])->name('classifications.destroy');
});


Route::get('/news/categories', [PostController::class, 'categories'])->name('categories.index');
Route::get('/news/{slug}', [PostController::class, 'get'])->name('show');

Route::get('/youtube', [YouTubeController::class, 'fetchAllVideos'])->name('youtube.index');
Route::get('/youtube/playlist', [YouTubeController::class, 'fetchPlaylists'])->name('youtube.playlist');
Route::get('/youtube/trending', [YouTubeController::class, 'getTrendingVideos'])->name('youtube.trending');
Route::get('/youtube/playlist/{id}', [YouTubeController::class, 'viewPlaylistVideos'])->name('youtube.playlist.view');
// Route::get('/youtube/category/{id}', [YouTubeController::class, 'fetchVideosByCategory'])->name('youtube.index');
// Route::get('/   ', [YouTubeController::class, 'fetchAllVideos']);
Route::get('/youtube/video/{id}', [YouTubeController::class, 'showVideo'])->name('youtube.view');
