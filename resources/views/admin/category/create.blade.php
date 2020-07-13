@extends('admin.layout.master')
@section('title','Category Create')
@push('css') {{-- Create CSS --}}

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
                        <li><a href="{{ url('back/') }}">Dashboard</a></li>
                        <li><a href="{{ url('back/categories') }}">Category List</a></li>
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
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">

                                    @if(count($errors) > 0)
                                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">

                                            <span class="badge badge-pill badge-danger">Errors</span>


                                            @foreach($errors->all() as $i =>$error)

                                                <span class="badge badge-pill badge-warning">{{ ++$i}}.</span> {{ $error }}
                                            @endforeach



                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif


                                    {{ Form::open(array('url'=>'back/category/store','method'=>'post')) }}

                                    <div class="form-group">

                                        {{ Form::label('name', 'Name', array('class'=>'control-label mb-1')) }}

                                        {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'name']) }}

                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Submit</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                    {{-- </form> --}}

                                    {{ Form::close() }}
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->



@endsection

@push('js') {{-- Create JS --}}

@endpush