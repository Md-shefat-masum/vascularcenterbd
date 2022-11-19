<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$title}}</title>

    <!-- HTML Meta Tags -->
    <meta name="description" content="{{$page['description']}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="keywords" content="{{$page['seo']}}"/>

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$page['title']}}">
    <meta property="og:description" content="{{$page['description']}}">
    <meta property="og:image" content="{{url()->current()}}/{{ $website_info['Logo Image'][0] }}">
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="ictvillage.org">
    <meta property="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:title" content="{{$page['title']}}">
    <meta name="twitter:description" content="{{$page['description']}}">
    <meta name="twitter:image" content="{{url()->current()}}/{{ $website_info['Logo Image'][0] }}">


    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/> --}}
    <link rel="stylesheet" href="{{ asset('contents/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('contents/frontend') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('contents/frontend') }}/css/custom.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{url()->current()}}/{{ $website_info['Logo Image'][0] }}">
    <link rel="icon" type="image/png" href="{{url()->current()}}/{{ $website_info['Logo Image'][0] }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{url()->current()}}/{{ $website_info['Logo Image'][0] }}" sizes="16x16">

    <!-- jQuery js -->
    <script src="{{ asset('contents/frontend') }}/js/jquery.js"></script>

    <script>
        $.ajaxSetup({
            cache:false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        $( document ).ajaxStart(()=>$('.input_error').html(''));
        $( document ).ajaxSuccess((e,res)=>console.log((res.responseJSON && res.responseJSON) || res));
        $( document ).ajaxError(function( event, res ) {
            console.log(res.responseJSON.errors || res);
            let errors = res.responseJSON.errors;
            //console.log(errors);
            for (const key in errors) {
                if (Object.hasOwnProperty.call(errors, key)) {
                    const element = errors[key];
                    if(element[0]){
                        //console.log(key,element[0]);
                        $(`.${key}_error`).html(element[0]);
                    }
                }
            }
        });
    </script>
    @stack("css")

</head>

<body>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Failed!</strong> {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif

    <div class="boxed_wrapper">

        <header class="top-bar">
            <div class="container">
                <div class="clearfix">
                    <div class="col-left float_left">
                        <!-- <div id="polyglotLanguageSwitcher" class="">
                            <form action="#">
                                <select id="polyglot-language-options">
                                    <option id="en" value="en" selected>English</option>
                                    <option id="fr" value="fr">French</option>
                                    <option id="de" value="de">German</option>
                                    <option id="it" value="it">Italian</option>
                                    <option id="es" value="es">Spanish</option>
                                </select>
                            </form>
                        </div> -->

                        <ul class="top-bar-info">
                            <li><i class="icon-technology"></i>Phone: {{ $website_info['Mobile Number'][0] }}</li>
                            <li><i class="icon-note2"></i> {{ $website_info['Email Address'][0] }} </li>
                        </ul>
                    </div>
                    <div class="col-right float_right">
                        <ul class="social">
                            <li>Stay Connected: </li>
                            <li><a target="_blank" href="{{ $website_info['Facebook Page Link'][0] }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ $website_info['Linkedin Page Link'][0] }}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a target="_blank" href="{{ $website_info['Twitter Channel Link'][0] }}"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $website_info['WhatsApp Channel Link'][0] }}"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                        <div class="link">
                            <a href="/chember#appoinment_form" class="thm-btn">get appoinment</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="theme_menu stricky">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-logo" style="margin-top:25px; margin-bottom:0px;">
                            <a href="/">
                                <img style="height:65px;" src="/{{ $website_info['Logo Image'][0] }}" alt="">
                                <h1 style="
                                    font-size: 22px;
                                    display: inline-block;
                                    color: #029347;
                                ">
                                    Vascular Center BD
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 menu-column">
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix text-right">
                                    <li><a href="/">Home</a></li>
                                     <li><a href="/about">About Us</a></li> 
                                    <li><a href="/chember">Chambers</a></li>
                                    <li><a href="/blog">Articles</a></li>
                                    <li><a href="/services">Services</a></li>
                                    <li><a href="/contact">CONTACT US</a></li>
                                </ul>
                                <ul class="mobile-menu clearfix text-left">
                                    <li><a href="/">Home</a></li>
                                    <!-- <li><a href="index.html">About Us</a></li> -->
                                    <li><a href="chember">Chembers</a></li>
                                    <li><a href="/blog">Articles</a></li>
                                    <li><a href="/services">Services</a></li>
                                    <li><a href="/contact">CONTACT US</a></li>
                                    <!-- <li class="dropdown text-left">
                                        <a href="#">Articles</a>
                                        <ul class="submenu">
                                            <li><a href="about.html">Article 2</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </nav> <!-- End of #main_menu -->
                    </div>

                    <!-- <div class="right-column">
                        <div class="right-area">
                            <div class="nav_side_content">
                                <div class="search_option">
                                    <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                                        <input type="text" placeholder="Search...">
                                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>


            </div> <!-- End of .conatiner -->
        </section>

        @yield('contents')


        <footer class="main-footer">

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="container">
                    <div class="row">
                        <!--Big Column-->
                        <div class="big-column col-md-5 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-md-9">
                                    <div class="footer-widget about-widget">
                                        <h3 class="footer-title">vascularcenterbd.com.bd</h3>

                                        <div class="widget-content">
                                            <div class="text">
                                                <p>
                                                    {{ $website_info['Office Address'][0] }}
                                                </p>
                                            </div>
                                            <div class="link">
                                                {{-- <a href="#" class="default_link">More About us <i
                                                        class="fa fa-angle-right"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Footer Column-->
                                {{-- <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h3 class="footer-title">Our Services</h3>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="service-1.html">Business Growth</a></li>
                                                <li><a href="service-2.html">Sustainability</a></li>
                                                <li><a href="service-3.html">Performance</a></li>
                                                <li><a href="service-4.html">Advanced Analytics</a></li>
                                                <li><a href="service-5.html">Customer Insights</a></li>
                                                <li><a href="service-6.html">Organization</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <!--Big Column-->
                        <div class="big-column col-md-7 col-sm-12 col-xs-12">
                            <div class="row clearfix">


                                <!--Footer Column-->
                                {{-- <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget contact-widget">
                                        <h3 class="footer-title">Contact us</h3>
                                        <div class="widget-content">
                                            <ul class="contact-info">
                                                <li><span class="icon-signs"></span>22/121 Apple Street, New York,
                                                    <br>NY 10012, USA</li>
                                                <li><span class="icon-phone-call"></span> Phone: +123-456-7890</li>
                                                <li><span class="icon-e-mail-envelope"></span>Mail@Fortuneteam.com</li>
                                            </ul>
                                        </div>
                                        <ul class="social">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div> --}}

                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget news-widget">
                                        <h3 class="footer-title">Newsletter</h3>
                                        <div class="widget-content">
                                            <!--Post-->
                                            <div class="text">
                                                <p>Sign up today for hints, tips and the <br>latest news</p>
                                            </div>
                                            <!--Post-->
                                            <form action="/subscribe-email" id="email_form" class="default-form">
                                                <div id="email_div">
                                                    <input type="email" name="email" placeholder="Email Address">
                                                </div>
                                                <div id='display_alert' class='text-center text-warning subscribe_success'></div>
                                                <button type="submit" id='subscribe' class="thm-btn">Subscribe Us</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--Footer Bottom-->
            <section class="footer-bottom">
                <div class="container">
                    <div class="pull-left copy-text">
                        <p>Copyrights © 2022 All Rights Reserved. Powered by <a href="/"> vascularcenterbd.com</a></p>

                    </div><!-- /.pull-right -->
                    <div class="pull-right get-text">
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/Shefat.Masum/">Developed &amp; maintenance by MD.Shefat</a></li>
                        </ul>
                    </div><!-- /.pull-left -->
                </div><!-- /.container -->
            </section>

        </footer>

        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s color2_bg">
            <span class="fa fa-angle-up"></span>
        </button>
        <!-- pre loader  -->
        <div class="preloader"></div>



        <!-- bootstrap js -->
        <script src="{{ asset('contents/frontend') }}/js/bootstrap.min.js"></script>
        <!-- jQuery ui js -->
        <script src="{{ asset('contents/frontend') }}/js/jquery-ui.js"></script>
        <!-- owl carousel js -->
        <script src="{{ asset('contents/frontend') }}/js/owl.carousel.min.js"></script>

        <!-- mixit up -->
        <script src="{{ asset('contents/frontend') }}/js/wow.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/jquery.mixitup.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/menuzord.js"></script>

        <!-- revolution slider js -->
        <script src="{{ asset('contents/frontend') }}/js/jquery.themepunch.tools.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/jquery.themepunch.revolution.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.actions.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.carousel.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.kenburn.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.layeranimation.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.migration.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.navigation.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.parallax.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.slideanims.min.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/revolution.extension.video.min.js"></script>

        <!-- fancy box -->
        <script src="{{ asset('contents/frontend') }}/js/SmoothScroll.js"></script>
        <script src="{{ asset('contents/frontend') }}/js/custom.js"></script>

        @stack("cjs")
        <script>
            $(function(){
                $.ajaxSetup({
                    headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });
                $("#email_form").on("submit",function(e){
                    e.preventDefault();
                    var email=$('input[name="email"]').val();
                    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    let form = new FormData($(this)[0]);
                    if(re.test(email)){
                        $.ajax({
                        type:"POST",
                        url:"/subscribe-email",
                        data:form,
                        datatype: "json",
                        success:function(data){
                            console.log(data);
                            if(data==1)
                            {
                                $("#email_div").hide();
                                $('input[name="email"]').val("");
                                $("#display_alert").text("thanks for subscribe");
                                $("#display_alert").show('slow');
                                setTimeout('$("#display_alert").hide("slow")',3000);
                                setTimeout('$("#email_div").show("slow")',3000);
                            }
                        }
                    });
                    }
                    else{
                        $("#email_div").hide();
                        $('input[name="email"]').val("");
                        $("#display_alert").text("please give a correct email");
                        $("#display_alert").show('slow');
                        setTimeout('$("#display_alert").hide("slow")',3000);
                        setTimeout('$("#email_div").show("slow")',3000);
                    }
                });

            });
        </script>

    </div>

</body>

</html>

