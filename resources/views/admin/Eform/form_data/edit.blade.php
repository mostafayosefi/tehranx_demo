  @component('admin.layouts.content', [
      'title' => 'ویرایش درخواست کاربر'.'('.$form_data_list->form->name.')',
      'tabTitle' => ' ویرایش درخواست کاربر'.'('.$form_data_list->form->name.')',
      'breadcrumb' => [['title' => 'لیست درخواست کاربر  ', 'url' => route('admin.form.form_data_list.index')], ['title' => 'ویرایش درخواست کاربر  '.'('.$form_data_list->form->name.')',
      'class' => 'active']],
      ])


@slot('style')

<link rel="stylesheet" href="{{ asset('template/assets/vendors/core/core.css') }}">
<!-- endinject -->
<!-- plugin css for this page -->
<link rel="stylesheet" href="{{ asset('template/assets/css/persian-datepicker-0.4.5.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/dropzone/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/dropify/dist/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}">
<!-- end plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{ asset('template/assets/css/demo_1/style.css') }}">
<!-- End layout styles -->
@endslot



<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="card-header card-header-border-bottom">
                            <h4>ویرایش درخواست کاربر </h4>
                        </div>
                        <br>
                        @include('admin.layouts.errors')

                            <div class="row">



                                <div class="col-sm-12">
                                    @include('admin.Eform.card.template' , ['guard' => 'admin' , 'form'=> $form_data_list->form
                                     , 'user'=>$form_data_list->user , $currencies  , $form_data_list ,
                                      'route'=> route('admin.form.form_data.update', $form_data_list->id) , 'method' => 'update' ] )
                                </div>






</div>







</div>
</div>
</div>




</div>
</div>
</div>








      @slot('script')


  	<script src="{{ asset('template/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/dropzone/dropzone.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/moment/moment.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>

  	<script src="{{ asset('template/assets/js/typeahead.js') }}"></script>
	<script src="{{ asset('template/assets/js/tags-input.js') }}"></script>
	<script src="{{ asset('template/assets/js/dropzone.js') }}"></script>
	<script src="{{ asset('template/assets/js/dropify.js') }}"></script>
 	<script src="{{ asset('template/assets/js/datepicker.js') }}"></script>
	<script src="{{ asset('template/assets/js/timepicker.js') }}"></script>
	<script src="{{ asset('template/assets/js/persian-date-0.1.8.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/persian-datepicker-0.4.5.min.js') }}"></script>




      @endslot
  @endcomponent
