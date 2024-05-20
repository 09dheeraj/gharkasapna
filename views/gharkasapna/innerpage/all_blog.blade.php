@extends('gharkasapna.layouts.innerpages_app')
@section('content')

<div class="row align-items-center pb40">
    <div class="col-xxl-3">
        <div class="dashboard_title_area">
            <h2>{{$pagetitle}}</h2>
            <p class="text">We are glad to see you again!</p>
        </div>
        <span class="alert-success" id="status-success"></span>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-xxl-9">
        <div class="dashboard_search_meta d-md-flex align-items-center justify-content-xxl-end">
            <div class="item1 mb15-sm">
                <div class="search_area">
                    <input type="text" id="searchInput" class="form-control bdrs12" placeholder="Search">
                    <label><span class="flaticon-search"></span></label>
                </div>
            </div>

            <a href="{{route('manage.add.blog')}}" class="ud-btn btn-thm">Add Blogs<i class="fal fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="packages_table table-responsive">
                <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                        <tr>
                            <th scope="col">Listing title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="t-body" id="blogTableBody">
                        @foreach($blogData as $data)
                        <tr>
                            <th scope="row">
                                <div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0">
                                    <div class="list-thumb">
                                        <img class="w-100" src="{{ asset('uploads/images/'.$data->images) }}" alt="">
                                    </div>
                                    <div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4">
                                        <div class="h6 list-title"><a href="{{route('blog.detail', ['name' => Str::slug($data->blog_name)])}}">{{ucwords($data->blog_name)}}</a></div>
                                        <p class="list-text mb-0">{{ucwords($data->author_name)}}</p>
                                    </div>
                                </div>
                            </th>
                            <td class="vam">{{ ucwords(implode(' ', array_slice(str_word_count($data->blog_description, 1), 0, 20))) }} ...</td>

                            <?php $count = '';
                            if ($data->status == 'Pending') {
                                $count = '1';
                            } elseif ($data->status == 'Published') {
                                $count = '2';
                            } elseif ($data->status == 'Processing') {
                                $count = '3';
                            } ?>


                            <td class="vam"><span class="pending-style style{{$count}}">{{ucwords($data->status)}}</span></td>

                            <td class="vam">{{ucwords($data->category_name->name)}}</td>
                            <td class="vam">
                                <div class="d-flex">
                                    <a class="icon" data-bs-toggle="modal" data-bs-toggle="top" data-bs-placement="top" title="Manage Status" data-bs-target="#statusModal" data-id="{{$data->id}}"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('manage.update.blog', ['name' => Str::slug($data->blog_name)])}}" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a>
                                    <a class="icon delete-blog" data-bs-toggle="modal" data-bs-target="#deleteBlogModal" data-id="{{$data->id}}" data-name="{{$data->blog_name}}" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mbp_pagination text-center mt30">
                    {{ $blogData->links() }}

                    <!-- Display page count information -->
                    <p class="mt10 pagination_page_count text-center">
                        {{ $blogData->firstItem() }} – {{ $blogData->lastItem() }} of {{ $blogData->total() }}+ Blogs available
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog centered">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <label class="text-color-black fw600 mb10">Mange Status</label>
                    <div class="location-area">
                        <select id="statusSelect" class="selectpicker" name="mange_status" required>
                            <option selected disabled>Select an option</option>
                            <option value="Pending">Pending</option>
                            <option value="Published">Published</option>
                            <option value="Processing">Processing</option>>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="ud-btn btn-dark btn-block custom-add-btn w-100" id="submitstatus">submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteBlogModal" tabindex="-1" aria-labelledby="deleteBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="deleteModalLabel">Delete Blog</h4>
                <p class="mb-4">Are you sure you want to delete <span id="blogNameToDelete"></span>?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="ud-btn btn btn-danger confirm-delete" style="color:#fff">Delete</button>
            </div>
        </div>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('.delete-blog').click(function() {
            var blogId = $(this).data('id');
            var blogName = $(this).data('name');
            $('#blogNameToDelete').text(blogName);
            $('#deleteBlogModal').find('.confirm-delete').attr('data-blog-id', blogId);
        });

        $('.confirm-delete').click(function() {
            var blogId = $(this).attr('data-blog-id');

            $.ajax({
                url: "{{route('delete.blog')}}",
                method: "POST",
                data: {
                    blogId: blogId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        $('#status-success').text('Blog deleted successfully!');
                        $('#deleteBlogModal').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        console.error('Error:', response.error);
                    }
                },

                error: function(xhr, status, error) {
                    console.error('Error:', error);
                },

            });

        });
    });
