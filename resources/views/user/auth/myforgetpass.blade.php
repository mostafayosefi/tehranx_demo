@component('Authenticate_New.layouts.content',[
    'title'=>'فراموشی رمزعبور',
    'tabTitle'=>'فراموشی رمزعبور'
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


                {{-- <img class="logo-size" src="http://clients.siconet.ir/iono/images/logo-light.svg" alt=""> --}}
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

                    @include('user.auth.tab' ,[ 'active' => 'forgetpass' ] )

<form method="POST" action="{{route('user.forgetpass.post')}}" autocomplete="off">


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

    @if(current_RouteName()=='user.forgetpass')
    <input class="form-control" type="text" name="tell"   value="{{old('tell')}}"  placeholder="شماره تلفن همراه  " >
    <input type="hidden" name="type" value="send_verify">
    @endif


    @if((current_RouteName()=='user.forgetpass.post'))
    <input class="form-control" type="text" name="tell" placeholder="شماره تلفن همراه  "    value="{{$user->tell}}"   disabled=""  >
    <input class="form-control" type="text" name="tell_code_verify" placeholder="کد وریفای"      value="{{old('tell_code_verify')}}" >
    <input type="hidden" name="type" value="check_verify">
    <input type="hidden" name="tell" value="{{$user->tell}}">
    @endif



{{-- {{  current_RouteName() }} --}}

<div class="form-group">

    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}

</div>
                         <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">فراموشی رمزعبور</button>
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
