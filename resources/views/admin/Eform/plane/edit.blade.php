@if ( $planes)
@php
$title_name= 'مدیریت '.$planes->name;
$breadcrumb   = [
['title' => 'مدیریت '.$planes->form_subcategory->form_category->name, 'url' => route('admin.form.plane.index' , $planes->form_subcategory->form_category->link )],
['title' => 'مدیریت '.$planes->form_subcategory->name, 'url' => route('admin.form.plane.index_subcat' , [$planes->form_subcategory->form_category->link  , $planes->form_subcategory->link ] )],
['title' => 'ویرایش '.$planes->name, 'url' => route('admin.form.plane.edit' , [$planes->form_subcategory->form_category->link  , $planes->form_subcategory->link , $planes->link  ] )],
         ['title' => '  ویرایش  ', 'class' => 'active']
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




      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش سرویس {{$planes->name}} </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form.update', $form) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">

 
@include('admin.Eform.card.form', [  'guard' =>  'admin' , 'oper' =>  'edit_plane'  ,$form ,$form_categories ,
$form_subcategories, $form_templates  , $currencies ])
 

                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.plane.index_subcat' , [$planes->form_subcategory->form_category->link  , $planes->form_subcategory->link ] ) }}" class="btn btn-danger">بازگشت</a>
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
