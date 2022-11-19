@extends('dashboard.layouts.admin')

@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Blog
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

    <div class="container-fluid" >

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="filter_nav d-flex flex-wrap">
                            <li><a href="{{ route('editor_blog_create') }}" class="custom_white_btn">Create New</a></li>
                            {{-- <li class="border_right_white">
                                <a href="#" class="custom_white_btn custom_white_btn_square"><i class="fa fa-trash"></i></a>
                            </li> --}}
                            {{-- <li>
                                <select name="" class="custom_input custom_input_select">
                                    <option value="">--Chose an Action--</option>
                                    <option value="">Bulk Edit</option>
                                    <option value="">Export These Product</option>
                                </select>
                            </li> --}}
                            {{-- <li class="border_right_white"><a href="#" class="custom_white_btn">confirm</a></li> --}}
                            {{-- <li>
                                <input type="text" name="" placeholder="Filter by keyword" class="custom_input" />
                                <button class="custom_white_btn">Search</button>
                            </li> --}}
                            <li style="align-self: center;">
                                {{ $list->links() }}
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="padding-bottom: 20px;">
                            <table class="table text-left">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col"><input type="checkbox" /></th> --}}
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                        <tr>
                                            {{-- <th scope="row"><input type="checkbox" /></th> --}}
                                            <td><img src="/{{ $item->image }}" alt="test product 5" style="height: 70px;" /></td>
                                            <td style="white-space: initial;">
                                                <div style="width: 150px">
                                                    {{ $item->title }}
                                                </div>
                                            </td>
                                            <td style="white-space: initial;">
                                                <div style="width: 300px;">
                                                    {{ $item->short_description }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $item->category->name }}
                                            </td>
                                            <td>
                                                <ul>
                                                    {{$item->status}}</li>
                                                    {{-- <li><i class="fa fa-eye"></i> comments: 600</li> --}}
                                                </ul>
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
                                                        <ul class="shadow shadow-sm">
                                                            <li><a href="{{route('editor_blog_view',['id'=>$item->id])}}">view</a></li>
                                                            <li><a href="/editor/blog-information/edit/{{ $item->id }}">edit</a></li>
                                                            <li><a onclick="return confirm('sure want to delete'); " href="/editor/blog-information/destroy/{{ $item->id }}">delete</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer">
                                {{ $list->links() }}
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

    @push('ccss')
        <!-- Summernote CSS - CDN Link -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->
        <link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/css/custom_2.css">
    @endpush

    @push('cjs')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(function(){
                $('#mytextarea1').summernote({
                    height: 200,
                    tabsize: 2
                });
            })
        </script>
        <script src="/js/vue_script.js"></script>
        <script src="{{ asset('contents/admin') }}/assets/js/blog_vue.js"></script>
    @endpush
@endsection

