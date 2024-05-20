@extends('gharkasapna.layouts.innerpages_app')
@section('content')

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
<div class="row">
    <div class="col-xl-12">
        <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
            <div class="product_single_content">
                <div class="mbp_pagination_comments">
                    @if(!empty($ReviewsData) && count($ReviewsData) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="total_review d-block d-sm-flex align-items-center justify-content-between mb20">
                                <h6 class="fz17 mb15"><i class="fas fa-star fz12 pe-2"></i>{{ count($ReviewsData) }} reviews</h6>
                                <!-- <div class="page_control_shorting d-flex align-items-center justify-content-start justify-content-sm-end">
                                    <div class="pcs_dropdown mb15"><span>Sort by</span>
                                        <select class="selectpicker show-tick">
                                            <option>Newest</option>
                                            <option>Best Seller</option>
                                            <option>Best Match</option>
                                            <option>Price Low</option>
                                            <option>Price High</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        @foreach($ReviewsData as $data)

                        <div class="d-flex">
                            <span class="pending-style style{{ $data->status == 'pending' ? '1' : '2' }}">{{ucwords($data->status)}} </span>
                        </div>


                        <div class="col-md-12">
                            <div class="mbp_first position-relative d-block d-sm-flex align-items-center justify-content-start mb30-sm">
                                <img src="{{ asset('public/assets/profile-img/' . $data->userData->image) }}" class="mr-3 mb15-xs" alt="comments-2.png" style="height: 60px;">
                                <div class="ml20 ml0-xs">
                                    <h6 class="sp-lg-title"></h6>
                                    @if(isset($data->propertyData) && isset($data->propertyData->looking_to))
                                    @if($data->propertyData->looking_to == 'pg')
                                    <h6 class="mt-0 mb-0">{{ucwords($data->userData->name)}} posted a {{$data->review}}-star review of your property - {{$data->propertyData->pg_name}}</h6>
                                    @else
                                    <h6 class="mt-0 mb-0">{{ucwords($data->userData->name)}} posted a {{$data->review}}-star review of your property - {{$data->propertyData->property_name}}</h6>
                                    @endif
                                    @endif
                                    <div><span class="fz14">{{$data->created_at->format('F j, Y')}}</span>
                                        <div class="blog-single-review">
                                            <ul class="mb0 ps-0">
                                                @php $rating = $data->review; @endphp
                                                @for ($j = 1; $j <= 5; $j++) @if ($j <=$rating) <li class="list-inline-item me-0"><a href="#"><i class="fas fa-star review-color2 fz10"></i></a></li>
                                                    @else
                                                    <li class="list-inline-item me-0"><a href="#"><i class="far fa-star review-color2 fz10"></i></a></li>
                                                    @endif
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text mt20 mb20">{{ucwords($data->body)}}</p>

                            @php
                            $hasReplies = $reviewReply->where('review_id', $data->id)->isNotEmpty();
                            @endphp

                            <div class="review_cansel_btns d-flex bdrb1 pb30">
                                @if($hasReplies)
                                <div class="reply-section mt-3">
                                    <h6 class="fw-bold"><i class="fas fa-reply"></i>Reply</h6>
                                    <p><b>Response from the owner</b></p>
                                    @foreach($reviewReply as $reply)
                                    @if($reply->review_id == $data->id)
                                    <div class="reply">
                                        <p class="mb-0">{{ $reply->body }}</p>
                                        <p class="text-muted small">{{ $reply->created_at->format('F j, Y') }}</p>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                @endif
                            </div>



                        </div>
                        @endforeach

                        <div class="mbp_pagination text-center">
                            <ul class="page_navigation">
                                <li class="page-item">
                                    <a class="page-link" href="{{ $ReviewsData->previousPageUrl() }}"></a>
                                </li>

                                {{ $ReviewsData->links() }}

                                <li class="page-item">
                                    <a class="page-link" href="{{ $ReviewsData->nextPageUrl() }}"></a>
                                </li>
                            </ul>
                            <p class="mt10 pagination_page_count text-center">{{ $ReviewsData->firstItem() }} - {{ $ReviewsData->lastItem() }} of {{ $ReviewsData->total() }} Reviews available</p>
                        </div>


                    </div>
                    @else
                    <div class="no-properties-found">
                        <h1>Reviews Not Found</h1>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
</div>


@endsection