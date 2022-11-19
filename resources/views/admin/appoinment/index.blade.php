
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

    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>topic</th>
                                    <th>chember</th>
                                    <th>time</th>
                                    <th>date</th>
                                    <th>image</th>
                                    <th>message</th>
                                    <!--<th>status</th>-->
                                    <th>created_at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                

            </div>
        </div>

    </div>
    <!-- Container-fluid starts -->
    @push('cjs')
    
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/sl-1.4.0/datatables.min.css"/>
        <script src="https://momentjs.com/downloads/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/sl-1.4.0/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
        
        <script>
            window.moment = moment;
            $(document).ready(function () {
                window.get_page = 1;
                let dTable = $('#example').DataTable({
                    processing: true,
                    serverSide: true,
                    fixedHeader: {
                        header: true,
                        // footer: true
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'pageLength',
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible',
                            },
                        },
                        {
                            extend: 'copy',
                            exportOptions: {
                                columns: ':visible',
                            },
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':visible',
                            },
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: ':visible',
                            },
                        },
                        'colvis',
                    ],
                    ajax: {
                        // url: 'https://libraryapi.sobujdiganta.com/api/book-list',
                        url: '/dashboard/appoinment/all',
                        data: function(d,e){
                            d.key = d.search.value||null;
                            d.paginate = d.length;
                            d.orderByColumn = d.columns[d.order[0].column].data;
                            d.orderBy = d.order[0].dir.toUpperCase();
                            return {
                                paginate: d.paginate,
                                page: window.get_page,
                                key: d.key,
                                orderBy: d.orderBy,
                                orderByColumn: d.orderByColumn,
                            }
                        },
                        dataFilter: function(data){
                            data = JSON.parse(data);
                            data.recordsTotal = data.total;
                            data.recordsFiltered = data.total;
                            // console.log(data);
                            return JSON.stringify( data );
                        }
                    },
                    "aoColumns": [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'phone' },
                        { data: 'topic' },
                        { data: 'chember' },
                        // { data: 'time' },
                        { 
                            mData: 'time',
                            mRender: function(data){
                                return moment('2022-06-08 '+data).format('hh:mm')
                            }
                            
                        },
                        { data: 'date' },
                        // { data: 'image' },
                        { 
                            mData: 'image',
                            mRender: function(data, type, row){
                                if(data){
                                    return `<a target="_blank" href="${window.location.origin+'/'+data}">Show uploaded doc</a>`;
                                }else{
                                    return "";
                                }
                            }
                        
                        },
                        { data: 'message' },
                        // { data: 'status' },
                        { 
                            mData: 'created_at',
                            mRender: function(data){
                                return moment(data).format('d MMMM,YYYY hh:mm:ss')
                            }
                            
                        },
                        {
                            "mData": "id",
                            "mRender": function (data, type, row) {
                                // console.log(data, type, row);
                                return `<a class="btn btn-sm btn-danger" onclick="return confirm('sure! want to delte');" href="/dashboard/appoinment-delete/${data}">Delete</a>`;
                            }
                        }
                    ],
                    // columns: [
                    //     { data: 'id' },
                    //     { data: 'name' },
                    //     { data: 'email' },
                    //     { data: 'phone' },
                    //     { data: 'topic' },
                    //     { data: 'chember' },
                    //     { data: 'time' },
                    //     { data: 'date' },
                    //     { data: 'image' },
                    //     { data: 'message' },
                    //     { data: 'status' },
                    //     { data: 'created_at' },
                    //     { data: 'action' },
                    // ],
                });
                
                dTable.on( 'page.dt', function () {
                    window.get_page = dTable.page.info().page + 1;
                })
                .on('search.dt', function(){
                    window.get_page = 1;
                })
                .on('order.dt', function(){
                    window.get_page = 1;
                });
            });
        </script>
    @endpush
@endsection

{{--
<div class="card d-none">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">appoinment </h5>
                        <a href="{{ route('appoinment.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Topic</th>
                                        <th scope="col">Chember</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Image</th>
                                        <th class="text-right" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td scope="row">{!! $item->name !!}</td>
                                            <td scope="row">{!!  $item->date !!}</td>
                                            <td scope="row">{!!  $item->time !!}</td>
                                            <td scope="row">{!!  $item->phone !!}</td>
                                            <td scope="row">{!!  $item->email !!}</td>
                                            <td scope="row">{!!  $item->topic !!}</td>
                                            <td scope="row">{!!  $item->chember !!}</td>
                                            <td scope="row">{!!  $item->message !!}</td>
                                            <td scope="row">
                                                @if ($item->status == 1)
                                                    <span class="btn btn-sm btn-warning">Pending</span>
                                                @else
                                                    <span class="btn btn-sm btn-success">Completed</span>
                                                @endif
                                            </td>
                                            <td scope="row">
                                                <img src="/{{ $item->image }}" style="width: 80px;" alt="" srcset="">
                                            </td>
                                            <td scope="row" style="width: 300px;">
                                                <div class="text-right">
                                                    <a type="button" href="{{ route('appoinment.edit',$item->id) }}" class="btn btn-warning waves-effect waves-light m-1">
                                                        <i class="fa fa-pencil"></i> <span>Show &amp; Modify</span>
                                                    </a>
                                                    <a type="button" onclick="return confirm('sure want to delete')" href="{{ route('appoinment.destroy',$item->id) }}"
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
                

--}}


