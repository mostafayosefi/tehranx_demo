@component('Authenticate.layouts.content',[
    'title'=>'ثبت نام کاربر ',
    'tabTitle'=>'ثبت نام کاربر '
    ]
     )



@slot('style')

@endslot



<div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pl-md-0">
            <div class="auth-left-wrapper">

            </div>
          </div>
          <div class="col-md-8 pr-md-0">
            <div class="auth-form-wrapper px-4 py-5">


                <div class="row">
                    <div class="col-lg-12">
                        @include('admin.layouts.table.txtalert', [ 'id' => '2'  , 'class' => 'alert alert-secondary' ])
                    </div>
                    </div>

                    @include('admin.layouts.errors')
              <form action="{{ route('user.register.post') }}"  class="forms-sample" method="POST">
                @csrf

        @if(\Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ \Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif



                <div class="form-group">
                  <label for="exampleInputname">  نام و نام خانوادگی</label>
                  <input type="text" name="name" class="form-control" id="exampleInputname" placeholder=" نام و نام خانوادگی  " value="{{old('name')}}"   required="required">
                </div>




                <div class="form-group">
                  <label for="exampleInputusername">نام کاربری</label>
                  <input type="text" name="username" class="form-control" id="exampleInputusername" placeholder="نام کاربری"  value="{{old('username')}}"   required="required">
                </div>




                <div class="form-group">
                  <label for="exampleInputEmail1">  ایمیل </label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="  ایمیل"  value="{{old('email')}}"   required="required">
                </div>

                <div class="form-group">
                  <label for="exampleInputtell">  تلفن همراه </label>
                  <input type="text" name="tell" class="form-control" id="exampleInputtell" placeholder="  تلفن همراه"  value="{{old('tell')}}"   required="required">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">رمز عبور</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    autocomplete="current-password" placeholder="رمز عبور"  value="{{old('password')}}"   required="required">
                </div>


                <div class="form-group">
                  <label for="reexampleInputPassword1">تکرار رمز عبور</label>
                  <input type="password" name="password_confirmation" class="form-control" id="reexampleInputPassword1"
                    autocomplete="current-password" placeholder="تکرار رمز عبور"   value="{{old('password_confirmation')}}"   required="required">
                </div>


        <div class="form-group">

            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}

        </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary text-white ml-2 mb-2 mb-md-0">ثبت نام</button>
                </div>
                <a href="{{route('user.login')}}" class="d-block mt-3 text-muted">اگر حساب کاربری دارید جهت ورود کلیک کنید</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





    @slot('script')


    @endslot
@endcomponent
