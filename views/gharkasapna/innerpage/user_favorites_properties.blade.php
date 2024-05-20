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
        <h2>{{$pageTitle}}</h2>
        <p class="text">We are glad to see you again!</p>
    </div>
</div>
</div>
<div>
    <span class="text-success" id="delete-likeproperty"></span>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 p20-xs mb30 overflow-hidden position-relative">
            <div class="row">
                
                @if(!empty($likeproperty) && count($likeproperty) > 0)
                @foreach($likeproperty as $property)

                <?php $image = explode(',', $property->user_likeProperties->images); ?>
                <div class="col-sm-6 col-xl-3">
                    <div class="listing-style1 style2">
                        <div class="list-thumb">
                            <a class="tag-del delete-property" data-bs-toggle="tooltip" data-property-id="{{ $property->id }}" data-bs-placement="top" title="Dislike Property"><span class="fas fa-trash-can"></span></a>
                            @foreach($image as $img)
                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="" style="height: 201px;">
                            @break
                            @endforeach
                            <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>

                            @if($property->user_likeProperties->looking_to == 'rent' || $property->user_likeProperties->looking_to == 'pg')
                            <div class="list-price">{{formatRent($property->user_likeProperties->rent)}}/<span>mo</span></div>
                            @else
                            <div class="list-price">{{formatCost($property->user_likeProperties->cost)}}</div>
                            @endif
                        </div>
                        @php
                            $setRoute = '';
                            if ($property->user_likeProperties && $property->user_likeProperties->looking_to == 'pg') {
                                $setRoute = route('paying_living.details', ['name' => Str::slug($property->user_likeProperties->pg_name)]);
                            } else {
                                $setRoute = route('properties.details', ['name' => Str::slug($property->user_likeProperties->property_name)]);
                            }

                            if( $property->user_likeProperties->looking_to == 'pg') {
                                $propertyName = $property->user_likeProperties->pg_name;
                            }else{
                                $propertyName = $property->user_likeProperties->property_name;
                            }

                        @endphp

                        <div class="list-content">

                            <h6 class="list-title"><a href="{{$setRoute}}" target="_blank"> {{ucwords($propertyName)}}</a></h6>
                            <p class="list-text">{{ ucwords($property->user_likeProperties->project_society) }}, {{ ucwords($property->user_likeProperties->locality) }}, {{ ucwords($property->user_likeProperties->city) }}</p>
                            <hr class="mt-2 mb-2">
                            <div class="list-meta2 d-flex justify-content-between align-items-center">
                                <span class="for-what">For Rent</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="no-properties-found">
                    <h1>Properties Not Found</h1>
                </div>
                @endif
            </div>


            <div class="row">
            <div class="mbp_pagination text-center mt30">
                    {{ $likeproperty->links() }}

                    <!-- Display page count information -->
                    <p class="mt10 pagination_page_count text-center">
                        {{ $likeproperty->firstItem() }} – {{ $likeproperty->lastItem() }} of {{ $likeproperty->total() }}+ Properties available
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-property').on('click', function(e) {
            e.preventDefault();

            var propertyId = $(this).data('property-id');
            //alert(propertyId);

            if (confirm("Are you sure you want to delete this property?")) {
                $.ajax({
                    url: "{{route('dislike.property')}}",
                    method: 'POST',
                    data: {
                        "propertyId": propertyId,
                        "_token": "{{ csrf_token()}}",
                    },
                    success: function(response) {
                        $('#delete-likeproperty').text(response);
                        $('#delete-likeproperty').show().delay(3000).fadeOut();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

            } else {
                console.log('Deletion cancelled');
            }
        });
    });
</script>


@endsection