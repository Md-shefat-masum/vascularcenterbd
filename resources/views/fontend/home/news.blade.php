<section class="blog-section sec-padd2">
    <div class="container">
        <div class="section-title center">
            <h2>latest news</h2>
        </div>
        <div class="row">
            @foreach ($data as $item)
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
    </div>
</section>
