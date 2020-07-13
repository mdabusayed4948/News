@extends('admin.layout.master')
@section('title','Post List')

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
                    @permission(['Post Add','All'])
                    <li><a href="{{ url('back/posts/create') }}">Create Post</a></li>
                    @endpermission
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
                        @permission(['Post Add','All'])
                        <a href="{{ url('back/posts/create') }}" class="pull-right btn btn-dark"><i class="fa fa-plus-circle"></i> <span class="badge badge-pill badge-warning">Create</span></a>
                        @endpermission
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
                                <th>Image</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Total View</th>
                                <th>Status</th>
                                <th>Hot News</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $i => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        @if (file_exists(public_path('/post/').$row->thumb_image))
                                            <img src="{{ asset('public/post') }}/{{ $row->list_image }}" class="img-responsive img-thumbnail">
                                        @endif
                                    </td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->creator->name }}</td>
                                    <td>{{ $row->view_count }}</td>
                                    <td>
                                        {{ Form::open(['method' => 'PUT', 'url' => ['/back/post/status/'.$row->id], 'style' => 'display:inline' ]) }}
                                        @if($row->status === 1)
                                            {{ Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm']) }}
                                        @else
                                            {{ Form::submit('Publish', ['class' => 'btn btn-success btn-sm']) }}
                                        @endif
                                        {{ Form::close() }}
                                    </td>
                                    <td>
                                        {{ Form::open(['method' => 'PUT', 'url' => ['/back/post/hot/news/'.$row->id], 'style' => 'display:inline' ]) }}
                                        @if($row->hot_news === 1)
                                            {{ Form::submit('No', ['class' => 'btn btn-danger btn-sm']) }}
                                        @else
                                            {{ Form::submit('Yes', ['class' => 'btn btn-success btn-sm']) }}
                                        @endif
                                        {{ Form::close() }}
                                    </td>
                                    <td width="5%">

                                        <div class="btn-group">
                                            @permission(['Post Add','All','Post Update'])
                                            <a href="{{ url('/back/post/edit/'.$row->id) }}"><button class="btn btn-warning" ><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></button></a>
                                            @endpermission
                                            @permission(['Post Add','All'])
                                            {{ Form::open(['method' => 'DELETE', 'url' => ['/back/post/delete/'.$row->id], 'style' => 'display:inline' ]) }}
                                            {{ Form::submit('X', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                            @endpermission


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