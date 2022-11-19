
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        SEO Information
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
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <h4>all</h4>
                        <a href="#" class="btn btn-info btn-sm m-1 create_btn" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalCreate"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Information</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($infos as $key => $item)
                                        
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if(is_array(json_decode($item->value)))
                                                   {{ implode(", ",json_decode($item->value)) }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end flex-wrap">
                                                    {{--  --}}
                                                    <a href="#" class="btn btn-primary btn-sm m-1 update_btn" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalUpdate" data-update="{{$item}}"><i class="fa fa-pencil"></i> Update</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('editor_seo_information_delete',['id'=>$item->id]) }}" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @php
        $keywords=[];
        foreach ($infos as $item)
        {
            if(is_array(json_decode($item->value)))
            {
                foreach ( json_decode($item->value) as  $key=>$val)
                {
                    $keywords[$val]=0;
                }
            } 
        }
    @endphp
    <!-- Container-fluid starts -->
    <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalCreateLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCreateLabel">Add Seo Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal body -->
                    <form id="seo_create_form" action="{{ route('editor_seo_information_store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="title">Seo Title</label>
                                <select class="form-select" aria-label="select example" name="title" id="title">
                                    @foreach ( $seo_title as $key => $val)
                                        <option value="{{$val->title}}">{{ $val->title }}</option>
                                    @endforeach
                                </select>
                            </div>
 
                            <div class="form-group mb-3">
                                <label for="value">Seo Keywords</label>
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id='create_value' name='value[]'>
                                    @foreach ($keywords as $key=>$val )
                                        <option value="{{$key}}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-none">
                                <input type="text" value="seo_information" id="type_name" name="type_name"/>
                            </div> 
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            <div class="form-group mb-3">
                                <button type='submit' class="btn btn-success">Submit</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" aria-labelledby="exampleModalUpdateLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalUpdateLabel">Update Seo Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal body -->
                    <form id="seo_update_form" action="{{ route('editor_seo_information_update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="title">Seo Title</label>
                                <select class="form-select" aria-label="select example" name="title" id="update_title">
                                    @foreach ( $seo_title as $key => $val)
                                        <option value="{{$val->title}}">{{ $val->title }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group mb-3">
                                    <label for="value">Seo Keywords</label>
                                    <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id='update_value' name='value[]'>
                                        @foreach ($keywords as $key=>$val )
                                            <option value="{{$key}}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group mb-3 d-none">
                                <input type="text" value="" id="update_id" name="id" class="form-control input_val" required/>
                            </div>  
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            <div class="form-group mb-3">
                                <button type='submit' class="btn btn-success">Submit</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push("pjs")
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
@push("ccss")
<link rel="stylesheet" type="text/css" href="{{asset('contents/admin') }}/assets/css/select2.css" />
@endpush
