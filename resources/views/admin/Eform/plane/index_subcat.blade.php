@if ( $planes)
@php
$title_name= 'مدیریت '.$planes->name;
$breadcrumb   = [
['title' => 'مدیریت '.$planes->form_category->name, 'url' => route('admin.form.plane.index' , $planes->form_category->link )],
['title' => 'مدیریت '.$planes->name, 'url' => route('admin.form.plane.index_subcat' , [$planes->form_category->link  , $planes->link ] )],
         ['title' => '  مشاهده  ', 'class' => 'active']
        ]  ;  @endphp
@else
@php
$title_name='404';
$breadcrumb =  [
        ['title' => '  صفحه موردنظر وجود ندارد!  ', 'class' => 'active']
        ]  ;  @endphp
@endif



@component('admin.layouts.content',[
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
    @include('admin.Eform.card.plane_index_subcat', [  'guard'=>'admin' ,  $planes , $currencies  ])

@endif



    @slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
