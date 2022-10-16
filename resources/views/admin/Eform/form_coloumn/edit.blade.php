  @component('admin.layouts.content', [
      'title' => 'ویرایش فیلد',
      'tabTitle' => ' ویرایش فیلد',
      'breadcrumb' => [
        ['title' => 'لیست فرم ها', 'url' => route('admin.form.form.index')],
        ['title' => $form_coloumn->form->name , 'url' => route('admin.form.form.show', $form_coloumn->form )],
        ['title' => $form_coloumn->name , 'class' => 'active'],
        ['title' => 'ویرایش فیلد  ', 'class' => 'active'],
    ],
      ])




      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش فیلد </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form_coloumn.update', $form_coloumn) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


<input type="hidden" name="form_id"  value="{{$form_coloumn->form->id}}" >

                                        <div class="form-group">
                                            <label for="name">فرم  </label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                placeholder="   فرم  " name="course_name" value="{{$form_coloumn->form->name}}" disabled >
                                        </div>

                                        @include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_fields ,  'input_name' => 'name'  ,  'name_select' => '  نوع فیلد   ' ,  'value' =>   $form_coloumn->form_field_id  , 'required'=>'required'  , 'index_id'=>'form_field_id' ])

                                        <div class="form-group">
                                            <label for="name">نام فیلد</label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                placeholder=" نام فیلد  " name="name" value="{{$form_coloumn->name}}">
                                        </div>

 
                                        <div class="form-group">
                                            <label for="place">متن plac </label>
                                            <input type="text" class="form-control" id="link" autocomplete="off"
                                                placeholder=" متن plac   " name="place" value="{{$form_coloumn->place}}">
                                        </div>




                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{route('admin.form.form.show', $form_coloumn->form )}}" class="btn btn-danger">بازگشت</a>
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


    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/tinymce-rtl/tinymce.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/simplemde/simplemde.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/ace.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>

      <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('template/assets/js/template.js') }}"></script>
      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/ace.js') }}"></script>




      @endslot
  @endcomponent
