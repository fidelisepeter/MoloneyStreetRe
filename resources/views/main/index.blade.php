@extends('layouts.app')

@section('content')
    <div class="breadcomb-area">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    @php
                                        $moment = \Carbon\Carbon::now()->format('G');
                                        $icon = 'bi bi-sunrise'; // Default to sunrise icon for morning

                                        if ($moment >= 0 && $moment <= 11) {
                                            $icon = 'bi bi-sunrise'; // Morning icon
                                        } elseif ($moment >= 12 && $moment <= 15) {
                                            $icon = 'bi bi-sun'; // Afternoon icon
                                        } elseif ($moment >= 16 && $moment <= 20) {
                                            $icon = 'bi bi-sunset'; // Evening icon
                                        } else {
                                            $icon = 'bi bi-moon'; // Night icon
                                        }
                                    @endphp
                                    <i class="{{ $icon }}"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>
                                        Hello
                                        @if ($moment >= 0 && $moment <= 11)
                                            Good Morning
                                        @elseif($moment >= 12 && $moment <= 15)
                                            Good Afternoon
                                        @elseif($moment >= 16 && $moment <= 20)
                                            Good Evening
                                        @else
                                            Good Night
                                        @endif
                                    </h2>
                                    <p>Welcome to MoloneyStreetRe: A financial markets melting platform</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Login to your account"
                                    class="btn"><i class="bi bi-door-open"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="image-cropper-wp">
                <div class="row">

                    <div class="col-lg-8 col-md-9 col-sm-6 col-xs-12">
                        <div class="owl-carousel latest-news position-relative mb-3 mb-lg-0">
                            @forelse ($latestNews as $latest)
                                <div class="position-relative overflow-hidden carousel-slide" style="height: 435px;">
                                    <img class="img-fluid h-100" src="{{ asset($latest->image) }}"
                                        onerror="this.src='https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                        style="object-fit: cover;">
                                    <div class="overlay d-flex flex-column justify-content-end p-4">
                                        <div class="item-data">
                                            <a class="category text-uppercase"
                                                href="">{{ $latest->category->title }}</a>
                                            <span class="date">

                                                <small class="">
                                                    {{ \Carbon\Carbon::parse($latest->created_at)->format('F d, Y') }}
                                                </small>
                                            </span>
                                        </div>
                                        <a class="h3 text-white font-weight-bold mb-0" href="{{ route('show', $latest) }}">
                                            {{ $latest->title }}
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="position-relative overflow-hidden carousel-slide" style="height: 435px;">
                                    <img class="img-fluid h-100"
                                        src="https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'No News Found') }}"
                                        style="object-fit: cover;">
                                    <div class="overlay d-flex flex-column justify-content-end p-4">
                                        <div class="mb-2 item-data">
                                            <a class="category text-uppercase text-white" href="">No News
                                                Found</a>
                                        </div>
                                        <a class="h3 text-white font-weight-bold mb-0"
                                            href="{{ route('show', 'top-news') }}">
                                            Click Here for Details
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>


                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ route('categories.index') }}" class="text-decoration-none">
                            <div
                                class="news-item-header d-flex align-items-center justify-content-between mb-3 z-index-over-social-links">
                                <h3 class="m-0 title">Categories</h3>
                                {{-- <a class="link font-weight-bolder text-decoration-none d-none d-lg-block"
                                    data-toggle="tooltip" data-title="Click to view all"
                                    href="{{ route('categories.index') }}">View All
                                    Categories</a> --}}
                            </div>
                        </a>

                        @forelse ($categories as $category)
                            <div class="position-relative overflow-hidden mb-3" style="height: 60px;">
                                <img class="img-fluid w-100 h-100" src="{{ asset($category->image) }}"
                                    onerror="this.src='https://via.placeholder.com/500x80?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="object-fit: cover;">
                                <a href="{{ route('show', $category) }}"
                                    class="overlay  h4 m-0 text-white text-decoration-none">
                                    {{ $category->title }}
                                </a>
                            </div>
                        @empty
                            <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                                <img class="img-fluid w-100 h-100"
                                    src="https://via.placeholder.com/500x80?text={{ setting()->get('site_name', 'Image not Available') }}"
                                    style="object-fit: cover;">
                                <a href="" class="overlay  h4 m-0 text-white text-decoration-none">
                                    No Category Found
                                </a>
                            </div>
                        @endforelse
                        <div class="news-item-footer text-center d-flex justify-content-end">
                            <a class="link font-weight-bolder text-decoration-none d-none d-lg-block" data-toggle="tooltip"
                                data-title="Click to view all" href="{{ route('categories.index') }}">View All
                                Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <a href="{{ route('show', 'featured-news') }}" class="text-decoration-none" data-toggle="tooltip"
                            data-title="Click to view all">

                            <div
                                class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
                                <h3 class="m-0 title">Featured</h3>
                                <a class="font-weight-bolder text-decoration-none link-all" data-toggle="tooltip"
                                    data-title="Click to view all" href="{{ route('show', 'featured-news') }}">View
                                    All</a>
                            </div>
                        </a>
                        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                            @foreach ($featuredNews as $featured)
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                                    <img class="img-fluid w-100 h-100" src="{{ asset($featured->image) }}"
                                        onerror="this.src='https://via.placeholder.com/300x300?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                        style="object-fit: cover;">
                                    <div class="overlay p-0">
                                        <div class="mb-1 text-truncate"
                                            style="background-color: #327e34;clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);padding: 3px 22px 3px 12px;font-size: 13px;">
                                            <a class="text-white"
                                                href="{{ route('show', $featured) }}">{{ $featured->category->title }}</a>
                                            <span class="px-1 text-white">/</span>
                                            <a class="text-white" href="">
                                                {{ \Carbon\Carbon::parse($featured->created_at)->format('F d, Y') }}</a>
                                        </div>
                                        <a class="h4 m-0 text-white p-3" href="{{ route('show', $featured) }}"
                                            data-toggle="tooltip"
                                            data-title="{{ $featured->title }}">{{ Str::limit($featured->title, 75) }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="{{ route('show', 'popular') }}" class="text-decoration-none" data-toggle="tooltip"
                                data-title="Click to view all">
                                <div
                                    class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
                                    <h3 class="m-0 title">Popular</h3>
                                    <a class="link-all font-weight-bolder text-decoration-none" data-toggle="tooltip"
                                        data-title="Click to view all" href="{{ route('show', 'popular') }}">View
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
                                    <div class="overlay position-relative bg-body">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a class="text-primary"
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
                                    <div class="w-100 d-flex flex-column justify-content-center px-3 bg-body"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a class="text-primary"
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
                        <div class="d-flex align-items-center justify-content-between news-item-header mb-3">
                            <h3 class="m-0 title">Trending</h3>
                        </div>
                        @foreach ($trendingNews->take(3) as $trending)
                            <div class="d-flex mb-3">
                                <img src="{{ asset($trending->image) }}"
                                    onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-body px-3"
                                    style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a class="text-primary"
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
@endsection
@section('styles')
    <style>
        .latest-news {
            position: relative;
        }

        .latest-news .carousel-slide img {
            /* border-radius: 10px; */
        }

        .latest-news .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--body-background);
            color: #fff;
            padding: 20px;
            color: #fff;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            transition: background 0.3s ease-in-out;
        }

        .owl-carousel.latest-news .owl-nav .owl-prev,
        .owl-carousel.latest-news .owl-nav .owl-next {
            position: relative;
            width: 45px;
            height: 45px;
            margin: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dee2e6;
            background: rgba(0, 0, 0, 0.45);
            font-size: 25px;
            transition: 0.3s;
        }

        .owl-carousel.latest-news .owl-nav .owl-prev {
            border-bottom-right-radius: 50%;
            border-top-right-radius: 50%;
        }

        .owl-carousel.latest-news .owl-nav .owl-next {
            border-bottom-left-radius: 50%;
            border-top-left-radius: 50%;
        }

        .owl-carousel.latest-news .owl-nav .owl-prev:hover,
        .owl-carousel.latest-news .owl-nav .owl-next:hover {
            color: var(--color-dark);
            background: var(--color-light);
            border-color: var(--color-light);
        }

        .latest-news .overlay a {
            color: #fff;
            text-decoration: none;
        }

        .latest-news .overlay .item-data {
            color: #fff;
            background: var(--color-light);
            border: 1px solid var(--color-light);
            padding: 0;
            color: var(--color-dark);
            position: relative;
            padding: 0px 35px 0px 0px;
            text-decoration: none;
        }

        .item-data .category {
            /* position: absolute; */
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            left: 0;
            color: #fff;
            background: var(--color-primary);
            padding: 0px 35px;
            text-decoration: none;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
        }

        .item-data .date {
            color: var(--color-dark);
            margin-right: 35px;
        }

        /*slider-bg-setup*/
        .slider-items {
            position: relative;
            /*   slider-height */
            height: 100vh;
            -webkit-background-size: 100% 100%;
            background-size: 100% 100%;
            background-position: 0 0;
            background-repeat: no-repeat;
        }

        /*slider-style*/
        .active-slider {
            position: relative;
        }

        .single-item {
            position: absolute;
            color: #fff;
            text-align: center;
            width: 100%;
            top: 50%;
            text-transform: uppercase;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /*over-lay-for-slider*/
        .slider-items:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* overlay-color */
            background: -webkit-gradient(linear, left top, left bottom, from(#777), to(#000));
            background: -webkit-linear-gradient(#777, #000);
            background: -o-linear-gradient(#777, #000);
            background: linear-gradient(#777, #000);
            opacity: .65
        }

        /*slider-reade-more-button*/
        a.home-btn {
            ;
            border: 2px solid #fff;
            display: inline-block;
            padding: 10px 25px;
            margin-top: 30px;
            color: #fff;
            text-decoration: none;
            transition: linear .3s;
        }

        a.home-btn:hover,
        .owl-nav div:hover {
            background-color: #000;
        }

        /*owl-nav*/
        .owl-nav div {
            border: 2px solid #fff;
            color: #fff;
            height: 40px;
            width: 40px;
            position: absolute;
            z-index: 9;
            top: 50%;
            margin-top: -20px;
            left: 10px;
            line-height: 40px;
            text-align: center;
            -webkit-transition: linear .3s;
            -o-transition: linear .3s;
            transition: linear .3s;
        }

        .owl-nav div.owl-next {
            left: auto;
            right: 10px;
        }

        /* optional */
        .owl-nav h1 {
            font-weight: 900;
        }

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

        .news-item-footer .link {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 8px 25px 8px 35px;
            background: var(--body-bg);
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);
            width: fit-content;
        }
    </style>
@endsection
@section('scripts')
    <!-- Owl Carousel JS -->

    <script>
        $(document).ready(function() {
            $(".latest-news").owlCarousel({
                autoplay: true,
                autoplayTimeout: 30000, // 30 seconds
                smartSpeed: 1500,
                items: 1,
                dots: false,
                loop: true,
                nav: true,
                navText: [
                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                ],
            });

        });
    </script>
@endsection
