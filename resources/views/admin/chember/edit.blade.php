@extends('dashboard.layouts.admin')

@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <h3>
                        Chember
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
        <div class="container-fluid">
            {{-- @include('admin.includes.bread_cumb',['title'=>'Edit']) --}}
            <div class="row mb-4">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="card-title">Edit Chember</div>
                            <a class="btn btn-primary" href="{{ route('chember.index') }}"><i class="fa fa-arrow-left"></i> go back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="update_form" action="{{ route('chember.update',$chember->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="preloader"></div>

                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="location" class="form-control" id="input-21">{!! str_replace("<br />", "", $chember->location) !!}</textarea>
                                        <span class="text-danger name"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">details</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="details" class="form-control" id="input-21" >{!! str_replace("<br />", "", $chember->details) !!}</textarea>
                                        <span class="text-danger button_text"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Image <sub>size: 283 x 195 px</sub></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="show_thumb form-control" id="input-21"/>
                                        <span class="text-danger icon"></span>
                                        <img class="img-thumbnail my-3" style="width: 200px;" src="/{{ $chember->image }}" alt="">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary px-5"><i class="icon-plus"></i> Update</button>
                                    </div>
                                </div>
                            </form>
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
    <!--End content-wrapper-->

@endsection



