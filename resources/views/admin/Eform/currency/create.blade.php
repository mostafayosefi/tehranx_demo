  @component('admin.layouts.content', [
      'title' => 'ثبت ارز',
      'tabTitle' => 'ثبت ارز',
      'breadcrumb' => [['title' => 'لیست ارزها', 'url' => route('admin.form.currency.index')], ['title' => 'ثبت ارز',
      'class' => 'active']],
      ])


      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">




                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4> ثبت ارز </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.currency.store') }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


                                          <div class="form-group">
                                              <label for="name">نام ارز</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" نام ارز  " name="name" value="{{ old('name') }}">
                                          </div>

                                          <div class="form-group">
                                              <label for="link">نماد ارز</label>
                                              <input type="text" class="form-control" id="link" autocomplete="off"
                                                  placeholder=" نماد ارز  " name="link" value="{{ old('link') }}">
                                          </div>


                                          @include('admin.layouts.table.java_price')

                                          <div class="form-group">
                                            <label for="price">هزینه ارز (به ریال)</label>
                                            <input type="text" class="form-control" id="price" autocomplete="off"
                                                placeholder="هزینه ارز " name="price" value="{{ old('price') }}"
                                                onkeyup="separateNum(this.value,this);"  >
                                        </div>

 


<hr>
<div class="form-group" >
<label for="exampleInputUsername1"> آپلود آیکن ارز </label>
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
</div>


                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.currency.index') }}" class="btn btn-danger">بازگشت</a>
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
