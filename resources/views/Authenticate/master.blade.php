<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>

         {{ $tabTitle ?? '' }}</title>


    <link rel="stylesheet" href="{{ asset('template/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/demo_1/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.png') }}">

    <link data-minify="1" rel='stylesheet'   href="{{ asset('template/assets/css/mystyle.css') }}"  type='text/css' media='all' />







    @yield('style')
</head>
<body class="sidebar-dark rtl">


    <div class="main-wrapper">
        <div class="page-wrapper full-page">

    @yield('content')


         </div>
    </div>

<script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
<script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('template/assets/js/template.js') }}"></script>




@include('sweetalert::alert')

@yield('script')

</body>
</html>
