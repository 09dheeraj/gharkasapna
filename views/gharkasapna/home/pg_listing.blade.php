@extends('gharkasapna.layouts.app')
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

    .radio-element .form-check-input:checked {
    background-color: black;
    }


</style>

<section class="breadcumb-section bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-style1">
                    <h2 class="title" id="property-title">{{$pageTitle}}</h2>
                    <!-- <div class="breadcumb-list">
                        <a href="">Home</a>
                        <a href="">For Rent</a>
                    </div> -->
                    <a href="" class="filter-btn-left mobile-filter-btn d-block d-lg-none"><span class="flaticon-settings"></span> Filter</a>
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
                            <button type="button" class="open-btn mb15 dropdown-toggle" id="listing-tag" data-bs-toggle="dropdown">Gender<i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Listing Status</h6>
                                    <div class="radio-element">
                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" id="boys-pg" name="gender" value="boys">
                                            <label class="form-check-label" for="boys-pg" onclick="checkRadio('boys-pg')">Boys Only</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" name="gender" id="girls-pg" value="girls">
                                            <label class="form-check-label" for="girls-pg" onclick="checkRadio('girls-pg')">Girls Only</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Room Type <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Room Type</h6>
                                    <div class="checkbox-style1">
                                        <label class="custom_checkbox">Private Room
                                            <input type="checkbox" name="room_type[]" value="private room">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Double Sharing
                                            <input type="checkbox" name="room_type[]" value="double sharing">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">Triple Sharing
                                            <input type="checkbox" name="room_type[]" value="triple sharing">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="custom_checkbox">3+ Sharing
                                            <input type="checkbox" name="room_type[]" value="three plus sharing">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Price <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu dd3">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20 pr20">
                                    <h6 class="list-title">Price Range</h6>
                                    <!-- Range Slider Desktop Version -->
                                    <div class="range-slider-style1">
                                        <div class="range-wrapper">
                                            <span id="max-price-error" class="enter-price-min"></span>
                                            <span id="min-price-error" class="enter-price-max"></span>
                                            <div class="text-center">
                                                <input type="text" class="amount" id="min-price" placeholder="₹2K"><span class="fa-sharp fa-solid fa-minus mx-1 dark-color"></span>
                                                <input type="text" class="amount2" id="max-price" placeholder="₹50K">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item position-relative">
                            <button type="button" class="open-btn mb15 dropdown-toggle" data-bs-toggle="dropdown">Food Available <i class="fa fa-angle-down ms-2"></i></button>
                            <div class="dropdown-menu">
                                <div class="widget-wrapper bdrb1 pb25 mb0 pl20">
                                    <h6 class="list-title">Food Available</h6>
                                    <div class="radio-element">

                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" name="food" id="food-yes" value="yes">
                                            <label class="form-check-label" for="food-yes" onclick="checkRadio('food-yes')">Yes</label>
                                        </div>

                                        <div class="form-check d-flex align-items-center mb10">
                                            <input class="form-check-input" type="radio" name="food" id="food-no" value="no">
                                            <label class="form-check-label" for="food-no" onclick="checkRadio('food-no')">No</label>
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
        @if(!empty($propertiesData) && count($propertiesData) > 0)
        <div class="row properties-container">
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
                        <div class="list-price"><?php echo formatRent($property->rent); ?></div>
                    </div>
                    <div class="list-content">
                        <h6 class="list-title"><a href="{{route('single.pg.listing', ['name' => Str::slug($property->pg_name)])}}">{{ucfirst($property->pg_name)}}</a></h6>
                        <p class="list-text">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>

                        <hr class="mt-2 mb-2">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row paginate-container">
            <div class="mbp_pagination text-center">
                <ul class="page_navigation">
                    {{ $propertiesData->links() }}
                </ul>
                <p class="mt10 pagination_page_count text-center">{{ $propertiesData->firstItem() }} - {{ $propertiesData->lastItem() }} of {{ $propertiesData->total() }} Pg Available</p>
            </div>
        </div>
        @else
        <div class="no-properties-found">
            <h1>Properties Not Found</h1>
        </div>
        @endif

    </div>
</section>



@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#boys-pg').click(function() {
            $('#girls-pg').prop('checked', false);

        });

        $('#girls-pg').click(function() {
            $('#boys-pg').prop('checked', false);
        });

        $('#food-yes').click(function() {
            $('#food-no').prop('checked', false);
        });

        $('#food-no').click(function() {
            $('#food-yes').prop('checked', false);
        });

        function checkRadio(radioId) {
            document.getElementById(radioId).checked = true;
        }


    });
</script>

