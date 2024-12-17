@section('styles')
    @parent <!-- Keep the parent styles -->
    <style>
        .pagination-wrapper {
            padding: 1.5rem;
            padding-top: 0;
        }

        .pagination-wrapper .pagination-info {
            color: var(--text-color);
            /* font-size: 0.875rem; */
        }

        .pagination-content ul {
            margin: 0;
            padding-left: 0;
        }

        .pagination-content li {
            list-style: none;
            float: left;
        }

        .pagination-list li a {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            padding: 0;
            margin: 0 3px;
            border: 1px solid #dee2e6;
            border-radius: 50% !important;
            width: 36px;
            height: 36px;
            /* font-size: 0.875rem; */
            margin-left: 0;
        }

        .pagination-list .pager {
            margin: 0;
        }

        .pagination-content .pager a {
            font-weight: bold;
        }

        .pagination-content a {
            border: 1px solid transparent;
            float: left;
            margin-left: 2px;
            padding: 6px 12px;
            position: relative;
            text-decoration: none;
            color: var(--text-color);
        }

        .pagination-list .active a {
            background: transparent;
            background: var(--color-primary) !important;
            /* box-shadow: 0 3px 5px -1px rgba(0, 0, 0, 0.09), 0 2px 3px -1px rgba(0, 0, 0, 0.07); */
            color: var(--color-white);
            border: none;
            border-radius: 50% !important;
        }


        .pagination-content .active a,
        .pagination-content .active a:focus,
        .pagination-content .active a:hover {
            background-color: #d9d9d9;
            cursor: default;
        }
    </style>
@endsection

@if ($paginator->hasPages())
    <div class="pagination-wrapper d-flex justify-content-between align-items-center">
        <div class="pagination-info">
            <span class="d-none d-md-inline">Showing</span> {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
            of {{ $paginator->total() }} <span class="d-none d-md-inline">entries</span>
        </div>
        <nav class="pagination-content">
            <ul class="pagination-list">
                @if ($paginator->onFirstPage())
                    <li class="pager disabled"><a href="javascript:;">‹</a></li>
                @else
                    <li class="pager"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a></li>
                @endif

                {{-- Loop through each page link --}}
                @foreach ($elements as $element)
                    {{-- If the element is a string, display it --}}
                    @if (is_string($element))
                        <li class="disabled d-none d-lg-block"><a href="javascript:;">{{ $element }}</a></li>
                    @endif

                    {{-- If the element is an array, loop through each page --}}
                    @if (is_array($element))
                        {{-- Display up to 5 pages --}}
                        @foreach ($element as $page => $url)
                            {{-- @if ($paginator->lastPage() <= 3 || $page <= 2 || $page >= $paginator->lastPage() - 1 || $page == $paginator->currentPage())
                                <li @if ($page == $paginator->currentPage()) class="active" @endif><a
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif --}}
                            @if (
                                $paginator->lastPage() <= 3 ||
                                    $page == 1 ||
                                    $page == $paginator->lastPage() ||
                                    $page == $paginator->currentPage() - 1 ||
                                    $page == $paginator->currentPage() + 1 ||
                                    $page == $paginator->currentPage())
                                <li
                                    @if ($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1) class="d-none d-md-block"
                                    @elseif ($page == $paginator->currentPage()) 
                                    class="active" @endif>
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="pager"><a href="{{ $paginator->nextPageUrl() }}" rel="next">›</a></li>
                @else
                    <li class="pager disabled"><a href="javascript:;">›</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
