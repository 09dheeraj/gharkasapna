@extends('gharkasapna.layouts.innerpages_app')
@section('content')

<style>
    img#imagePreview {
        height: 156px;
        width: 399px;
        margin-left: 100px;
        margin-top: 18px;
    }

    img#imagePreviewotherimage {
        height: 156px;
        width: 399px;
        margin-left: 100px;
        margin-top: 18px;
    }
</style>
<div class="row align-items-center pb40">

    <div class="col-lg-12">
        <div class="dashboard_title_area">
            <h2>{{ucwords($pagetitle)}}</h2>
        </div>
    </div>
</div>

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif


<form action="{{route('add.blog')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card" style="border-radius: 15px;">
        <div class="card-body">
            <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Blog Name</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input type="text" id="blog-name" name="blog_name" class="form-control form-control-lg w-100" placeholder="Blog Name" required>
                    <div id="blog-alertmesg" class="text-danger"></div>
                </div>
            </div>
            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Meta Title</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input type="text" name="meta_title" class="form-control form-control-lg w-100" value="" placeholder="Meta Title" required>
                </div>
            </div>


            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Meta Description</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control" rows="3" name="meta_description" id="meta_description" value="" placeholder="Meta Description" required></textarea>
                </div>
            </div>

            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Meta Keywords</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input type="text" id="meta_keywords" name="meta_keywords" class="form-control form-control-lg w-100" value="" placeholder="Meta Keywords" required>
                </div>
            </div>

            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Blog Description</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control form-control-lg w-100" cols="30" rows="3" id="blog_description" name="blog_description" value="" placeholder="Blog Description" required></textarea>
                </div>
            </div>

            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Image</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input class="form-control form-control-lg" id="blog-image" name="blog_image" type="file" required>
                    <img id="imagePreview" class="mr10 d-none">
                    <a href="" id="deleteImage" class="tag-del" style="display: none;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete Image" aria-label="Delete Item"><span class="fas fa-trash-can"></span></a>
                </div>
            </div>






            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Other Image</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input class="form-control form-control-lg" id="other-image" name="other_image" type="file">
                    <img id="imagePreviewotherimage" class="mr10 d-none">
                    <a href="" id="deleteImage_other" class="tag-del" data-bs-toggle="tooltip" data-bs-placement="top" style="display: none;" title="" data-bs-original-title="Delete Image" aria-label="Delete Item"><span class="fas fa-trash-can"></span></a>
                </div>
            </div>
            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Short Description</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <textarea class="form-control form-control-lg w-100" cols="30" rows="3" id="short_description" name="short_description" placeholder="There are many variations of passages." required></textarea>
                </div>
            </div>

            <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Add Tick Description</h6>
                </div>
                <div class="col-md-9 pe-5">
                    <input class="form-control form-control-lg w-100" cols="30" rows="3" id="add_tick_description" name="add_tick_description" placeholder="Add Tick Description" required>
                </div>
            </div>

            <div class="row align-items-center py-3" id="rows-container">
                <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Add Tick Label</h6>
                </div>
                <div class="col-md-6 pe-3">
                </div>
                <div class="col-md-3 pe-5">
                    <a class="ud-btn btn-dark btn-block custom-add-btn w-100" data-bs-toggle="modal" data-bs-target="#addticklabel" id="add-tick">Add Tick </a>
                </div>
            </div>
            <div class="row align-items-center py-3">
                <div class="row align-items-center py-3">
                    <div class="col-md-3 ps-5">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="col-md-6 pe-3">
                        <select name="categories" id="categories" class="form-control w-100">
                            @foreach($categoryData as $cat)
                            <option value="{{$cat->id}}">{{ucwords($cat->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 pe-5">
                        <a class="ud-btn btn-dark btn-block custom-add-btn w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" id="no-buttoncategory">Add Category</a>
                    </div>
                    <span id="category-succmesg" class="text-success"></span>
                </div>

                <div class="px-5 py-4">
                    <button type="submit" id="create-blog" class="ud-btn btn-thm">Add Blog</button>
                </div>
            </div>
        </div>
</form>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">Add Category</h4>
            </div>
            <div class="modal-body">
                <label for="category-name"><b>Category</b></label>
                <input type="text" id="category-name" placeholder="Enter category" class="form-control">
                <span id="category-error" class="text-danger"></span>
            </div>
            <div class="modal-footer">
                <a class="ud-btn btn-thm" data-bs-dismiss="modal">No</a>
                <a id="create-category" class="ud-btn btn-thm">Add</a>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="addticklabel" tabindex="-1" aria-labelledby="addticklabelLabeltoy" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center" id="addticklabelLabeltoy">Add Tick</h4>
            </div>
            <div class="modal-body">
                <label for="tick-name"><b> Tick Name</b></label>
                <input type="text" id="tick-name" placeholder="Enter  Tick Name" class="form-control">
                <span id="tick-error" class="text-danger"></span>
            </div>
            <div class="modal-footer add-tick-name">
                <a class="ud-btn btn-thm" data-bs-dismiss="modal">No</a>
                <a id="create-tick" class="ud-btn btn-thm">Add</a>
            </div>

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#create-tick').click(function() {
            var tickLabel = $('#tick-name').val().trim();

            if (tickLabel === '') {
                $('#tick-error').text('Please enter a tick!');
                return;
            }

            var newRow =
                '<div class="row">' +
                '<div class="col-md-3 pe-5">' +
                '<input type="text" class="form-control" name="tick_label[]" placeholder="Enter value" value="' + tickLabel + '" readonly style="margin-left: 203px;">' +
                '</div>' +
                '<div class="col-md-3 pe-5">' +
                '<a class="btn btn-danger cancel-button"><i class="fas fa-times"></i></a>' +
                '</div>' +
                '</div>';
            $('#rows-container').append(newRow);
            $('#tick-name').val('');

            $('#addticklabel').modal('hide');
        });

        $('#tick-name').on('input', function() {
            var tickLabel = $(this).val().trim();
            if (tickLabel === '') {
                $('.add-tick-name').addClass('d-none');
            } else {
                $('.add-tick-name').removeClass('d-none');
                $('#tick-error').text('');
            }
        });


        $(document).on('click', '.cancel-button', function() {
            $(this).closest('.row').remove();
        });

        $('#add-tick').click(function() {
            $('#tick-name').val('');
            $('#tick-error').text('');
        });


    });
