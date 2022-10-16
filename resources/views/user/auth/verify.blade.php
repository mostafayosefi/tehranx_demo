@component('Authenticate_New.layouts.content',[
    'title'=>'وریفای کاربر',
    'tabTitle'=>'وریفای کاربر'
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
                    <p>جهت وریفای کاربر اقدام نمایید. </p>
                    <div class="page-links">
                        <a href="{{route('user.login')}}">ورود</a>
                        <a href="{{route('user.register')}}">عضویت</a>
                        <a href="{{route('user.verify')}}" class="active">وریفای کاربر</a>
                    </div>

<form method="POST" action="{{route('user.verify.post')}}" autocomplete="off">


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


<input class="form-control" type="text" name="tell" placeholder="تلفن" disabled=""  value="{{auth()->guard('user')->user()->tell}} " >
<input class="form-control" type="text" name="tell_code_verify" placeholder="کد فعالسازی"  value="{{old('tell_code_verify')}}" >


                         <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">فعالسازی و ورود</button>
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
