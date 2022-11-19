@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>"ICT Village",
        'title'=>"ICT Village :: Contact Information",
        'image'=>"/assets/img/favicon.png",
        ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'Contact',$page])
@section("contents")

    <div class="inner-banner text-center">
        <div class="container">
            <div class="box">
                <h3>Contact</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li>contact</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>

    <section class="contact_us sec-padd-bottom" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3>Send Your Message Us</h3>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form"
                            action="/any-question" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="" placeholder="Your Name *" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control required email" value="" placeholder="Your Mail *" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="phone" required class="form-control" value="" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea name="question" class="form-control textarea required" placeholder="Your Message...." aria-required="true"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="thm-btn2" type="submit" data-loading-text="Please wait...">send message</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

