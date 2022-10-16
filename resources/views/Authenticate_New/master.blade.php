
<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $tabTitle ?? '' }}</title>

    <link rel="stylesheet" href="{{ asset('templogin/css/farsi-font.css') }}">
    <link rel="stylesheet" href="{{ asset('templogin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templogin/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templogin/css/iofrm-style.css') }}">
    <link rel="stylesheet" href="{{ asset('templogin/css/iofrm-theme6.css') }}">
    <link rel="stylesheet" href="{{ asset('templogin/css/custom.css') }}">

        <link data-minify="1" rel='stylesheet'   href="{{ asset('template/assets/css/mystyle.css') }}"  type='text/css' media='all' />



    @yield('style')

</head>
<body>

    @yield('content')


<script src="{{ asset('templogin/js/jquery.min.js') }}"></script>
<script src="{{ asset('templogin/js/popper.min.js') }}"></script>
<script src="{{ asset('templogin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('templogin/js/main.js') }}"></script>


@include('sweetalert::alert')

@yield('script')
</body>
</html>
