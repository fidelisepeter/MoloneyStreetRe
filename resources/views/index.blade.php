@extends('layouts.app')

@section('content')
    <!-- Top News Slider Start -->
    {{-- @include('home-components.top-news-slider') --}}
    <!-- Top News Slider End -->
    {{-- <div class="container-fluid py-3">
        <div class="container">
            <div class="text-center">
                <h4>Welcome to</h4>
                <h1 style="color: var(--primaryColor);">{{ setting()->get('title', 'MoloneyStreetRe') }}</h1>
            </div>
        </div>
    </div> --}}

    <!-- Main News Slider Start -->
    {{-- @include('home-components.main-news-slider') --}}
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <a href="{{ route('show', 'featured-news') }}" class="text-decoration-none" data-toggle="tooltip"
                data-title="Click to view all">

                <div
                    class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 z-index-over-social-links">
                    <h3 class="m-0">Featured</h3>
                    <a class="text-primary font-weight-bolder text-decoration-none"
                        href="{{ route('show', 'featured-news') }}">View
                        All</a>
                </div>
            </a>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @foreach ($featuredNews as $featured)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset($featured->image) }}"
                            onerror="this.src='https://via.placeholder.com/300x300?text={{ setting()->get('site_name', 'Image not Available') }}';"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1 text-truncate"
                                style="background-color: #327e34;clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);padding: 3px 22px 3px 12px;font-size: 13px;">
                                <a class="text-white"
                                    href="{{ route('show', $featured) }}">{{ $featured->category->title }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">
                                    {{ \Carbon\Carbon::parse($featured->created_at)->format('F d, Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white" href="{{ route('show', $featured) }}" data-toggle="tooltip"
                                data-title="{{ $featured->title }}">{{ Str::limit($featured->title, 20) }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ $category->title }}</h3>
                        </div>
                        <div class="owl-carousel owl-carousel-3 category-carousel-item position-relative">
                            @foreach ($category->posts as $category_post)
                                <div class="position-relative">
                                    <img class="img-fluid w-100" src="{{ asset($category_post->image) }}"
                                        style="height:145px;object-fit: cover;" alt="{{ $category_post->title }}"
                                        onerror="this.src='https://via.placeholder.com/255x145?text={{ setting()->get('site_name', 'Image not Available') }}';">

                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a href="">Technology</a>
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
        </div>
    </div>

    <!-- Category News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="{{ route('show', 'popular') }}" class="text-decoration-none" data-toggle="tooltip"
                                data-title="Click to view all">
                                <div
                                    class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 z-index-over-social-links">
                                    <h3 class="m-0">Popular</h3>
                                    <a class="text-primary font-weight-bolder text-decoration-none"
                                        href="{{ route('show', 'popular') }}">View
                                        All</a>
                                </div>
                            </a>

                        </div>
                        @foreach ($popularNews->take(2) as $popular)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ asset($popular->image) }}"
                                        onerror="this.src='https://via.placeholder.com/350x200?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                        style="height:200px;object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a
                                                href="{{ route('show', $popular->category) }}">{{ $popular->category->title }}</a>
                                            <span class="px-1">/</span>
                                            <span>
                                                {{ \Carbon\Carbon::parse($popular->created_at)->format('F d, Y') }}</span>

                                        </div>
                                        <a class="h4" href="{{ route('show', $popular) }}" data-toggle="tooltip"
                                            data-title="{{ $popular->title }}">{{ Str::limit($popular->title, 25) }}</a>
                                        <p class="m-0">{{ Str::limit($popular->content, 50) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($popularNews->slice(2, 2) as $popular)
                            <div class="col-lg-6">

                                <div class="d-flex mb-3">
                                    <img src="{{ asset($popular->image) }}"
                                        onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a
                                                href="{{ route('show', $popular->category) }}">{{ $popular->category->title }}</a>
                                            <span class="px-1">/</span>
                                            <span>
                                                {{ \Carbon\Carbon::parse($popular->created_at)->format('F d, Y') }}</span>
                                        </div>
                                        <a class="h6 m-0" href="{{ route('show', $popular) }}" data-toggle="tooltip"
                                            data-title="{{ $popular->title }}">{{ Str::limit($popular->title, 25) }}</a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>




                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">



                    <!-- Trending News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Trending</h3>
                        </div>
                        @foreach ($trendingNews->take(3) as $trending)
                            <div class="d-flex mb-3">
                                <img src="{{ asset($trending->image) }}"
                                    onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                    style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a
                                            href="{{ route('show', $trending->category) }}">{{ $trending->category->title }}</a>
                                        <span class="px-1">/</span>
                                        <span>
                                            {{ \Carbon\Carbon::parse($trending->created_at)->format('F d, Y') }}</span>
                                    </div>
                                    <a class="h6 m-0" href="{{ route('show', $trending) }}" data-toggle="tooltip"
                                        data-title="{{ $trending->title }}">{{ Str::limit($trending->title, 25) }}</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- Trending News End -->

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
