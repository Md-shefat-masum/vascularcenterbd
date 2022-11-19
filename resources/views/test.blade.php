
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vescular is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vescular template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/contents/admin/assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="/contents/admin/assets/images/favicon.png" type="image/x-icon" />
    <title>Vescular</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/fontawesome.css">

    <!-- ico-font -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/icofont.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/themify.css">

    <!-- Flag icon -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/flag-icon.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/custom.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="/contents/admin/assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
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
                        <img src="/contents/admin/assets/images/logo-light.png" class="image-dark" alt=""/>
                        <img src="/contents/admin/assets/images/logo-light-dark-layout.png" class="image-light" alt=""/>
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
                                <img class="align-self-center pull-right me-2" src="/contents/admin/assets/images/dashboard/browser.png" alt="header-browser">
                            </a>
                        </li>
                        <li class="onhover-dropdown">
    <a href="#!" class="txt-dark">
        <img class="align-self-center pull-right me-2" src="/contents/admin/assets/images/dashboard/notification.png" alt="header-notification">
            </a>
    <ul class="notification-dropdown onhover-show-div">
        <li>
            Notification
            <span class="badge rounded-pill badge-secondary text-white text-uppercase pull-right">
                0 New
            </span>
        </li>
        
        <li class="text-center">
            Check
            <a href="#">all</a>
            notification
        </li>
    </ul>

</li>
                        <li class="onhover-dropdown">
                            <div class="d-flex align-items-center">
                                <img class="align-self-center pull-right flex-shrink-0 me-2" src="/contents/admin/assets/images/dashboard/user.png" alt="header-user"/>
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

                <div class="sidebar-user text-center">
    <div>
                    <img class="img-50 rounded-circle" src="/avatar.png" alt="#">
            </div>
    <h6 class="mt-3 f-12">
                    Mr. editor
            editor
            </h6>
</div>

                                    <ul class="sidebar-menu">

    
    
    

    


</ul>
                
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

                
                <!-- Container-fluid starts -->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>
                                    
                                    
                                </h3>
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends -->

                <!-- Container-fluid starts -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="example" class="display">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>phone</th>
                                                <th>topic</th>
                                                <th>chember</th>
                                                <th>time</th>
                                                <th>date</th>
                                                <th>image</th>
                                                <th>message</th>
                                                <!--<th>status</th>-->
                                                <th>created_at</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
            
                        </div>
                    </div>
            
                </div>
                <!-- Container-fluid starts -->
    
            </div>
        </div>
        <!--Page Body Ends-->

    </div>
    <!-- latest jquery-->
    <script src="/contents/admin/assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="/contents/admin/assets/js/bootstrap/bootstrap.bundle.min.js" ></script>


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

    
        
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/sl-1.4.0/datatables.min.css"/>
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/sl-1.4.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    
    <script>
        window.moment = moment;
        $(document).ready(function () {
            window.get_page = 1;
            let dTable = $('#example').DataTable({
                processing: true,
                serverSide: true,
                fixedHeader: {
                    header: true,
                    // footer: true
                },
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible',
                        },
                    },
                    'colvis',
                ],
                ajax: {
                    // url: 'https://libraryapi.sobujdiganta.com/api/book-list',
                    url: '/appoinment/all',
                    data: function(d,e){
                        d.key = d.search.value||null;
                        d.paginate = d.length;
                        d.orderByColumn = d.columns[d.order[0].column].data;
                        d.orderBy = d.order[0].dir.toUpperCase();
                        return {
                            paginate: d.paginate,
                            page: window.get_page,
                            key: d.key,
                            orderBy: d.orderBy,
                            orderByColumn: d.orderByColumn,
                        }
                    },
                    dataFilter: function(data){
                        data = JSON.parse(data);
                        data.recordsTotal = data.total;
                        data.recordsFiltered = data.total;
                        // console.log(data);
                        return JSON.stringify( data );
                    }
                },
                "aoColumns": [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'phone' },
                    { data: 'topic' },
                    { data: 'chember' },
                    // { data: 'time' },
                    { 
                        mData: 'time',
                        mRender: function(data){
                            return moment('2022-06-08 '+data).format('hh:mm')
                        }
                        
                    },
                    { data: 'date' },
                    // { data: 'image' },
                    { 
                        mData: 'image',
                        mRender: function(data, type, row){
                            if(data){
                                return `<a target="_blank" href="${window.location.origin+'/'+data}">Show uploaded doc</a>`;
                            }else{
                                return "";
                            }
                        }
                    
                    },
                    { data: 'message' },
                    // { data: 'status' },
                    { 
                        mData: 'created_at',
                        mRender: function(data){
                            return moment(data).format('d MMMM,YYYY hh:mm:ss')
                        }
                        
                    },
                    {
                        "mData": "id",
                        "mRender": function (data, type, row) {
                            // console.log(data, type, row);
                            return `<a class="btn btn-sm btn-danger" onclick="return confirm('sure! want to delte');" href="/dashboard/appoinment-delete/${data}">Delete</a>`;
                        }
                    }
                ],
                // columns: [
                //     { data: 'id' },
                //     { data: 'name' },
                //     { data: 'email' },
                //     { data: 'phone' },
                //     { data: 'topic' },
                //     { data: 'chember' },
                //     { data: 'time' },
                //     { data: 'date' },
                //     { data: 'image' },
                //     { data: 'message' },
                //     { data: 'status' },
                //     { data: 'created_at' },
                //     { data: 'action' },
                // ],
            });
            
            dTable.on( 'page.dt', function () {
                window.get_page = dTable.page.info().page + 1;
            })
            .on('search.dt', function(){
                window.get_page = 1;
            })
            .on('order.dt', function(){
                window.get_page = 1;
            });
        });
    </script>
    
</body>


</html>
