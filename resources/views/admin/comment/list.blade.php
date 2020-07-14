@extends('admin.layout.master')
@section('title','Comment List')

@push('css')

    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">

@endpush

@section('content')



    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ $page_name }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="{{ url('back/posts') }}">Post List</a></li>
                        <li class="active">{{ $page_name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $page_name }}</strong>
                        </div>
                        <div class="card-body">

                            @if($message = Session::get('message'))
                                {{-- @if(session()->has('message')) --}}
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-success">Success</span>
                                    {{ $message }}
                                    {{-- {{ session()->get('message') }} --}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <table id="bootstrap-data-table" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $i => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->post->title }}</td>
                                        <td>{{ $row->comment }}</td>
                                        <td>
                                            {{ Form::open(['method' => 'PUT', 'url' => ['/back/comment/status/'.$row->id], 'style' => 'display:inline' ]) }}
                                            @if($row->status === 1)
                                                {{ Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm']) }}
                                            @else
                                                {{ Form::submit('Publish', ['class' => 'btn btn-success btn-sm']) }}
                                            @endif
                                            {{ Form::close() }}
                                        </td>
                                        <td width="5%">

                                            <div class="btn-group">

                                                <a href="{{ url('/back/comment/reply/'.$row->post_id) }}"><button class="btn btn-info btn-sm" >Reply</button></a>

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
        </div><!-- .animated -->
    </div><!-- .content -->


@endsection

@push('js')

    <script src="{{ asset('public/admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/lib/data-table/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

@endpush