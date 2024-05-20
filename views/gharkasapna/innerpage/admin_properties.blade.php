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

    .under-review {
        font-weight: 800;
        padding-top: 10px;
        color: #f1416c;
    }
</style>



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



<div class="row align-items-center pb40">
    <div class="col-xxl-3">
        <div class="dashboard_title_area">
            <h2>{{$pageTitle}}</h2>
            <p class="text">We are glad to see you again!</p>
        </div>
    </div>

    <div class="col-xxl-9">
        <div class="dashboard_search_meta d-md-flex align-items-center justify-content-xxl-end">
            <div class="item1 mb15-sm">
                <div class="search_area">
                    <input type="text" class="form-control bdrs12" placeholder="Search">
                    <label><span class="flaticon-search"></span></label>
                </div>
            </div>
            <!-- <div class="page_control_shorting bdr1 bdrs12 py-2 ps-3 pe-2 mx-1 mx-xxl-3 bgc-white mb15-sm maxw140">
                <div class="pcs_dropdown d-flex align-items-center"><span class="title-color">Sort by:</span>
                    <select class="selectpicker show-tick"> 
                        <option>New</option>
                        <option>Best Seller</option>
                        <option>Best Match</option>
                        <option>Price Low</option>
                        <option>Price High</option>
                    </select>
                </div>
            </div> -->
            <a href="{{route('post.property')}}" class="ud-btn btn-thm">Add New Property<i class="fal fa-arrow-right-long"></i></a>
        </div>
    </div>
</div>

@if(!empty($propertiesData) && count($propertiesData) > 0)
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="packages_table table-responsive">
                <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                        <tr>
                            <th scope="col">Listing title</th>
                            <th scope="col">Date Published</th>
                            <th scope="col">Status</th>
                            <th scope="col">View</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="t-body">

                        @foreach($propertiesData as $property)
                        <tr>
                            <th scope="row">
                                <div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0">
                                    <div class="list-thumb">
                                        @if(!empty($property->images))
                                        @php $image = explode(',', $property->images); @endphp
                                        @foreach($image as $img)
                                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                                        @break
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4">

                                        @if($property->looking_to == 'pg')
                                        <div class="h6 list-title"><a href="{{route('paying_living.details', ['name' => Str::slug($property->pg_name)])}}">{{ucwords($property->pg_name)}}</a></div>
                                        @else
                                        <div class="h6 list-title"><a href="{{route('admin.single.list', ['name' => Str::slug($property->property_name)])}}"> {{ ucwords(implode(' ', array_slice(explode(' ', $property->property_name), 0, 5))) }}</a></div>
                                        @endif
                                        <p class="list-text mb-0">{{ ucwords($property->project_society) }}, {{ ucwords($property->locality) }}, {{ ucwords($property->city) }}</p>
                                        @if($property->looking_to == 'pg' || $property->looking_to == 'rent')
                                        <div class="list-price"><a href="">{{formatRent($property->rent)}}/<span>mo</span></a></div>
                                        @else
                                        <div class="list-price"><a>{{formatCost($property->cost)}}</a></div>
                                        @endif

                                        @if($property->status == 'Processing')
                                        <div class="">
                                            <div class="under-review"><a>Your Property is Under Review</a></div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </th>

                            @php
                            $dateString = $property->created_at;
                            $dateTime = new DateTime($dateString);
                            $formattedDate = $dateTime->format('M d,Y');
                            @endphp

                            <td class="vam">{{$formattedDate}}</td>
                            <td class="vam"><span class="pending-style style{{ $property->status == 'Pending' ? 1 : ( $property->status == 'Published' ? 2 : 3 )}}">{{$property->status}}</span></td>
                            <td class="vam">{{$formattedDate}}</td>
                            <td class="vam">
                                <div class="d-flex">
                                    <a href="{{route('edit', ['id' => Str::slug($property->id)])}}" target="_blank" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a>
                                    <a class="icon delete-property" data-id="{{$property->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <div class="mbp_pagination text-center">
                    <ul class="page_navigation">

                        {{ $propertiesData->links() }}

                    </ul>
                    <p class="mt10 pagination_page_count text-center">{{ $propertiesData->firstItem() }} - {{ $propertiesData->lastItem() }} of {{ $propertiesData->total() }} property available</p>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://beacon.madeofeffort.de/js/components/dark-light-mode.js"></script>
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
        $(document).on('click', '.delete-property', function() {
            var row = $(this).closest('tr');
            var propertyID = $(this).data('id');
            Swal.fire({
                title: 'Confirm Deletion',
                text: "Are you sure you want to delete this property ? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('admin.delete_property')}}",
                        type: "POST",
                        data: {
                            propertyID: propertyID,
                            "_token": "{{csrf_token()}}"
                        },

                        success: function(response) {

                            if (response.success) {

                                row.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your property has been deleted.',
                                    'success'
                                );

                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error:", error);
                        }
                    });
                }
            })
        });
    });
</script>