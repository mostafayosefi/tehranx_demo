  @component('admin.layouts.content', [
      'title' => 'ویرایش فرم',
      'tabTitle' => ' ویرایش فرم',
      'breadcrumb' => [['title' => 'لیست فرم', 'url' => route('admin.form.form.index')], ['title' => 'ویرایش فرم  ',
      'class' => 'active']],
      ])


@slot('style')

<script>
    function fetch_myselect_4(vall){
        var vall = document.getElementById("form_category_id").value;$.ajax({
            type: 'get',
            url: '../../../../admin/fetch/form_subcategory/'+vall+'',
        data: {get_option:vall},
        success: function (response) {document.getElementById("form_subcategory_id").innerHTML=response;}
    });
        }
</script>

<script>
    function fetch_currency(vall){
        var vall = document.getElementById("form_currency_id").value;$.ajax({
            type: 'get',
            url: '../../../../admin/fetch/form_currency/'+vall+'',
        data: {get_option:vall},
        success: function (response) {document.getElementById("currency_name").innerHTML=response;}
    });
        }
</script>

@endslot





      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش فرم </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form.update', $form) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">

 
@include('admin.Eform.card.form', [  'guard' =>  'admin' , 'oper' =>  'edit_plane'   ,$form ,$form_categories ,
$form_subcategories, $form_templates  , $currencies ])
 

                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.form.index') }}" class="btn btn-danger">بازگشت</a>
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
