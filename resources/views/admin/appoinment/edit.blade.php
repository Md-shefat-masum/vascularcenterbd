@extends('dashboard.layouts.admin')

@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <h3>
                        appoinment
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
                            <div class="card-title">Edit appoinment</div>
                            <a class="btn btn-primary" href="{{ route('appoinment.index') }}"><i class="fa fa-arrow-left"></i> go back</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="update_form" action="{{ route('appoinment.update',$appoinment->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="preloader"></div>

                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">name</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="name" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->name) !!}</textarea>
                                        <span class="text-danger name"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">date</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="date" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->date) !!}</textarea>
                                        <span class="text-danger date"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">time</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="time" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->time) !!}</textarea>
                                        <span class="text-danger time"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">phone</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="phone" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->phone) !!}</textarea>
                                        <span class="text-danger phone"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">email</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="email" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->email) !!}</textarea>
                                        <span class="text-danger email"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">topics</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="topic" class="form-control" value="{{ old('topic') }}"
                                            placeholder="chember *" required="">
                                            @foreach (App\Models\AppoinmentTopic::get() as $key=>$item)
                                                <option {{ $item->title==$appoinment->topic?'selected':'' }} value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('topics')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">chember</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="chember" class="form-control" value="{{ old('chember') }}"
                                            placeholder="chember *" required="">
                                            @foreach (App\Models\Chember::get() as $key=>$item)
                                                <option {{ $item->location==$appoinment->chember?'selected':'' }} value="{{ $item->location }}">{{ $item->location }}</option>
                                            @endforeach
                                        </select>
                                        @error('chember')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">message</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="message" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->message) !!}</textarea>
                                        <span class="text-danger message"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control" id="">
                                            <option {{ $appoinment->status==1?'selected':'' }} value="1">not completed</option>
                                            <option {{ $appoinment->status==2?'selected':'' }} value="2">completed</option>
                                        </select>
                                        {{-- <textarea type="text" name="status" class="form-control" id="input-21">{!! str_replace("<br />", "", $appoinment->status) !!}</textarea> --}}
                                        <span class="text-danger status"></span>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="" class="show_thumb form-control" id="input-21"/>
                                        <span class="text-danger icon"></span>
                                        <img class="img-thumbnail my-3" style="width: 200px;" src="/{{ $appoinment->image }}" alt="">
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