</script>

<script>
    $(document).ready(function() {
        function handleImage(input, previewId, deleteBtnId) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(previewId).attr('src', e.target.result).removeClass('d-none');
                $(deleteBtnId).show();
            }

            reader.readAsDataURL(input.files[0]);
        }

        $('#blog-image').change(function() {
            handleImage(this, '#imagePreview', '#deleteImage');
        });

        $('#deleteImage').click(function(e) {
            e.preventDefault();
            $('#blog-image').val('');
            $('#imagePreview').addClass('d-none').attr('src', '');
            $(this).hide();
        });

        $('#other-image').change(function() {
            handleImage(this, '#imagePreviewotherimage', '#deleteImage_other');
        });

        $('#deleteImage_other').click(function(e) {
            e.preventDefault();
            $('#other-image').val('');
            $('#imagePreviewotherimage').addClass('d-none').attr('src', '');
            $(this).hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#create-category').click(function() {
            var category = $('#category-name').val();

            if (!category.trim()) {
                $('#category-error').text('Please enter a category name.');
                return;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('add.blog.category') }}",
                data: {
                    category: category,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response.message == 'Category added successfully') {
                        $('#categories').append($('<option>', {
                            value: response.category.id,
                            text: response.category.name
                        }));

                        $('#category-succmesg').text('Category added successfully');

                        setTimeout(function() {
                            $('#category-succmesg').text('');
                        }, 3000);
                        $('#exampleModal').modal('hide');
                    }
                },
                error: function(xhr, errors, status) {

                    console.error('Error:', xhr.status);
                }
            });
        });

        $('#category-name').on('input', function() {
            var categoryName = $(this).val().trim();
            if (categoryName === '') {

            } else {
                $('#category-error').text('');
            }
        });

        $('#no-buttoncategory').click(function() {
            $('#category-name').val('');
            $('#category-error').text('');
        });


    });
</script>

<script>
    $(document).ready(function() {
    function removeAlerts() {
        $('.alert').delay(3000).fadeOut('slow', function() {
            $(this).remove();
        });
    }
    removeAlerts();
});
</script>

@endsection
