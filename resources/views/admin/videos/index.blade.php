@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Youtube Videos</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="article-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created date</th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td class="py-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($video->thumbnail) }}" alt="image">
                                                <div>
                                                    <div style="font-weight: 600; line-height: 1;">

                                                        {{ (new \App\Helpers\SiteHelper())->truncateText($video->title, 70) }}
                                                    </div>
                                                    <div
                                                        class="mt-2 d-flex align-items-center gap-1 font-weight-light small-text small mb-0 text-muted">

                                                        {{ (new \App\Helpers\SiteHelper())->truncateText($video->description, 70) }}

                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td> MolonyStreetRe </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($video->published_at)->format('F d, Y') }}
                                        </td>

                                        <td>
                                            <div class="mt-2 d-flex align-items-center gap-1">
                                                <a class="badge badge-primary" style="text-decoration: none"
                                                    href="{{ route('youtube.view', $video->id) }}" target="_blank">
                                                    Preview
                                                </a>
                                                <a class="badge badge-success" style="text-decoration: none"
                                                    href="{{ 'https://youtu.be/' . $video->id }}" target="_blank">
                                                    View on Youtube
                                                </a>
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
