  @component('admin.layouts.content', [
      'title' => 'ویرایش درخواست کاربر',
      'tabTitle' => ' ویرایش درخواست کاربر',
      'breadcrumb' => [['title' => 'لیست درخواست کاربر  ', 'url' => route('admin.form.form_data_list.index')], ['title' => 'ویرایش درخواست کاربر  ',
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


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form_data.update', $form_data_list->id) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">



                                        @if ($form_coloumns)
                                        @foreach ($form_coloumns as $admin)



                                        @php $mydata=''; @endphp
                                        @if($form_data)
                                        @foreach ($form_data as $medata )
                                        @if ($medata->form_coloumn_id==$admin->id)
                                        @php $mydata=$medata->data; @endphp
                                        @endif
                                        @endforeach
                                        @endif

                                        @if ($admin->form_field->name=='input')
                                        <div class="form-group">
                                            <label for="{{$admin->form_field->name}}{{$admin->id}}"> {{$admin->name}} </label>
                                            <input type="text" class="form-control" id="{{$admin->form_field->name}}{{$admin->id}}" autocomplete="off"
                                                   placeholder=" {{$admin->place}} " name="{{$admin->form_field->name}}{{$admin->id}}"
                                                    value="{{$mydata}}">
                                        </div>
                                        @endif


                                        @if ($admin->form_field->name=='select')
                                        @include('admin.layouts.table.selectbox', [ 'allforeachs' => $admin->form_coloumn_mults ,  'input_name' => 'name'  ,  'name_select' => $admin->name ,
                                         'value' =>  $mydata, 'required'=>'required'  , 'index_id'=> $admin->form_field->name.$admin->id ])
                                        @endif




                                        @if ($admin->form_field->name=='password')
                                        <div class="form-group">
                                            <label for="name"> {{$admin->name}} </label>
                                            <input type="password" class="form-control" id="{{$admin->form_field->name}}{{$admin->id}}" autocomplete="off"
                                                   placeholder=" {{$admin->name}} " name="{{$admin->form_field->name}}{{$admin->id}}"
                                                    value="{{$mydata}}">
                                        </div>
                                        @endif

                                        @if ($admin->form_field->name=='checkbox')
<hr>
                                        <div class="form-group">
                                            <label for="name"> {{$admin->name}} </label>
                                        </div>
									<div class="form-group">
                                        @foreach ($admin->form_coloumn_mults as $mult )
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input"  id="{{$admin->form_field->name}}{{$admin->id}}"
                                                name="{{$admin->form_field->name}}{{$admin->id}}"
                                                value="{{$mult->id}}"  {{($mult->id == $mydata ? 'checked' : '')}}   >
												 {{$mult->name}}
											</label>
										</div>
                                        @endforeach
                                        </div>
                                        @endif


                                        @if ($admin->form_field->name=='radiobox')
<hr>
                                        <div class="form-group">
                                            <label for="name"> {{$admin->name}} </label>
                                        </div>
									<div class="form-group">
                                        @foreach ($admin->form_coloumn_mults as $mult )
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input"  id="{{$admin->form_field->name}}{{$admin->id}}"
                                                name="{{$admin->form_field->name}}{{$admin->id}}"   value="{{$mult->id}}"  {{($mult->id == $mydata   ? 'checked' : '')}}   >
												 {{$mult->name}}
											</label>
										</div>
                                        @endforeach
                                        </div>
                                        @endif



                                        @if ($admin->form_field->name=='textaria')
									<div class="form-group">
										<label for="{{$admin->form_field->name}}{{$admin->id}}">{{$admin->name}}   </label>
										<textarea class="form-control" id="{{$admin->form_field->name}}{{$admin->id}}"
                                             name="{{$admin->form_field->name}}{{$admin->id}}" placeholder=" {{$admin->place}} "
											rows="5">{{$mydata}}</textarea>
									</div>
                                        @endif



                                        @if ($admin->form_field->name=='datepersian')

                                        @slot('style')
                                        <link rel="stylesheet" href="{{ asset('template/assets/css/persian-datepicker-0.4.5.min.css') }}">
                                        <link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
                                        @endslot


                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$admin->name}}  </h6>
                                        <div class="input-group date datepicker">

                                            <input type="text" class="form-control tarikh" id="{{$admin->form_field->name}}{{$admin->id}}"
                                            name="{{$admin->form_field->name}}{{$admin->id}}"  value="{{$mydata}}"><span class="input-group-addon"><i
                                                    data-feather="calendar"></i></span>
                                        </div>
                                        </div>
                                        </div>
                                        @endif



                                        @endforeach



                                        @endif







                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.form_category.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                          </div>


                                      </div>


                                  </div>

                              </form>



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