<script>
    $(document).ready(function() {
        var segment = "{{ request()->segment(1) }}";
        var selectedGender = null;
        var selectedFood = null;
        var secondsegment = "{{ request()->segment(2) }}";
        var decodeSegment = decodeURIComponent(secondsegment);
        var updatesegment = decodeSegment.replace(/-/g, ' ').replace(/,/g, '');
       // alert(updatesegment);

        $('input[type="radio"][name="gender"]').change(function() {
            selectedGender = $(this).val();
            logValues();
        });

        $('input[type="radio"][name="food"]').change(function() {
            selectedFood = $(this).val();
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
            } else if (parseInt(minPrice) < 2000) {
                $('#min-price-error').text('Should be at least 2000').show();
                return;
            } else {
                $('#min-price-error').hide('');
            }
            if (!(/^\d+$/.test(maxPrice))) {
                $('#max-price-error').text('Should be a valid number').show();
                return;
            } else if (parseInt(maxPrice) > 50000) {
                $('#max-price-error').text('Should not exceed 50,000').show();
                return;
            } else {
                $('#max-price-error').text('');
            }

            logValues();
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"][name="room_type[]"]');
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

            
            if(segment == 'pg-listing' || segment == 'paying-guests-search') {
                
                //console.log(minPrice, maxPrice, checkedValue, selectedFood, selectedGender);

                if (selectedGender === 'boys') {
                    var titlePrefix = "PG Listings for Boys ";
                    var listingTag = "For Boys";
                } else if (selectedGender === 'girls') {
                    var titlePrefix = "PG Listings for Girls ";
                    var listingTag = "For Girls";
                }

                var title = titlePrefix + (secondsegment ? "Residents in " + secondsegment : "Residents");

                $('#property-title').text(title);
                $('#listing-tag').text(listingTag);

                $.ajax({
                    url: "{{route('search.paying.guests.filter')}}",
                    type: "POST",
                    data: {
                            selectedGender: selectedGender,
                            checkedValue: checkedValue,
                            segment: segment,
                            secondsegment: secondsegment,
                            selectedFood: selectedFood,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                    },
                    success:function(response) {
                        //console.log(response);

                        if (response.status === 'success') {

                            if (response.results.length > 0) {

                                append_paying_properties(response.results);
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
                        console.log("Ajax Error:", error);
                    }
                });

            } else if (segment == 'paying-search') {

                    if (selectedGender === 'boys') {
                        var title = "PG Listings for Boys Residents in " + updatesegment;
                        var listingTag = "For Boys";
                    } else if (selectedGender === 'girls') {
                        var title = "PG Listings for Girls Residents in " + updatesegment;
                        var listingTag = "For Girls";
                    }

                    $('#property-title').text(title);
                    $('#listing-tag').text(listingTag);


                $.ajax({

                    url: "{{route('paying.guests.search.filter')}}",
                    type: "POST",
                    data: {
                            selectedGender: selectedGender,
                            checkedValue: checkedValue,
                            segment: segment,
                            updatesegment: updatesegment,
                            selectedFood: selectedFood,
                            minPrice: minPrice,
                            maxPrice: maxPrice,
                            "_token": "{{csrf_token()}}",
                    },

                    success:function(response) {
                        if (response.status === 'success') {

                            if (response.results.length > 0) {

                                append_paying_properties(response.results);
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

                        console.log("Ajax Error:", error);
                    },


                });
            }
        }

        function append_paying_properties(propertiesData) {
            console.log(propertiesData)
            var propertiesContainer = $('.properties-container');
            propertiesContainer.empty();


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


                function capitalizeFirstLetter(string) {
                    return string.replace(/\b\w/g, function(match) {
                        return match.toUpperCase();
                    });
                }

                project_society = capitalizeFirstLetter(property.project_society);
                locality = capitalizeFirstLetter(property.locality);
                city = capitalizeFirstLetter(property.city);

                var formattedRent = formatRent(property.rent);

                var propertyName = property.pg_name.toLowerCase();
                var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                var propertyRoute = "{{ route('single.pg.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);

                var propertyHtml = '<div class="col-sm-6 col-lg-4">';
                propertyHtml += '<div class="listing-style1">';
                propertyHtml += '<div class="list-thumb" style="height: 300px;">';
                var images = property.images.split(',');
                propertyHtml += '<img class="w-100" src="{{ asset('public/assets/property-images/')}}/' + images[0] + '" alt="">';
                propertyHtml += '<div class="list-tag fz12"><span class="flaticon-electricity me-2"></span>FEATURED</div>';
                propertyHtml += '<div class="list-price">₹' + formattedRent  + '</div>';
                propertyHtml += '</div>';
                propertyHtml += '<div class="list-content">';
                propertyHtml += '<h6 class="list-title"><a href="' + propertyRoute + '" target="_blanck">' + property.pg_name + '</a></h6>';
                propertyHtml += '<p class="list-text">' + project_society + ', ' + locality + ', ' + city + '</p>';
                propertyHtml += '<div class="list-meta d-flex align-items-center"></div>';
                propertyHtml += '<hr class="mt-2 mb-2">';
                propertyHtml += '<div class="list-meta2 d-flex justify-content-between align-items-center">';
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
