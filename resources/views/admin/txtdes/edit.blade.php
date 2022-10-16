  @component('admin.layouts.content', [
      'title' => 'ویرایش متن پیش فرض',
      'tabTitle' => ' ویرایش متن پیش فرض  ',
      'breadcrumb' => [['title' => 'مدیریت متن های پیش فرض', 'url' => route('admin.setting.txtdes_management')], ['title' => 'ویرایش متن پیش فرض  ',
      'class' => 'active']],
      ])




      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">

                                <h3>{{$txtdese->title}}</h3>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.setting.txtdes_management_update', $txtdese) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">




                                          <div class="form-group">
                                              <label for="text"> متن پیش فرض</label>
                                              <textarea class="form-control"   autocomplete="off"
                                                  placeholder="" name="text" rows="8" id="tinymceExample"
                                                   >{{$txtdese->text}}</textarea>
                                          </div>

@include('admin.layouts.table.avatarnul', [  'avatarimage' => $txtdese->image , 'class'=>'profile-pic' , 'style' => 'height: 400px;width: 400px;'  ])


                                          <hr>
                                          <div class="form-group" >
                                          <label for="exampleInputUsername1"> آپلود عکس </label>
                                          <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                          </div>


                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.setting.txtdes_management') }}" class="btn btn-danger">بازگشت</a>
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
