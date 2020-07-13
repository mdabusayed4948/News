<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    
    @include('admin.layout.top')

</head>
<body>


        <!-- Left Panel -->

    @include('admin.layout.navigation')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.layout.header')
        <!-- Header-->

        @yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('admin.layout.bottom')

</body>
</html>
