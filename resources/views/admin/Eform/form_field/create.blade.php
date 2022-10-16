  @component('admin.layouts.content', [
      'title' => 'ایجاد نوع فیلد',
      'tabTitle' => 'ایجاد نوع فیلد',
      'breadcrumb' => [['title' => 'لیست فیلدها', 'url' => route('admin.form.form_field.index')], ['title' => 'ایجاد نوع فیلد',
      'class' => 'active']],
      ])



@slot('style')





<link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/assets/css/demo_1/style.css') }}">

@endslot


      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">




                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4> ایجاد نوع فیلد </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form_field.store') }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


                                          <div class="form-group">
                                              <label for="name">نوع فیلد</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" نوع فیلد  " name="name" value="{{ old('name') }}">
                                          </div>



<hr>
<div class="form-group" >
    <label for="extr">حالت Multi</label>
</div>



<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="multi"
            id="in" value="1"   >
        فعال
    </label>
</div>

<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="multi"
            id="in" value="0"    >
        غیرفعال
    </label>
</div>



                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.form_field.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ثبت</button>
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







      <script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>


      <script src="{{ asset('template/assets/js/select2.js') }}"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                                <script>
                                    $(document).ready(function(){
                                        var date_input=$('input[id="date"]'); //our date input has the name "date"
                                        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                        date_input.datepicker({
                                            format: 'yyyy/mm/dd',
                                            container: container,
                                            todayHighlight: true,
                                            autoclose: true,
                                        })
                                    })
                                </script>




                                <script>




                                </script>

                                      @endslot
  @endcomponent
