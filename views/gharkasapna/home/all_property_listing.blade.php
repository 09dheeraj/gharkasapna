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



<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
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

    .radio-element .form-check-input:checked {

        background-color: #181a20;
    }

    .enter-price-min {
        color: #eb6753;
        font-size: 17px;
        font-family: fangsong;
    }
    .enter-price-max {
        color: #eb6753;
        font-size: 17px;
        font-family: fangsong;
    }

    

</style>


<section class="breadcumb-section bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-style1">

                    <h2 class="title" id="property-title">{{ucwords($pageTitle)}}</h2>
                    <div id="errorPopup" class="popup">
                        <div class="popup-content">
                            <span class="close" data-dismiss="modal">&times;</span>
                            <p id="errorMessage"></p>
                        </div>
                    </div>

                    <div class="breadcumb-list">
                    </div>
                    <a href="" class="filter-btn-left mobile-filter-btn d-block d-lg-none"><span class="flaticon-settings"></span> Filter</a>
                </div>
            </div>
        </div>
    </div>
</section>



@if(!empty($randomcityDATA) && count($randomcityDATA) > 0 )
<section class="pt0 pb90 bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 d-none d-lg-block">
                <div class="dropdown-lists">
                    <ul class="p-0 text-center text-xl-start">
                        <li class="list-inline-item position-relative">
                            <?php

                            $segment = request()->segment(1);

                            if ($segment == 'all-properties-rent' || $segment == 'rent-search') {
                                $tag = 'Rent';
                            } elseif ($segment == 'all-properties-buy' || $segment == 'search') {
                                $tag = 'Sale';
                            } elseif ($segment == 'commerical-search' || $segment == 'commerical-properties') {
                                $tag = 'Sale';
                            } elseif ($segment == 'plot-search' || $segment == 'plot-listing') {
                                $tag = 'Plots';
                            }

                            $buyChecked = ($tag === 'Sale' || $tag === 'Commerical') ? 'checked' : '';
                            $rentChecked = ($tag === 'Rent' || $tag === 'Commerical') ? 'checked' : '';
                          
                            ?>
                            <button type="button" class="open-btn mb15 dropdown-toggle" id="listing-tag" data-bs-toggle="dropdown">For {{$tag}}</button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Listing Status</h6>
                                    <div class="radio-element">
                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" id="radio-buy" value="buy" <?php echo $buyChecked; ?>>
                                            <label class="form-check-label" for="radio-buy">Buy</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" name="rent" id="radio-rent" value="rent" <?php echo $rentChecked;?>>
                                            <label class="form-check-label" for="radio-rent">Rent</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Property Type <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Property Type</h6>
                                    @if(request()->segment(1) == 'commerical-properties' || request()->segment(1) == 'commerical-search')

                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Office 
                                            <input type="checkbox" name="categories_type[]" value="office">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Retail Shop
                                            <input type="checkbox" name="categories_type[]" value="retail shop">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="custom_checkbox">Showroom
                                            <input type="checkbox" name="categories_type[]" value="showroom">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Warehouse
                                            <input type="checkbox" name="categories_type[]" value="warehouse">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="custom_checkbox">Plot
                                            <input type="checkbox" name="categories_type[]" value="plot">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    @elseif(request()->segment(1) == 'plot-listing' || request()->segment(1) == 'plot-search')

                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Residential Plot 
                                            <input type="checkbox" name="categories_type[]" value="residential">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Commercial Plot
                                            <input type="checkbox" name="categories_type[]" value="commercial">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    @else
                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Independent House
                                            <input type="checkbox" name="categories_type[]" value="independent house">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Apartment
                                            <input type="checkbox" name="categories_type[]" value="apartment">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="custom_checkbox">Villa
                                            <input type="checkbox" name="categories_type[]" value="villa">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Independent Floor
                                            <input type="checkbox" name="categories_type[]" value="independent floor">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="custom_checkbox">Plot
                                            <input type="checkbox" name="categories_type[]" value="plot">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @endif
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
                                                <input type="text" id="min-price"  class="amount" placeholder="min price">
                                                <input type="text" id="max-price" class="amount2"  placeholder="max price">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="list-inline-item position-relative" style="margin-left: 423px;">
                            <p class="open-btn mb15 dropdown-toggle" id="property-available"></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row properties-container">

            @foreach($randomcityDATA as $property)
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

                        $checkLooking_to = $property->looking_to;
                        $segment = request()->segment(1);

                        if ($segment == 'commerical-search' || $segment == 'commerical-properties') {

                            $setroute = route('single.listing.commerical', ['name' => Str::slug($property->property_name)]);
                        } elseif ($segment == 'plot-search' || $segment == 'plot-listing') {
                            $setroute = route('single.listing.plot', ['name' => Str::slug($property->property_name)]);
                        } else {

                            if ($checkLooking_to == 'sell') {
                                $setroute = route('single.listing', ['name' => Str::slug($property->property_name)]);
                            } elseif ($checkLooking_to == 'rent') {
                                $setroute = route('single.listing.rent', ['name' => Str::slug($property->property_name)]);
                            }
                        }
                        ?>
                         @php $propertyName = substr($property->property_name, 0, strrpos($property->property_name, ' ')); @endphp
                        <h6 class="list-title"><a href="{{ $setroute }}" target="_blank">{{ ucwords($propertyName) }}</a></h6>
                        <p class="list-text">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>
                        <div class="list-meta d-flex align-items-center">
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="list-meta2 d-flex justify-content-between align-items-center">
                            <span class="for-what">For {{ucwords($property->looking_to)}}</span>
                            <div class="icons d-flex align-items-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row paginate-container">

            <div class="mbp_pagination text-center">
                <ul class="page_navigation">
                    {{ $randomcityDATA->links() }}
                </ul>
                <p class="mt10 pagination_page_count text-center">{{ $randomcityDATA->firstItem() }} - {{ $randomcityDATA->lastItem() }} of {{ $randomcityDATA->total() }} Property Available</p>
            </div>
        </div>
    </div>
