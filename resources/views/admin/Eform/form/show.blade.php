  @component('admin.layouts.content', [
      'title' => 'مدیریت فیلدهای فرم',
      'tabTitle' => ' مدیریت فیلدهای فرم',
      'breadcrumb' => [['title' => 'لیست فرم ها', 'url' => route('admin.form.form.index')], ['title' => 'مدیریت فیلدهای فرم  ',
      'class' => 'active']],
      ])




      <div class="row">

                  <div class="col-lg-12 col-md-12 col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>جزییات فیلدهای فرم</h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                                  <div class="row">

                                    <div class="col-lg-12 col-md-12 col-md-12 ">








  <div class="form-group">
    <label for="group">گروه فرم</label>
    <input type="text" class="form-control" id="group" autocomplete="off"
        placeholder="group " name="group" value="{{$form->form_subcategory->form_category->name}}" disabled>
</div>
  <div class="form-group">
    <label for="group">زیرگروه</label>
    <input type="text" class="form-control" id="group" autocomplete="off"
        placeholder="group " name="group" value="{{$form->form_subcategory->name}}" disabled>
</div>

  <div class="form-group">
    <label for="group">group</label>
    <input type="text" class="form-control" id="group" autocomplete="off"
        placeholder="group " name="group" value="{{$form->group}}" disabled>
</div>

<div class="form-group">
    <label for="subgroup">subgroup</label>
    <input type="text" class="form-control" id="subgroup" autocomplete="off"
        placeholder="subgroup " name="subgroup" value="{{$form->subgroup}}" disabled>
</div>




                                        <div class="form-group">
                                            <label for="name">نام فرم  </label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                 name="name" value="{{$form->name}}"  disabled >
                                        </div>

                                        <div class="form-group">
                                            <label for="link">لینک</label>
                                            <input type="text" class="form-control" id="link" autocomplete="off"
                                                 name="link" value="{{$form->link}}"  disabled >
                                        </div>





                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.form.index') }}" class="btn btn-danger">  مدیریت فرمها </a>
                                          </div>



                                    </div>






                                  </div>




                          </div>
                      </div>
                  </div>


                  <div class="col-lg-12 col-md-12 col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            @include('admin.Eform.form_coloumn.table_index', [ 'form_coloumns' => $form_coloumns  , $count ])

                            @include('admin.Eform.form_coloumn.modal_create', [ 'form_coloumns' => $form_coloumns  ,  'form_fields' => $form_fields  , 'route' => route('admin.form.form_coloumn.store') ])


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
