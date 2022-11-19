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
                <h3>Chambers</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li>chambers</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>



    <section id="appoinment_form" class="contact_details sec-padd2">
        <div class="container">
            <div class="tabs-outer">
                <!--Tabs Box-->
                <div class="tabs-box tabs-style-one">
                    <!--Tab Buttons-->
                    <ul class="tab-buttons clearfix">
                        @foreach ($chembers as $key => $item)
                            <li data-tab="#tab-{{$item->id}}" class="tab-btn {{ $key==0?'active-btn':'' }}">{{ $item->location }}</li>
                        @endforeach
                    </ul>

                    <!--Tabs Content-->
                    <div class="tabs-content">
                        <!--Tab / Active Tab-->
                        @foreach ($chembers as $key => $item)
                            <div class="tab {{ $key==0?'active-tab':'' }}" id="tab-{{$item->id}}" style="display: {{ $key==0?'block':'none' }};">
                                <div class="text-content">
                                    <img src="/{{ $item->image }}" style="max-width: 100%; margin-bottom: 30px;" alt="">
                                    <div class="text">
                                        {!! $item->details !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
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

