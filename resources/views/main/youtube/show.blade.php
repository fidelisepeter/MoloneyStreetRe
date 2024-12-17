@extends('layouts.app')
@section('title', $video->title)
@section('description', $video->description)
@section('keywords', implode(',', $video->tags))

@section('content')
    <!-- Video Details Start -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Video Player Start -->
            <div class="position-relative mb-3">
                <iframe class="w-100" height="400" src="https://www.youtube.com/embed/{{ $video->video_id }}"
                    title="{{ $video->title }}" frameborder="0" allowfullscreen>
                </iframe>
                <div class="mb-3 post-data">
                    <a class="category-title" href="{{ $video->channel_url }}">Channel: {{ $video->channel }}</a>

                    <span>
                        {{ \Carbon\Carbon::parse($video->published_at)->format('F d, Y') }}</span>


                    @if ($video->comments_enabled && !empty($video->comments) && count($video->comments) > 0)
                        <span class="px-1">/</span>
                        <span class="">Comments:
                            {{ count($video->comments) }}
                        </span>
                    @endif

                    <span class="px-1">/</span>

                    <span class="text-primary font-weight-bolder">Views:
                        {{ number_format($video->views) }}</span>
                </div>

                <div class="overlay position-relative bg-light">

                    <h3 class="mb-3">{{ $video->title }}</h3>
                    <div>
                        {!! $video->description !!}
                    </div>
                </div>

            </div>
            <!-- Video Player End -->

            <!-- Comment Section Start -->


            <!-- Comments Section Start -->
            @if ($video->comments_enabled)
                @if (!empty($video->comments) && count($video->comments) > 0)
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">{{ count($video->comments) }} Comments</h3>

                        @foreach ($video->comments as $comment)
                            <div class="media mb-4">
                                <img src="{{ $comment->author_image }}" alt="{{ $comment->author }}"
                                    class="img-fluid mr-3 mt-1" style="width: 45px; height: 45px">
                                <div class="media-body">
                                    <h5><a href="{{ $comment->author_url }}"
                                            class="font-weight-bolder">{{ $comment->author }}</a>
                                        <small>{{ \Carbon\Carbon::parse($comment->published_at)->diffForHumans() }}</small>
                                    </h5>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No comments available for this video.</p>
                @endif
            @else
                <p>Comments are disabled for this video.</p>
            @endif
            <!-- Comments Section End -->
            <!-- Comment Section End -->
        </div>

        <div class="col-lg-4 pt-3 pt-lg-0">
            <!-- Related Videos Start -->

            <div class="pb-3">

                <div
                    class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
                    <h3 class="m-0 title">Related Videos </h3>
                </div>
            </div>

            @foreach ($relatedVideos as $related)
                <div class="d-flex mb-3">
                    <img src="{{ asset($related->thumbnail) }}" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href="{{ $related->channel_url }}">{{ $related->channel }}</a>
                            <span class="px-1">/</span>
                            <span>{{ \Carbon\Carbon::parse($related->published_at)->format('F d, Y') }}</span>
                        </div>
                        <a class="h5 m-0" href="{{ route('youtube.view', $related->id) }}" data-toggle="tooltip"
                            data-title="{{ $related->title }}">{{ Str::limit($related->title, 55) }}</a>
                    </div>
                </div>
            @endforeach

            <!-- Related Videos End -->
            <!-- Tags Start -->
            <div class="pb-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <div class="d-flex flex-wrap m-n1">
                        <h3 class="m-0 mr-4">Tags</h3>
                        @foreach ($video->tags as $tag)
                            <a href="javascript:;"
                                class="btn btn-sm btn-outline-secondary m-1">{{ ucfirst(trim($tag)) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Tags End -->
        </div>


    </div>
    <!-- Video Details End -->
@endsection

@section('styles')
    <style>
        .video-data span {
            font-size: 14px;
            color: #555;
        }

        .video-data span a {
            color: #007bff;
            text-decoration: none;
        }

        .video-data span a:hover {
            text-decoration: underline;
        }

        .overlay {
            background: #f8f9fa;
        }

        .post-data,
        .news-item-header {
            background: var(--body-bg-bodyer);
        }

        .post-data {
            background: var(--body-bg-light);
            padding: 10px 60px 10px 0px;
        }

        .post-data .category-title,
        .news-item-header .title {
            color: #fff;
            background: var(--color-primary);
            padding: 10px 60px 10px 20px;
            text-decoration: none;
            font-size: 1.5rem;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
        }

        .post-data .link-home {
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
