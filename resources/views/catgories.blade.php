@extends('layouts.app')

@section('title', 'Category')

@section('content')
    <!-- Category News Slider Start -->
    <div class="row">
        @forelse ($categories as $category)
            <div class="col-lg-6 py-3">
                <div
                    class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
                    <h3 class="m-0 title">{{ $category->title }}</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 category-carousel-item position-relative">
                    @foreach ($category->posts as $category_post)
                        <div class="position-relative  mb-3 ">
                            <img class="img-fluid w-100" src="{{ asset($category_post->image) }}"
                                style="height:145px;object-fit: cover;" alt="{{ $category_post->title }}">

                            <div class="overlay position-relative bg-lighter">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="{{ route('show', $category_post->category) }}"
                                        class="text-primary">{{ $category_post->category->title }}</a>
                                    <span class="px-1">/</span>
                                    <span>
                                        {{ \Carbon\Carbon::parse($category_post->created_at)->format('F d, Y') }}</span>
                                </div>
                                <a class="h4 m-0" href="{{ route('show', $category_post) }}" data-toggle="tooltip"
                                    data-title="{{ $category_post->title }}">{{ Str::limit($category_post->title, 25) }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center">No Data</div>
        @endforelse

    </div>

    <!-- Category News Slider End -->

@endsection
@section('styles')
    <style>
        .news-item-header {
            background: var(--body-bg-bodyer);
        }

        .news-item-header .title {
            color: #fff;
            background: var(--color-primary);
            padding: 10px 60px 10px 20px;
            text-decoration: none;
            font-size: 1.5rem;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
        }

        .news-item-header .link-all {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 8px 25px 8px 35px;
            background: var(--body-bg);
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);

        }
    </style>

@endsection
