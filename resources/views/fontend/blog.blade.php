@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>"ICT Village",
        'title'=>"ICT Village :: Blog Information",
        'image'=>"/assets/img/favicon.png",
        ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'Blog',$page])
@section("contents")

    <div class="inner-banner text-center">
        <div class="container">
            <div class="box">
                <h3>Blogs</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li>Blogs</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>



    <section class="blog-section sec-padd">
        <div class="container">

            <div class="row">
                @foreach ($all_blog as $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="default-blog-news wow fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <figure class="img-holder">
                                <a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}"><img src="/{{ $item->image }}" alt="News"></a>
                                <figcaption class="overlay">
                                    <div class="box">
                                        <div class="content">
                                            <a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                            <div class="lower-content">
                                <div class="date">{{ $item->created_at->format('d') }} <br>{{ $item->created_at->format('F') }}</div>
                                <h4><a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}">{{ $item->title }}</a></h4>
                                <!-- <div class="post-meta">by fletcher | 14 Comments</div> -->
                                <div class="text">
                                    <p class="text-justify">
                                        {{ $item->short_description }} ...
                                    </p>
                                </div>
                                <div class="link">
                                    <a href="{{ route('frontend_item_blog_page',str_replace('/','',$item->slug)) }}" class="default_link">
                                        Read More
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $all_blog->links() }}

        </div>
    </section>

@endsection
