@extends('gharkasapna.layouts.innerpages_app')
@section('content')

<style>
    .accept {
        display: inline;
        cursor: pointer;
    }

    .accept i.fa-solid.fa-check {
        border: 1px solid red;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 22px;

    }

    .reject {
        display: inline;
        cursor: pointer;
    }

    .reject i.fa-solid.fa-xmark {
        border: 1px solid red;
        padding: 5px 15px;
        border-radius: 4px;
        font-size: 22px;

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
        <h2>Howdy, {{session()->get('name')}}!</h2>
        <p class="text">We are glad to see you again!</p>
    </div>
</div>
</div>


@if(session()->get('roles') == 'admin')





@if(session('success'))

<div class="col-lg-6 success-mesg">
    <div class="ui-content">
        <div class="message-alart-style1">
            <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">Success: {{ session('success') }}
                <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
        </div>
    </div>
</div>
@endif





<div class="row">
    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('manage.all_properties')}}">

            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">All Properties</div>
                    <div class="title">{{$totalProperties}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-home"></i></div>
            </div>

        </a>
    </div>

    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('admin.properties')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">My Properties</div>
                    <div class="title">{{$myPropertyCount}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-home"></i></div>
            </div>
        </a>
    </div>


    <!-- <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Views</div>
                <div class="title">192</div>
            </div>
            <div class="icon text-center"><i class="flaticon-search-chart"></i></div>
        </div>
    </div> -->
    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('admin.reviews')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">Total Visitor Reviews</div>
                    <div class="title">{{$totalVisitorReviewsAdmin}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-review"></i></div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xxl-3">
        <a onclick="alert('The Visitor Favorites feature is currently under development. Stay tuned for updates! '); return false;">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">Total Visitor Favorites</div>
                    <div class="title">{{$admincountLikeproperty}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-like"></i></div>
            </div>
        </a>
    </div>



    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('admin.fav.properties')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">My Favorites</div>
                    <div class="title">{{$adminlikeProperty}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-like"></i></div>
            </div>
        </a>
    </div>



    <div class="col-sm-6 col-xxl-3">
        <a onclick="alert('The Users feature is currently under development. Stay tuned for updates! '); return false;">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">Total Users</div>
                    <div class="title">{{$totalusers}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-user mr15"></i></div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xxl-3">
        <a onclick="alert('The Vendor feature is currently under development. Stay tuned for updates! '); return false;">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">Total Vendor</div>
                    <div class="title">{{$totalvendor}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-user mr15 plus"></i></div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="navtab-style1">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="title fz17 mb20">View statistics</h4>
                    <ul class="nav nav-tabs border-bottom-0 mb30" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw600 active" id="hourly-tab" data-bs-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="true">Hours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="monthly-tab" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
                        <canvas class="chart-container" id="doublebar-chart"></canvas>
                    </div>
                    <div class="tab-pane fade w-100" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <canvas class="canvas w-100" id="myChartweave"></canvas>
                    </div>
                    <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <div class="chart pt20">
                            <canvas class="w-100" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <h4 class="title fz17 mb25">Recent Activities</h4>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-home flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Your listing <span class="fw600">House on the beverly hills</span> has been approved</p>
            </div>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-review flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Dollie Horton left a review on <span class="fw600">House on the Northridge</span></p>
            </div>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-like flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Someone favorites your <span class="fw600">Triple Story House for Rent</span> listing</p>
            </div>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-review flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Someone favorites your <span class="fw600">Triple Story House for Rent</span> listing</p>
            </div>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-home flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Your listing <span class="fw600">House on the beverly hills</span> has been approved</p>
            </div>
            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-review flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Dollie Horton left a review on <span class="fw600">House on the Northridge</span></p>
            </div>
            <div class="d-grid">
                <a href="" class="ud-btn btn-white2">Veiw More<i class="fal fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</div>
@elseif(session()->get('roles') == 'user')


@if(Session::has('success'))

<div class="col-lg-6 success-mesg">
    <div class="ui-content">
        <div class="message-alart-style1">
            <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">Success: {{ Session::get('success') }}
                <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
        </div>
    </div>
</div>

@endif


<div class="row">
    <!-- <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">My Properties</div>
                <div class="title">10</div>
            </div>
            <div class="icon text-center"><i class="flaticon-home"></i></div>
        </div>
    </div> -->
    <!-- <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Views</div>
                <div class="title">192</div>
            </div>
            <div class="icon text-center"><i class="flaticon-search-chart"></i></div>
        </div>
    </div> -->
    <!-- <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Visitor Reviews</div>
                <div class="title">438</div>
            </div>
            <div class="icon text-center"><i class="flaticon-review"></i></div>
        </div>
    </div> -->
    <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Favorites</div>
                <div class="title">{{$usercountLikeproperty}}</div>
            </div>
            <div class="icon text-center"><i class="flaticon-like"></i></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="navtab-style1">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="title fz17 mb20">View statistics</h4>
                    <ul class="nav nav-tabs border-bottom-0 mb30" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw600 active" id="hourly-tab" data-bs-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="true">Hours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="monthly-tab" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
                        <canvas class="chart-container" id="doublebar-chart"></canvas>
                    </div>
                    <div class="tab-pane fade w-100" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <canvas class="canvas w-100" id="myChartweave"></canvas>
                    </div>
                    <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <div class="chart pt20">
                            <canvas class="w-100" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <h4 class="title fz17 mb25">Recent Activities</h4>
            @if(!empty($notificationsAccept) && count($notificationsAccept) > 0)
            @foreach($notificationsAccept as $notification)

            <div class="recent-activity d-sm-flex align-items-center mb20">
                <span class="icon me-3 flaticon-home flex-shrink-0"></span>
                <p class="text mb-0 flex-grow-1">Your request to work with <span class="fw600">{{$notification->vendor->name}}</span> has been accepted.</p>
            </div>

            @endforeach

            <div class="d-grid">
                <!-- <a href="" class="ud-btn btn-white2">Veiw More<i class="fal fa-arrow-right-long"></i></a> -->

                <div class="row">
                    <div class="mbp_pagination text-center">
                        <ul class="page_navigation">
                            {{ $notificationsAccept->links() }}
                        </ul>
                        <p class="mt10 pagination_page_count text-center">Showing {{ $notificationsAccept->firstItem() }} - {{ $notificationsAccept->lastItem() }} of {{ $notificationsAccept->total() }} notifications</p>
                    </div>
                </div>

            </div>
            @else
            <div class="no-properties-found">
                <h4>No Recent Activities</h4>
                <p>There are currently no recent activities to display.</p>
            </div>
            @endif

        </div>
    </div>
</div>

@else

<!-- <div class="col-lg-6">
    <div class="ui-content">
        <div class="message-alart-style1">
            <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert" id="SuccessMsg">
                <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('mange.post_properties')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">My Properties</div>
                    <div class="title">{{$totalvendorProperty ? $totalvendorProperty : '0'}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-home"></i></div>
            </div>
        </a>
    </div>
    <!-- <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Views</div>
                <div class="title">192</div> 
            </div>
            <div class="icon text-center"><i class="flaticon-search-chart"></i></div>
        </div>
    </div> -->
    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('reviews')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">Total Visitor Reviews</div>
                    <div class="title">{{$totalVisitorReviews ? $totalVisitorReviews : '0'}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-review"></i></div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xxl-3">
        <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
                <div class="text fz25">Total Visitor Favorites</div>
                <div class="title">{{$totalvisitorLike ? $totalvisitorLike : '0'}}</div>
            </div>
            <div class="icon text-center"><i class="flaticon-like"></i></div>
        </div>
    </div>

    <div class="col-sm-6 col-xxl-3">
        <a href="{{route('my.fav.properties')}}">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz25">My Favorites</div>
                    <div class="title">{{$vendorLikeProperties ? $vendorLikeProperties : '0'}}</div>
                </div>
                <div class="icon text-center"><i class="flaticon-like"></i></div>
            </div>
        </a>

    </div>


</div>
<div class="row">
    <div class="col-xl-8">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="navtab-style1">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4 class="title fz17 mb20">View statistics</h4>
                    <ul class="nav nav-tabs border-bottom-0 mb30" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw600 active" id="hourly-tab" data-bs-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="true">Hours</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw600" id="monthly-tab" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
                        <canvas class="chart-container" id="doublebar-chart"></canvas>
                    </div>
                    <div class="tab-pane fade w-100" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                        <canvas class="canvas w-100" id="myChartweave"></canvas>
                    </div>
                    <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                        <div class="chart pt20">
                            <canvas class="w-100" id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <h4 class="title fz17 mb25">Recent Activities</h4>


            @if(!empty($notifications) && count($notifications) > 0)
            @foreach($notifications as $notification)
            @if($notification->data == 'like')

            <div class="flex-grow-1">
                <span class=" flex-shrink-0"><i class="fas fa-heart"></i></span>
                <p class="mb-1">Your listing <span class="fw600">{{ $notification->property->property_name }}</span> has been liked</p>
                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            @elseif($notification->data === 'msg_request')

            <span class="flex-shrink-0"><i class="fas fa-comment-alt"></i></span>
            <div class="flex-grow-1">
                <p class="mb-1">You have a new chat request from <span class="fw600">{{ $notification->user->name }}</span> for listing <span class="fw600">{{ $notification->property->property_name }}</span></p>
                <div class="accept-reject-boxes">
                    <div class="accept">
                        <i class="fa-solid fa-check" data-user-id="{{ $notification->user_id }}" data-property-id="{{ $notification->property_id }}" data-notify-id="{{$notification->id}}"></i>
                    </div>
                    <div class="reject">
                        <i class="fa-solid fa-xmark" data-user-id="{{ $notification->user_id }}" data-property-id="{{ $notification->property_id }}"></i>
                    </div>
                </div>
                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            @elseif(in_array($notification->data, ['Pending', 'Published', 'Processing']))


            <span class="icon me-3 flaticon-review flex-shrink-0"></span>
            <div class="flex-grow-1">
                @if($notification->data === 'Pending')
                <p class="mb-1">Owner has marked your property <i class="fas fa-hourglass-start"></i> <span class="fw600">{{ $notification->property->property_name }}</span> as pending.</p>
                @elseif($notification->data === 'Published')
                <p class="mb-1">Owner has published your property <i class="fas fa-check-circle"></i> <span class="fw600">{{ $notification->property->property_name }}</span>.</p>
                @elseif($notification->data === 'Processing')
                <p class="mb-1">Owner has put your property <i class="fas fa-hourglass-half"></i> <span class="fw600">{{ $notification->property->property_name }}</span> under review.</p>
                @endif
                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
            </div>
            @endif


            @endforeach

            <div class="d-grid">
                <!-- <a href="" class="ud-btn btn-white2">View More<i class="fal fa-arrow-right-long"></i></a> -->
                <div class="row">
                    <div class="mbp_pagination text-center">
                        <ul class="page_navigation">
                            {{ $notifications->links() }}
                        </ul>
                        <p class="mt10 pagination_page_count text-center">Showing {{ $notifications->firstItem() }} - {{ $notifications->lastItem() }} of {{ $notifications->total() }} notifications</p>
                    </div>
                </div>
            </div>
            @else
            <div class="no-properties-found">
                <h4>No Recent Activities</h4>
                <p>There are currently no recent activities to display.</p>
            </div>
            @endif

        </div>
    </div>



</div>

@endif

</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://beacon.madeofeffort.de/js/components/dark-light-mode.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        function removeAlerts() {
            $('.success-mesg').delay(5000).fadeOut('slow', function() {
                $(this).remove();
            });
        }
        removeAlerts();
    });
</script>

<script>
    $(document).ready(function() {
        $('.accept i[data-user-id]').on('click', function() {
            var userId = $(this).data('user-id');
            var propertyId = $(this).data('property-id');
            var notifyId = $(this).data('notify-id');

            $.ajax({
                url: "{{route('vendor.acceptRequest')}}",
                method: "POST",
                data: {
                    propertyId: propertyId,
                    userId: userId,
                    notifyId: notifyId,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK"
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 5000)
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }

            });

        });

        $('.reject i[data-user-id]').on('click', function() {
            var userID = $(this).data('user-id');
            var propertyID = $(this).data('property-id');
            var vendorID = "{{ session()->get('id') }}";

            Swal.fire({
                title: "Reject Request",
                text: "Are you sure you want to reject this request?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Reject",
                cancelButtonText: "No, cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('user.reject.request')}}",
                        method: "POST",
                        data: {
                            vendorID: vendorID,
                            propertyID: propertyID,
                            userID: userID,
                            "_token": "{{csrf_token()}}"
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Reject Request",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK"
                                });

                                setTimeout(function() {
                                    location.reload();
                                }, 4000);

                            } else {
                                Swal.fire({
                                    title: "Reject Request",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error :", error);
                        }
                    });
                }
            });

        });
    });
</script>

<script>
    // const urlParams = new URLSearchParams(window.location.search);
    
    // if (urlParams.has('success') && urlParams.get('success') === '1') {
    //     $('#SuccessMsg').text('Welcome! You have successfully logged in.');
    //    // alert('Login Successful!');
    // }
</script>

<script>
    // $(document).ready(function() {
    //     const urlParams = new URLSearchParams(window.location.search);

    //     if (urlParams.has('success') && urlParams.get('success') === '1') {
    //         $('#SuccessMsg').html('<strong>Welcome!</strong> You have successfully logged in.');
    //     }
    // });
</script>