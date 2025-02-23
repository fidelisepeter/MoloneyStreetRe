@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="mt-3">
            <h2>Create New Article</h2>
        </div>


        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" id="article-form">
            @csrf
            <div class="row justify-content-center mt-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">

                                <input type="text" class="form-control article-title" id="title" name="title"
                                    required placeholder="Enter Article Title">
                                <div class="mt-1 text-primary" style="cursor:not-allowed">
                                    <small class="site-url">
                                        {{ url('/news/') }}</small>/<small class="article-slug"></small>
                                </div>
                                <input type="hidden" class="article-slug">
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- <button type="button" class="btn btn-primary btn-block w-100 fw-bolder"
                                data-bs-toggle="dropdown" aria-expanded="true">Create Post</button> --}}

                            <div class="btn-group pb-2 pb-lg-0 w-100" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-primary w-100 fw-bolder" id="submit-article">Create
                                    Post</button>
                                <button type="button"
                                    class="btn btn-primary dropdown-toggle d-flex align-items-center justify-content-between"
                                    data-bs-toggle="dropdown"></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Save as Draft</a>
                                    <a class="dropdown-item">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="form-group mb-3">
                        {{-- <label for="content">Content</label> --}}

                        <textarea class="form-control" id="article-content" name="content" rows="5" required
                            placeholder="Start writing the post content"></textarea>
                    </div>
                    <div class="card  h-100">
                        <div class="card-body">


                            <div class="form-group">
                                <label for="tags">Tags (comma-separated)</label>
                                <input type="text" class="form-control" id="tags" name="tags">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card  h-100">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="type">Post Type</label>
                                <select class="form-control form-control-sm" id="type" name="type">
                                    <option value="text" selected>Text</option>
                                    <option value="video" disabled>Video</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control form-control-sm" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="classification_id">Classification</label>
                                <select class="form-control form-control-sm" id="classification_id"
                                    name="classification_id">
                                    <option value="">None</option>
                                    @foreach ($classifications as $classification)
                                        <option value="{{ $classification->id }}">{{ $classification->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <div id="imagePreviewContainer" style="margin-top: 10px; display: none;">
                                    <img id="imagePreview" src="" alt="Image Preview"
                                        style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="allow_comments">Allow Comments</label>
                                <select class="form-control form-control-sm" id="allow_comments" name="allow_comments">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>

                                </select>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}">
    <style>
        .tox-promotion {
            display: none;
        }

        .tox-tinymce {
            border: 2px solid #eee !important;
            border-radius: 0 !important;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('[data-toggle="tooltip"]').tooltip();

            $('.article-title').on('keyup', function() {
                const title = $(this).val();

                const slug = title
                    .trim() // Remove leading & trailing spaces
                    .toLowerCase() // Convert to lowercase
                    .normalize("NFD").replace(/[\u0300-\u036f]/g, "") // Remove accents
                    .replace(/[^a-z0-9\s-]/g, '') // Remove special characters except spaces & hyphens
                    .replace(/\s+/g, '-') // Replace spaces with hyphens
                    .replace(/-+/g, '-'); // Remove multiple consecutive hyphens

                $('.article-slug').text(slug);
            });




            initializeHTMLEditor('#article-content');

            function initializeHTMLEditor(selector) {
                tinymce.remove(selector);
                tinymce.init({
                    selector: selector,
                    height: 500, // Adjust height for a better experience
                    // menubar: false, // Enable the menu bar
                    menubar: 'edit  insert format tools table help', // Customize menu order
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table paste code help wordcount",
                        "emoticons hr directionality"
                    ],
                    toolbar: `
                        undo redo | formatselect | fontsizeselect | bold italic underline strikethrough | 
                        forecolor backcolor | alignleft aligncenter alignright alignjustify | 
                        bullist numlist outdent indent | blockquote hr | link image media | 
                        table emoticons | fullscreen code
                    `,
                    fontsize_formats: "10pt 12pt 14pt 16pt 18pt 24pt 36pt",
                    content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }",
                    branding: false, // Remove TinyMCE branding
                    image_advtab: true, // Enable image advanced settings
                    file_picker_types: 'image', // Restrict file picker to images
                    automatic_uploads: true, // Allow automatic image uploads
                    relative_urls: false,
                    remove_script_host: false,
                    convert_urls: true,
                    media_live_embeds: true, // Enable live embedding of media
                    paste_data_images: true, // Allow pasting images directly
                    help_tabs: ['shortcuts', 'keyboardnav'], // Show help tabs
                    fullscreen_native: true, // Native fullscreen mode
                    language: "en", // Set language
                });
            }

            $('#submit-article').on('click', function(e) {
                e.preventDefault();

                tinymce.triggerSave();
                $('#article-form').submit();
            })

            document.getElementById("image").addEventListener("change", function(event) {
                const file = event.target.files[0]; // Get the selected file
                if (file) {
                    const validTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
                    if (!validTypes.includes(file.type)) {
                        alert("Only image files (JPG, PNG, GIF, WebP) are allowed.");
                        event.target.value = ""; // Clear the invalid file
                        document.getElementById("imagePreviewContainer").style.display = "none";
                        return;
                    }

                    // Show image preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("imagePreview").src = e.target.result;
                        document.getElementById("imagePreviewContainer").style.display = "block";
                    };
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById("imagePreviewContainer").style.display = "none";
                }
            });


        });
    </script>
@endsection
