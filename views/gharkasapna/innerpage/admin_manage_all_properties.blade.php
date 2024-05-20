@extends('gharkasapna.layouts.innerpages_app')
@section('content')

@php

function formatRent($rent)
{
if (!is_numeric($rent)) {
return 'N/A'; // or any other appropriate value
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
return 'N/A'; // or any other appropriate value
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
    .under-review {
        font-weight: 800;
        padding-top: 10px;
        color: #f1416c;
    }
</style>




<div class="row align-items-center pb40">
    <div class="col-xxl-3">
        <div class="dashboard_title_area">
            <h2>{{$pagetitle}}</h2>
            <p class="text">We are glad to see you again!</p>
        </div>

        <div class="col-lg-12 success-mesg" style="display: none;">
            <div class="ui-content">
                <div class="message-alart-style1">
                    <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
                        <span id="status-success"></span>
                        <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-xxl-9">
        <div class="dashboard_search_meta d-md-flex align-items-center justify-content-xxl-end">
            <div class="item1 mb15-sm">
                <div class="search_area">
                    <input type="text" id="searchInput" name="search" class="form-control bdrs12" placeholder="Search properties">
                    <label><span class="flaticon-search"></span></label>
                </div>
                <span class="text-danger" id="errormesg"></span>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="packages_table table-responsive">
                <table class="table-style3 table at-savesearch">
                    <thead class="t-head">
                        <tr>
                            <th scope="col">Listing title</th>
                            <th scope="col">Status</th>
                            <th scope="col">View</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody class="t-body" id="propertyTableBody">
                        @foreach($properties as $property)
                        <tr>
                            <th scope="row">
                                <div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0">
                                    <div class="list-thumb">
                                        <?php $image = explode(',', $property->images); ?>
                                        @foreach($image as $img)
                                        <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                                        @break
                                        @endforeach
                                    </div>
                                    <div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4">
                                        <?php if ($property->looking_to == 'pg') { ?>
                                            <div class="h6 list-title"><a href="#">{{ucfirst($property->pg_name)}}</a></div>
                                        <?php } else { ?>
                                            @php $propertyName = substr($property->property_name, 0, strrpos($property->property_name, ' ')); @endphp
                                            <div class="h6 list-title"><a href="#">{{ucfirst($propertyName)}}</a></div>
                                        <?php } ?>
                                        <p class="list-text mb-0">{{ ucwords($property['project_society']) }}, {{ ucwords($property['locality']) }}, {{ ucwords($property['city']) }}</p>
                                        <?php if ($property['looking_to'] == 'rent') {  ?>
                                            <div class="list-price"><a href=""><?php echo formatRent($property->rent); ?>/<span>mo</span></a></div>
                                        <?php } elseif ($property['looking_to'] == 'pg') { ?>
                                            <div class="list-price"><a href=""><?php echo formatRent($property->rent); ?>/<span>mo</span></a></div>
                                        <?php } else { ?>
                                            <div class="list-price"><a href=""><?php echo formatCost($property->cost); ?></a></div>
                                        <?php } ?>

                                        @if($property->status == 'Processing')
                                        <div class="">
                                            <div class="under-review"><a>These Property is Under Review</a></div>
                                        </div>
                                        @endif


                                    </div>
                                </div>
                            </th>

                            <?php $count = '';
                            if ($property->status == 'Pending') {
                                $count = '1';
                            } elseif ($property->status == 'Published') {
                                $count = '2';
                            } elseif ($property->status == 'Processing') {
                                $count = '3';
                            } ?>
                            <td class="vam">
                                <span class="pending-style style{{$count}}">{{$property->status}}</span>
                            </td>

                            <?php
                            $dateString = $property->created_at;
                            $dateTime = new DateTime($dateString);
                            $formattedDate = $dateTime->format('M d,Y');
                            ?>


                            <td class="vam">{{$formattedDate}}</td>

                            <td class="vam">
                                <div class="d-flex">

                                    <a href="{{route('edit', ['id' => Str::slug($property->id)])}}" target="_blank" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a>
                                    <a class="icon delete-property" data-id="{{$property->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a>
                                    <a class="icon" data-bs-toggle="modal" data-bs-toggle="top" title="Manage Status" data-bs-target="#statusModal{{$property->id}}" data-id="{{$property->id}}" data-status="{{$property->status}}">Change Status</a>

                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="statusModal{{$property->id}}" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                            <div class="modal-dialog centered">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <label class="text-color-black fw600 mb10">Mange Status</label>
                                        <div class="location-area">
                                            <select id="statusSelect" class="selectpicker" name="mange_status" required>
                                                <option selected disabled>Select an option</option>
                                                <option value="Pending" {{ $property->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Published" {{ $property->status == 'Published' ? 'selected' : '' }}>Published</option>
                                                <option value="Processing" {{ $property->status == 'Processing' ? 'selected' : '' }}>Processing</option>>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="ud-btn btn-dark btn-block custom-add-btn w-100" id="submitstatus">submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

                <div class="mbp_pagination text-center mt30">
                    {{ $properties->links() }}

                    <!-- Display page count information -->
                    <p class="mt10 pagination_page_count text-center">
                        {{ $properties->firstItem() }} – {{ $properties->lastItem() }} of {{ $properties->total() }}+ property available
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script>
    $(document).ready(function() {
        $(document).on('show.bs.modal', '[id^=statusModal]', function(event) {
            const button = $(event.relatedTarget);
            const propertyId = button.data('id');
            var status = button.data('status');
            var modal = $(this);
            modal.find('#statusSelect').val(status);
            modal.find('#submitstatus').data('propertyId', propertyId);
        });

        $(document).on('click', '#submitstatus', function(e) {
            e.preventDefault();

            const propertyId = $(this).data('propertyId');
            const selectedValue = $(this).closest('.modal').find('#statusSelect').val();
            var modal = $(this).closest('.modal');
            modal.modal('hide');
            $.ajax({
                url: "{{ route('manage.status') }}",
                method: 'POST',
                data: {
                    propertyId: propertyId,
                    selectedValue: selectedValue,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    var status = response.status;
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status changed successfully!',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(function() {

                        location.reload();
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });

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
</script>

<script>
    $(document).ready(function() {


        $('#searchInput').keyup(function() {

            var search = $('#searchInput').val();

            $.ajax({
                type: 'POST',
                url: " {{ route('search.admin.properties')}} ",
                data: {
                    search: search,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {

                    if (response) {


                        var properties = response;

                        var tbody = $('#propertyTableBody');
                        tbody.empty();

                        properties.forEach(function(property) {

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

                            if (property.looking_to === 'rent') {
                                var formattedRent = formatRent(property.rent);
                                var month = '<span>mo</span>';
                            } else if (property.looking_to === 'pg') {
                                var formattedRent = formatRent(property.rent);
                                var month = '<span>mo</span>';
                            } else {
                                var formattedCost = formatCost(property.cost);
                                var month = '';
                            }

                            if (property.looking_to == 'pg') {

                                var propertyName = property.pg_name;
                            } else {
                                var propertyName = property.property_name;
                            }

                            var count = '';
                            if (property.status == 'Pending') {
                                count = '1';
                            } else if (property.status == 'Published') {
                                count = '2';
                            } else if (property.status == 'Processing') {
                                count = '3';
                            }

                            var EditRoute = "{{ route('edit', ['id' => ':id']) }}".replace(':id', property.id);


                            var row = $('<tr></tr>');
                            row.append('<th scope="row"><div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0"><div class="list-thumb"><?php $image = explode(",", $property->images); ?><img class="w-100" src="{{asset('public/assets/property-images/')}}/' + property.images.split(',')[0] + ' " alt=""></div><div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4"><div class="h6 list-title"><a href="#">' + propertyName + '</a></div><p class="list-text mb-0">' + property.project_society + ', ' + property.locality + ', ' + property.city + '</p><div class="list-price"><a href="">₹' + (formattedRent ? formattedRent : formattedCost) + '/' + month + '</a></div></div></div></th><td class="vam"><span class="pending-style style' + count + '">' + property.status + '</span></td><td class="vam">{{$formattedDate}}</td> <td class="vam"><div class="d-flex"><a href='+ EditRoute +' target="_blanck" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a><a  class="icon delete-property" data-id="' + property.id + '"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" aria-label="Delete"><span class="flaticon-bin"></span></a><a class="icon" data-bs-toggle="modal" data-bs-toggle="top" title="Manage Status" data-bs-target="#statusModal' + property.id + '" data-id="' + property.id + '" data-status="' + property.status + '">Change Status</a></div></td>')
                            tbody.append(row);

                        });

                    } else {

                        $('#errormesg').text('properties not found !');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Ajax Error:', error);
                }
            });
        });
    });
</script>

@endsection