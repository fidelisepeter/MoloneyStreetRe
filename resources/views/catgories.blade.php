@extends('layouts.app')

@section('title', 'Category')

@section('content')
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

@endsection
