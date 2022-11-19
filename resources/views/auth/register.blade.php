@php
$page=[
    "seo"=>$website_info['Seo Kewords'][0],
    'description'=>"ICT Village",
    'title'=>"ICT Village :: Register",
    'image'=>"/assets/img/favicon.png",
    ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'register',$page])
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
            <div class="form-column column col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <div class="section-title">
                    <h3>Register Now</h3>
                    <div class="decor"></div>
                </div>

                <!--Login Form-->
                <div class="styled-form register-form">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        @error('first_name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-user"></span></span>
                            <input type="text" name="first_name" class=" @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="Your First Name *">
                        </div>

                        @error('last_name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-user"></span></span>
                            <input type="text" name="last_name" class=" @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Your Last Name *">
                        </div>

                        @error('phone')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-phone"></span></span>
                            <input type="text" name="phone" class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter Phone Number *">
                        </div>

                        @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-envelope-o"></span></span>
                            <input type="email" name="email" class=" @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Email">
                        </div>

                        @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                            <input type="password" name="password" class=" @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Confirm Password">
                        </div>

                        @error('password_confirmation')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <span class="adon-icon"><span class="fa fa-unlock-alt"></span></span>
                            <input type="password" name="password_confirmation" value="" placeholder="Enter Password">
                        </div>

                        <div class="clearfix">
                            <div class="form-group pull-left">
                                <button type="submit" class="thm-btn thm-tran-bg">Register</button>
                            </div>
                            <div class="form-group padd-top-15 pull-right">
                                Already have an account?
                                <span onclick="location.href = '/login'">login now</span>
                                <a href="/login" class="img-circle facebook"><span class="fa fa-sign-in"></span></a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
