@component('Authenticate_New.layouts.content',[
    'title'=>'ثبت نام کاربر ',
    'tabTitle'=>'ثبت نام کاربر '
    ]
     )



@slot('style')

@endslot



<div class="form-body" class="container-fluid">
    <div class="website-logo">
        <a href="{{route('mylogin')}}">
            <div class="logo">
                {{-- {{env('APP_URL')}}/build/templogin/images/logo-light.svg --}}
                <img src="{{ asset('templogin/img/logo-light.svg') }}" />
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{ asset('templogin/img/graphic2.svg') }}" />

            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>انجام کلیه پرداخت های بین المللی </h3>
                    <p>جهت ورود اقدام نمایید. </p>

                    @include('user.auth.tab' ,[ 'active' => 'register' ] )

                    <form method="POST" action="{{route('user.register.post')}}" autocomplete="off">


@csrf

  @if(!empty(Session::get('statust')))
  <div class="alert alert-danger">
            <strong>اخطار!</strong>
            <ul><li>{{ Session::get('statust')}}</li></ul>
            </div>
    @endif


@if(count($errors))
        <div class="alert alert-danger" >
            <strong>اخطار!</strong> لطفا اطلاعات را به درستی وارد نمایید.
            <br/>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <input class="form-control" type="text" name="name" placeholder=" نام و نام خانوادگی"  value="{{old('name')}}"   value="{{old('password')}}"   required="required">
    <input class="form-control" type="text" name="username" placeholder="نام کاربری"  value="{{old('username')}}"  value="{{old('username')}}"   required="required" >
    <input class="form-control" type="text" name="tell" placeholder="شماره همراه"  value="{{old('tell')}}" value="{{old('tell')}}"   required="required" >
    <input class="form-control" type="text" name="tells" placeholder="شماره تلفن ثابت"  value="{{old('tells')}}" value="{{old('tells')}}"   required="required" >
    <input class="form-control" type="email" name="email" placeholder="ایمیل"  value="{{old('email')}}" value="{{old('email')}}"   required="required" >
    <input class="form-control" type="password" name="password" placeholder="رمزعبور"  value="{{old('password')}}" value="{{old('password')}}"   required="required" >
    <input class="form-control" type="password" name="password_confirmation" placeholder="تکرار رمزعبور"  value="{{old('password_confirmation')}}"   value="{{old('password_confirmation')}}"   required="required" >





<div class="form-group">

    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}

</div>


                         <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">ثبت نام</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>







    @slot('script')


    @endslot
@endcomponent
