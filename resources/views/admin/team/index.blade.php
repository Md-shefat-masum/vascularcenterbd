
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

    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Team </h5>
                        <a href="{{ route('team.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Social Links</th>
                                        <th class="text-right" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td scope="row">
                                                <img src="/{{ $item->image }}" style="width: 80px;" alt="" srcset="">
                                            </td>
                                            <td scope="row">{!! $item->name !!}</td>
                                            <td scope="row">{!!  $item->description !!}</td>
                                            <td scope="row">{!!  $item->s_links !!}</td>

                                            <td scope="row" style="width: 300px;">
                                                <div class="text-right">
                                                    <a type="button" href="{{ route('team.edit',$item->id) }}" class="btn btn-warning waves-effect waves-light m-1">
                                                        <i class="fa fa-pencil"></i> <span>edit</span>
                                                    </a>
                                                    <a type="button" onclick="return confirm('sure want to delete')" href="{{ route('team.destroy',$item->id) }}"
                                                        class="delete_btn btn btn-danger waves-effect waves-light m-1">
                                                        <i class="fa fa-trash-o"></i> <span>delete</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! $data->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Container-fluid starts -->
@endsection


