@extends('gharkasapna.layouts.app')
@section('content')

<!-- Blog Section Area -->
<section class="our-blog pt50">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="100ms">
            <div class="col-lg-12">
                <h2 class="blog-title">{{ucwords($pageTitle)}}</h2>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="blog-single-meta">
                    <div class="post-author d-sm-flex align-items-center">
                        <img class="mr10" src="{{ asset('public/assets/profile-img/' . $blogData->authorData->image) }}" alt=""><a class="pr15 bdrr1">{{ucwords($blogData->author_name)}}</a><a class="ml15 pr15 bdrr1">{{ucwords($blogData->category_name->name)}}</a><a class="ml15">{{$blogData->created_at->format('F j, Y')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto maxw1600 mt60 wow fadeInUp" data-wow-delay="300ms">
        <div class="row">
            <div class="col-lg-12">
                <div class="large-thumb"><img class="w-100" src="{{asset('uploads/images/' . $blogData->images)}}" alt=""></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="roww wow fadeInUp" data-wow-delay="500ms">
            <div class="col-xl-8 offset-xl-2">
                <div class="ui-content mt40 mb60">
                    <h4 class="mb10">1. {{ucwords($blogData->meta_title)}}</h4>
                    <p class="mb25 ff-heading">{{$blogData->blog_description }}</p>
                </div>
                <div class="blockquote-style1 mb60">
                    <blockquote class="blockquote">
                        <p class="fst-italic fz15 fw500 ff-heading">{{$blogData->short_description}}</p>
                        <h6 class="quote-title">Luis Pickford</h6>
                    </blockquote>
                </div>
                <div class="ui-content">
                    <h4 class="title">2. {{ucwords($blogData->tick_description)}}</h4>
                </div>
                <div class="row">
                    @if (!is_null($blogData->tick_label))
                    <?php $tick = explode(',', $blogData->tick_label); ?>
                    @foreach($tick as $tickdata)
                    <div class="col-auto">
                        <div class="ui-content">
                            <div class="list-style1">
                                <ul>
                                    <li><i class="far fa-check text-thm3 bgc-thm3-light"></i>{{ ucwords($tickdata) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @endif
                </div>
                <div class="col-lg-12 mt40">
                    <img src="{{asset('uploads/images/' . $blogData->other_image)}}" alt="" class="bdrs12 post-img-2 w-100">
                </div>

                <div class="mbp_pagination_tab bdrb1">
                    <div class="row justify-content-between pt45 pt30-sm pb45 pb30-sm">
                        <div class="col-md-6">
                            <div class="pag_prev">
                                @if ($previousBlog)
                                <a href="{{route('project.single.blog', ['name' => Str::slug($previousBlog->blog_name)])}}">
                                    <h6><span class="fas fa-chevron-left pe-2"></span> Previous Post</h6>
                                    <p class="fz13 text mb-0">{{ ucwords($previousBlog->blog_name) }}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pag_next">
                                @if ($nextBlog)
                                <a href="{{route('project.single.blog', ['name' => Str::slug($nextBlog->blog_name)])}}" class="text-end">
                                    <h6>Next Post<span class="fas fa-chevron-right ps-2"></span></h6>

                                    <p class="fz13 text mb-0">{{ ucwords($nextBlog->blog_name) }}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($blogcomment) && count($blogcomment) > 0)
                <div class="product_single_content mb50">
                    <div class="mbp_pagination_comments">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="total_review d-flex align-items-center justify-content-between mb20 mt60">
                                    <h6 class="fz17 mb15"><i class="fa-solid fa-comment"></i> {{ count($blogcomment) }} Comments</h6>
                                </div>
                            </div>
                            @php $commentCount = 0; @endphp
                            @foreach($blogcomment as $comment)
                            @php $commentCount++; @endphp
                            <div class="col-md-12" @if($commentCount> 2) style="display: none;" @endif>
                                <div class="mbp_first position-relative d-flex align-items-center justify-content-start mb30-sm">
                                    <img src="{{ asset('public/assets/profile-img/' . $comment->adminData->image) }}" class="mr-3" alt="comments-2.png" style="height: 60px;">
                                    <div class="ml20">
                                        <h6 class="mt-0 mb-0">{{ucwords($comment->adminData->name)}}</h6>
                                        <div><span class="fz14">{{$comment->created_at->format('F j, Y')}}</span></div>
                                    </div>
                                </div>
                                <p class="text mt20 mb20">{{ucwords($comment->comments)}}</p>
                            </div>
                            @endforeach
                            <div class="col-md-12">
                                <div class="position-relative bdrb1 pt30 pb20">
                                    <a href="javascript:void(0);" class="ud-btn btn-white2 show-all-comments">Show all Comments<i class="fal fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @php
                $userCommented = $blogcomment->contains('reg_id', session()->get('id'));
                @endphp
                @if(session()->has('id') && !$userCommented)

                <div class="bsp_reveiw_wrt">
                    <h6 class="fz17">Leave A Comment</h6>
                    <form class="comments_form mt30" action="{{route('manage.home.blog.comment')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="fw600 ff-heading mb-2">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Title" value="{{session()->get('name')}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="fw600 ff-heading mb-2">Comment</label>
                                    <textarea class="pt15" rows="6" placeholder="Write a Review" name="comment" required></textarea>
                                    <input type="hidden" name="blog_id" value="{{$blogData->id}}">
                                </div>
                                <button type="submit" class="ud-btn btn-white2">Submit Comment<i class="fal fa-arrow-right-long"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                @endif
            </div>
        </div>
    </div>
</section>

<!-- Explore Apartment -->
@if(!empty($relatedposts) && count($relatedposts) > 0)
<section class="pb90 pb20-md pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="00ms">
                <div class="main-title text-start text-md-center">
                    <h2 class="title">Related Posts</h2>
                    <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">

            @foreach($relatedposts as $post)
            <div class="col-sm-6 col-lg-4">
                <div class="blog-style1">
                    <div class="blog-img"><img class="w-100" src="{{asset('uploads/images/' . $post->images)}}" alt=""></div>
                    <div class="blog-content">
                        <div class="date">
                            <span class="month">{{ $post->created_at->format('F') }}</span>
                            <span class="day">{{ $post->created_at->format('d') }}</span>
                        </div>
                        <a class="tag" href="">{{ucwords($post->category_name->name)}}</a>
                        <h6 class="title mt-1"><a href="{{route('project.single.blog', ['name' => Str::slug($post->blog_name)])}}">{{ucwords($post->blog_name)}}</a></h6>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif



@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.show-all-comments').click(function() {
            $('.col-md-12').show();
            $('.show-all-comments').hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
        function removeAlerts() {
            $('.alert').delay(3000).fadeOut('slow', function() {
                $(this).remove();
            });
        }
        removeAlerts();
    });
</script>