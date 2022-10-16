  @component('admin.layouts.content', [
      'title' => 'ثبت بانک جدید',
      'tabTitle' => 'ثبت بانک جدید',
      'breadcrumb' => [['title' => 'لیست بانکها ', 'url' => route('admin.bank.index')], ['title' => 'ثبت بانک جدید',
      'class' => 'active']],
      ])


      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-3 grid-margin stretch-card">
                  </div>


                  <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4> ثبت بانک جدید </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.bank.store') }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">





                                          <div class="form-group">
                                              <label for="name">نام بانک</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" نام بانک  " name="name" value="{{ old('name') }}">
                                          </div>



<hr>
<div class="form-group" >
<label for="exampleInputUsername1"> آپلود لوگو </label>
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
</div>




                                          <div class="card-footer">
                                              <a href="{{ route('admin.bank.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ثبت</button>
                                          </div>


                                      </div>


                                  </div>

                              </form>



                          </div>
                      </div>
                  </div>



                  <div class="col-md-3 grid-margin stretch-card">
                  </div>



              </div>
          </div>
      </div>













      @slot('script')
      @endslot
  @endcomponent
