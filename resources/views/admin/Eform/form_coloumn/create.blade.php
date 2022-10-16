  @component('admin.layouts.content', [
      'title' => 'ثبت فیلد',
      'tabTitle' => 'ثبت فیلد',
      'breadcrumb' => [['title' => 'لیست فیلدها ', 'url' => route('admin.form.form_coloumn.index')], ['title' => 'ثبت فیلد',
      'class' => 'active']],
      ])


@slot('style')


<script>
    function fetch_myselect_4(vall){
        var vall = document.getElementById("form_category_id").value;$.ajax({
            type: 'get',
            url: '../../../admin/fetch/form_subcategory/'+vall+'',
        data: {get_option:vall},
        success: function (response) {document.getElementById("form_subcategory_id").innerHTML=response;}
    });
        }
</script>

<script>
    function fetch_form_fetch(valle){
        var vall = document.getElementById("form_subcategory_id").value;$.ajax({
            type: 'get',
            url: '../../../admin/fetch/form_fetch/'+valle+'',
        data: {get_option:valle},
        success: function (response) {document.getElementById("form_id").innerHTML=response;}
    });
        }
</script>

          <script>
              function fetch_form(val){
                  var vall = document.getElementById("form_id").value;$.ajax({
                      type: 'get',
                      url: '../../../admin/fetch/form/'+val+'/1'+'',
                      data: {get_option:val},
                      success: function (response) {document.getElementById("form_coloumn_id").innerHTML=response;}
                  });
              }
          </script>
          <script>
              function fetch_form_coloumn(vall){
                  var vall = document.getElementById("form_coloumn_id").value;$.ajax({
                      type: 'get',
                      url: '../../../admin/fetch/form_coloumn/'+vall+'',
                      data: {get_option:vall},
                      success: function (response) {document.getElementById("form_coloumn_mults").innerHTML=response;}
                  });
              }
          </script>

      @endslot



      <div class="row">
          <div class="col-3 col-xl-3 stretch-card"></div>
          <div class="col-6 col-xl-6 stretch-card">


              <div class="row flex-grow">




                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4> ثبت فیلد </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')

  <form class="forms-sample" method="POST" action="{{ route('admin.form.form_coloumn.store') }}"
  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">



                                        @include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_categories ,  'input_name' => 'name'  ,  'name_select' => ' گروه فرم ' ,  'value' =>   old('form_category_id') , 'required'=>'required'  , 'index_id'=>'form_category_id' ])
                                        @include('admin.layouts.table.selectbox', [ 'allforeachs' => '' ,  'input_name' => 'name'  ,  'name_select' => 'زیرگروه ' ,  'value' =>   old('form_subcategory_id') , 'required'=>'required'  , 'index_id'=>'form_subcategory_id' ])


                                       @include('admin.layouts.table.selectbox', [ 'allforeachs' => '' ,  'input_name' => 'name'  ,  'name_select' => '  فرم   ' ,  'value' =>   old('form_id') , 'required'=>'required'  , 'index_id'=>'form_id' ])


@include('admin.Eform.form_coloumn.create_table', [ 'guard' =>   'admin' ])
@include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_fields ,  'input_name' => 'name'  ,  'name_select' => '  نوع فیلد   ' ,  'value' =>   old('form_field_id') , 'required'=>'required'  , 'index_id'=>'form_field_id' ])



                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.form_coloumn.index') }}" class="btn btn-danger">بازگشت</a>
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

          <div class="col-3 col-xl-3 stretch-card"></div>
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
