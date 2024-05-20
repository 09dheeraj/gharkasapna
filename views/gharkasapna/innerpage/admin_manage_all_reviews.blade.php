@extends('gharkasapna.layouts.innerpages_app')
@section('content')

<style>
    /* CSS for reply section */
    .reply-section {
        margin-top: 20px;
    }

    /* .reply {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
} */

    .reply p {
        margin: 5px 0;
    }


    .no-properties-found {

        text-align: center;
        margin-top: 50px;
    }

    .no-properties-found h1 {
        font-size: 24px;
        color: #000;
        font-weight: bold;
    }
</style>
<div class="col-lg-12">
    <div class="dashboard_title_area">
        <h2>{{$pageTitle}}</h2>
        <p class="text">We are glad to see you again!</p>
    </div>
    <span class="alert-success" id="successMessage"></span>
    <span class="alert-success" id="status-success"></span>
</div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="product_single_content">
                <div class="mbp_pagination_comments">
                    @if(!empty($ReviewsData) && count($ReviewsData) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="total_review d-block d-sm-flex align-items-center justify-content-between mb20">
                                <h6 class="fz17 mb15"><i class="fas fa-star fz12 pe-2"></i>{{ count($ReviewsData) }} reviews</h6>
                                <div class="page_control_shorting d-flex align-items-center justify-content-start justify-content-sm-end">
                                    <!-- <div class="pcs_dropdown mb15"><span>Sort by</span>
                                        <select class="selectpicker show-tick">
                                            <option>Newest</option>
                                            <option>Best Seller</option>
                                            <option>Best Match</option>
                                            <option>Price Low</option>
                                            <option>Price High</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        @foreach($ReviewsData as $data)
                        <div class="d-flex">
                            <span class="pending-style style{{ $data->status == 'pending' ? '1' : '2' }}">{{ucwords($data->status)}}
                                <a class="icon" data-bs-toggle="modal" data-bs-placement="top" title="Manage status" data-bs-original-title="Manage status" data-id="{{$data->id}}" data-bs-target="#statusModal" aria-label="Edit">
                                    <span class="fas fa-pen fa"></span>
                                </a>
                                <a href="#" class="tag-del delete-review" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-id="{{$data->id}}" data-username="{{$data->userData->name}}"><span class="fas fa-trash-can"></span></a>


                            </span>
                        </div>

                        <div class="col-md-12">
                            <div class="mbp_first position-relative d-block d-sm-flex align-items-center justify-content-start mt30 mb30-sm">
                                <img src="{{ asset('public/assets/profile-img/' . $data->userData->image) }}" class="mr-3 mb15-xs" alt="comments-2.png" style="height: 60px;">
                                <div class="ml20 ml0-xs">
                                    @if($data->propertyData->looking_to == 'pg')
                                    <h6 class="mt-0 mb-0">{{ucwords($data->userData->name)}} posted a {{$data->review}}-star review of your property - {{$data->propertyData->pg_name}}</h6>
                                    @else
                                    <h6 class="mt-0 mb-0">{{ucwords($data->userData->name)}} posted a {{$data->review}}-star review of your property - {{$data->propertyData->property_name}}</h6>
                                    @endif
                                    <div><span class="fz14">{{$data->created_at->format('F j, Y')}}</span>

                                        <div class="blog-single-review">
                                            <ul class="mb0 ps-0">
                                                @php $rating = $data->review; @endphp
                                                @for ($j = 1; $j <= 5; $j++) @if ($j <=$rating) <li class="list-inline-item me-0"><a href="#"><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                    @else
                                                    <li class="list-inline-item me-0"><a href="#"><i class="far fa-star review-color2 fz10"></i></a></li>
                                                    @endif
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text mt20 mb20">{{ucwords($data->body)}}</p>
                            <span id="review-reply" class="text-danger"></span>

                            @php
                            $hasReplies = $reviewReply->where('review_id', $data->id)->isNotEmpty();
                            @endphp

                            @if($hasReplies)
                            <div class="reply-section mt-3">
                                <h6 class="fw-bold"><i class="fas fa-reply"></i>Reply</h6>
                             
                                @foreach($reviewReply as $reply)
                                @if($reply->review_id == $data->id)
                                <div class="reply">
                                    <p>{{$reply->body}}</p>
                                    <p class="text-muted small">{{ $reply->created_at->format('F j, Y') }}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endif

                            <div class="review_cansel_btns d-flex bdrb1 pb30">
                                <textarea name="reply" class="form-control" placeholder="Write your reply here" name="reply" rows="3" id="reply-{{$data->id}}"></textarea>
                                <a class="dark-color" data-id="{{ $data->id }}"><i class="fas fa-reply"></i>Reply</a>
                            </div>
                        </div>
                        @endforeach



                        <div class="mbp_pagination text-center">
                            <ul class="page_navigation">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $ReviewsData->previousPageUrl() }}"></a>
                                </li>

                                {{ $ReviewsData->links() }}

                                <li class="page-item">
                                    <a class="page-link" href="{{ $ReviewsData->nextPageUrl() }}"></a>
                                </li>
                            </ul>
                            <p class="mt10 pagination_page_count text-center">{{ $ReviewsData->firstItem() }} - {{ $ReviewsData->lastItem() }} of {{ $ReviewsData->total() }} Reviews available</p>
                        </div>

                    </div>
                    @else
                    <div class="no-properties-found">
                        <h1>Reviews Not Found</h1>
                    </div>
                    @endif
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

                <label class="text-color-black fw600 mb10">Mange Status</label>
                <div class="location-area">
                    <select id="statusSelect" class="selectpicker" name="mange_status" required>
                        <option selected disabled>Select an option</option>
                        <option value="pending">Pending</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="ud-btn btn-dark btn-block custom-add-btn w-100" id="submitstatus">Update Status</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="replySuccessModal" tabindex="-1" aria-labelledby="replySuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replySuccessModalLabel">Reply Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your reply has been added successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="deleteModalLabel">Remove Review</h4>
                <p class="mb-4">Are you sure you want to permanently delete the review by <strong><span id="userName"></span></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="ud-btn btn btn-danger " id="confirmDelete" style="color:#fff">Delete</button>
            </div>
        </div>
    </div>
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-review');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var reviewID = this.getAttribute('data-id');
                var userName = this.getAttribute('data-username');
                document.getElementById('userName').innerText = userName;
                
                document.getElementById('confirmDelete').setAttribute('data-review-id', reviewID);
            });
        });

        $('#confirmDelete').on('click', function(e) {
            e.preventDefault();
            var reviewID = this.getAttribute('data-review-id'); 
            $.ajax({
                url: "{{route('delete.review')}}",
                method: "POST",
                data:{
                    reviewID: reviewID,
                    "_token": "{{ csrf_token() }}"
                },
                success:function(response) {
                    console.log(response);
                    if(response.success) {
                        var successMessage = document.getElementById('successMessage');
                        successMessage.innerText = "Review deleted successfully";
                        $('#deleteProfileModal').modal('hide');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                },
                error:function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>




<script>
    $(document).ready(function() {

        $('#statusModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const reviewID = button.data('id');
            $(this).find('#submitstatus').data('reviewID', reviewID);
        });

        $('#submitstatus').on('click', function(e) {
            e.preventDefault();

            const reviewID = $(this).data('reviewID');
            const selectedValue = $('#statusSelect').val();
         
            $.ajax({
                url: "{{route('manage.review.status')}}",
                method: 'POST',
                data: {
                    reviewID: reviewID,
                    selectedValue: selectedValue,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {

                    console.log(response);
                    if (response && response.success) {
                        $('#status-success').text('Status updated successfully!');
                        $('#statusModal').modal('hide');
                    } else {
                        $('#status-success').text('Failed to update status. Please try again.');
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
    document.addEventListener("DOMContentLoaded", function() {
        var replyButtons = document.querySelectorAll('.dark-color');

        replyButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = this.getAttribute('data-id');
                var replyText = document.getElementById('reply-' + id).value;
                if (replyText.trim() === '') {
                    $('#review-reply').text('Please enter a reply text.');
                    return;
                }

                $.ajax({
                    url: "{{route('admin.review.reply')}}",
                    method: "POST",
                    data: {
                        id: id,
                        replyText: replyText,
                        "_token": "{{csrf_token()}}",
                    },
                    success: function(response) {

                        document.getElementById('reply-' + id).value = '';

                        var replySuccessModal = new bootstrap.Modal(document.getElementById('replySuccessModal'));
                        replySuccessModal.show();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);

                        console.log(response);
                    },
                    error: function(xhr, error, status) {
                        console.error('Error:', error);
                    }
                });
                event.preventDefault();
            });
        });

        var replyTextAreas = document.querySelectorAll('textarea[name="reply"]');
        replyTextAreas.forEach(function(textArea) {
            textArea.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    $('#review-reply').text('');
                }
            });
        });
    });
</script>



@endsection