</script>


<script>
    $(document).ready(function() {

        $('#statusModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const blogId = button.data('id');
            $(this).find('#submitstatus').data('blogId', blogId);
        });
        $('#submitstatus').on('click', function(e) {
            e.preventDefault();

            const blogId = $(this).data('blogId');
            const selectedValue = $('#statusSelect').val();
            $.ajax({
                url: "{{ route('manage.blog.status') }}",
                method: 'POST',
                data: {
                    blogId: blogId,
                    selectedValue: selectedValue,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    console.log(response);
                    if (response.message === 'Blog staus updated successfully') {
                        $('#status-success').text('staus updated successfully !');
                        $('#statusModal').modal('hide');
                    }

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

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

<script>
    $(document).ready(function() {
        $('#searchInput').keyup(function() {
            var search = $('#searchInput').val();

            $.ajax({
                type: 'POST',
                url: "{{route('search.admin.blog')}}",
                data: {
                    search: search,
                    "_token": "{{ csrf_token() }}",
                },

                success: function(response) {
                    console.log(response);
                    if (response) {
                        var bloges = response;
                        var tbody = $('#blogTableBody');
                        tbody.empty();
                        bloges.forEach(function(blog) {

                            var count = '';
                            if (blog.status == 'Pending') {
                                count = '1';
                            } else if (blog.status == 'Published') {
                                count = '2';
                            } else if (blog.status == 'Processing') {
                                count = '3';
                            }

                            var blogName = blog.blog_name.toLowerCase();
                            var encodedblogName = encodeURIComponent(blogName).replace(/%20/g, '-');
                            var blogRoute = "{{ route('blog.detail', ['name' => ':name']) }}".replace(':name', encodedblogName);


                            var blogEdit = blog.blog_name.toLowerCase();
                            var encodedblogEdit = encodeURIComponent(blogEdit).replace(/%20/g, '-');
                            var editRoute = "{{route('manage.update.blog', ['name' => ':name']) }}".replace(':name', encodedblogEdit);

                            var row = $('<tr></tr>');
                            var imageSrc = '{{ asset("uploads/images/") }}/' + blog.images;

                   

                            var description = blog.blog_description;
                            var words = description.split(' ');
                            var shortDescription = words.slice(0, 20).join(' ');



                            row.append('<th scope="row"><div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0"><div class="list-thumb"><img class="w-100" src=" ' + imageSrc + ' " alt=""></div><div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4"> <div class="h6 list-title"><a href="'+ blogRoute +'"> ' + blog.blog_name + ' </a></div><p class"list-text mb-0">' + blog.author_name + '</p></div></div></th><td class="vam">' + shortDescription  + '</td><td class="vam"><span class="pending-style style' + count + '">' + blog.status + '</span></td><td class="vam">' + blog.status + '<td class="vam"><div class="d-flex"><a class="icon" data-bs-toggle="modal" data-bs-toggle="top" data-bs-placement="top" title="Manage Status" data-bs-target="#statusModal" data-id="' + blog.id + '"><i class="fa fa-eye"></i></a> <a href="'+ editRoute +'" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <span class="fas fa-pen fa"></span> </a> <a class="icon delete-blog" data-bs-toggle="modal" data-bs-target="#deleteBlogModal" data-id="' + blog.id + '" data-name="' + blog.blog_name + '" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a> </div></td>')
                            tbody.append(row);
                        });
                    } else {
                        alert('blogs-not found');
                    }
                },

                error: function(xhr, status, error) {
                    console.log('Ajax Error:', error);
                }

            });
        });
    });
</script>


@endsection