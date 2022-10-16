
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  
<?php $ruser='ثبت نام کاربر';  ?>
  
  <title>{{$ruser}}</title>
  <!-- core:css -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/core/core.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- end plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/fonts/feather-font/css/iconfont.css">
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/css/demo_1/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{env('APP_URL')}}/build/template/assets/images/favicon.png" />
</head>

<body class="sidebar-dark rtl">
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

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
 <a href="{{env('APP_URL')}}/" class="noble-ui-logo d-block mb-2">{{$ruser}} <span>سرویس پرداخت</span></a>
 <h5 class="text-muted font-weight-normal mb-4">جهت ثبت نام می توانید اقدام نمایید</h5>
                    <form   action="{{env('APP_URL')}}/user/register"  method="post"  data-toggle="validator" class="forms-sample  ">
                    
                
     @if(!empty(Session::get('statust')))
      <div class="alert alert-danger">
				<strong>اخطار!</strong>
				<ul><li>{{ Session::get('statust')}}</li></ul>
				</div>
        @endif
      
                
                
                    
        @if(count($errors))
			<div class="alert alert-danger">
				<strong>اخطار!</strong> لطفا اطلاعات را به درستی وارد نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
                    
                    
 <div class="form-group">
 <label for="name">نام و نام خانوادگی</label>
 <input type="text" class="form-control" id="name" placeholder="نام و نام خانوادگی"  name="name"  required      value="{{old('name')}}" >
 </div>   
        
                    
 <div class="form-group">
 <label for="username">نام کاربری</label>
 <input type="text" class="form-control" id="username" placeholder="نام کاربری "  name="username"  required    value="{{old('username')}}"  >
 </div>   
 
                  
 <div class="form-group">
 <label for="email">ایمیل</label>
 <input type="text" class="form-control" id="email" placeholder="ایمیل" required pattern="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})"    name="email"    value="{{old('email')}}" >
 </div>
                  
 <div class="form-group">
 <label for="tell">تلفن همراه </label>
 <input type="text" class="form-control" id="tell" placeholder="تلفن همراه"  name="tell" required   pattern="09.*[0-9]{9}"    value="{{old('tell')}}"  >
 </div>

<div class="form-group">
<label for="password">رمز عبور</label>
 <input type="password" class="form-control" id="password"  autocomplete="current-password" placeholder="رمز عبور "  required name="userpassword"   value="{{old('userpassword')}}" >
</div>

<div class="form-group">
<label for="exampleInputPassword1">تکرار رمزعبور</label>
 <input type="password" class="form-control" id="exampleInputPassword1"  autocomplete="current-password" placeholder="تکرار رمزعبور"  required name="userpassword_confirmation"    value="{{ old('userpassword_confirmation') }}" >
</div>


 
         
        
        
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          مرا به خاطر بسپار
                        </label>
                      </div>
                      
                      
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              
 <div class="mt-3">    
 <button class="btn btn-primary text-white ml-2 mb-2 mb-md-0" type="submit">ثبت نام</button>
 </div>
 
 <a href="{{env('APP_URL')}}/user/sign-in" class="d-block mt-3 text-muted">جهت ورود به سیستم اقدام نمایید </a> 
                  
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- core:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/core/core.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/feather-icons/feather.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- custom js for this page -->
  <!-- end custom js for this page -->
</body>

</html>