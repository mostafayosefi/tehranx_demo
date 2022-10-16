@if ( $planes)
@php
$title_name= 'مشاهده '.$planes->name;
$breadcrumb   = [
['title' => 'مشاهده '.$planes->form_subcategory->form_category->name, 'url' => route('user.payment.plane.index' , $planes->form_subcategory->form_category->link )],
['title' => 'مشاهده '.$planes->form_subcategory->name, 'url' => route('user.payment.plane.index_subcat' , [$planes->form_subcategory->form_category->link  , $planes->form_subcategory->link ] )],
['title' => 'مشاهده '.$planes->name, 'url' => route('user.payment.plane.index_form' , [$planes->form_subcategory->form_category->link  , $planes->form_subcategory->link  , $planes->link ] )],
         ['title' => '  ثبت سفارش  ', 'class' => 'active']
        ]  ;  @endphp
@else
@php
$title_name='404';
$breadcrumb =  [
        ['title' => '  صفحه موردنظر وجود ندارد!  ', 'class' => 'active']
        ]  ;  @endphp
@endif



@component('user.layouts.content',[
    'title'=>$title_name,
    'tabTitle'=>$title_name,
    'breadcrumb'=>  $breadcrumb
    ])



@slot('style')



<link rel="stylesheet" href="{{ asset('template/assets/css/persian-datepicker-0.4.5.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/assets/dateflatpicker/flatpickr.min.css') }}">


{{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> --}}
@endslot




@if($planes == Null)
@include('admin.errors.404')
@elseif($planes != Null)

    {{-- @include('admin.Eform.card.plane_index_form', [  'guard'=>'user' ,  $planes , $currencies , $user  ]) --}}



    <div class="col-sm-12">
        @include('admin.Eform.card.template' , ['guard' => 'user' , 'form'=> $planes
         , 'user'=>$user , $currencies  , 'form_data_list' => null  , 'form_data' => null ,
         'route'=> route('user.payment.order.store' ,[  'form'=> $planes ] ) , 'method' => 'insert' ] )
    </div>




@endif



    @slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>


	<script src="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/datepicker.js') }}"></script>
	<script src="{{ asset('template/assets/js/persian-date-0.1.8.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/persian-datepicker-0.4.5.min.js') }}"></script>



	<script src="{{ asset('template/assets/dateflatpicker/pickr.min.js') }}"></script>
	<script src="{{ asset('template/assets/dateflatpicker/moment.min.js') }}"></script>
	<script src="{{ asset('template/assets/dateflatpicker/flatpickr.min.js') }}"></script>

{{-- 
	<script src="{{ asset('template/assets/dateflatpicker/pickr.js') }}"></script>
	<script src="{{ asset('template/assets/dateflatpicker/flatpickr.js') }}"></script> --}}

    @endslot
@endcomponent
