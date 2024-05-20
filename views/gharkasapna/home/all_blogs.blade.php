@extends('gharkasapna.layouts.app')
@section('content')

<!-- UI Elements Sections -->
<section class="breadcumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-style1">
                    <h2 class="title">{{ucwords($pageTitle)}}</h2>
                    <div class="breadcumb-list">
                        <!-- <a href="">Home</a>
                        <a href="">For Rent</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section Area -->
<section class="our-blog pt-0">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
            <div class="col-lg-8">

                @foreach($blogDATA as $data)
                <div class="blog-style1 list-style bgc-white d-block d-md-flex align-items-xl-center">
                    <div class="blog-img flex-shrink-0">
                        <img class="w-100" src="{{ asset('uploads/images/'.$data->images) }}" alt="" style="height: 200px;">
                        <div class="date">
                            <span class="month">{{ $data->created_at->format('F') }}</span>
                            <span class="day">{{ $data->created_at->format('d') }}</span>
                        </div>
                    </div>
                    <div class="blog-content pl30 pb20 flex-grow-1">
                        <a class="tag">{{ucwords($data->category_name->name)}}</a>
                        <h4 class="title mt-1 mb20"><a target="_blank" href="{{route('project.single.blog', ['name' => Str::slug($data->blog_name)])}}">{{ucwords($data->blog_name)}}</a></h4>
                        <p class="text mb0">{{ ucwords(implode(' ', array_slice(str_word_count($data->blog_description, 1), 0, 20))) }} ...</p>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="mbp_pagination text-center mt30">
                        {{ $blogDATA->links() }}

                        <!-- Display page count information -->
                        <p class="mt10 pagination_page_count text-center">
                            {{ $blogDATA->firstItem() }} – {{ $blogDATA->lastItem() }} of {{ $blogDATA->total() }}+ Blogs available
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <div class="sidebar-widget mb30">
                        <h6 class="widget-title">Latest Posts</h6>
                        @foreach($latestPosts as $post)
                        <div class="list-news-style d-flex align-items-center mt20 mb20">
                            <div class="news-img flex-shrink-0"><img src="{{ asset('uploads/images/'. $post->images) }}" alt="" style="height: 60px;">
                            </div>
                            <div class="news-content flex-shrink-1 ms-3">
                                <p class="new-text mb0 fz14">{{ $post->blog_name }}</p>
                                <a class="body-light-color" href="#">{{ $post->created_at->format('j M Y') }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection