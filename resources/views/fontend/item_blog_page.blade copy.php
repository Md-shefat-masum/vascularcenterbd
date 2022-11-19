@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>"ICT Village",
        'title'=>"ICT Village :: Seminar Information",
        'image'=>"/assets/img/favicon.png",
        ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'Blog Page',$page])
@section("content")
<section id='blog_page_section_one'>
    <div class="container">
        <h2 class="text-center p-1">Blog</h2>
        <div class='row'>
            <div class="col-md-8 pb-3 blog_left_side">
                <h3>{{$blog->title}}</h3>
                @php
                    $date=$blog->getFormatedDateAttribute();
                   
                @endphp
                <div class="row blog_publish pl-2">
                    <div class='publish'><i class="icofont-chart-radar-graph"></i> {{$blog->category->name}}</div>
                    <div class='publish'><i class='far fa-clock'></i> {{ $date['date'] }}</div>
                    <div class='publish'><i class="fas fa-eye"></i> {{ $blog->view }} ব্লগ ভিউ</div>
                </div>
                <div class="row blog_img w-100">
                    <img class='w-100' src="/{{ $blog->image }}" alt="blog"/>
                </div>
                <div class="row blog_content pt-4 text-justify">
                    {!! $blog->description !!}
                </div>
                <div class="row blog_share">
                    <div>Share with:</div> 
                    <a href="https://www.facebook.com/sharer.php?u={{  Request::url() }}" class='share_type'><i class="fab fa-facebook"></i>Facebook</a>
                    <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" class='share_type'><i class="fab fa-twitter"></i>Twitter</a>
                    <a href="https://api.whatsapp.com/send?text={{ Request::url() }}" class='share_type'><i class="fab fa-whatsapp"></i>WhatsApp</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ Request::url() }}" class='share_type'><i class="fab fa-linkedin"></i>Telegram</a>
                </div>
                {{-- <div class="row blog_comments">
                    <h5>Comments</h5>
                    @php
                        $list=['Karm',"Rahim", "Jahir"];
                        $user=['user1.jpg','user2.jpg','user3.jpg'];
                    @endphp
                    @for ($i=0; $i<3; $i++)
                        <div class="media w-100 p-2">
                            <img src="{{URL::asset('assets/img/')}}/{{$user[$i]}}" alt="{{$list[$i]}}" class="mr-3 rounded-circle" style="width:40px;">
                            <div class="media-body">
                            <h6>{{$list[$i]}} <small>12 January, 2022 12.20am</small></h6>
                            <p>
                                This blog is a very applicable. Thank you vary much.
                            </p>
                            </div>
                        </div>
                    @endfor
                </div> --}}
                <div class="row blog_post_comments pt-3">
                    <h5>Blog Comments</h5>
                    
                    <div class="form_div">
                        <form action="{{ route('store_blog_comment') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea type="text" class="form-control text_area" placeholder="Blog comment...." name='comment' id="comment" rows='4' required></textarea>
                            </div>
                            <div class="form-group d-none">
                                <input type="text" class="form-control" value="1"  name='blog_id' id="blog_id" required>
                            </div>
                            <button type="submit" class="btn btn-success">Comment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-3 blog_right_side">
                <div class="row align-items-start pr-2">
                    {{-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search.." aria-label="Search.." aria-describedby="btnGroupAddon">
                        <div class="input-group-append">
                            <div class="input-group-text" id="btnGroupAddon"><a href="/blog" class="pl-2 pr-2"><i class="fas fa-search"></i></a></div>
                        </div>
                    </div> --}}
                    <div class="recent_post mt-3">
                        <h6>সাম্প্রতিক ব্লগ</h6>
                        @foreach ($recent_post as $post)
                            @php
                                $date=$blog->getFormatedDateAttribute();
                            @endphp
                            <div class="pt-2">
                                <div class="d-flex blog_div_side p-2">
                                    <div class="w-50 title_div">                                            
                                        <a href="/item-blog-page{{$post->slug}}"> {{$post->title}} </a>
                                        <br/>
                                        <small>{{$date['date']}}</small>                                             
                                    </div>
                                    <div class="w-50 img_div">
                                        <img class="w-100" src="/{{$post->image}}" alt="blog" />
                                    </div>
                                </div>
                            </div>     
                        @endforeach  
                    </div>
                    <div class='tag mt-3 p-2'><h5 class="">Tags</h5>
                        @if(is_array(json_decode($blog->tag_name)))
                            @foreach ( json_decode($blog->tag_name) as $tag_name )
                                <a href="/blog/?search={{$tag_name}}" class="tag_link" style="" aria-label="আউটসোর্সিং (1 item)">{{ $tag_name }}</a>
                            @endforeach
                        @endif
                    </div>
                    {{-- <div class='category mt-3 p-2'>
                        <h6>Category</h6>
                        <ul>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> Graphic Design</a></li>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> Mobile Application</a></li>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> Database Design</a></li>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> Web Development</a></li>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> Digital Marketing</a></li>
                            <li><a href="/blog"><i class="icofont-thin-right"></i> ICT</a></li>
                        </ul>
                    </div> --}}
                    <div class='facebook mt-3 p-2'>
                        <h6>Facebook</h6>
                        <iframe title='facebook' class='facebook_div' src="https://www.facebook.com/plugins/page.php?href=www.facebook.com/ICTVillageOrg&tabs=timeline&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true" 
				 scrolling="yes" frameBorder="0" allowFullScreen={false} allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection