@extends('gharkasapna.layouts.innerpages_app')
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

<div class="row align-items-center pb40">
    <div class="col-xxl-3">
        <div class="dashboard_title_area">
            <h2>My Properties</h2>
            <p class="text">We are glad to see you again!</p>
        </div>
    </div>
    <div class="col-xxl-9">
        <div class="dashboard_search_meta d-md-flex align-items-center justify-content-xxl-end">
            <div class="item1 mb15-sm">
                <div class="search_area">
                    <input type="text" id="searchInput" name="search" class="form-control bdrs12" placeholder="Search">
                    <label><span class="flaticon-search"></span></label>
                </div>
            </div>

            <a href="{{route('post.property')}}" class="ud-btn btn-thm">Add New Property<i class="fal fa-arrow-right-long"></i></a>

        </div>
    </div>

</div>

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

    </div>
@if(!empty($property) && count($property) > 0)
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


                    <tbody class="t-body" id="myproperties">
                        <?php foreach ($property as $data) : ?>

                            <tr>
                                <th scope="row">
                                    <div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0">
                                        <div class="list-thumb">
                                            <?php $image = explode(',', $data['images']); ?>
                                            @foreach($image as $img)

                                            <img class="w-100" src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                                            @break
                                            @endforeach
                                        </div>

                                        <div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4">
                                            <?php if($data->looking_to == 'pg'){ ?>
                                                <div class="h6 list-title"><a target="_blank" href="{{route('paying_living.details', ['name' => Str::slug($data->pg_name)])}}"><?php echo ucfirst($data->pg_name); ?></a></div>

                                                <?php }else{ ?>
                                                @php $propertyName = substr($data->property_name, 0, strrpos($data->property_name, ' ')); @endphp
                                            <div class="h6 list-title"><a target="_blank" href="{{route('properties.details', ['name' => Str::slug($data->property_name)])}}"><?php echo ucfirst($propertyName); ?></a></div>

                                            <?php } ?>

                                            <p class="list-text mb-0"> {{ ucwords($data['project_society']) }}, {{ ucwords($data['locality']) }}, {{ ucwords($data['city']) }}</p>

                                            <?php if ($data['looking_to'] == 'rent') {  ?>
                                                <div class="list-price"><a href=""><?php echo formatRent($data->rent); ?>/<span>mo</span></a></div>
                                            <?php } elseif($data['looking_to'] == 'pg') { ?>
                                                <div class="list-price"><a href=""><?php echo formatRent($data->rent); ?>/<span>mo</span></a></div>
                                            <?php }else{ ?>
                                                <div class="list-price"><a href=""><?php echo formatCost($data->cost); ?></a></div>
                                            <?php } ?>
                                            @if($data->status == 'Processing')
                                            <div class="">
                                                <div class="under-review"><a>Your Property is Under Review</a></div>
                                            </div>
                                            @endif
                                        </div>                  
                                    </div>
                                </th>

                                <?php
                                $dateString = $data->created_at;
                                $dateTime = new DateTime($dateString);
                                $formattedDate = $dateTime->format('M d,Y');
                                ?>

                                <td class="vam">{{$formattedDate}}</td>
                                <?php $count = '';
                                if ($data->status == 'Pending') {
                                    $count = '1';
                                } elseif ($data->status == 'Published') {
                                    $count = '2';
                                } elseif ($data->status == 'Processing') {
                                    $count = '3';
                                } ?>

                                <td class="vam"><span class="pending-style style{{$count}}">{{$data->status}}</span></td>

                                <td class="vam">{{$formattedDate}}</td>
                                <td class="vam">
                                    <div class="d-flex">
                                        <a href="{{route('edit', ['id' => Str::slug($data->id)])}}" target="_blank" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a>
                                        <a class="icon delete-property" data-id="{{$data->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="mbp_pagination text-center">
                    <ul class="page_navigation">
                        {{ $property->links() }}
                    </ul>
                    <p class="mt10 pagination_page_count text-center">{{ $property->firstItem() }} - {{ $property->lastItem() }} of {{ $property->total() }} property available</p>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchInput').keyup(function() {

            var search = $('#searchInput').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('searchproperties.vendor') }}",
                data: {
                    search: search,
                    "_token": "{{ csrf_token()}}",
                },

                success: function(response) {
                    console.log(response);
                    if (response.propertiesData) {

                        var properties = response.propertiesData.data;
                        var tbody = $('#myproperties');
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
                            } else {
                                var formattedCost = formatCost(property.cost);
                            }

                            var count = '';
                            if (property.status == 'Pending') {
                                count = '1';
                            } else if (property.status == 'Published') {
                                count = '2';
                            } else if (property.status == 'Processing') {
                                count = '3';
                            }


                            var propertyName = property.property_name.toLowerCase();
                            var encodedPropertyName = encodeURIComponent(propertyName).replace(/%20/g, '-');
                            var propertyRoute = "{{ route('single.listing', ['name' => ':name']) }}".replace(':name', encodedPropertyName);
                            var EditRoute = "{{ route('edit', ['id' => ':id']) }}".replace(':id', property.id);

                            var row = $('<tr></tr>');
                            <?php if (!empty($data)) { ?>
                            row.append('<th scope="row"><div class="listing-style1 dashboard-style d-xxl-flex align-items-center mb-0"><div class="list-thumb"><?php $image = explode(',', $data['images']); ?><img class="w-100" src="{{ asset('public/assets/property-images/') }}/'+property.images.split(',')[0] + '" alt=""></div><div class="list-content py-0 p-0 mt-2 mt-xxl-0 ps-xxl-4"><div class="h6 list-title"><a href=' + propertyRoute + '>' + property.property_name + '</a></div><p class="list-text mb-0">' + property.project_society + ', ' + property.locality + ', ' + property.city + '</p><div class="list-price"><a href=""> ₹' + (formattedRent ? formattedRent : formattedCost) + '/<span>mo</span></a></div></div></div></th> <td class="vam">{{$formattedDate}}</td><td class="vam"><span class="pending-style style' + count + '">' + property.status + '</span></td><td class="vam">{{$formattedDate}}</td>    <td class="vam"><div class="d-flex"><a href=' + EditRoute + ' target="_blank" class="icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-pen fa"></span></a><a href="" class="icon delete-property" data-id="' + property.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="flaticon-bin"></span></a></div></td>');
                            <?php } ?>
                            tbody.append(row);
                        });

                    } else {

                        $('#errormesg').text('properties not found !');
                    }

                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
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
            });
        })
    });
</script>

@endsection