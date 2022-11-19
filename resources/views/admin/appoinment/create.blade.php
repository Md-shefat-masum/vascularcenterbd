@extends('dashboard.layouts.admin')

@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
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

    <div class="">
        <div class="container">
            {{-- @include('admin.includes.bread_cumb',['title'=>'Create']) --}}
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="card-title">Create appoinment</div>
                            <a class="btn btn-primary" href="{{ route('appoinment.index') }}"><i class="fa fa-arrow-left"></i> go back</a>
                        </div>
                        <div class="card-body">
                            {{-- <hr /> --}}
                            <form method="POST" class="insert_form" action="{{ route('appoinment.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="preloader"></div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name *" >
                                        @error('name')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="date *" required="">
                                        @error('date')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">time</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="time" class="form-control" value="{{ old('time') }}" placeholder="time *" required="">
                                        @error('time')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="phone *" required="">
                                        @error('phone')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="email *" required="">
                                        @error('email')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">topics</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="topic" class="form-control" value="{{ old('topic') }}"
                                            placeholder="chember *" required="">
                                            @foreach (App\Models\AppoinmentTopic::get() as $key=>$item)
                                                <option {{ $key==0?'selected':'' }} value="{{ $item->title }}">{{ $item->title }}</option>
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
                                                <option {{ $key==0?'selected':'' }} value="{{ $item->location }}">{{ $item->location }}</option>
                                            @endforeach
                                        </select>
                                        @error('chember')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" placeholder="image *" required="">
                                        @error('image')
                                            <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">message</label>
                                    <div class="col-sm-10">
                                        <textarea name="message" class="form-control" id="input-21"></textarea>
                                        <span class="text-danger icon"></span>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary px-5"><i class="fa fa-plus"></i> ADD</button>
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



