@extends('admin.master')
@section('content')
    <div class="container">
        <!-- begin::page-header -->
            @include('admin.layouts.breadcrumb',['breadcrumb'=>$breadcrumb,'title'=>$title])
        <!-- end::page-header -->

        <!-- begin::view errors -->
        <!-- end::view errors -->
        {{ $slot }}
    </div>
@endsection

@section('style')
    {{ $style ?? '' }}
@endsection

@section('script')
    {{ $script ?? '' }}
@endsection
