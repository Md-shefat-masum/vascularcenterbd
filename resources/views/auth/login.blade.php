@php
$page=[
    "seo"=>$website_info['Seo Kewords'][0],
    'description'=>"Vascular",
    'title'=>"login",
    'image'=>"/contents/frontend/images/fav-icon/favicon-32x32.png",
    ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'login',$page])
@section('contents')

    <div class="inner-banner text-center">
        <div class="container">
            <div class="box">
                <h3>My Account</h3>
            </div><!-- /.box -->
            <div class="breadcumb-wrapper">
                <div class="clearfix">
                    <div class="pull-left">
                        <ul class="list-inline link-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Auth</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a> --}}
                    </div><!-- /.pull-right -->
                </div><!-- /.container -->
            </div>
        </div><!-- /.container -->
    </div>

    <section class="register-section sec-padd-top">
        <div class="container">
            <div class="row">

                <!--Form Column-->
                <div class="form-column column col-lg-6 col-md-8 col-sm-12 col-xs-12">

                    <div class="section-title">
                        <h3>Login Now</h3>
                        <div class="decor"></div>
                    </div>

                    <!--Login Form-->
                    <div class="styled-form login-form">
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                                <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Mail id *">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                                <input type="password" class="@error('email') is-invalid @enderror" name="password" value="" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="clearfix">
                                <div class="form-group pull-left">
                                    <button type="submit" class="thm-btn thm-tran-bg">login now</button>
                                </div>
                                <div class="form-group social-links-two padd-top-5 pull-right">
                                    {{-- Or login with <a href="#" class="img-circle facebook"><span class="fa fa-facebook-f"></span></a> <a href="#" class="img-circle twitter"><span class="fa fa-twitter"></span></a> <a href="#" class="img-circle google-plus"><span class="fa fa-google-plus"></span></a> --}}
                                    Don't have an account?
                                    <span onclick="location.href = '/register'">register now</span>
                                    <a href="/register" class="img-circle facebook"><span class="fa fa-sign-in"></span></a>
                                    {{-- <a href="#" class="img-circle twitter"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="img-circle google-plus"><span class="fa fa-google-plus"></span></a> --}}
                                </div>
                            </div>

                            <div class="clearfix">
                                <div class="pull-left">
                                    <input type="checkbox" id="remember-me"><label for="remember-me">&nbsp; Remember Me</label>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
