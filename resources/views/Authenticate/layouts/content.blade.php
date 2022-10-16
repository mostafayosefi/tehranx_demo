@extends('Authenticate.master')
@section('content')
<div class="page-content d-flex align-items-center justify-content-center">
    {{ $slot }}
    </div>
@endsection

@section('style')
    {{ $style ?? '' }}
@endsection

@section('script')
    {{ $script ?? '' }}
@endsection
