@if ( $planes)
@php
$title_name= 'مشاهده '.$planes->name;
$breadcrumb   = [
['title' => 'مشاهده '.$planes->form_category->name, 'url' => route('user.payment.plane.index' , $planes->form_category->link )],
['title' => 'مشاهده '.$planes->name, 'url' => route('user.payment.plane.index_subcat' , [$planes->form_category->link  , $planes->link ] )],
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
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot




@if($planes == Null)
@include('admin.errors.404')
@elseif($planes != Null)

    @include('admin.Eform.card.plane_index_subcat', [  'guard'=>'user' ,  $planes , $currencies   ])


@endif



    @slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
