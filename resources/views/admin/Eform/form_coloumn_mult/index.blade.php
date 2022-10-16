@if ( $id!='all')
@php  $breadcrumb   = [

['title' => 'لیست فرم ها', 'url' => route('admin.form.form.index')],
        ['title' => $form_coloumns->form->name , 'url' => route('admin.form.form.show',  $form_coloumns->form )],
        ['title' => $form_coloumns->name , 'url' => route('admin.form.form_coloumn.index',  $form_coloumns->form )],
        ['title' => $form_coloumns->name , 'class' => 'active'],
        ['title' => 'ویرایش فیلد  ', 'class' => 'active'],

        ]  ;  @endphp

@else

@php  $breadcrumb =  [
        ['title' => 'ویرایش فیلد  ', 'class' => 'active']

        ]  ;  @endphp
@endif


@component('admin.layouts.content',[
    'title'=>'مشاهده فیلدها',
    'tabTitle'=>'مشاهده فیلدها ',
    'breadcrumb'=>$breadcrumb

    ])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot

@include('admin.Eform.fetch.form_coloumn' , [ $form_coloumn_mults ])

@slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
