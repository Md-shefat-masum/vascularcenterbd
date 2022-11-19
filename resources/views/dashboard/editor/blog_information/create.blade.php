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

    <div class="content-wrapper">
        <div class="container" >
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Blog Information
                        {{-- <small>Universal Admin panel</small> --}}
                    </h3>
                </div>
                <div class="col-lg-12" id="blog" >
                    <form action="{{ route('editor_blog_store') }}" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header d-inline-flex justify-content-md-between">
                                <h4>Create Blog</h4>
                                <a href="{{ route('editor_blog_list') }}" class="btn btn-warning mt-sm-3 mt-md-0" type="button">
                                    <i class="fa fa-angle-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="from-group row mb-4 justify-contents-center">
                                    <label for="name" class="col-lg-2 text-lg-right">Title : </label>
                                    <div class="col-lg-10">
                                        <input name="title" @keyup="make_url" v-model="form_data.title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="url" class="col-lg-2 text-lg-right">URL : </label>
                                    <div class="col-lg-10">
                                        <input name="url" @keyup="change_url" v-model="form_data.url" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="category_id" class="col-lg-2 text-lg-right">Categories : </label>
                                    <div class="col-lg-10">
                                       <select class="form-control" name='category_id' id='category_id' required>
                                            <option value="">Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div class="from-group row mb-4">
                                    <label for="description" class="col-lg-2 text-lg-right">Short Description : </label>
                                    <div class="col-lg-10">
                                        <textarea name="short_description" v-model="form_data.short_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="description" class="col-lg-2 text-lg-right">Description : </label>
                                    <div class="col-lg-10">
                                        <textarea name="description" v-model="form_data.description" id="mytextarea1" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="tag_name" class="col-lg-2 text-lg-right">Tag Name : </label>
                                    <div class="col-lg-10">
                                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id='update_tag_name' name='tag_name[]'>
                                            @foreach ($tags as $key=>$val)
                                                <option value="{{$val->name}}">{{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="status" class="col-lg-2 text-lg-right">Status : </label>
                                    <div class="col-lg-10">
                                        <select name="status" id="status"  class="form-control">
                                            <option value="inactive">Inactive</option>
                                            <option value="active">Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="category_image" class="col-lg-2 text-right">Image: (740x400px)</label>
                                    <div class="col-lg-10">
                                        <input name="image" id="upload_image" type="file" class="form-control" required>
                                        <div class="gallery mt-2"></div>
                                        {{-- <img class="img-thumbnail my-3" style="width: 200px;" src="" alt=""> --}}
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
                                    <label for="seo_title" class="col-lg-2 text-lg-right">Page Title : (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="seo_title" v-model="form_data.seo_title" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="seo_keywords" class="col-lg-2 text-lg-right">Meta Keywords : (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="seo_keywords" v-model="form_data.seo_keywords" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="seo_description" class="col-lg-2 text-lg-right">Meta Description : (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="seo_description" v-model="form_data.seo_description" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="search_keywords" class="col-lg-2 text-lg-right">Search Keywords : (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="search_keywords" v-model="form_data.search_keywords" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('editor_blog_list') }}" class="btn btn-warning me-3" type="button">
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
@endsection

@push('ccss')
<!-- Summernote CSS - CDN Link -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- //Summernote CSS - CDN Link -->
<link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/css/custom_2.css">
<link rel="stylesheet" type="text/css" href="{{asset('contents/admin') }}/assets/css/select2.css" />
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
    <script src="{{ asset('contents/admin') }}/assets/js/select2/js/select2.min.js"></script>
    <script>
        $(".js-example-basic-multiple").select2({
            tags:true,
            tokenSeparators: [',', '\n']
        });
        $(function(){
            $('.update_btn').on("click",function(){
                var data=$(this).data('update');
                update_id.value=data.id;
                $(".js-example-basic-multiple").val(JSON.parse(data.value)).change();
            });
        });
    </script>
@endpush
