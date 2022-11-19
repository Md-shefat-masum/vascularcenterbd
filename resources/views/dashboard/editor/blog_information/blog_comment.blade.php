

@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Course Information
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
    <div class="container" id='tableBody'>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        {{-- <h4>{{ $course->title }} রেজিস্ট্রেশন</h4> --}}
                        {{-- <a href="{{ route("editor_all_course_registration_information")}}" class="btn btn-info btn-sm m-1 create_btn"> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center table-striped table-hover">
                                <thead>
                                    <tr class="">
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($comment as $key => $item)

                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->creator->first_name }} {{ $item->creator->last_name }}</td>
                                            <td>{{ $item->comment }}</td>
                                            <td>
                                                @if ($item->status)
                                                    <span class="badge p-3 badge-success">accepted</span>
                                                @else
                                                    <a onclick="return confirm('sure want to accept')" href="{{ route('editor_blog_comment_accept') }}?id={{$item->id}}" class="badge text-dark p-3 badge-warning">accept</a>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('editor_blog_comment_delete',['id'=>$item->id]) }}" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i> Delete</a>
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
@endsection
