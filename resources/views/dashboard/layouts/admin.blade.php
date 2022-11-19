<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vescular is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vescular template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('contents/admin') }}/assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('contents/admin') }}/assets/images/favicon.png" type="image/x-icon" />
    <title>Vescular</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/fontawesome.css">

    <!-- ico-font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/icofont.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/themify.css">

    <!-- Flag icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/flag-icon.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/custom.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('contents/admin') }}/assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}
    @stack('ccss')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        window.s_alert = (icon, title) => {
            Toast.fire({
                icon: icon,
                title: title,
            })
        }
        window.toaster = (icon, title) => {
            Toast.fire({
                icon: icon,
                title: title,
            })
        }
    </script>
</head>

<body>

    <!--page-wrapper Start-->
    <div class="page-wrapper">

        <!--Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-left">
                <div class="logo-wrapper">
                    <a href="/dashboard">
                        <img src="{{ asset('contents/admin') }}/assets/images/logo-light.png" class="image-dark" alt=""/>
                        <img src="{{ asset('contents/admin') }}/assets/images/logo-light-dark-layout.png" class="image-light" alt=""/>
                    </a>
                </div>
            </div>
            <div class="main-header-right row">
                <div class="mobile-sidebar col-1 ps-0">
                    <div class="text-start switch-sm">
                        <label class="switch">
                            <input type="checkbox" id="sidebar-toggle" checked>
                            <span class="switch-state"></span>
                        </label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="text-dark">
                                <img class="align-self-center pull-right me-2" src="{{ asset('contents/admin') }}/assets/images/dashboard/browser.png" alt="header-browser">
                            </a>
                        </li>
                        @include('dashboard.layouts.includes.notification')
                        <li class="onhover-dropdown">
                            <div class="d-flex align-items-center">
                                <img class="align-self-center pull-right flex-shrink-0 me-2" src="{{ asset('contents/admin') }}/assets/images/dashboard/user.png" alt="header-user"/>
                                <div>
                                    <h6 class="m-0 txt-dark f-16">
                                        My Account
                                        <i class="fa fa-angle-down pull-right ms-2"></i>
                                    </h6>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20">
                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        confirm('sure') &&
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle">
                        <i class="icon-more"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header Ends-->

        <!--Page Body Start-->
        <div class="page-body-wrapper">
            <!--Page Sidebar Start-->
            <div class="page-sidebar custom-scrollbar">

                @include('dashboard.includes.sidebar_user')

                @if (Auth::user()->role_id == 6)
                    @include('dashboard.includes.editor_sidebar_menu')
                @endif

                <div class="sidebar-widget text-center d-none">
                    <div class="sidebar-widget-top">
                        <h6 class="mb-2 fs-14">Need Help</h6>
                        <i class="icon-bell"></i>
                    </div>
                    <div class="sidebar-widget-bottom p-20 m-20">
                        <p>
                            +880 1646376015
                            <br>mshefat924@gmail.com
                            <br><a href="#">Visit FAQ</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--Page Sidebar Ends-->

            <div class="page-body">

                @yield('contents')

            </div>
        </div>
        <!--Page Body Ends-->

    </div>
    <!--page-wrapper Ends-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- latest jquery-->
    <script src="{{ asset('contents/admin') }}/assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('contents/admin') }}/assets/js/bootstrap/bootstrap.bundle.min.js" ></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('contents/admin') }}/assets/js/sidebar-menu.js"></script>

    <!-- Theme js-->
    <script src="{{ asset('contents/admin') }}/assets/js/script.js"></script>

    <script>
        $(function(){
            $(`a[href="${location.href}"`).addClass('active');
            $(`a[href="${location.href}"`).css('color','#4eb4cf');
            $(`a[href="${location.href}"`).parents('li').addClass('active');

            $('.show_thumb').on('change',function(e){
                let check = $(this).next()[0]?.tagName;
                if(check === 'IMG'){
                    $(this).next().attr('src', URL.createObjectURL(e.target.files[0]) );
                }else{
                    $(`
                        <img class="img-thumbnail my-3" style="width: 200px;" src="${URL.createObjectURL(e.target.files[0])}" alt="">
                    `).insertAfter($(this));
                }
            })
        })
    </script>

    @stack('pjs')

    @stack('cjs')

</body>


</html>
