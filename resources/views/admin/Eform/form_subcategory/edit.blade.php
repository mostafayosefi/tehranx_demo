  @component('admin.layouts.content', [
      'title' => 'ویرایش زیرگروه',
      'tabTitle' => ' ویرایش زیرگروه',
      'breadcrumb' => [
        ['title' => 'لیست گروه ها', 'url' => route('admin.form.form_category.index')],
        ['title' => $form_subcategory->form_category->name , 'url' => route('admin.form.form_category.show', $form_subcategory->form_category )],
        ['title' => $form_subcategory->name , 'class' => 'active'],
        ['title' => 'ویرایش زیرگروه  ', 'class' => 'active'],
    ],
      ])




      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش زیرگروه </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form_subcategory.update', $form_subcategory) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">




                                        <div class="form-group">
                                            <label for="name">گروه  </label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                placeholder="   گروه  " name="course_name" value="{{$form_subcategory->form_category->name}}" disabled >
                                        </div>


                                        <div class="form-group">
                                            <label for="name">نام زیرگروه</label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                placeholder=" نام زیرگروه  " name="name" value="{{$form_subcategory->name}}">
                                        </div>



                                        <div class="form-group">
                                            <label for="link">لینک زیرگروه</label>
                                            <input type="text" class="form-control" id="link" autocomplete="off"
                                                placeholder=" لینک زیرگروه  " name="link" value="{{$form_subcategory->link}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="text"> توضیحات </label>
                                            <textarea class="form-control" id="text" autocomplete="off"
                                                      placeholder="توضیحات " name="text" rows="6" >{{$form_subcategory->text}}</textarea>
                                        </div>



                                        @include('admin.layouts.table.avatarnul', [  'avatarimage' => $form_subcategory->image , 'class'=>'profile-pic' , 'style' => 'height: 100px;width: 100px;'  ])


                                        <hr>
                                        <div class="form-group" >
                                        <label for="exampleInputUsername1"> آپلود عکس </label>
                                        <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                        </div>



                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{route('admin.form.form_category.show', $form_subcategory->form_category )}}" class="btn btn-danger">بازگشت</a>
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
