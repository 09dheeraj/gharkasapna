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
</style>

<div class="col-lg-12">
    <div class="dashboard_title_area">
        <h2>My Favorites</h2>
        <p class="text">We are glad to see you again!</p>
    </div>
    <span class="success-msg" id="success-msg"></span>
</div>
</div>

@if(!empty($likeProperties) && count($likeProperties) > 0)
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 p20-xs mb30 overflow-hidden position-relative">
            <div class="row">
                @foreach($likeProperties as $data)
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

                            <div class="list-price">{{($data->user_likeProperties->looking_to == 'rent' || $data->user_likeProperties->looking_to == 'pg') ? formatRent($data->user_likeProperties->rent) : formatCost($data->user_likeProperties->cost) }}</div>
                        </div>
                        <div class="list-content">
                            @php
                            if($data->user_likeProperties->looking_to == 'pg') {

                            $setRoute = route('paying_living.details', ['name' => Str::slug($data->user_likeProperties->pg_name)]);
                            } else {
                            $setRoute = route('admin.single.list', ['name' => Str::slug($data->user_likeProperties->property_name)]);
                            }

                            @endphp
                            <h6 class="list-title"><a href="{{$setRoute}}">{{$data->user_likeProperties->looking_to == 'pg' ? ucwords($data->user_likeProperties->pg_name) : ucwords($data->user_likeProperties->property_name)}}</a></h6>
                            <p class="list-text">{{ ucwords($data->user_likeProperties->project_society) }}, {{ ucwords($data->user_likeProperties->locality) }}, {{ ucwords($data->user_likeProperties->city) }}</p>

                            <hr class="mt-2 mb-2">
                            <div class="list-meta2 d-flex justify-content-between align-items-center">
                                <span class="for-what">For {{ucfirst($data->user_likeProperties->looking_to)}}</span>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row">
                <div class="mbp_pagination text-center mt30">
                    {{ $likeProperties->links() }}

                    <!-- Display page count information -->
                    <p class="mt10 pagination_page_count text-center">
                        {{ $likeProperties->firstItem() }} – {{ $likeProperties->lastItem() }} of {{ $likeProperties->total() }}+ Properties available
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


@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-property').on('click', function(e) {
            e.preventDefault();
            var propertyId = $(this).data('property-id');
            if (confirm("Are you sure you want to dislike this property?")) {
                var $parentElement = $(this).closest('.col-sm-6');

                $.ajax({
                    url: "{{route('admin.dislike.property')}}",
                    method: "POST",
                    data: {
                        propertyId: propertyId,
                        "_token": "{{ csrf_token()}}"
                    },

                    success: function(response) {

                        if (response.hasOwnProperty('success') && response.success) {


                            $('#success-msg').text('Removed from like property !');

                            setTimeout(function() {
                                $parentElement.remove();
                                $('#success-msg').text('');
                            }, 2000);


                        } else {
                            console.error('Failed to delete property:', response.message);
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                })
            }
        });
    });
</script>