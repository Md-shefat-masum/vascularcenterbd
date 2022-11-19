@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>"Vascular",
        'title'=>"Vascular",
        'image'=>"/assets/img/favicon.png",
    ];
@endphp
@extends('fontend.layouts.fontend',['title'=>'Innovation in Technology',$page])
@section("contents")

    <div class="inner-banner text-center">
        <div class="container">
            <div class="box">
                <h3>Services</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li>services</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>

    <section class="service style-2 sec-padd2">
        <div class="container">
            <div class="row">
                @foreach ($services as $item)
                    <article class="column col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <figure class="img-box">
                                <img src="/{{ $item->image }}" alt="">
                                {{-- <figcaption class="default-overlay-outer">
                                    <div class="inner">
                                        <div class="content-layer">
                                            <a href="#" class="thm-btn thm-tran-bg">read more</a>
                                        </div>
                                    </div>
                                </figcaption> --}}
                            </figure>
                            <div class="content center">
                                {{-- <h5>{{ $item->title }}</h5> --}}
                                <a href="#"><h4>{!! $item->title !!}</h4></a>
                                <div class="text">
                                    <p>
                                        {!! $item->details !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('fontend.home.appoinment_form')

    <div class="container">
        <div class="border-bottom"></div>
    </div>

    @push('cjs')
        <script>
            if ($('.tabs-box').length) {
                //Tabs
                $('.tabs-box .tab-buttons .tab-btn').click(function (e) {

                    e.preventDefault();
                    var target = $($(this).attr('data-tab'));

                    target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
                    $(this).addClass('active-btn');
                    target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
                    target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
                    $(target).fadeIn(300);
                    $(target).addClass('active-tab');
                });

            }
        </script>
    @endpush
@stop

