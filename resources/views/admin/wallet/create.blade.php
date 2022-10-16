  @component('admin.layouts.content', [
      'title' => 'شارژ حساب کاربر',
      'tabTitle' => 'شارژ حساب کاربر',
      'breadcrumb' => [['title' => 'مشاهده تراکنش های کاربران ', 'url' => route('admin.wallet.index')], ['title' => 'شارژ حساب کاربر',
      'class' => 'active']],
      ])


@slot('style')
 <link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">
   @endslot

      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-3 grid-margin stretch-card">
                  </div>


                  <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>شارژ حساب کاربر </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="search-form" method="POST" action="{{ route('admin.wallet.store') }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


  @include('admin.layouts.table.selectbox', [ 'allforeachs' => $users ,  'input_name' => 'name'  ,  'name_select' => 'کاربر' ,  'value' => '' , 'required'=>'required'  , 'index_id'=>'user_id' ])

  @include('admin.layouts.table.java_price')

                                        <div class="form-group">
                                            <label for="price">هزینه شارژ به ریال</label>
                                            <input type="text" class="form-control" id="price" autocomplete="off"
                                                placeholder="هزینه شارژ به ریال "   onkeyup="separateNum(this.value,this);"  name="price" value="{{old('price')}}">
                                        </div>


<div class="form-group">
    <label for="text">توضیحات      </label>
    <textarea class="form-control" name="text" id="text" rows="5" >{{old('text')}}</textarea>
    </div>



                                          <div class="card-footer">
                                              <a href="{{ route('admin.wallet.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">افزایش شارژ حساب</button>
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
       <script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>
       <script src="{{ asset('template/assets/js/select2.js') }}"></script>
      @endslot
  @endcomponent
