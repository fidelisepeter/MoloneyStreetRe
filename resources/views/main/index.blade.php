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
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                            @forelse ($latestNews as $latest)
                                <div class="position-relative overflow-hidden" style="height: 435px;">
                                    <img class="img-fluid h-100" src="{{ asset($latest->image) }}"
                                        onerror="this.src='https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                        style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="d-flex align-items-center">
                                            <div class="has-video">
                                                <a href="" class="video-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <div class="mb-1">
                                                    <a class="text-white" href="">{{ $latest->category->title }}</a>
                                                    <span class="px-2 text-white">/</span>
                                                    <a class="text-white"href="">
                                                        {{ \Carbon\Carbon::parse($latest->created_at)->format('F d, Y') }}
                                                    </a>
                                                </div>
                                                <a class="h2 m-0 text-white font-weight-bold"
                                                    href="{{ route('show', $latest) }}">{{ $latest->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="position-relative overflow-hidden" style="height: 435px;">
                                    <img class="img-fluid h-100"
                                        src="https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'No News Found') }}"
                                        style="object-fit: cover;">
                                    <div class="overlay">
                                        <div class="mb-1">
                                            <a class="text-white" href="">No News Found</a>
                                        </div>
                                        <a class="h2 m-0 text-white font-weight-bold"
                                            href="{{ route('show', 'top-news') }}">Click
                                            Here to details</a>
                                    </div>
                                </div>
                            @endforelse


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{ route('categories.index') }}" class="text-decoration-none" data-toggle="tooltip"
                            data-title="Click to view all">
                            <div
                                class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 z-index-over-social-links">
                                <h3 class="m-0">Categories</h3>
                                <a class="text-primary font-weight-bolder text-decoration-none"
                                    href="{{ route('categories.index') }}">View All</a>
                            </div>
                        </a>

                        @forelse ($categories as $category)
                            <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                                <img class="img-fluid w-100 h-100" src="{{ asset($category->image) }}"
                                    onerror="this.src='https://via.placeholder.com/500x80?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="object-fit: cover;">
                                <a href="{{ route('show', $category) }}"
                                    class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                    {{ $category->title }}
                                </a>
                            </div>
                        @empty
                            <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                                <img class="img-fluid w-100 h-100"
                                    src="https://via.placeholder.com/500x80?text={{ setting()->get('site_name', 'Image not Available') }}"
                                    style="object-fit: cover;">
                                <a href=""
                                    class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                    No Category Found
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
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
                                    style="background-color: #327e34;padding: 3px 15px;font-size: 13px;border-bottom-right-radius: 15px;">
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
    </div>
@endsection