</section>
@else
<div class="no-properties-found">
    <h1>Properties Not Found</h1>
</div>
@endif
@endsection


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





<script>
    $(document).ready(function() {
        $('#radio-buy').click(function() {
            $('#radio-rent').prop('checked', false);

        });

        $('#radio-rent').click(function() {
            $('#radio-buy').prop('checked', false);
        })
    });
</script>


<script>
    $(document).ready(function() {

        var segment = "{{ request()->segment(1) }}";
        var selectedValue = null;
        var secondSegment = "{{ request()->segment(2) }}";
        var decodeSegment = decodeURIComponent(secondSegment);
        var updatesegment = decodeSegment.replace(/-/g, ' ').replace(/,/g, '');

        //console.log(segment , updatesegment);

        $('input[type="radio"]').change(function() {
            selectedValue = $(this).val();
            logValues();
        });

        var minPrice, maxPrice; 

        $('input[type="text"]').change(function() {
            validateAndLogValues();
           // console.log("Inside change event:", minPrice, maxPrice);

        });

        function validateAndLogValues() {
             minPrice = $('#min-price').val();
             maxPrice = $('#max-price').val();
            
            if (!(/^\d+$/.test(minPrice))) {
                $('#min-price-error').text('Should be a valid number').show();
                return;
            } else if (parseInt(minPrice) < 5000) {
                $('#min-price-error').text('Should be at least 5000').show();
                return;
            } else {
                $('#min-price-error').hide('');
            }
            if (!(/^\d+$/.test(maxPrice))) {
                $('#max-price-error').text('Should be a valid number').show();
                return;
            } else if (parseInt(maxPrice) > 20000000) {
                $('#max-price-error').text('Should not exceed 20,000,000').show();
                return;
            } else {
                $('#max-price-error').text('');
            }

            logValues();
        }

       

        var checkboxes = document.querySelectorAll('input[type="checkbox"][name="categories_type[]"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                logValues();
            });
        });

        function logValues() {
            var checkedValue = [];
            checkboxes.forEach(function(cb) {
                if (cb.checked) {
                    checkedValue.push(cb.value);
                }
            });

          //  console.log("Outside function:", minPrice, maxPrice);

            if (secondSegment) {
                
                if (selectedValue === 'rent') {
                   var title = secondSegment + ' Rental Properties - Find Your Dream Home';
                   var listingTag = "For Rent";
                } else if (selectedValue === 'buy') {
                  var title = secondSegment + ' Homes for Sale';
                   var listingTag = "For Sale";
                } 
            } else {

                if (selectedValue === 'rent') {
                   var title = 'Find Your Ideal Rental Home';
                   var listingTag = "For Rent";
                } else if(selectedValue === 'buy') {
                   var title = 'Homes for Sale';
                   var listingTag = "For Sale";
                } 
            }

            $('#property-title').text(title);
            $('#listing-tag').text(listingTag);


           if (segment === 'all-properties-buy') {

            $.ajax({
                url: "{{route('search.buy.section')}}",
                type: "POST",
                data: {
                    checkedValue: checkedValue,
                    segment: segment,
                    selectedValue: selectedValue,
                    secondSegment: secondSegment,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    "_token": "{{csrf_token()}}",
                },

                success: function(response) {
                    //console.log(response);
                    if (response.status === 'success') {

                        if (response.results.length > 0) {

                            appendProperties(response.results, checkedValue);

                        } else {
                            var propertiesContainer = $('.properties-container');
                            propertiesContainer.empty();
                            var propertyHtml = '<div class="no-properties-found">';
                            propertyHtml += '<h1>Properties Not Found</h1>';
                            propertyHtml += '</div>';
                            propertiesContainer.append(propertyHtml);

                            

                        }
                        var totalProperties = response.totalProperties;
                        $('#property-available').text(totalProperties + ' Property Available');

                    }

                },
                error: function(xhr, error, status) {
                    console.log('Ajax Error:', error);
                }
            });
          } else if (segment == 'all-properties-rent') {

           // console.log(checkedValue + ',' + segment + ',' + selectedValue);

                $.ajax({
                    url: "{{route('search.rent.section')}}",
                    type: "POST",
                    data: {
                        checkedValue: checkedValue,
                        segment: segment,
                        selectedValue: selectedValue,
                        secondSegment: secondSegment,
                        minPrice: minPrice,
                        maxPrice: maxPrice,
                        "_token": "{{csrf_token()}}",
                    },

                    success:function(response) {
                        console.log(response);

                        if (response.status === 'success') {

                            if (response.results.length > 0) {

                                appendRent_sectionProperties(response.results, checkedValue);
                            } else {
                                var propertiesContainer = $('.properties-container');
                                propertiesContainer.empty();
                                var propertyHtml = '<div class="no-properties-found">';
                                propertyHtml += '<h1>Properties Not Found</h1>';
                                propertyHtml += '</div>';
                                propertiesContainer.append(propertyHtml);
                            }

                            var totalProperties = response.totalProperties;
                             $('#property-available').text(totalProperties + ' Property Available');
                        }
                    },

                    error:function(xhr, error, status) {
                        console.log('Ajax Error', error);
                    }
                });
          } else if (segment == 'commerical-properties') {

                // alert(checkedValue + ',' + segment + ',' + selectedValue);
                if (selectedValue === 'rent') {
                    if (secondSegment) {
                       var title = "Rental Commercial Properties in " + secondSegment;
                    } else {
                       var title = 'Explore Rental Commercial Properties';
                    }
                    var listingTag = "For Rent";
                } else if (selectedValue === 'buy') {
                    if (secondSegment) {
                      var title = "Commercial Properties For Sale in " + secondSegment;
                    } else {
                       var title = 'Explore Commercial Properties For Sale';
                    }
                   var listingTag = "For Sale";
                }

                $('#property-title').text(title);
                $('#listing-tag').text(listingTag);

                $.ajax({
                    url: "{{route('search.commerical.section')}}",
                    type: "POST",
                    data: {
                        checkedValue: checkedValue,
                        segment: segment,
                        selectedValue: selectedValue,
                        secondSegment: secondSegment,
                        minPrice: minPrice,
                        maxPrice: maxPrice,
                        "_token": "{{csrf_token()}}",
                    },

                    success:function(response) {
                        if (response.status === 'success') {

                            if (response.results.length > 0) {

                                append_commericalProperties(response.results, checkedValue);
                            } else {
                                var propertiesContainer = $('.properties-container');
                                propertiesContainer.empty();
                                var propertyHtml = '<div class="no-properties-found">';
                                propertyHtml += '<h1>Properties Not Found</h1>';
                                propertyHtml += '</div>';
                                propertiesContainer.append(propertyHtml);
                            }

                            var totalProperties = response.totalProperties;
                            $('#property-available').text(totalProperties + ' Property Available');

                        }
                    },

                    error:function(xhr, error, status) {
                        console.log('Ajax Error', error);
                    }
                });

          } else if (segment == 'plot-listing') {
                    //  alert(checkedValue + ',' + segment + ',' + selectedValue);

                    if (selectedValue === 'rent') {
                       var title = secondSegment ? "Find Your Perfect Plot Rental in " + secondSegment : 'Find Your Ideal Rental Plot';
                       var listingTag = "For Plot Rent";
                    } else if (selectedValue === 'buy') {
                       var title = secondSegment ? "Find Your Perfect Plot for Sale in " + secondSegment : 'Find Your Ideal Plot for Sale';
                       var listingTag = "For Sale Plot";
                    }

                    $('#property-title').text(title);
                    $('#listing-tag').text(listingTag);

                    $.ajax({

                        url: "{{route('search.plot.section')}}",
                        type: "POST",
                        data: {
                            checkedValue: checkedValue,
                            segment: segment,
                            selectedValue: selectedValue,
                            secondSegment: secondSegment,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                        },
                        success:function(response) {
                            console.log(response);
                            if (response.status === 'success') {

                                if (response.results.length > 0) {

                                    append_plotProperties(response.results, checkedValue);
                                } else {
                                    var propertiesContainer = $('.properties-container');
                                    propertiesContainer.empty();
                                    var propertyHtml = '<div class="no-properties-found">';
                                    propertyHtml += '<h1>Properties Not Found</h1>';
                                    propertyHtml += '</div>';
                                    propertiesContainer.append(propertyHtml);
                                }

                                var totalProperties = response.totalProperties;
                                $('#property-available').text(totalProperties + ' Property Available');

                            }
                        },
                        error:function(xhr, error, status) {
                            console.log('Ajax Error', error);
                        }
                    });
          } else if (segment == 'search') {

                    if(selectedValue === 'rent') {
                        var title = "Discover Your Ideal Rental Properties in " + updatesegment;
                        var listingTag = "For Rent";
                    } else if (selectedValue === 'buy') {

                        var title = "Explore Your Dream Sale Properties in " + updatesegment;
                        var listingTag = "For Sell";

                    }

                    $('#property-title').text(title);
                     $('#listing-tag').text(listingTag);

                $.ajax({
                        url: "{{route('search.index.filter')}}",
                        type: "POST",
                        data: {
                            checkedValue: checkedValue,
                            segment: segment,
                            selectedValue: selectedValue,
                            updatesegment: updatesegment,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                        },
                        success:function(response) {
                            console.log(response);
                            if (response.status === 'success') {

                                if (response.results.length > 0) {

                                    appendsearch_indexProperties(response.results, checkedValue);
                                } else {
                                    var propertiesContainer = $('.properties-container');
                                    propertiesContainer.empty();
                                    var propertyHtml = '<div class="no-properties-found">';
                                    propertyHtml += '<h1>Properties Not Found</h1>';
                                    propertyHtml += '</div>';
                                    propertiesContainer.append(propertyHtml);
                                }

                                var totalProperties = response.totalProperties;
                                $('#property-available').text(totalProperties + ' Property Available');

                            }

                        },
                        error:function(xhr, error, status) {
                            console.log('Ajax Error', error);
                        }
                });
          } else if(segment == 'rent-search') {

                   

                    if(selectedValue === 'rent') {
                        var title = "Discover Your Ideal Rental Properties in " + updatesegment;
                        var listingTag = "For Rent";
                    } else if (selectedValue === 'buy') {

                        var title = "Explore Your Dream Sale Properties in " + updatesegment;
                        var listingTag = "For Sell";

                    }

                    $('#property-title').text(title);
                     $('#listing-tag').text(listingTag);

                     $.ajax({
                        url: "{{route('search.rent.filter')}}",
                        type: "POST",
                        data: {
                            checkedValue: checkedValue,
                            segment: segment,
                            selectedValue: selectedValue,
                            updatesegment: updatesegment,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                        },

                        success:function(response) {
                            console.log(response);
                            if (response.status === 'success') {

                                if (response.results.length > 0) {

                                    appendsearch_rentProperties(response.results, checkedValue);
                                } else {
                                    var propertiesContainer = $('.properties-container');
                                    propertiesContainer.empty();
                                    var propertyHtml = '<div class="no-properties-found">';
                                    propertyHtml += '<h1>Properties Not Found</h1>';
                                    propertyHtml += '</div>';
                                    propertiesContainer.append(propertyHtml);
                                }

                                var totalProperties = response.totalProperties;
                                $('#property-available').text(totalProperties + ' Property Available');

                            }

                        },
                        error:function(xhr, error, status) {
                            console.log('Ajax Error', error);
                        }
                     });

          } else if (segment == 'commerical-search') {

                    if(selectedValue === 'rent') {
                        var title = "Discover Premier Rental Commercial Properties in " + updatesegment;
                        var listingTag = "For Rent";
                    } else if (selectedValue === 'buy') {

                        var title = "Explore Prime Sale Commercial Properties in " + updatesegment;
                        var listingTag = "For Sell";

                    }

                    $('#property-title').text(title);
                    $('#listing-tag').text(listingTag);


                    $.ajax({
                        url: "{{route('search.commerical.filter')}}",
                        type: "POST",
                        data: {
                            checkedValue: checkedValue,
                            segment: segment,
                            selectedValue: selectedValue,
                            updatesegment: updatesegment,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                        },
                        success:function(response) {
                           // console.log(response);
                            if (response.status === 'success') {

                                if (response.results.length > 0) {

                                    appendsearch_commericalProperties(response.results, checkedValue);
                                } else {
                                    var propertiesContainer = $('.properties-container');
                                    propertiesContainer.empty();
                                    var propertyHtml = '<div class="no-properties-found">';
                                    propertyHtml += '<h1>Properties Not Found</h1>';
                                    propertyHtml += '</div>';
                                    propertiesContainer.append(propertyHtml);
                                }

                                var totalProperties = response.totalProperties;
                                $('#property-available').text(totalProperties + ' Property Available');

                            }
                        },
                        error:function(xhr, error, status) {
                            console.log('Ajax Error', error);
                        }
                    });

          } else if(segment == 'plot-search') {

                    if(selectedValue === 'rent') {
                        var title = "Find Your Ideal Rental Property in " + updatesegment;
                        var listingTag = "For Rent";
                    } else if (selectedValue === 'buy') {

                        var title = "Discover Your Perfect Property in " + updatesegment;
                        var listingTag = "For Sell";

                    }

                    $('#property-title').text(title);
                    $('#listing-tag').text(listingTag);
                    //console.log(checkedValue, segment, selectedValue, updatesegment, minPrice, maxPrice);
                    $.ajax({

                        url:"{{route('search.plot.filter')}}",
                        type: "POST",
                        data:{
                            checkedValue: checkedValue,
                            segment: segment,
                            selectedValue: selectedValue,
                            updatesegment: updatesegment,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                        },
                        success:function(response) {
                            if (response.status === 'success') {

                                if (response.results.length > 0) {

                                    appendsearch_plotProperties(response.results, checkedValue);
                                } else {
                                    var propertiesContainer = $('.properties-container');
                                    propertiesContainer.empty();
                                    var propertyHtml = '<div class="no-properties-found">';
                                    propertyHtml += '<h1>Properties Not Found</h1>';
                                    propertyHtml += '</div>';
                                    propertiesContainer.append(propertyHtml);
                                }

                                var totalProperties = response.totalProperties;
                                $('#property-available').text(totalProperties + ' Property Available');

                            }
                        },
                        error:function(xhr, error, status) {
                            console.log('Ajax Error', error);
                        }
                    });

          }
        }

        function appendProperties(propertiesData, checkedValue) {
            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {
             


                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }


                }

                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);



                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                if (property.categories_type == 'plot') {
                    var propertyName = property.property_name.toLowerCase();
                    var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                    var propertyRoute = "{{ route('single.listing.plot', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                } else {
                    
                    if(property.looking_to === 'sell') {
    
                        var propertyName = property.property_name.toLowerCase();
                        var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                        var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                    }else{
                        var propertyName = property.property_name.toLowerCase();
                        var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                        var propertyRoute = "{{ route('single.listing.rent', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                    }
                }

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');

            });

        }


        function appendRent_sectionProperties(propertiesData, checkedValue) {
            console.log(propertiesData);
            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {
             


             function formatRent(rent) {
                 if (!isNaN(rent) && rent !== '') {
                     if (rent >= 10000000) {
                         return (rent / 10000000).toFixed(2) + ' Cr';
                     } else if (rent >= 100000) {
                         return (rent / 100000).toFixed(2) + ' Lac';
                     } else if (rent >= 1000) {
                         return (rent / 1000).toFixed(2) + 'k';
                     } else {
                         return rent.toLocaleString('en-IN', {
                             style: 'currency',
                             currency: 'INR'
                         });
                     }
                 } else {
                     return '';
                 }
             }

             function formatCost(cost) {

                 if (!isNaN(cost) && cost !== '') {
                     if (cost >= 10000000) {
                         return (cost / 10000000).toFixed(2) + ' Cr';
                     } else if (cost >= 100000) {
                         return (cost / 100000).toFixed(2) + ' Lac';
                     } else if (cost >= 1000) {
                         return (cost / 1000).toFixed(2) + 'k';
                     } else {
                         return cost.toLocaleString('en-IN', {
                             style: 'currency',
                             currency: 'INR'
                         });
                     }
                 } else {
                     return '';
                 }


             }

             function capitalizeFirstLetter(string) {
                 return string.replace(/\b\w/g, function(match) {
                     return match.toUpperCase();
                 });
             }

             project_society = capitalizeFirstLetter(property.project_society);
             locality = capitalizeFirstLetter(property.locality);
             city = capitalizeFirstLetter(property.city);



             if (property.looking_to === 'rent') {
                 var formattedRent = formatRent(property.rent);
             } else {
                 var formattedCost = formatCost(property.cost);
             }

             if (property.categories_type == 'plot') {
                 var propertyName = property.property_name.toLowerCase();
                 var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                 var propertyRoute = "{{ route('single.listing.plot', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
             } else {
                 
                 if(property.looking_to === 'sell') {
 
                     var propertyName = property.property_name.toLowerCase();
                     var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                     var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                 }else{
                     var propertyName = property.property_name.toLowerCase();
                     var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                     var propertyRoute = "{{ route('single.listing.rent', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                 }
             }

             var propertyHtml = '<div class="col-sm-6 col-lg-4">';
             propertyHtml += '<div class="listing-style1">';
             propertyHtml += '<div class="list-thumb" style="height: 300px;">';
             var images = property.images.split(',');
             propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
             propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
             propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
             propertyHtml += '</div>';
             propertyHtml += '<div class="list-content">';
             propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
             propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
             propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
             propertyHtml += '<hr class="mt-2 mb-2">';
             propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
             propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
             propertyHtml += '<div class="icons d-flex align-items-center"></div>';
             propertyHtml += '</div>';
             propertyHtml += '</div>';
             propertyHtml += '</div>';
             propertyHtml += '</div>';
             propertiesContainer.append(propertyHtml);
             $('.paginate-container').addClass('d-none');

         });
        }

        function append_commericalProperties(propertiesData, checkedValue) {

            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {

                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }

                }

                
                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);



                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                var propertyName = property.property_name.toLowerCase();
                var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                var propertyRoute = "{{ route('single.listing.commerical', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');
            });

        }

        function append_plotProperties(propertiesData, checkedValue) {

            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {
                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }

                }


                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);

                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                var propertyName = property.property_name.toLowerCase();
                var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                var propertyRoute = "{{ route('single.listing.plot', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');

            });

        }

        function appendsearch_indexProperties(propertiesData, checkedValue) {

            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {

                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }


                }

                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);

                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                if(property.looking_to === 'sell') {
    
                    var propertyName = property.property_name.toLowerCase();
                    var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                    var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                }else{
                    var propertyName = property.property_name.toLowerCase();
                    var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                    var propertyRoute = "{{ route('single.listing.rent', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                }

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');
            });

        }

        function appendsearch_rentProperties(propertiesData, checkedValue) {

            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property){


                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }


                }

                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);

                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }


                if(property.looking_to === 'sell') {
    
                    var propertyName = property.property_name.toLowerCase();
                    var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                    var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                }else{
                    var propertyName = property.property_name.toLowerCase();
                    var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                    var propertyRoute = "{{ route('single.listing.rent', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                }

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');

            });
        }

        function appendsearch_commericalProperties(propertiesData, checkedValue) {

            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {

                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }

                }


                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);



                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                var propertyName = property.property_name.toLowerCase();
                var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                var propertyRoute = "{{ route('single.listing.commerical', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');
            });
        }
        function appendsearch_plotProperties(propertiesData, checkedValue) {

            
            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();

            var selectedCategories = checkedValue;

            propertiesData.sort(function(a, b) {
                var aBelongsToSelectedCategories = selectedCategories.includes(a.categories_type);
                var bBelongsToSelectedCategories = selectedCategories.includes(b.categories_type);
                
                if (aBelongsToSelectedCategories && !bBelongsToSelectedCategories) {
                    return -1; 
                } else if (!aBelongsToSelectedCategories && bBelongsToSelectedCategories) {
                    return 1; 
                } else {
                    return 0; 
                }
            });

            propertiesData.forEach(function(property) {
                function formatRent(rent) {
                    if (!isNaN(rent) && rent !== '') {
                        if (rent >= 10000000) {
                            return (rent / 10000000).toFixed(2) + ' Cr';
                        } else if (rent >= 100000) {
                            return (rent / 100000).toFixed(2) + ' Lac';
                        } else if (rent >= 1000) {
                            return (rent / 1000).toFixed(2) + 'k';
                        } else {
                            return rent.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }
                }

                function formatCost(cost) {

                    if (!isNaN(cost) && cost !== '') {
                        if (cost >= 10000000) {
                            return (cost / 10000000).toFixed(2) + ' Cr';
                        } else if (cost >= 100000) {
                            return (cost / 100000).toFixed(2) + ' Lac';
                        } else if (cost >= 1000) {
                            return (cost / 1000).toFixed(2) + 'k';
                        } else {
                            return cost.toLocaleString('en-IN', {
                                style: 'currency',
                                currency: 'INR'
                            });
                        }
                    } else {
                        return '';
                    }

                }

                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);

                if (property.looking_to === 'rent') {
                    var formattedRent = formatRent(property.rent);
                } else {
                    var formattedCost = formatCost(property.cost);
                }

                var propertyName = property.property_name.toLowerCase();
                var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                var propertyRoute = "{{ route('single.listing.plot', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + (formattedRent ? formattedRent : formattedCost) + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.property_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
                propertyHtml += '<span class="for-what">For ' + property.looking_to + '</span>';
                propertyHtml += '<div class="icons d-flex align-items-center"></div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertyHtml += '</div>';
                propertiesContainer.append(propertyHtml);
                $('.paginate-container').addClass('d-none');

                
            });
        }

    });
</script>

