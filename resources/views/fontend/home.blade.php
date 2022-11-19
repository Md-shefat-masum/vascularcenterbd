@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>"Vascular",
        'title'=>"Vascular",
        'image'=>"/contents/frontend/images/fav-icon/favicon-32x32.png",
    ];
@endphp
@extends('fontend.layouts.fontend',['title'=>'vascularcenterbd',$page])
@section("contents")

    @include('fontend.home.banner',['data' => $banner])

    @include('fontend.home.news',['data'=>$blogs])

    @include('fontend.home.team',['team'=>$team])

    <section class="service sec-padd2">
        <div class="container">

            <div class="section-title">
                <h2>Video Gallery</h2>
            </div>

            <div class="service_carousel">
                <!--Featured Service -->
                <article class="single-column">
                    <div class="item">
                        <figure class="img-box">
                            <img src="{{ asset('contents/frontend') }}/images/video/1.jpg" alt="">
                            <figcaption class="default-overlay-outer">
                                <div class="inner">
                                    <div class="content-layer">
                                        <a href="https://youtu.be/pGO_sj74Iaw" target="_blank"
                                            class="thm-btn thm-tran-bg">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                        <div class="content center">
                            <!-- <h5>Service #1</h5> -->
                            <a href="https://youtu.be/pGO_sj74Iaw">
                                <h4>রমজানের স্বাস্থ্য ভাবনা - পর্ব ২৬</h4>
                            </a>
                            <div class="text">
                                <p>
                                    বিষয়ঃ ভ্যারিকোস ভেইন বা পায়ের আঁকাবাঁকা শিরা
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <!--Featured Service -->
                <article class="single-column">
                    <div class="item">
                        <figure class="img-box">
                            <img src="{{ asset('contents/frontend') }}/images/video/2.jpg" alt="">
                            <figcaption class="default-overlay-outer">
                                <div class="inner">
                                    <div class="content-layer">
                                        <a href="https://youtu.be/5CS0Klv-a9s" target="_blank"
                                            class="thm-btn thm-tran-bg">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                        <div class="content center">
                            <!-- <h5>Service #1</h5> -->
                            <a href="https://youtu.be/5CS0Klv-a9s">
                                <h4>রমজানের স্বাস্থ্য ভাবনা-পর্ব ১৩</h4>
                            </a>
                            <div class="text">
                                <p>
                                    বিষয়ঃ পায়ের রক্তনালী ব্লক হলে করণীয়
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <!--Featured Service -->
                <article class="single-column">
                    <div class="item">
                        <figure class="img-box">
                            <img src="{{ asset('contents/frontend') }}/images/video/3.jpg" alt="">
                            <figcaption class="default-overlay-outer">
                                <div class="inner">
                                    <div class="content-layer">
                                        <a href="https://youtu.be/xZwx29msJ2o" target="_blank"
                                            class="thm-btn thm-tran-bg">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                        <div class="content center">
                            <!-- <h5>Service #1</h5> -->
                            <a href="https://youtu.be/xZwx29msJ2o">
                                <h4>পায়ে ব্যথা </h4>
                            </a>
                            <div class="text">
                                <p>
                                    বিষয়ঃ হঠাৎ পায়ে ব্যথা । বন্ধ হয়ে যায় রক্তনালী ।
                                    সময় পাবেন মাত্র কয়েক ঘন্টা । অবহেলায় কাটা যাবে পা ।
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

                <!--Featured Service -->
                <article class="single-column">
                    <div class="item">
                        <figure class="img-box">
                            <img src="{{ asset('contents/frontend') }}/images/video/4.jpg" alt="">
                            <figcaption class="default-overlay-outer">
                                <div class="inner">
                                    <div class="content-layer">
                                        <a href="https://youtu.be/GuQY4vw-au4" target="_blank"
                                            class="thm-btn thm-tran-bg">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                        <div class="content center">
                            <!-- <h5>Service #1</h5> -->
                            <a href="https://youtu.be/GuQY4vw-au4">
                                <h4>রক্তনালীর রোগ</h4>
                            </a>
                            <div class="text">
                                <p>
                                    রক্তনালীর রোগ ও তার প্রতিকার জেনে নিন
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

            </div>

        </div>
    </section>

    <div class="container">
        <div class="border-bottom"></div>
    </div>

    @include('fontend.home.appoinment_form')


@stop

