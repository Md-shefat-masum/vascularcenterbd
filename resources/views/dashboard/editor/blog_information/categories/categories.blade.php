
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Blog categories
                        {{-- <small>Universal Admin panel</small> --}}
                    </h3>
                </div>
                <div class="col-lg-6">
                    {{-- <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Sample Page</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container" id="product_list">
                    {{-- @include('admin.layouts.includes.bread_cumb',['title'=>'View Categories']) --}}
                    <p>Manage categories.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="filter_nav d-flex flex-wrap">
                                        <li><a href="{{ route('editor_blog_create_category') }}" class="custom_white_btn">Create Category</a></li>
                                        <li><a href="#" class="custom_white_btn">Delete</a></li>
                                        {{-- <li>
                                            <input type="text" class="custom_input" name="" placeholder="Filter by keyword">
                                        </li>
                                        <li>
                                            <button class="custom_white_btn">Filter</button>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="padding-bottom: 20px;">
                                        <table class="table text-left">
                                            <thead>
                                                <tr>
                                                    {{-- <th scope="col"><input type="checkbox" /></th> --}}
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Description</th>
                                                    {{-- <th scope="col">Category</th>
                                                    <th scope="col">Status</th> --}}
                                                    <th scope="col" class="text-end">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $item)
                                                    <tr>
                                                        {{-- <th scope="row"><input type="checkbox" /></th> --}}
                                                        <th scope="row">{{ $item->name }}</th>
                                                        @if ($item->category_image)
                                                            <td><img src="/{{ $item->category_image }}" alt="" style="height: 70px;" /></td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td style="white-space: initial;">
                                                            <div style="width: 300px;">
                                                                {!! $item->description !!}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="d-flex justify-content-end table_actions">
                                                                <li>
                                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                                </li>
                                                                {{-- <li>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                </li> --}}
                                                                <li>
                                                                    <a href="#"><i class="fa fa-list-ul"></i></a>
                                                                    <ul class="shadow shadow-sm p-3">
                                                                        <li><a href="{{ route('editor_blog_view_category',['id'=> $item->id]) }}">view</a></li>
                                                                        <li><a href="{{ route('editor_blog_edit_category',['id'=> $item->id]) }}">edit</a></li>
                                                                        <li><a href="{{ route('editor_blog_category_delete',['id'=> $item->id]) }}">delete</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-center">
                                                {!! $categories->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--start overlay-->
                    <div class="overlay"></div>
                    <!--end overlay-->
                </div>
                <!-- End container-fluid-->

            </div>
        </div>
    </div>

    @push('cjs')
        {{-- <script src="{{ asset('contents/admin') }}/plugins/sortable_list/jquery-sortable-lists.min.js"></script> --}}
        <link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/css/custom_2.css">
        <script src="{{ asset('contents/admin') }}/assets/js/sortable_list/jquery-sortable-lists-mobile.min.js"></script>
        {{-- <script src="{{ asset('contents/admin') }}/custom_product_vue.js"></script> --}}
        <script>
            var options = {
                placeholderCss: {'background-color': '#ff8'},
                hintCss: {'background-color':'#bbf'},
                onChange: function( cEl )
                {
                    // console.log( 'onChange' );
                },
                complete: function( cEl )
                {
                    let parent_id = $(cEl).parent('ul').parent('li').data('id');
                    let category_id = $(cEl).data('id')
                    // console.log( 'complete', parent_id , category_id );
                    // let categories = $('#sTree2').sortableListsToArray();
                    axios.post('/admin/blog/rearenge-category',{parent_id: parent_id, id:category_id})
                        .then((res)=>{
                            // console.log(res);
                            toaster('success','category rearenged.');
                        })
                },
                isAllowed: function( cEl, hint, target )
                {
                    // Be carefull if you test some ul/ol elements here.
                    // Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
                    // Be careful also if the hint is not visible.
                    // It has only display none so it is at the previous place where
                    // it was before(excluding first moves before showing).

                    if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
                    {
                        hint.css('background-color', '#ff9999');
                        return false;
                    }
                    else
                    {
                        hint.css('background-color', '#99ff99');
                        return true;
                    }
                },
                opener: {
                    active: true,
                    as: 'html',  // if as is not set plugin uses background image
                    close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3'
                    open: '<i class="fa fa-plus"></i>',  // or 'fa-plus'
                    openerCss: {
                        'display': 'inline-block',
                        //'width': '18px', 'height': '18px',
                        'float': 'left',
                        'margin-left': '-35px',
                        'margin-right': '5px',
                        //'background-position': 'center center', 'background-repeat': 'no-repeat',
                        'font-size': '1.1em'
                    }
                },
                ignoreClass: 'clickable'
            };

            var optionsPlus = {
                insertZonePlus: true,
                placeholderCss: {'background-color': '#ff8'},
                hintCss: {'background-color':'#bbf'},
                opener: {
                    active: true,
                    as: 'html',  // if as is not set plugin uses background image
                    close: '<i class="fa fa-minus c3"></i>',
                    open: '<i class="fa fa-plus"></i>',
                    openerCss: {
                        'display': 'inline-block',
                        'float': 'left',
                        'margin-left': '-35px',
                        'margin-right': '5px',
                        'font-size': '1.1em'
                    }
                }
            };

            $('#sTree2').sortableLists( options );
            $('#sTreePlus').sortableLists( optionsPlus );

            $('#toArrBtn').on( 'click', function(){ console.log( $('#sTree2').sortableListsToArray() ); } );
            $('#toHierBtn').on( 'click', function() { console.log( $('#sTree2').sortableListsToHierarchy() ); } );
            $('#toStrBtn').on( 'click', function() { console.log( $('#sTree2').sortableListsToString() ); } );
            $('.descPicture').on( 'click', function(e) { $(this).toggleClass('descPictureClose'); } );

            $('.clickable').on('click', function(e)	{
            //    console.log( $('#sTree2').sortableListsToArray() );
            });

            /* Scrolling anchors */
            $('#toPictureAnch').on( 'mousedown', function( e ) { scrollToAnch( 'pictureAnch' ); return false; } );
            $('#toBaseElementAnch').on( 'mousedown', function( e ) { scrollToAnch( 'baseElementAnch' ); return false; } );
            $('#toBaseElementAnch2').on( 'mousedown', function( e ) { scrollToAnch( 'baseElementAnch' ); return false; } );
            $('#toCssPatternAnch').on( 'mousedown', function( e ) { scrollToAnch( 'cssPatternAnch' ); return false; } );

            function scrollToAnch( id )
            {
                return true;
                $('html, body').animate({
                    scrollTop: '-=-' + $("#" + id).offset().top + 'px'
                }, 750);
                return false;
            }

            // $('.control_check_box').on('mousedown touchstart',function(){
            //     console.log('get');
            // })

        </script>
        <style>
            #s-l-placeholder{
                background: #3f3f3f!important;
            }
            #s-l-hint,
            #s-l-hint-wrapper{
                border: 1px solid #3f3f3f!important;
                background: #222!important;
            }
            .dragable_list ul, .dragable_list li{
                color: white!important;
            }
            .dragable_list li div{
                padding: unset;
            }
            .dragable_list li div.d-inline-flex{
                padding: 7px;
            }
            #s-l-base,
            #s-l-base li{
                border: 1px solid #3f3f3f!important;
                background: #222!important;
                padding: 7px;
                padding-left: 30px;
            }
            .s-l-opener{
                margin-left: -16px !important;
                text-align: center;
                line-height: 34px;
                width: 33px;
                height: 34px;
                /* border: 1px solid; */
                position: absolute;
                left: -19px;
            }
            .s-l-opener:hover{
                cursor: pointer;
            }
        </style>
    @endpush
@endsection

