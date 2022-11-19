@extends('dashboard.layouts.admin')

@section('contents')

    <div class="content-wrapper">
        <div class="container" >
            {{-- @include('admin.includes.bread_cumb',['title'=>'Edit a Category']) --}}
            <div class="row">
                <div class="col-lg-12" id="category_form" >
                    <form action="{{route('editor_blog_update_category')}}" id="form_body" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}" v-model="form_data.id">
                        <div class="card">
                            <div class="card-header d-inline-flex justify-content-md-between">
                                <h4>Category Details</h4>
                                <a href="{{ route('editor_blog_categories') }}" class="btn btn-warning mt-sm-3 mt-md-0" type="button">
                                    <i class="fa fa-angle-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="from-group row mb-4 justify-contents-center">
                                    <label for="name" class="col-lg-3 text-lg-right">Name : {{ $category->name }}</label>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="url" class="col-lg-3 text-lg-right">URL : {{ $category->url }}</label>

                                </div>
                                <div class="from-group  mb-4">
                                    <label for="description" class="col-lg-3 text-lg-right">Description : </label>
                                    <div class="">
                                        {!! $category->description !!}
                                    </div>
                                </div>
                                <div class="from-group  mb-4">
                                    <label for="category_image" class="col-lg-3 text-right">Category Image: </label>
                                    <div class="">
                                       <img src="/{{$category->category_image}}" alt="category" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5>Search Engine Optimization</h5>
                            </div>
                            <div class="card-body">
                                <div class="from-group row mb-4">
                                    <label for="page_title" class="col-lg-3 text-lg-right">Page Title : {{ $category->page_title }}</label>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="meta_keywords" class="col-lg-3 text-lg-right">Meta Keywords : {{ $category->meta_keywords }}</label>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="meta_description" class="col-lg-3 text-lg-right">Meta Description : {{ $category->meta_description }}</label>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="search_keywords" class="col-lg-3 text-lg-right">Search Keywords : {{ $category->search_keywords }}</label>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!--start overlay-->
            <div class="overlay"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->

    @push('ccss')
        <link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/js/collapse_tree/hummingbird-treeview.min.css">
        <!-- Summernote CSS - CDN Link -->  
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->
        <link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/css/custom_2.css">
    @endpush

    @push('cjs')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="{{ asset('contents/admin') }}/assets/js/collapse_tree/hummingbird-treeview.min.js"></script>
        {{-- <script src="https://www.jqueryscript.net/demo/Collapsible-Tree-View-Checkboxes-jQuery-hummingbird/hummingbird-treeview-1.3.js"></script> --}}

        <script>
            $(function(){
                $('#mytextarea1').summernote({
                    height: 200,
                    tabsize: 2
                });

            })
            $("#treeview").hummingbird();
        </script>
        <script src="/js/vue_script.js"></script>
        <script src="{{ asset('contents/admin') }}/assets/js/category_vue.js"></script>
        {{-- <script src="/contents/admin/category_vue.js"></script> --}}

    @endpush
@endsection

