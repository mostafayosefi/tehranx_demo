@extends('Authenticate_New.master')
@section('content')
     {{ $slot }}
 @endsection

@section('style')
    {{ $style ?? '' }}
@endsection

@section('script')
    {{ $script ?? '' }}
@endsection
