@extends('layouts.app')
@section('title', $title)

@section('content')
    <!-- Post With Sidebar Start -->
    <div class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
        <h2 class="m-0 title">{{ $title }}</h2>
        <a class="link-home  font-weight-medium text-decoration-none" href="{{ route('home.index') }}">Go Back
            Home</a>
    </div>

    <div class="row mb-3">
        @foreach ($posts as $post)
            <div class="col-sm-6 col-lg-4 mb-3">
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset($post->image) }}" style="height:145px;object-fit: cover;"
                        alt="{{ $post->title }}"
                        onerror="this.src='https://via.placeholder.com/255x145?text={{ setting()->get('site_name', 'Image not Available') }}';">

                    <div class="overlay position-relative bg-lighter">
                        <div class="mb-2" style="font-size: 13px;">
                            <a href="{{ route('show', $post->category) }}"
                                class="text-primary">{{ $post->category->title }}</a>
                            <span class="px-1">/</span>
                            <span>
                                {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</span>
                        </div>
                        <a class="h4 m-0" href="{{ route('show', $post) }}" data-toggle="tooltip"
                            data-title="{{ $post->title }}">{{ Str::limit($post->title, 25) }}</a>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Post With Sidebar End -->
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

        .news-item-header .link-home {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 8px 25px 8px 35px;
            background: var(--body-bg-lighter);
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);

        }
    </style>

@endsection
