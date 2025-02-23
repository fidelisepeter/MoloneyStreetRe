@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title">Manage category</h4>
                    <p class="card-description">
                        Create an update categories for articles
                    </p>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Create A
                    Category</button>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="category-table">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Total categorys
                                    </th>

                                    <th>
                                        Created at
                                    </th>
                                    <th>

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr data-category-id="{{ $category->id }}" data-category-image="{{ $category->image }}"
                                        data-category-title="{{ $category->title }}">
                                        <td class="py-1">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($category->image) }}" alt="image">
                                                <div>
                                                    <div style="font-weight: 600; line-height: 1;">

                                                        {{ $category->title }}
                                                    </div>

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $category->posts->count() }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($category->created_at)->format('F d, Y') }}
                                        </td>

                                        <td>

                                            <div class="mt-2 d-flex align-items-center gap-1">

                                                <span class="badge badge-success edit-category"
                                                    style="text-decoration: none">

                                                    Edit
                                                </span>

                                                <a class="badge badge-danger" style="text-decoration: none"
                                                    href="{{ route('admin.blog.delete', $category->id) }}">
                                                    {{-- <i class="mdi mdi-trash-can"></i>  --}}
                                                    Delete
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
    <!-- Create Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create a Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createCategoryForm" method="POST" action="{{ route('admin.blog.categories.create') }}"
                        enctype="multipart/form-data">
                        @csrf



                        <!-- Image Preview -->
                        <div class="mb-3 text-center">
                            <img id="imagePreview" src="" alt="Image Preview" class="img-fluid rounded imagePreview"
                                style="max-width: 100px;">
                        </div>

                        <!-- Image Input -->
                        <div class="mb-3">
                            <label for="categoryImage" class="form-label">Category Image</label>
                            <input type="file" class="form-control categoryImage" id="categoryImage" name="image"
                                accept="image/*">
                        </div>

                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="categoryTitle" class="form-label">Category Title</label>
                            <input type="text" class="form-control" id="categoryTitle" name="title">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="categoryId" name="category_id">

                        <!-- Image Preview -->
                        <div class="mb-3 text-center">
                            <img id="imagePreview" src="" alt="Image Preview" class="img-fluid rounded imagePreview"
                                style="max-width: 100px;">
                        </div>

                        <!-- Image Input -->
                        <div class="mb-3 categoryImageContainer">
                            <label for="categoryImage" class="form-label">Category Image</label>
                            <input type="file" class="form-control categoryImage" id="categoryImage" name="image"
                                accept="image/*">
                        </div>

                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="categoryTitle" class="form-label">Category Title</label>
                            <input type="text" class="form-control" id="categoryTitle" name="title">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    </form>
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
            // var categoryTable = $('#category-tablell').DataTable({
            //     pageLength: 10, // Default rows per page
            //     lengthMenu: [
            //         [10, 25, 50, 100],
            //         [10, 25, 50, 100]
            //     ], // Page length options
            //     ordering: true, // Enable sorting
            //     searching: true, // Enable search box
            //     paging: true, // Enable pagination
            //     info: true, // Show table information
            //     responsive: true, // Make table responsive
            // });

            new simpleDatatables.DataTable("#category-table", {
                searchable: true,
                fixedHeight: true
            });

            $('.edit-category').click(function() {
                var row = $(this).closest('tr'); // Get the closest row

                // Fetch data from data attributes
                var categoryId = row.data('category-id');
                var categoryImage = row.data('category-image');
                var categoryTitle = row.data('category-title');

                var $model = $('#editCategoryModal');

                $model.modal('show');

                // Populate modal fields
                $model.find('#categoryId').val(categoryId);
                $model.find('#categoryTitle').val(categoryTitle);
                $model.find('#imagePreview').attr('src', categoryImage);


                $('#editCategoryForm').attr('action', '/admin/blogs/categories/' + categoryId);

                // Image Preview on File Change

            });

            // $('.categoryImage').change(function(event) {
            //     var imagePreview = $(this).closest('.categoryImageContainer').find(
            //         '#imagePreview');
            //     var reader = new FileReader();
            //     reader.onload = function(e) {
            //         imagePreview.attr('src', e.target.result);
            //     };
            //     reader.readAsDataURL(event.target.files[0]);
            // });

            $(document).on('change', '.categoryImage', function(event) {


                var reader = new FileReader();
                var $modal = $(this).closest('.modal'); // Get the closest modal
                var $imagePreview = $modal.find('#imagePreview'); // Find image preview inside the modal
                // alert(e.target.result);
                reader.onload = function(e) {

                    $imagePreview.attr('src', e.target.result);
                };

                console.log($imagePreview);
                reader.readAsDataURL(event.target.files[0]);
            });

        });
    </script>
@endsection
