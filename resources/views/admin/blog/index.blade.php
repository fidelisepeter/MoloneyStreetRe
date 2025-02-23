@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Article</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="article-table">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Comments
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td class="py-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($article->image) }}" alt="image">
                                                <div>
                                                    <div style="font-weight: 600; line-height: 1;">

                                                        {{ (new \App\Helpers\SiteHelper())->truncateText($article->title, 70) }}
                                                    </div>
                                                    <div
                                                        class="mt-2 d-flex align-items-center gap-1 font-weight-light small-text small mb-0 text-muted">

                                                        {{ (new \App\Helpers\SiteHelper())->truncateText($article->content, 70) }}

                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            {{ $article->user ? $article->user->first_name . ' ' . $article->user->last_name : $article->user_name }}
                                            <div
                                                class="mt-2 d-flex align-items-center gap-1 font-weight-light small-text small mb-0 text-muted">

                                                @if ($article->created_at != $article->updated_at)
                                                    edited on
                                                    {{ \Carbon\Carbon::parse($article->updated_at)->format('F d, Y') }}
                                                @else
                                                    created on
                                                    {{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}
                                                @endif

                                            </div>

                                        </td>
                                        <td>
                                            {{ $article->category ? $article->category->title : 'unknown' }}
                                        </td>
                                        <td>

                                            @if ($article->allow_comments && $article->comments)
                                                @if ($article->comments->count() > 0)
                                                    {{ $article->comments->count() }}
                                                @else
                                                    No comments
                                                @endif
                                            @else
                                                Disabled
                                            @endif

                                        </td>
                                        <td>
                                            {{-- {{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }} --}}
                                            <div class="mt-2 d-flex align-items-center gap-1">
                                                <a class="badge badge-primary" style="text-decoration: none"
                                                    href="{{ route('show', $article) }}" target="_blank">
                                                    {{-- <i class="mdi mdi-eye"></i> --}}
                                                    Preview
                                                </a>
                                                <a class="badge badge-success" style="text-decoration: none"
                                                    href="{{ route('admin.blog.edit', $article->id) }}">
                                                    {{-- <i class="mdi mdi-tooltip-edit"></i> --}}
                                                    Edit
                                                </a>

                                                <a class="badge badge-danger" style="text-decoration: none"
                                                    href="{{ route('admin.blog.delete', $article->id) }}">
                                                    {{-- <i class="mdi mdi-trash-can"></i>  --}}
                                                    Delete
                                                    Article</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            var articleTable = $('#article-tablell').DataTable({
                pageLength: 10, // Default rows per page
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ], // Page length options
                ordering: true, // Enable sorting
                searching: true, // Enable search box
                paging: true, // Enable pagination
                info: true, // Show table information
                responsive: true, // Make table responsive
            });

            new simpleDatatables.DataTable("#article-table", {
                searchable: true,
                fixedHeight: true
            });
        });
    </script>
@endsection
