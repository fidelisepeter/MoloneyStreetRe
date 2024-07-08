<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
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
            <div class="col-lg-4">
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
