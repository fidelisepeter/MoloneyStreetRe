<?php

use App\Models\Post;
use GuzzleHttp\Client;
use App\Models\Category;
use App\Models\Classification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassificationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index2'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');



Route::get('/create-domo-posts', function () {
    $images = [
        1 => "img/news-100x100-1.jpg",
        2 => "img/news-100x100-2.jpg",
        3 => "img/news-100x100-3.jpg",
        4 => "img/news-100x100-4.jpg",
        5 => "img/news-700x435-1.jpg",
        6 => "img/news-700x435-2.jpg",
        7 => "img/cat-500x80-1.jpg",
        8 => "img/cat-500x80-2.jpg",
        9 => "img/cat-500x80-3.jpg",
        10 => "img/cat-500x80-4.jpg",
        11 => "img/news-300x300-1.jpg",
        12 => "img/news-300x300-2.jpg",
        13 => "img/news-300x300-3.jpg",
        14 => "img/news-300x300-4.jpg",
        15 => "img/news-300x300-5.jpg",
        16 => "img/news-500x280-1.jpg",
        17 => "img/news-500x280-2.jpg",
        18 => "img/news-500x280-3.jpg",
        19 => "img/news-500x280-4.jpg",
        20 => "img/news-500x280-5.jpg",
        21 => "img/news-500x280-6.jpg",
        22 => "img/news-500x280-6.jpg",
        23 => "img/news-500x280-5.jpg",
        24 => "img/news-500x280-4.jpg",
        25 => "img/news-500x280-3.jpg",
        26 => "img/news-500x280-2.jpg",
        27 => "img/news-500x280-1.jpg",
        28 => "img/news-500x280-2.jpg",
        29 => "img/news-100x100-1.jpg",
        30 => "img/news-100x100-2.jpg",
        31 => "img/news-500x280-3.jpg",
        32 => "img/news-100x100-3.jpg",
        33 => "img/news-100x100-4.jpg",
        34 => "img/ads-700x70.jpg",
        35 => "img/news-500x280-5.jpg",
        36 => "img/news-100x100-5.jpg",
        37 => "img/news-100x100-1.jpg",
        38 => "img/news-500x280-6.jpg",
        39 => "img/news-100x100-2.jpg",
        40 => "img/news-100x100-3.jpg",
        41 => "img/news-500x280-4.jpg",
        42 => "img/news-100x100-1.jpg",
        43 => "img/news-100x100-2.jpg",
        44 => "img/news-100x100-3.jpg",
        45 => "img/news-100x100-4.jpg",
        46 => "img/news-100x100-5.jpg",
    ];

    $news = [
        [
            'title' => 'Third Mainland Bridge to be closed for repairs',
            'category' => 'Local News',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-1.jpg'
        ],
        [
            'title' => 'COVID-19: New variant detected in several countries',
            'category' => 'Health',
            'classification' => 'Popular News',
            'imageUrl' => 'img/news-700x435-2.jpg'
        ],
        [
            'title' => 'Stock Market hits new record high',
            'category' => 'Business',
            'classification' => 'Breaking News',
            'imageUrl' => 'img/news-700x435-3.jpg'
        ],
        [
            'title' => 'World leaders meet to discuss climate change',
            'category' => 'Environment',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-4.jpg'
        ],
        [
            'title' => 'Technology companies announce new breakthroughs',
            'category' => 'Technology',
            'classification' => 'Popular News',
            'imageUrl' => 'img/news-700x435-5.jpg'
        ],
        [
            'title' => 'New study reveals benefits of Mediterranean diet',
            'category' => 'Health',
            'classification' => 'Breaking News',
            'imageUrl' => 'img/news-700x435-6.jpg'
        ],
        [
            'title' => 'Local artist wins prestigious international award',
            'category' => 'Entertainment',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-7.jpg'
        ],
        [
            'title' => 'Major earthquake strikes region, causing widespread damage',
            'category' => 'World News',
            'classification' => 'Popular News',
            'imageUrl' => 'img/news-700x435-8.jpg'
        ],
        [
            'title' => 'SpaceX launches new satellite into orbit',
            'category' => 'Science',
            'classification' => 'Breaking News',
            'imageUrl' => 'img/news-700x435-9.jpg'
        ],
        [
            'title' => 'Government announces new tax reform measures',
            'category' => 'Politics',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-10.jpg'
        ],
        [
            'title' => 'Fashion industry prepares for upcoming season',
            'category' => 'Lifestyle',
            'classification' => 'Popular News',
            'imageUrl' => 'img/news-700x435-11.jpg'
        ],
        [
            'title' => 'Local community celebrates cultural heritage week',
            'category' => 'Culture',
            'classification' => 'Breaking News',
            'imageUrl' => 'img/news-700x435-12.jpg'
        ],
        [
            'title' => 'New technology startup raises $10 million in funding',
            'category' => 'Business',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-13.jpg'
        ],
        [
            'title' => 'Scientists discover new species in remote rainforest',
            'category' => 'Science',
            'classification' => 'Popular News',
            'imageUrl' => 'img/news-700x435-14.jpg'
        ],
        [
            'title' => 'Education ministry launches new literacy program',
            'category' => 'Education',
            'classification' => 'Breaking News',
            'imageUrl' => 'img/news-700x435-15.jpg'
        ],
        [
            'title' => 'Artificial Intelligence impacts daily life in unexpected ways',
            'category' => 'Technology',
            'classification' => 'Featured News',
            'imageUrl' => 'img/news-700x435-16.jpg'
        ],
        [
            'title' => 'New healthcare legislation passes in parliament',
            'category' => 'Health',
            'classification' => 'Latest News',
            'imageUrl' => 'img/news-700x435-17.jpg'
        ],
        [
            'title' => 'Astronomers observe rare celestial event',
            'category' => 'Science',
            'classification' => 'Latest News',
            'imageUrl' => 'img/news-700x435-18.jpg'
        ],
        [
            'title' => 'Local sports team wins championship after decades',
            'category' => 'Sports',
            'classification' => 'Trending News',
            'imageUrl' => 'img/news-700x435-19.jpg'
        ],
        [
            'title' => 'Renewable energy sector sees massive investment',
            'category' => 'Environment',
            'classification' => 'Trending News',
            'imageUrl' => 'img/news-700x435-20.jpg'
        ]
    ];

    foreach ($news as $key => $post) {
        $category = $post['category'];
        $classification = $post['classification'];
        $imageUrl = $post['imageUrl'];
        $title = $post['title'];

        $classificationModel = Classification::firstOrNew(['title' => $classification]);
        $classificationModel->save();
        $categoryModel = Category::firstOrNew(['title' => $category]);
        $categoryModel->save();
        // dd($categoryModel);

        $categoryModel->posts()->create([
            'title' => $title,
            'classification_id' => $classificationModel->id,
            'image' => '/uploads/' . $images[$key + 1],
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id aliquam tincidunt, nisl nunc tincidunt nunc, id lacinia nunc nunc id nunc. Sed auctor, nunc id aliquam tincidunt, nisl nunc tincidunt nunc, id lacinia nunc nunc id nunc.',
            'tags' => 'tag1 , tag2, business, commnunication, trading, others',
            'user_name' => 'Admin',
        ]);
    }
});


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


Route::get('/news/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/news/{slug}', [PostController::class, 'get'])->name('show');
