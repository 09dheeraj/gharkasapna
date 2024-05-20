@extends('gharkasapna.layouts.innerpages_app')
@section('content')


<section class="home-banner-style4 p0 mb30 bgc-white">
    <div class="home-notification maxw1600 bdrs24 position-relative mx-auto" style="--background-url: url('{{ asset('assets/images/Rectangle 4443.png') }}')">
        <div class="inner-banner-style4">
            <h1 class="hero-title animate-up-1 ms-5">Notifications <span class="text-color-orange"><i class="fa-solid fa-bell"></i></span></h1>
        </div>
    </div>
</section>


@if(session()->get('roles') == 'vendor')

<div class="row wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">

    @foreach($sendRequest as $data)
    <div class="col-12">
        <div class="col-lg-3 success-mesg" style="display: none;">
            <div class="ui-content">
                <div class="message-alart-style1">
                    <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                        <span id="request-msg"></span>
                        <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                    </div>
                </div>
            </div>
        </div>

        @if($data->status == 'pending')
        <div class="home10-notification-style position-relative mb-3">
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between ">
                <span class="fz20"><i class="fa-solid fa-square-xmark"></i></span>
                <div class="order-1 order-sm-2 ms-3">
                    <button class="notification-button mb-2">New Request</button>
                    <h5 class="mb-1">New Request for {{ucfirst($data->property->property_name)}}</h5>
                    <p class="mb-1">A new request has been received for one of your property.</p>
                    <p class="text-color-orange mb-0">{{ucwords($data->user->name)}}</p>
                </div>
                <div class="order-3 order-sm-3 ms-sm-auto mt-3 mt-sm-0 mb-3 mb-sm-3 d-flex flex-column align-items-sm-end align-items-center">
                    <p class="mb-0">{{ $data->created_at->format('d M Y \a\t h:i A') }}</p>

                    <img class="mt10" src="{{ asset('public/assets/profile-img/'. $data->user->image) }}" alt="" style="width:50%; max-width:50px; display: block;">
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a class="btn btn-success accept-request" data-id="{{$data->id}}">Accept Request</a>
                <a class="btn btn-danger reject-request" data-bs-toggle="modal" data-bs-target="#deleterequestModal" user-name="{{$data->user->name}}" data-id="{{$data->id}}">Reject Request</a>
                <!-- <a href="#" class="tag-del delete-profile"  data-profileid="28" data-username="sandeep singh"><span class="fas fa-trash-can"></span></a> -->
            </div>
        </div>

        @elseif($data->status == 'accepted')
        <div class="home10-notification-style position-relative mb-3">

            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between">
                <span class="fz20"><i class="fa-solid fa-check"></i></span>
                <div class="order-1 order-sm-2 ms-3">
                    <button class="notification-button mb-2">Joined New User</button>
                    <h5 class="mb-1">Chat now for {{ucfirst($data->property->property_name)}} recording</h5>
                    <p class="text-color-orange mb-0">{{ucwords($data->user->name)}}</p>
                </div>
                <div class="order-3 order-sm-3 ms-sm-auto mt-3 mt-sm-0 mb-3 mb-sm-3 d-flex flex-column align-items-sm-end align-items-center">
                    <p class="mb-0">{{ $data->created_at->format('d M Y \a\t h:i A') }}</p>
                    <img class="mt10" src="{{ asset('public/assets/profile-img/'. $data->user->image) }}" alt="" style="width:50%; max-width:50px; display: block;">
                </div>
            </div>

            <div class="mt-3">
                <a class="ud-btn btn-thm" style="height: 47px;margin-left: 31px;" href="{{route('vendor.msg')}}" id="chat-now">Chat Now</a>
            </div>
        </div>
        @endif
    </div>
    @endforeach


</div>
@elseif(session()->get('roles') == 'user')




@foreach($userRequestData as $data)

<!-- <div class="col-12">
    <div class="home10-notification-style position-relative mb-3">
        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between">
            <span class="fz20"><i class="fa-solid fa-square-xmark"></i></span>
            <div class="order-1 order-sm-2 ms-3">
                <button class="notification-button mb-2">Request Accepted</button>
                <p class="mb-1">You can now chat for {{ ucfirst($data->property->property_name) }} recording</p>
                <p class="text-color-orange mb-0">{{ucwords($data->vendor->name)}}</p>
            </div>
            <div class="order-3 order-sm-3 ms-sm-auto mt-3 mt-sm-0 mb-3 mb-sm-3 d-flex flex-column align-items-sm-end align-items-center">
                <p class="mb-0">Received on: {{ $data->created_at->format('d M Y \a\t h:i A') }}</p>
                <img class="mt10" src="{{ asset('public/assets/profile-img/'. $data->vendor->image) }}" alt="" style="width:50%; max-width:50px; display: block;">
            </div>
        </div>
        <div class="mt-3">
            <a class="ud-btn btn-thm" style="height: 47px;margin-left: 31px;" href="{{route('user.msg')}}" id="start-chat">Start Chat</a>
        </div>

    </div>
</div> -->

@endforeach









@elseif(session()->get('roles') == 'admin')

<h1>Admin</h1>

@endif

<div class="modal fade" id="deleterequestModal" tabindex="-1" aria-labelledby="deleterequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="deleterequestModalLabel">Remove Request</h4>
                <p class="mb-4">Are you sure you want to remove the request of <strong><span id="userName"></span></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="ud-btn btn btn-danger" id="confirmDelete" style="color:#fff">Remove</button>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.accept-request').on('click', function() {


            var requestID = $(this).attr('data-id');


            $.ajax({
                url: "{{route('accept.request.vendor')}}",
                method: "POST",
                data: {
                    requestID: requestID,
                    "_token": "{{csrf_token()}}"
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {

                        $('#request-msg').text('Request accepted successfully');
                        $('.success-mesg').show();
                        setTimeout(function() {
                            $('#request-msg').fadeOut();

                            location.reload(false);
                        }, 3000);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Ajax Error", error);
                }

            });
        });

        $('.reject-request').on('click', function() {
            var userName = $(this).attr('user-name');
            var requestID = $(this).attr('data-id');
            $('#userName').text(userName);

            document.getElementById('confirmDelete').setAttribute('data-request-id', requestID);

            $('#confirmDelete').on('click', function(e) {
                e.preventDefault();
                var requestID = this.getAttribute('data-request-id');
                $.ajax({
                    url: "{{route('reject.request.vendor')}}",
                    method: "POST",
                    data: {
                        requestID: requestID,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {

                            $('#request-msg').text('Request Reject successfully')
                            setTimeout(function() {
                                $('#request-msg').fadeOut();
                                location.reload(false);
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Ajax Error", error);
                    }
                });
            });
        });

    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#start-chat').on('click', function() {
            alert('Chat feature is currently under development. Stay tuned for updates!');
        });

        $('#chat-now').on('click', function() {
            alert('Chat feature is currently under development. Stay tuned for updates!');
        });

    });
</script> -->




@endsection