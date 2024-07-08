@extends('layouts.home')
@section('title', $post->title)
@section('description', $post->title)
@section('keywords', $post->tags)

@section('content')
    <!-- Post With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset($post->image) }}"
                            onerror="this.src='https://via.placeholder.com/700x435?text={{ setting()->get('site_name', 'Image not Available') }}';"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="{{ route('show', $post->category) }}">{{ $post->category->title }}</a>
                                <span class="px-1">/</span>
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
                                @include('partials.comment', ['comment' => $comment])
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
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->

                    @endif





                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">



                    <!-- Related Post Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">More</h3>
                        </div>

                        @foreach ($relatedPosts->take(3) as $related)
                            <div class="d-flex mb-3">
                                <img src="{{ asset($related->image) }}"
                                    onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                    style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a
                                            href="{{ route('show', $related->category) }}">{{ $related->category->title }}</a>
                                        <span class="px-1">/</span>
                                        <span>
                                            {{ \Carbon\Carbon::parse($related->created_at)->format('F d, Y') }}</span>
                                    </div>
                                    <a class="h6 m-0" href="{{ route('show', $related) }}" data-toggle="tooltip"
                                        data-title="{{ $related->title }}">{{ Str::limit($related->title, 25) }}</a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- Related Post End -->

                    <!-- Related Category Post Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">More on {{ $post->category->title }}</h3>
                        </div>

                        @foreach ($relatedCategoryPosts->take(3) as $related)
                            <div class="d-flex mb-3">
                                <img src="{{ asset($related->image) }}"
                                    onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                    style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a
                                            href="{{ route('show', $related->category) }}">{{ $related->category->title }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ \Carbon\Carbon::parse($related->created_at)->format('F d, Y') }}</span>
                                    </div>
                                    <a class="h6 m-0" href="{{ route('show', $related) }}" data-toggle="tooltip"
                                        data-title="{{ $related->title }}">{{ Str::limit($related->title, 25) }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Related Category Post End -->
                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach (explode(',', $post->tags) as $tag)
                                <a href="javascript:;"
                                    class="btn btn-sm btn-outline-secondary m-1">{{ ucfirst(trim($tag)) }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tags End -->

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Post With Sidebar End -->
@endsection
