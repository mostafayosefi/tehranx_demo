@component('Authenticate.layouts.content',[
    'title'=>'ورود کاربر ',
    'tabTitle'=>'ورود کاربر '
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
              <form action="{{ route('user.login.post') }}"  class="forms-sample" method="POST">
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
                  <label for="exampleInputEmail1">نام کاربری</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="نام کاربری">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">رمز عبور</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    autocomplete="current-password" placeholder="رمز عبور">
                </div>


        <div class="form-group">

            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}

        </div>

                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    مرا به خاطر بسپار
                  </label>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary text-white ml-2 mb-2 mb-md-0">ورود</button>
                </div>
                <a href="{{route('user.register')}}" class="d-block mt-3 text-muted">حساب کاربری ندارید؟ ثبت نام کنید</a>
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
