@extends('dashboard.layouts.admin')
@section('contents')

    <div class="content-wrapper">
        <div class="container" >
            {{-- @include('admin.includes.bread_cumb',['title'=>'Edit Blog']) --}}
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('editor_blog_update') }}" id="blog_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header d-inline-flex justify-content-md-between">
                                <h4>Blog Details</h4>
                                <a href="{{ route('editor_blog_list') }}" class="btn btn-warning mt-sm-3 mt-md-0" type="button">
                                    <i class="fa fa-angle-left"></i> Back
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="from-group row mb-4 justify-contents-center">
                                    <label for="title" class=" text-lg-right">Title : {{$blog->title}}</label>
                                   
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="url" class=" text-lg-right">URL : {{$blog->url}}</label>

                                </div>
                                <div class="from-group row mb-4">
                                    <label for="category_id" class=" text-lg-right">Categories : {{$category->name}} </label>
                                   
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="description" class=" text-lg-right">Description : </label>
                                    <div class="">
                                        {!! $blog->description !!}
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="description" class=" text-lg-right">Short Description : </label>
                                    <div class="">
                                        {{ $blog->short_description }}
                                    </div>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="tag_name" class=" text-lg-right">Tag Name : 
                                        @if(is_array(json_decode($blog->tag_name)))
                                            {{ implode( json_decode($blog->tag_name), ', ' ) }}
                                        @endif 
                                    </label>
                                   
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="status" class=" text-lg-right">Status : {{$blog->status}}</label>

                                </div>
                                <div class="from-group row mb-4">
                                    <label for="category_image" class=" text-right">Image: (740x400px) </label>
                                    <div class="">
                                       <img src="/{{$blog->image}}" alt="blog image" width="500px">
                                        
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
                                    <label for="seo_title" class=" text-lg-right">Page Title : {{$blog->seo_title}}</label>

                                </div>
                                <div class="from-group row mb-4">
                                    <label for="seo_keywords" class=" text-lg-right">Meta Keywords : {{$blog->seo_keywords}}</label>
                                </div>
                                <div class="from-group row mb-4">
                                    <label for="seo_description" class=" text-lg-right">Meta Description : {{ $blog->seo_description }}</label>

                                </div>
                                <div class="from-group row mb-4">
                                    <label for="search_keywords" class=" text-lg-right" data-item="{{$blog}}">Search Keywords : {{$blog->search_keywords}}</label>
       
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
        data=$("#submit").data('item');
        console.log(data);
        $(window).on('load',function(){
            $(".js-example-basic-multiple").val(JSON.parse(data.tag_name)).change(); 
        });   
    }); 
</script>
@endpush