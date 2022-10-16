@component('admin.layouts.content', [
    'title' => 'ثبت درخواست کاربر',
    'tabTitle' => 'ثبت درخواست کاربر',
    'breadcrumb' => [['title' => 'مشاهده درخواستهای کاربران', 'url' => route('admin.form.form_data_list.index')], ['title' => 'ثبت درخواست کاربر',
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
  function fetch_form_fetch(vall){
      var vall = document.getElementById("form_subcategory_id").value;$.ajax({
          type: 'get',
          url: '../../../admin/fetch/form_fetch/'+vall+'',
      data: {get_option:vall},
      success: function (response) {document.getElementById("form_id").innerHTML=response;}
  });
      }
</script>


<script>
    function fetch_form(valle){
        var vall = document.getElementById("form_id").value;$.ajax({
            type: 'get',
            url: '../../../admin/fetch/form_fetch_price/'+valle+'',
        data: {get_option:valle},
        success: function (response) {document.getElementById("get_select_price").innerHTML=response;}
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
                                <h4> ثبت درخواست کاربر </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST" action="{{ route('admin.form.form_data_list.store') }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">



@include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_categories ,  'input_name' => 'name'  ,  'name_select' => ' گروه فرم ' ,  'value' =>   old('form_category_id') , 'required'=>'required'  , 'index_id'=>'form_category_id' ])
@include('admin.layouts.table.selectbox', [ 'allforeachs' => '' ,  'input_name' => 'name'  ,  'name_select' => 'زیرگروه ' ,  'value' =>   old('form_subcategory_id') , 'required'=>'required'  , 'index_id'=>'form_subcategory_id' ])
@include('admin.layouts.table.selectbox', [ 'allforeachs' => '' ,  'input_name' => 'name'  ,  'name_select' => 'فرم ' ,  'value' =>   old('form_id') , 'required'=>'required'  , 'index_id'=>'form_id' ])
@include('admin.layouts.table.selectbox', [ 'allforeachs' => $users ,  'input_name' => 'name'  ,  'name_select' => ' کاربر   ' ,  'value' =>   old('user_id') , 'required'=>'required'  , 'index_id'=>'user_id' ])

<div id="get_select_price">

    @include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => ''  , 'disable_money' => ''
    , $currencies   , $form , 'form_data' =>null , 'form_data_list' =>null ])

</div>

                                        <div class="card-footer">
                                            <a href="{{ route('admin.form.form_data_list.index') }}" class="btn btn-danger">بازگشت</a>
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




    @endslot
@endcomponent
