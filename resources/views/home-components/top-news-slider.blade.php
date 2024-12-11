<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            @foreach ($breakingNews as $breaking)
                <div class="d-flex">
                    <img src="{{ asset($breaking->image) }}"
                        onerror="this.src='https://via.placeholder.com/100x100?text={{ setting()->get('site_name', 'Image not Available') }}';"
                        style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold"
                            href="{{ route('show', $breaking) }}">{{ $breaking->title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
