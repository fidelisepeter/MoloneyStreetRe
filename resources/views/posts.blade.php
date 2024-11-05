@extends('layouts.app')
@section('title', $title)

@section('content')
    <!-- Post With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 z-index-over-social-links">
                <h2 class="m-0">{{ $title }}</h2>
                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ route('home.index') }}">Go Back
                    Home</a>
            </div>
            <div class="row mb-3">
                @foreach ($posts as $post)
                    <div class="col-sm-6 col-lg-4">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset($post->image) }}"
                                style="height:145px;object-fit: cover;" alt="{{ $post->title }}"
                                onerror="this.src='https://via.placeholder.com/255x145?text={{ setting()->get('site_name', 'Image not Available') }}';">

                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
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
        </div>
    </div>
    </div>
    <!-- Post With Sidebar End -->
@endsection
