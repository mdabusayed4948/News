@extends('admin.layout.master')
@section('title','Role List')

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
                    <li><a href="{{ url('back/roles/create') }}">Create Role</a></li>
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
                    <a href="{{ url('back/roles/create') }}" class="pull-right btn btn-dark"><i class="fa fa-plus-circle"></i> <span class="badge badge-pill badge-warning">Create</span></a>
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
                <th>Display Name</th>
                <th>Description</th>
                <th>Permissions</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $i => $row)
              <tr>
                <td width="5%">{{ ++$i }}</td>
                <td width="10%">{{ $row->name }}</td>
                <td width="20%">{{ $row->display_name }}</td>
                <td width="20%">{{ $row->description }}</td>

                <td width="40%">
                  @if($row->perms())
                  @foreach($row->perms()->get() as $permission)

                  <span class="badge badge-pill badge-info">{{ $permission->name }}</span>

                  @endforeach
                  
                  @endif
                </td>

                <td width="5%">

                    <div class="btn-group">
                        
                      <a href="{{ url('/back/roles/edit/'.$row->id) }}"><button class="btn btn-warning" ><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></button></a>
                      
                      {{ Form::open(['method' => 'DELETE', 'url' => ['/back/roles/delete/'.$row->id], 'style' => 'display:inline' ]) }}
                      {{ Form::submit('X', ['class' => 'btn btn-danger','title' => 'Delete']) }}
                      {{ Form::close() }}

                    

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