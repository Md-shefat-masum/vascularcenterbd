@php
    $page=[
        "seo"=>$blog->seo_keywords.', '. $blog->search_keywords,
        'description'=>$blog->seo_description,
        'title'=>$blog->title,
        'image'=>"/".$blog->image,
    ];
@endphp
@extends("fontend.layouts.fontend",['title'=>$blog->title,$page])
@section("contents")
    <div class="inner-banner text-center">
        <div class="container">
            <div class="box">
                <h3>Blog Single Post</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="blog-grid.html">Blog</a></li>
                            <li>Blog details</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>

    <div class="sidebar-page-container sec-padd-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <section class="blog-section">
                        <div class="large-blog-news single-blog-post single-blog wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="date">{{ $blog->created_at->format('d') }} <br> {{ $blog->created_at->format('M') }}</div>
                            <figure class="img-holder">
                                <img src="/{{ $blog->image }}" alt="News">
                            </figure>
                            <div class="lower-content">
                                <h4>{{ $blog->title }}</h4>
                                {{-- <div class="post-meta">by Stephen Villo  |  Consulting  |  18 Comments</div> --}}
                                <div class="text">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                        </div>

                        <div class="outer-box">

                            <div class="share-box clearfix">
                                <ul class="tag-box pull-left">
                                    <li>Tags:</li>
                                    @if(is_array(json_decode($blog->tag_name)))
                                        @foreach ( json_decode($blog->tag_name) as $key=>$tag_name )
                                            <li>
                                                <a href="/blog/?tag={{$tag_name}}">
                                                    {{ $tag_name }}
                                                    {{ $key+1 == count(json_decode($blog->tag_name)) ? '' : ':' }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="social-box pull-right">
                                <span>Share <i class="fa fa-share-alt"></i></span>
                                <ul class="list-inline social">
                                        <li><a target="_blank" href="https://www.facebook.com/sharer.php?u={{ url()->full() }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ url()->full() }}"><i class="fa fa-twitter"></i></a></li>
                                        {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>

                            <div class="product-review-tab">

                                <div class="inner-title">
                                    <h3>Comments</h3>
                                </div>
                                <div class="review-box d-none">

                                    @foreach ($blog->comments as $item)

                                        <div class="single-review-box">
                                            <div class="img-holder">
                                                <img src="/{{ $item->creator->photo }}" style="width: 75px;" alt="Awesome Image">
                                            </div>
                                            <div class="text-holder">
                                                <div class="top">
                                                    <div class="name pull-left">
                                                        <h4>{{ $item->creator->first_name.' '.$item->creator->last_name }} &minus; {{ $item->created_at->format('M d, Y:') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p>
                                                        {{ $item->comment }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End single review box-->
                                    @endforeach

                                </div>

                                <div class="add_your_review">
                                    <div class="inner-title">
                                        <h3>Add Your comments</h3>
                                    </div>

                                    <span>Your Rating</span>
                                    {{-- <ul class="rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <ul class="active rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <ul class="rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <ul class="rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                    <ul class="fix_border rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul> --}}

                                    <div class="default-form-area">
                                        <form id="contact-form" class="default-form" action="{{ route('store_blog_comment') }}" method="post">
                                            @csrf
                                            <div class="row clearfix">
                                                @if (Auth::check())

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="text" name="full_name" value="{{ Auth::user()->first_name.' '.Auth::user()->last_name }}" class="form-control" value="" placeholder="Your Name *" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control required email" value="" placeholder="Your Mail *" required="">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="text" name="full_name" value="" class="form-control" value="" placeholder="Your Name *" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" value="" class="form-control required email" value="" placeholder="Your Mail *" required="">
                                                        </div>
                                                    </div>

                                                @endif
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <textarea name="comment" class="form-control textarea required" placeholder="Your Comment...."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" value="{{ $blog->id }}" name='blog_id' id="blog_id" required>
                                                        <button class="thm-btn2" type="submit">send message</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div> <!-- End of .add_your_review -->
                            </div>

                        </div>

                    </section>



                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="blog-sidebar">
                        <div class="sidebar_search">
                            <form action="/blog">
                                <input type="text" name="key" placeholder="Search....">
                                <button class="tran3s color1_bg"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div><br><br> <!-- End of .sidebar_styleOne -->

                        <div class="category-style-one">
                            <div class="inner-title">
                                <h4>Categories</h4>
                            </div>
                            <ul class="list">
                                @foreach ($blog_categories as $item)
                                    <li><a href="{{ route('frontend_blog') }}?category={{ $item->id }}" class="clearfix"><span class="float_left"> {{ $item->name }} </span><span class="float_right">({{ $item->blogs_count }})</span></a></li>
                                @endforeach
                            </ul>
                        </div><br> <!-- End of .sidebar_categories -->

                        <div class="popular_news">
                            <div class="inner-title">
                                <h4>latest news</h4>
                            </div>

                            <div class="popular-post">
                                @foreach ($latest_blog as $item)
                                    <div class="item">
                                        <div class="post-thumb">
                                            <a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}">
                                                <img src="/{{ $item->image }}" alt="">
                                            </a>
                                        </div>
                                        <a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}">
                                            <h5>{{ $item->title }}</h5>
                                        </a>
                                        <div class="post-info">
                                            <i class="fa fa-calendar"></i>
                                            {{ $item->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>

                    </div> <!-- End of .wrapper -->
                </div>
            </div>
        </div>
    </div>
@endsection
