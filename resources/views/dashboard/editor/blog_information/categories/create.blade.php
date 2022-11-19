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


    <div class="content" id='blog'>
        <div class="container" >

            <div class="row">
                <div class="col-lg-12" id="category_form" >

                    <form action="{{ route('editor_blog_store_category') }}" id="form_body" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header d-inline-flex justify-content-md-between">
                                <h4>Category Details</h4>
                                <a href="{{ route('editor_blog_categories') }}" class="btn btn-warning mt-sm-3 mt-md-0" type="button">
                                    <i class="fa fa-angle-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="from-group row mb-4 justify-contents-center">
                                    <label for="name" class="col-lg-3 text-lg-right">Name : </label>
                                    <div class="col-lg-7">
                                        <input name="name" @keyup="make_url" v-model="form_data.name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="url" class="col-lg-3 text-lg-right">URL : </label>
                                    <div class="col-lg-7">
                                        <input name="url" @keyup="change_url" v-model="form_data.url" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="description" class="col-lg-3 text-lg-right">Description : </label>
                                    <div class="col-lg-7">
                                        <textarea name="description" v-model="form_data.description" id="mytextarea1" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="from-group row mb-4">
                                    <label for="category_image" class="col-lg-3 text-right">Category Image: </label>
                                    <div class="col-lg-7">
                                        <input name="category_image" type="file" class="form-control">
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
                                    <label for="page_title" class="col-lg-3 text-lg-right">Page Title : (optional)</label>
                                    <div class="col-lg-7">
                                        <input name="page_title" v-model="form_data.page_title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="meta_keywords" class="col-lg-3 text-lg-right">Meta Keywords : (optional)</label>
                                    <div class="col-lg-7">
                                        <input name="meta_keywords" v-model="form_data.meta_keywords" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="meta_description" class="col-lg-3 text-lg-right">Meta Description : (optional)</label>
                                    <div class="col-lg-7">
                                        <input name="meta_description" v-model="form_data.meta_description" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="search_keywords" class="col-lg-3 text-lg-right">Search Keywords : (optional)</label>
                                    <div class="col-lg-7">
                                        <input name="search_keywords" v-model="form_data.search_keywords" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('editor_blog_categories') }}" class="btn btn-warning me-3" type="button">
                                    <i class="fa fa-angle-left"></i> Back
                                </a>
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-upload"></i> Submit
                                </button>
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

