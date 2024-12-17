<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Eager load posts with their classifications
        $posts = Post::with('classification')
            ->whereHas('classification', function ($query) {
                $query->whereIn('slug', ['breaking-news', 'popular-news', 'trending-news', 'latest-news', 'featured-news']);
            })
            ->get();

        // Organize posts by classification type
        $breakingNews = $posts->where('classification.slug', 'breaking-news');
        $popularNews = $posts->where('classification.slug', 'popular-news');
        $trendingNews = $posts->where('classification.slug', 'trending-news');
        $latestNews = $posts->where('classification.slug', 'latest-news');
        $featuredNews = $posts->where('classification.slug', 'featured-news');

        $categories = Category::limit(5)->get();

        // Pass data to the view
        return view('main.index', [
            'breakingNews' => $breakingNews,
            'popularNews' => $popularNews,
            'trendingNews' => $trendingNews,
            'latestNews' => $latestNews,
            'featuredNews' => $featuredNews,
            // 'topNews' => $topNews,
            'categories' => $categories,
        ]);
    }

    public function index2()
    {
        // Eager load posts with their classifications
        $posts = Post::with('classification')
            ->whereHas('classification', function ($query) {
                $query->whereIn('slug', ['breaking-news', 'popular-news', 'trending-news', 'latest-news', 'featured-news']);
            })
            ->get();

        // Organize posts by classification type
        $breakingNews = $posts->where('classification.slug', 'breaking-news');
        $popularNews = $posts->where('classification.slug', 'popular-news');
        $trendingNews = $posts->where('classification.slug', 'trending-news');
        $latestNews = $posts->where('classification.slug', 'latest-news');
        $featuredNews = $posts->where('classification.slug', 'featured-news');

        $categories = Category::limit(4)->get();

        // Pass data to the view
        return view('index', [
            'breakingNews' => $breakingNews,
            'popularNews' => $popularNews,
            'trendingNews' => $trendingNews,
            'latestNews' => $latestNews,
            'featuredNews' => $featuredNews,
            // 'topNews' => $topNews,
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        return view('main.about');
    }

    public function contact()
    {
        return view('main.contact');
    }
}
