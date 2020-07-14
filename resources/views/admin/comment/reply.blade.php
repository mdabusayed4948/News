@extends('admin.layout.master')
@section('title','Comment Reply')

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
                        <li><a href="{{ url('back/comment/'.$id) }}">Comment List</a></li>
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


                                    {{ Form::open(array('url'=>'back/comment/reply','method'=>'post')) }}

                                    {{-- <form action="" method="post" novalidate="novalidate"> --}}

                                    <div class="form-group">

                                        {{ Form::label('comment', 'Comment', array('class'=>'control-label mb-1')) }}

                                        {{ Form::textarea('comment', null, ['class'=>'form-control', 'id'=>'comment']) }}

                                    </div>
                                        {{ Form::hidden('post_id', $id) }}
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

<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

<script>
    jQuery('textarea.my-editor').ckeditor({
        filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Images',
        filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
        filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Files',
        filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
    });
</script>

@endpush