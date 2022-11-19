
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        About Us
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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="" action="{{ route('editor_about_information_update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">About Image</label>
                                    <input type="file" class="form-control show_thumb" name="about_information_image">
                                    <img class="img-thumbnail my-3" style="width: 200px;" src="/{{ $info_image->value }}" alt="">
                                </div>
                                <div class="form-group mb-3">
                                    <textarea name="value" v-model="form_data.value" id="value" class="form-control" rows='12' required>
                                        @isset($infos->value)
                                            {!! $infos->value !!}
                                        @endisset
                                    </textarea>
                                </div>
                                <div class="d-none">
                                    <input type="text" value="{{isset($infos->id)? $infos->id: "null" }}" name="id" required/>
                                    <input type="text" value="{{isset($info_image->id)? $info_image->id: "null" }}" name="info_image_id" required/>
                                </div>
                                <div class="d-none">
                                    <input type="text" value="about_information" name="type_name" required/>
                                    <input type="text" value="about_information_image" name="type_name_image" required/>
                                </div>
                                <div class="d-none">
                                    <input type="text" value="About Information" name="title" required/>
                                    <input type="text" value="About Information Image" name="title_image" required/>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group mb-3">
                                        <button type='submit' class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Container-fluid starts -->
@endsection
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
        $('#value').summernote({
            height: 200,
            tabsize: 2
        });
    })
</script>
<script src="{{ asset('contents/admin') }}/assets/js/blog_vue.js"></script>
@endpush

