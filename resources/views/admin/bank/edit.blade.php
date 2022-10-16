  @component('admin.layouts.content', [
      'title' => 'ویرایش مشخصات بانک',
      'tabTitle' => ' ویرایش مشخصات بانک',
      'breadcrumb' => [['title' => 'لیست مشخصات بانک ', 'url' => route('admin.bank.index')], ['title' => 'ویرایش مشخصات بانک  ',
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
                                  <h4>ویرایش مشخصات بانک </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.bank.update', $bank) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


                                          <div class="form-group">
                                              <label for="name">مشخصات بانک</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" مشخصات بانک  " name="name" value="{{$bank->name}}">
                                          </div>

                                          @include('admin.layouts.table.avatarnul', [  'avatarimage' => $bank->image , 'class'=>'' , 'style' => 'height: 100px;width: 100px;'  ])

                                          <hr>
                                          <div class="form-group" >
                                          <label for="exampleInputUsername1"> آپلود لوگو </label>
                                          <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                          </div>


                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.bank.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ویرایش</button>
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
