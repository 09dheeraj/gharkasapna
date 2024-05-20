@extends('gharkasapna.layouts.app')
@section('content')

<?php

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


?>


<section class="breadcumb-section bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-style1">
                    <h2 class="title" id="pageTitleHeading">{{$pageTitle}}</h2>

                    <!-- <a href="" class="filter-btn-left mobile-filter-btn d-block d-lg-none"><span class="flaticon-settings"></span> Filter</a> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property All Lists -->
<section class="pt0 pb90 bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 d-none d-lg-block">
                <div class="dropdown-lists">
                    <ul class="p-0 text-center text-xl-start">
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown" id="dropdownHeading">For Sale <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">

                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Listing Status</h6>
                                    <div class="radio-element">
                                        <div class="form-check d-flex align-items-center mb10" id="searchforsell">
                                            <input class="form-check-input" type="radio" value="Buy" id="radio-buy">
                                            <label class="form-check-label" for="radio-buy">Buy</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb10" id="searchforrent">
                                            <input class="form-check-input" type="radio" name="looking_to" value="rent" id="radio-rent">
                                            <label class="form-check-label" for="radio-rent">Rent</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                       
                        @php

                        $segment = request()->segment(3);
                        $checkapartment = ($segment == 'apartment') ? 'checked' : '';
                        $checkindependentfloor = ($segment == 'independent-floor') ? 'checked' : '';
                        $checkindependenthouse = ($segment == 'independent-house') ? 'checked' : '';
                        $checkvilla = ($segment == 'villa') ? 'checked' : '';

                        @endphp
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Property Type <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Property Type</h6>
                                    <div class="checkbox-style1">
                                        @if($segment == 'apartment' || $segment == 'independent-floor' || $segment == 'independent-house' || $segment == 'villa')
                                        <label class="custom_checkbox">Independent Houses
                                            <input type="checkbox" name="categories_type[]" value="independent house" {{ $checkindependenthouse }}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Apartments
                                            <input type="checkbox" name="categories_type[]" value="apartment" {{$checkapartment}}>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Plot
                                            <input type="checkbox" name="categories_type[]" value="plot" >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Villa
                                            <input type="checkbox" name="categories_type[]" vlaue="villa" {{$checkvilla}} >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Independent Floor
                                            <input type="checkbox" name="categories_type[]" value="independent floor" {{$checkindependenthouse}} >
                                            <span class="checkmark"></span>
                                        </label>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Price <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu dd3">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20 pr20">
                                    <h6 class="list-title">Price Range</h6>
                                    <div class="range-slider-style1">
                                        <div class="range-wrapper" style="text-align: center;">
                                            <!-- <div class="slider-range mt30 mb20"></div> -->

                                            <span id="max-price-error" class="enter-price-min"></span>
                                            <span id="min-price-error" class="enter-price-max"></span>
                                            <div class="text-center">
                                                <input type="text" id="min-price" class="amount" placeholder="min price">
                                                <input type="text" id="max-price" class="amount2" placeholder="max price">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row" id="propertiesContainer">
            @foreach($propertiesData as $property)
            <?php $image = explode(',', $property->images); ?>
            <div class="col-sm-6 col-lg-4">
                <div class="listing-style1">
                    <div class="list-thumb" style="height: 300px;">

                        @foreach($image as $img)
                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                        @break
                        @endforeach

                        <div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>

                        <?php if ($property->looking_to == 'rent') {  ?>
                            <div class="list-price"><?php echo formatRent($property->rent); ?>/<span>mo</span></div>
                        <?php } else { ?>
                            <div class="list-price"><?php echo formatCost($property->cost); ?></div>
                        <?php } ?>

                    </div>
                    <div class="list-content">

                        <?php
                        $property_lookingType = $property->looking_to;

                        if ($property_lookingType == 'sell') {

                            $setroute = route('single.listing', ['name' => Str::slug($property->property_name)]);
                        } elseif ($property_lookingType = 'rent') {

                            $setroute = route('single.listing.rent', ['name' => Str::slug($property->property_name)]);
                        }

                        $propertyType = $property->property_type;

                        if ($propertyType == 'commercial') {
                            $setroute = route('single.listing.commerical', ['name' => Str::slug($property->property_name)]);
                        }
                        ?>

                        <h6 class="list-title"><a href="{{ $setroute }}" target="_blank">{{ ucwords($property->property_name) }}</a></h6>

                        <p class="list-text">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>
                        <hr class="mt-2 mb-2">
                        <div class="list-meta2 d-flex justify-content-between align-items-center">
                            <span class="for-what">For {{ucwords($property->looking_to)}}</span>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="mbp_pagination text-center">
                <ul class="page_navigation">
                    {{ $propertiesData->links() }}
                </ul>
                <p class="mt10 pagination_page_count text-center">{{ $propertiesData->firstItem() }} - {{ $propertiesData->lastItem() }} of {{ $propertiesData->total() }} Property Available</p>
            </div>
        </div>
    </div>
</section>


@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>