  @component('admin.layouts.content', [
      'title' => 'ویرایش تخفیف',
      'tabTitle' => ' ویرایش تخفیف',
      'breadcrumb' => [['title' => 'لیست تخفیفها', 'url' => route('admin.form.discount.index')], ['title' => 'ویرایش تخفیف  ',
      'class' => 'active']],
      ])




      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش تخفیف </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.form.discount.update', $price_discount) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">



                                          <div class="form-group">
                                              <label for="name">نام تخفیف</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" نام تخفیف  " name="name" value="{{$price_discount->name}}">
                                          </div>

                                          <div class="form-group">
                                            <label for="code">کد تخفیف</label>
                                            <input type="text" class="form-control" id="code" autocomplete="off"
                                                placeholder=" کد تخفیف  " name="code" value="{{$price_discount->code}}">
                                        </div>


                                        @include('admin.layouts.table.java_price')

                                        <div class="form-group">
                                          <label for="price">هزینه تخفیف (به ریال)</label>
                                          <input type="text" class="form-control" id="price" autocomplete="off"
                                              placeholder="هزینه تخفیف " name="price" value="{{number_format($price_discount->price)}}"
                                              onkeyup="separateNum(this.value,this);"  >
                                      </div>



                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.form.discount.index') }}" class="btn btn-danger">بازگشت</a>
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
