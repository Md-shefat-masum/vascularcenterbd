@extends('dashboard.layouts.admin')

@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Team
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
                            <div class="card-title">Edit Team Member</div>
                            <a class="btn btn-primary" href="{{ route('team.index') }}">
                                <i class="fa fa-arrow-left"></i>
                                go back
                            </a>
                        </div>
                        <div class="card-body">
                            {{-- <hr /> --}}
                            <form method="POST" class="insert_form" action="{{ route('team.update',$team->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{$team->id}}">
                                <div class="preloader"></div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="name" class="form-control" id="input-21">{{$team->name}}</textarea>
                                        <span class="text-danger name"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <table class="table" id="designation_list">
                                            @php
                                                $designations = json_decode($team->designation);
                                            @endphp
                                            @foreach ($designations as $key=>$designation)
                                                <tr>
                                                    <td style="width: 120px;">
                                                        <input value="{{$key}}" required onkeyup="chage_relative_input_name(event)" type="text" value="qualifications">
                                                    </td>
                                                    <td style="width: 5px;">:</td>
                                                    <td>
                                                        <input value="{{  $designation }}" required type="text" name="designation[{{$key}}]" class="form-control">
                                                    </td>
                                                    <td style="width: 40px;">
                                                        <i onclick="remove_tr(event)" class="fa fa-trash btn btn-sm btn-danger"></i>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>
                                        <div class="text-center">
                                            <button
                                                onclick="add_designation()"
                                                class="btn btn-sm btn-info">
                                                <i class="fa fa-plus me-2"></i> Add More
                                            </button>
                                        </div>
                                        <span class="text-danger designation"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="description" class="form-control" id="input-21" >{{$team->description}}</textarea>
                                        <span class="text-danger description"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">social links</label>
                                    <div class="col-sm-10">
                                        <table class="table">
                                            @php
                                                $s_links = json_decode($team->s_links);
                                            @endphp
                                            @foreach ($s_links as $key=>$link)
                                                <tr>
                                                    <td style="width: 120px;text-transform:capitalize;">
                                                        {{$key}}
                                                    </td>
                                                    <td style="width: 5px;">:</td>
                                                    <td>
                                                        <input type="text" value="{{$link}}" name="s_links[{{$key}}]" class="form-control">
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </table>
                                        <span class="text-danger s_links"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="input-21" class="col-sm-2 col-form-label">Image <sub>size: 400 x 400 px</sub></label>
                                    <div class="col-sm-10">
                                        <input accept=".jpg,.jpeg,.png" type="file" name="image" class="form-control show_thumb" id="input-21"/>
                                        <span class="text-danger image"></span>
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

    <script>
        function add_designation(){
            event.preventDefault();

            let innerHTML = `
                <tr>
                    <td>
                        <input type="text" required onkeyup="chage_relative_input_name(event)" value="qualification_title">
                    </td>
                    <td style="width: 5px;">:</td>
                    <td>
                        <input type="text" required name="designation[qualifications]" class="form-control">
                    </td>
                    <td style="width: 40px;">
                        <i onclick="remove_tr(event)" class="fa fa-trash btn btn-sm btn-danger"></i>
                    </td>
                </tr>
            ` ;

            let table = document.querySelector('#designation_list tbody');
            table.insertAdjacentHTML('beforeend', innerHTML);

        }

        function chage_relative_input_name(e){
            let name = `designation[${e.target.value}]`;
            let target = e.target.parentNode.parentNode.children[2].children[0];
            target.name = `${name}`;
            console.log(name, target.name, target);
        }

        function remove_tr(event){
            event.target.parentNode.parentNode.remove()
        }
    </script>
@endsection



