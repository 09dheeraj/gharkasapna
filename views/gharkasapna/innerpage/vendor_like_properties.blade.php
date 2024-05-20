@extends('gharkasapna.layouts.innerpages_app')
@section('content')

@php

function formatRent($rent)
{
if (!is_numeric($rent)) {
return 'N/A';
}

if ($rent >= 10000000) {
return '₹' . number_format($rent / 10000000, 2) . ' Cr';
} elseif ($rent >= 100000) {
return '₹' . number_format($rent / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($rent / 1000, 2) . ' K';
}
}

function formatCost($cost)
{
if (!is_numeric($cost)) {
return 'N/A';
}

if ($cost >= 10000000) {
return '₹' . number_format($cost / 10000000, 2) . ' Cr';
} elseif ($cost >= 100000) {
return '₹' . number_format($cost / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($cost / 1000, 2) . ' K';
}
}

@endphp

<style>
    .no-properties-found {

        text-align: center;
        margin-top: 50px;
    }

    .no-properties-found h1 {
        font-size: 24px;
        color: #000;
        font-weight: bold;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fefefe;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        z-index: 9999;
    }

    .popup-content {
        text-align: center;
    }

    .close-btn {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Style for overlay */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* semi-transparent black */
        z-index: 9998;
    }
</style>


<div class="col-lg-12">
    <div class="dashboard_title_area">
        <h2>My Favorites</h2>
        <p class="text">We are glad to see you again!</p>
    </div>
    <div class="col-lg-6 success-mesg" style="display: none;">
        <div class="ui-content">
            <div class="message-alart-style1">
                <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                    <span id="successMessage"></span>
                    <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@if(!empty($likeProperty) && count($likeProperty) > 0)
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 p20-xs mb30 overflow-hidden position-relative">
            <div class="row">
                @foreach($likeProperty as $data)
                @php $image = explode(',', $data->user_likeProperties->images); @endphp
                <div class="col-sm-6 col-xl-3">
                    <div class="listing-style1 style2">
                        <div class="list-thumb">
                            <a href="" class="tag-del delete-property" data-bs-toggle="tooltip" data-bs-placement="top" data-property-id="{{ $data->id }}" title="Dislike Property"><span class="fas fa-trash-can"></span></a>

                            @foreach($image as $img)
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height: 170px;">
                            @break
                            @endforeach

                            <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>

                            @if($data->user_likeProperties->looking_to == 'rent' || $data->user_likeProperties->looking_to == 'pg')
                            <div class="list-price">{{formatRent($data->user_likeProperties->rent)}}/<span>mo</span></div>
                            @else
                            <div class="list-price">{{formatCost($data->user_likeProperties->cost)}}</div>
                            @endif
                        </div>
                        <div class="list-content">
                            @if($data->user_likeProperties->looking_to == 'pg')
                            <h6 class="list-title"><a href="{{route('paying_living.details', ['name' => Str::slug($data->user_likeProperties->pg_name)])}}" target="_blank">{{$data->user_likeProperties->pg_name}}</a></h6>
                            @else
                            <h6 class="list-title"><a href="{{route('properties.details', ['name' => Str::slug($data->user_likeProperties->property_name)])}}" target="_blank">{{$data->user_likeProperties->property_name}}</a></h6>
                            @endif
                            <p class="list-text">{{ ucwords($data->user_likeProperties->project_society) }}, {{ ucwords($data->user_likeProperties->locality) }}, {{ ucwords($data->user_likeProperties->city) }}</p>
                            <hr class="mt-2 mb-2">
                            <div class="list-meta2 d-flex justify-content-between align-items-center">
                                <span class="for-what">For {{ucfirst($data->user_likeProperties->looking_to)}}</span>
                                <!-- <div class="icons d-flex align-items-center">
                                    <a href=""><span class="flaticon-fullscreen"></span></a>
                                    <a href=""><span class="flaticon-new-tab"></span></a>
                                    <a href=""><span class="flaticon-like"></span></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="mbp_pagination text-center mt30">
                    {{ $likeProperty->links() }}

                    <!-- Display page count information -->
                    <p class="mt10 pagination_page_count text-center">
                        {{ $likeProperty->firstItem() }} – {{ $likeProperty->lastItem() }} of {{ $likeProperty->total() }}+ Properties available
                    </p>
                </div>
            </div>


        </div>
    </div>
</div>
@else
<div class="no-properties-found">
    <h1>Properties Not Found</h1>
</div>

@endif



</div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {


        $('.delete-property').on('click', function(e) {
            e.preventDefault();

            var propertyId = $(this).data('property-id');

            Swal.fire({
                title: "Are you sure?",
                text: "you want to dislike this property?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel"

            }).then((result) => {
                if (result.isConfirmed) {
                    var $parentElement = $(this).closest('.col-sm-6');
                    $.ajax({
                        url: "{{route('vendor.dislike.property')}}",
                        method: "POST",
                        data: {
                            propertyId: propertyId,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            if (response.hasOwnProperty('success') && response.success) {

                                $('.success-mesg').show();
                                $('#successMessage').text('Removed from like property !');
                                $parentElement.remove();

                                setTimeout(function() {
                                    $('.success-mesg').hide();
                                }, 8000);


                            } else {
                                console.error('Failed to delete property:', response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });

        });
    });
</script>