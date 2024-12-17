@extends('layouts.app')
@section('title', $page_title ?? 'Youtube Videos')
@section('content')
    <!-- Post With Sidebar Start -->
    <div class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links bg-light">
        <h2 class="m-0 title">{{ $page_title ?? 'Youtube Videos' }}</h2>
        <a class="link-home  font-weight-medium text-decoration-none" href="{{ route('home.index') }}">Go Back
            Home</a>
    </div>

    <div class="row mb-3">
        @forelse ($videos as $video)
            <div class="col-sm-6 col-lg-4 mb-3">
                <div class="position-relative overflow-hidden youtube-video-item" style="height: 200px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset($video->thumbnail) }}" style="object-fit: cover;">
                    <div class="overlay p-0">
                        <div
                            class="position-absolute top-0 left-0 w-100 h-100 d-flex align-items-center justify-content-center play-icon">
                            <a class="" href="{{ route('youtube.view', $video->id) }}">
                                <i class="fa fa-youtube-play text-white" style="font-size: 40px;"></i>
                            </a>
                        </div>
                        <div class="mb-1 text-truncate"
                            style="background-color: #327e34;clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);padding: 3px 22px 3px 12px;font-size: 13px; color: var(--color-white);">



                            {{ \Carbon\Carbon::parse($video->published_at)->format('F d, Y') }}
                        </div>
                        <a class="h4 m-0 p-3 video-title " href="{{ route('youtube.view', $video->id) }}"
                            data-toggle="tooltip" data-title="{{ $video->title }}">{{ Str::limit($video->title, 75) }}</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center">
                    <h2 class="opacity-5 m-5">
                        No videos available
                    </h2>
                </div>
            </div>
        @endforelse
    </div>
    <!-- Pagination Links -->
    <div class="row">
        <div class="col-12">
            {{ $videos->links('pagination::default') }}
        </div>
    </div>
@endsection
@section('styles')
    {{-- <style>
        .youtube-video-item {
            transition: all 0.3s ease-in-out;
            border-radius: 5px;
            overflow: hidden;
        }

        .youtube-video-item .overlay {

            transition: all 0.3s ease-in-out;
        }

        .youtube-video-item .overlay .play-icon {

            transition: all 0.3s ease-in-out;
        }

        .youtube-video-item:hover .overlay .play-icon {
            transform: scale(1.2);
        }

        .youtube-video-item .video-title {
            color: var(--color-white)
        }
    </style> --}}
    <style>
        .news-item-header {
            background: var(--body-bg-bodyer);
        }

        .news-item-header .title {
            color: var(--color-white);
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

        /* General Styling */
        .youtube-video-item {
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .youtube-video-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .youtube-video-item img {
            height: 200px;
            object-fit: cover;
        }

        .youtube-video-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            /* opacity: 0; */
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding: 15px;
            transition: opacity 0.3s ease-in-out;
        }

        .youtube-video-item:hover .overlay {
            opacity: 1;
        }

        .youtube-video-item .play-icon {
            font-size: 50px;
            color: var(--color-white);
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .youtube-video-item:hover .play-icon {
            transform: scale(1.2);
        }

        .youtube-video-item .video-meta {
            margin-bottom: 10px;
        }

        .youtube-video-item .video-title {
            color: var(--color-white);
            font-weight: bold;
            display: block;
            text-decoration: none;
        }

        .youtube-video-item .video-title:hover {
            /* color: #00ff99; */
            text-decoration: underline;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .youtube-video-item img {
                height: auto;
            }
        }
    </style>
@endsection
