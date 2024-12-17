@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->title)
@section('keywords', $post->tags)

@section('content')
    <!-- Post With Sidebar Start -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Post Detail Start -->
            <div class="position-relative mb-3">
                <img class="img-fluid w-100" src="{{ asset($post->image) }}"
                    onerror="this.src='https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'Image not Available') }}';"
                    style="object-fit: cover;">
                <div class="mb-3 post-data">
                    <a class="category-title" href="{{ route('show', $post->category) }}">{{ $post->category->title }}</a>

                    <span>
                        {{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</span>


                    @if ($post->comments->count() > 0)
                        <span class="px-1">/</span>
                        <span class="">Comments:
                            {{ $post->comments->count() }}
                        </span>
                    @endif

                    <span class="px-1">/</span>
                    <span class="text-primary font-weight-bolder">Author:
                        {{ $post->user_name }}</span>
                </div>
                <div class="overlay position-relative bg-light">

                    <h3 class="mb-3">{{ $post->title }}</h3>
                    <div>
                        {!! $post->content !!}
                    </div>
                </div>
            </div>

            <!-- Post Detail End -->

            @if ($post->comments->count() > 0)
                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">{{ $post->comments->count() }} Comments</h3>

                    @foreach ($post->comments->where('parent_id', null) as $comment)
                        @include('main.blog.partials.comment', ['comment' => $comment])
                    @endforeach
                </div>
                <!-- Comment List End -->
            @endif

            @if ($post->allow_comments)
                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf

                        <div class="form-group nk-int-st">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control input-sm" id="name" required>
                        </div>
                        <div class="form-group nk-int-st">
                            <label for="email">Email *</label>
                            <input type="email" name="email" class="form-control input-sm" id="email" required>
                        </div>
                        <div class="form-group nk-int-st">
                            <label for="message">Message *</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control input-sm" required></textarea>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" value="Leave a comment"
                                class="btn btn-success notika-btn-success waves-effect">
                                Leave a comment </button>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->

            @endif





        </div>

        <div class="col-lg-4 pt-3 pt-lg-0">



            <!-- Related Category Post Start -->
            <div class="pb-3">

                <div
                    class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links">
                    <h3 class="m-0 title">More on {{ $post->category->title }}</h3>
                </div>
            </div>

            @foreach ($relatedCategoryPosts->take(3) as $related)
                <div class="d-flex mb-3">
                    <img src="{{ asset($related->image) }}"
                        onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                        style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                        <div class="mb-1" style="font-size: 13px;">
                            <a href="{{ route('show', $related->category) }}">{{ $related->category->title }}</a>
                            <span class="px-1">/</span>
                            <span>{{ \Carbon\Carbon::parse($related->created_at)->format('F d, Y') }}</span>
                        </div>
                        <a class="h5 m-0" href="{{ route('show', $related) }}" data-toggle="tooltip"
                            data-title="{{ $related->title }}">{{ Str::limit($related->title, 55) }}</a>
                    </div>
                </div>
            @endforeach

            <!-- Tags Start -->
            <div class="pb-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <div class="d-flex flex-wrap m-n1">
                        <h3 class="m-0 mr-4">Tags</h3>
                        @foreach (explode(',', $post->tags) as $tag)
                            <a href="javascript:;"
                                class="btn btn-sm btn-outline-secondary m-1">{{ ucfirst(trim($tag)) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Tags End -->
        </div>
        <!-- Related Category Post End -->


    </div>

    <!-- Post With Sidebar End -->
@endsection

@section('styles')
    <style>
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
