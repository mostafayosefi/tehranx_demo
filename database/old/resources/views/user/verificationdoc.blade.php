@extends('user.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>وریفای حساب</title>
@stop
 
 <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/core/core.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/css/persian-datepicker-0.4.5.min.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/fonts/feather-font/css/iconfont.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/css/demo_1/style.css">
<link rel="shortcut icon" href="{{env('APP_URL')}}/build/template/assets/images/favicon.png" />
</head>

<body class="sidebar-dark rtl">


@section('body')

			<!-- partial -->

			<div class="page-content">


@if(Session::get('verfyemail')!='1')		             
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong><b>فعالسازی ایمیل </b> !</strong>  <br> 
	  	 <span> جهت فعال کردن ایمیل  <a href="{{env('APP_URL')}}/user/verificationdoc/verf/email">لطفا کلیک نمایید</a></span><br>   
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if(Session::get('verfytell')!='1')		             
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  	<strong><b>فعالسازی تلفن</b> !</strong> <br>     
  	 <span> جهت فعال کردن تلفن همراه  <a href="{{env('APP_URL')}}/user/verificationdoc/verf/tell">لطفا کلیک نمایید</a></span><br>   
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if(Session::get('verfydoc')!='1')		             
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  	<strong><b>احرازهویت و تایید مدارک</b>!</strong> <br>    
  	 <span><b>جهت احرازهویت و ارسال و تایید مدارک </b><a href="{{env('APP_URL')}}/user/verificationdoc/verf/doc">لطفا کلیک نمایید</a></span><br>   
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif


				<div class="profile-page tx-13">



					<div class="row profile-body">
						<!-- left wrapper start -->
						
						
						
						<!-- left wrapper end -->
						
						
						
						
						
						<!--  
						
						<div class="col-md-4 col-xl-3 left-wrapper">
							<div class="card rounded">
								<div class="card-body">

<div class="d-flex align-items-center justify-content-between mb-2">

<h6 class="card-title mb-0">اطلاعات پروفایل</h6>

<div class="dropdown">
 <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i> </button>
 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
 <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm ml-2"></i> <span class="">ویرایش پروفایل</span></a>
 <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="git-branch" class="icon-sm ml-2"></i> <span class="">به روز رسانی</span></a>
 <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm ml-2"></i> <span class="">مشاهده همه</span></a>
											</div>
										</div>
									</div>


 

 <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">نام و نام خانوادگی : </label>
 <p class="text-muted">
 	
 @if($admin->user_autactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_name}} </span>
@elseif($admin->user_autactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_name}} </span> 
@endif
 </p> 
 </div>
 


 <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">ایمیل : </label>
 <p class="text-muted">
 	
 @if($admin->user_emailactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_email}} </span>
@elseif($admin->user_emailactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_email}} </span> 
@endif
 </p> 
 </div>
 
  <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">تلفن : </label>
 <p class="text-muted">
 @if($admin->user_tellactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_tell}} </span>
@elseif($admin->user_tellactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_tell}} </span> 
@endif  
 </p> 
 </div>
 

<div class="mt-3">
<label class="tx-11 font-weight-bold mb-0 text-uppercase">آدرس : </label>
<p class="text-muted">{{$admin->user_adres}}</p></div>


<div class="mt-3">
<label class="tx-11 font-weight-bold mb-0 text-uppercase">تاریخ ثبت نام : </label>
<p class="text-muted">{{jDate::forge($admin->user_createdatdate)->format('Y/m/d ساعت H:i a')}}</p></div>



<div class="mt-3">
<label class="tx-11 font-weight-bold mb-0 text-uppercase">تاریخ آخرین ورود : </label>
<p class="text-muted">{{jDate::forge($admin->user_loginatdate)->format('Y/m/d ساعت H:i a')}}</p></div>

 
 
 
									<div class="mt-3 d-flex social-links">
										<a href="javascript:;"
											class="btn d-flex align-items-center justify-content-center border ml-2 btn-icon github">
											<i data-feather="github" data-toggle="tooltip"
												title="github.com/example"></i>
										</a>
										<a href="javascript:;"
											class="btn d-flex align-items-center justify-content-center border ml-2 btn-icon twitter">
											<i data-feather="twitter" data-toggle="tooltip"
												title="twitter.com/example"></i>
										</a>
										<a href="javascript:;"
											class="btn d-flex align-items-center justify-content-center border ml-2 btn-icon instagram">
											<i data-feather="instagram" data-toggle="tooltip"
												title="instagram.com/example"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						-->
						<!-- middle wrapper start -->
						<div class="col-md-8  col-xl-12  ">
						 
							
							
							
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
 <h4>پروفایل کاربر    </h4>
										</div>
										<div class="card-body">
 <ul class="nav nav-tabs" id="myTab" role="tablist">
 <li class="nav-item">
 <a class="nav-link  @if((empty(Session::get('errus')))||(Session::get('errus')=='1'))   active @endif" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="@if(empty(Session::get('err')))  true @else false  @endif">  <i data-feather="mail"></i> تایید ایمیل </a>
  </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='2')  active @endif " id="icon-secret-tab" data-toggle="tab" href="#icon-secret" role="tab" aria-controls="icon-secret" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"><i data-feather="phone"></i>تایید تلفن همراه </a></li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='4')  active @endif " id="icon-tels-tab" data-toggle="tab" href="#icon-tels" role="tab" aria-controls="icon-tels" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="phone-incoming"></i> تایید تلفن ثابت</a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='3')  active @endif " id="icon-card-tab" data-toggle="tab" href="#icon-card" role="tab" aria-controls="icon-card" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="credit-card"></i> کارت ملی</a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='5')  active @endif " id="icon-user-tab" data-toggle="tab" href="#icon-user" role="tab" aria-controls="icon-user" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="user"></i> تصویر سلفی</a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='6')  active @endif " id="icon-selfi-tab" data-toggle="tab" href="#icon-selfi" role="tab" aria-controls="icon-selfi" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="file-text"></i> تصویر سایر مدارک </a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('errus')=='7')  active @endif " id="icon-credit-tab" data-toggle="tab" href="#icon-credit" role="tab" aria-controls="icon-credit" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="credit-card"></i> اطلاعات حساب بانکی </a>
 </li>
 </ul>


<div class="tab-content" id="myTabContent2">

<div class="tab-pane pt-3 fade    @if((empty(Session::get('errus')))||(Session::get('errus')=='1')) show active @endif" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">

<div class="row"> 

<div class="col-md-12 grid-margin">
 <div class="card rounded">
 <div class="card-body">
 <h6 class="card-title">وریفای ایمیل</h6>
 
 
 
 

@if ($admin->user_emailactive == '0')  
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="mail"></i>
 <div class="mr-2">
 <p>{{$admin->user_email}}</p> 
 </div>
 </div>

  
<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/user/activition/emailuseractivitionverfy"    >

@if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
 @endif
   
  <input  type="hidden" class="form-control" name="email" value="{{$admin->user_email}}" maxlength="44"    />
  <button  class="btn btn-success btn-block"><i data-feather="send"></i>ارسال کد وریفای به ایمیل</button> 

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 

</div> 


 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="alert-circle"></i>
 <div class="mr-2">
 <p>جهت فعالسازی ایمیل لطفا اقدام نمایید</p> 
 </div>
 </div>

  
<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/user/activition/emailuseractivition"    >
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  
   
<div class="input-group">
                    <div class="input-group-btn">
                      <button   class="btn btn-primary btn-block btn-flat">فعالسازی ایمیل</button>
                    </div><!-- /btn-group -->
 <input  type="text"  name="codemail"  class="form-control" placeholder="کدفعالسازی">
                  </div> 


 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 

</div> 


@elseif ($admin->user_emailactive == '1')  
 


 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
      
 <div class="alert alert-success alert-dismissible fade show" role="alert">
	 
 <strong><b> <i data-feather="check-circle"></i> &nbsp; {{$admin->user_email}}  </b>  </strong> <br>     
 <span>     ایمیل من قبلا فعال شده است  <i data-feather="mail"></i> </span><br>   
 
</div> 
 </div>  
</div> 

@endif


 


							 
 </div>
 </div>									
											
												</div>
												</div>
												</div>

<div class="tab-pane pt-3 fade  @if(Session::get('errus')=='2') show active @endif" id="icon-secret" role="tabpanel" aria-labelledby="icon-secret-tab">
	

<div class="row"> 

<div class="col-md-12 grid-margin">
 <div class="card rounded">
 <div class="card-body">
 <h6 class="card-title">وریفای تلفن</h6>
 
 
 
 

@if ($admin->user_tellactive == '0')  
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="phone"></i>
 <div class="mr-2">
 <p>{{$admin->user_tell}}</p> 
 </div>
 </div>

  
<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/user/activition/telluseractivitionverfy"    >

@if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
 @endif
   
  <input  type="hidden" class="form-control" name="tell" value="{{$admin->user_tell}}" maxlength="44"    />
  <button  class="btn btn-success btn-block"><i data-feather="send"></i>ارسال کد وریفای به تلفن همراه </button> 

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 

</div> 


 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="alert-circle"></i>
 <div class="mr-2">
 <p>جهت فعالسازی تلفن همراه لطفا اقدام نمایید</p> 
 </div>
 </div>

  
<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/user/activition/telluseractivition"    >
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  
   
<div class="input-group">
                    <div class="input-group-btn">
 <button   class="btn btn-primary btn-block btn-flat">فعالسازی تلفن همراه</button>
                    </div><!-- /btn-group -->
 <input  type="text"  name="codtell"  class="form-control" placeholder="کدفعالسازی">
                  </div> 


 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 

</div> 


@elseif ($admin->user_tellactive == '1')  
 


 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
      
 <div class="alert alert-success alert-dismissible fade show" role="alert">
	 
 <strong><b> <i data-feather="check-circle"></i> &nbsp; {{$admin->user_tell}}  </b>  </strong> <br>     
 <span>     تلفن همراه من قبلا فعال شده است   <i data-feather="phone"></i> </span><br>   
 
</div> 
 </div>  
</div> 

@endif


 


							 
 </div>
 </div>									
											
												</div>
												</div>

	
</div>

 <div class="tab-pane pt-3 fade  @if(Session::get('errus')=='3') show active @endif" id="icon-card" role="tabpanel" aria-labelledby="icon-card-tab">
	
	
 <div class="row">  
<div class="col-md-12 grid-margin">
 <div class="card rounded">
 <div class="card-body">
 <h6 class="card-title">تایید مدارک هویتی</h6>

<script>
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png", ".ico"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
                
            }
        }
    }
  
    return true;
}
</script>


   <script type="text/javascript">
    $(document).ready(function(){
        $('#file').change(function(){
               var fp = $("#file");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 10447152) {
                    alert('حجم فایل آپلود شده نمی تواند بیشتر از 10 مگابایت باشد!');
                    $('#file').val('');
               }
           }
        });
    });
    </script>

	
	
	


 @if ($admin->user_autactive=='0') 
 @if (empty($admin->user_uploadpassport))	
<form class="form-horizontal" method="POST" action="verificationdoc/post/1"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">


<div class="form-group" >
<label for="file"> آپلود مدارک   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
	ارسال مدارک
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 
 
 @elseif($admin->user_uploadpassport)	

 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="alert-circle"></i> &nbsp; مدارک احرازهویت شما در انتظار تایید مدیریت می باشد   </b>  </strong> <br>        
</div> 
</div>   
</div>   

 @endif
 @endif
 
 
 
 @if ($admin->user_autactive=='1') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-success alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="check-circle"></i> &nbsp; مدارک احرازهویت شما به تایید مدیریت رسید   </b>  </strong> <br>          
</div> 
</div>  
</div>   

 @endif
 
 
 
 @if ($admin->user_autactive=='2') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="x-circle"></i> &nbsp; متاسفانه مدارک احرازهویت شما توسط مدیریت رد شد    </b>  </strong> <br>          
</div> 
</div>  
</div>   



 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="alert-circle"></i>
 <div class="mr-2">
 <p>توضیحات : {{$admin->user_autdes}}</p> 
 </div>
 </div>
 </div> 
 

<form class="form-horizontal" method="POST" action="verificationdoc/post/1"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">

<div class="form-group" > 
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام و نام خانوادگی" name="name" @if ($admin->user_name) value="{{$admin->user_name}}"@else value="{{ old('name') }}" @endif  required> 
</div>	


<div class="form-group" >
<label for="file"> آپلود مدارک   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
	ارسال مدارک
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>


 

 @endif
 
 
  


 
 </div>
 </div>									
 </div>
 </div>
  
 
 @if ($admin->user_uploadpassport)

 <div>
<img src="{{env('APP_URL')}}/public/images/{{$admin->user_uploadpassport}}"  width="240"  height="160"  /> 
 </div>
 
@else
 

@endif

	 
 </div>


<div class="tab-pane pt-3 fade  @if(Session::get('errus')=='4') show active @endif" id="icon-tels" role="tabpanel" aria-labelledby="icon-tels-tab"> 
tels 
</div>		


<div class="tab-pane pt-3 fade  @if(Session::get('errus')=='5') show active @endif" id="icon-user" role="tabpanel" aria-labelledby="icon-user-tab"> 


 <div class="row">  
<div class="col-md-12 grid-margin">
 <div class="card rounded">
 <div class="card-body">
 <h6 class="card-title">تایید تصویر سلفی</h6>

<script>
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png", ".ico"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
                
            }
        }
    }
  
    return true;
}
</script>


   <script type="text/javascript">
    $(document).ready(function(){
        $('#file').change(function(){
               var fp = $("#file");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 10447152) {
                    alert('حجم فایل آپلود شده نمی تواند بیشتر از 10 مگابایت باشد!');
                    $('#file').val('');
               }
           }
        });
    });
    </script>

	
	
	


 @if ($admin->user_authselfi=='0') 
 @if (empty($admin->user_selfi))	
<form class="form-horizontal" method="POST" action="verificationdoc/post/2"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">


<div class="form-group" >
<label for="file"> آپلود مدارک   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
ارسال تصویرسلفی
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 
 
 @elseif($admin->user_selfi)	

 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="alert-circle"></i> &nbsp; مدارک سلفی شما در انتظار تایید مدیریت می باشد   </b>  </strong> <br>        
</div> 
</div>   
</div>   

 @endif
 @endif
 
 
 
 @if ($admin->user_authselfi=='1') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-success alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="check-circle"></i> &nbsp; مدارک سلفی شما به تایید مدیریت رسید   </b>  </strong> <br>          
</div> 
</div>  
</div>   

 @endif
 
 
 
 @if ($admin->user_authselfi=='2') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="x-circle"></i> &nbsp; متاسفانه مدارک سلفی شما توسط مدیریت رد شد    </b>  </strong> <br>          
</div> 
</div>  
</div>   



 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="alert-circle"></i>
 <div class="mr-2">
 <p>توضیحات : {{$admin->user_authselfides}}</p> 
 </div>
 </div>
 </div> 
 

<form class="form-horizontal" method="POST" action="verificationdoc/post/2"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">

<div class="form-group" > 
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام و نام خانوادگی" name="name" @if ($admin->user_name) value="{{$admin->user_name}}"@else value="{{ old('name') }}" @endif  required> 
</div>	


<div class="form-group" >
<label for="file"> آپلود سلفی   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
	ارسال مدارک
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>


 

 @endif
 
 
  


 
 </div>
 </div>									
 </div>
 </div>
  
 
 @if ($admin->user_selfi)

 <div>
<img src="{{env('APP_URL')}}/public/images/{{$admin->user_selfi}}"  width="240"  height="160"  /> 
 </div>
 
@else
 

@endif





  
</div>	

<div class="tab-pane pt-3 fade  @if(Session::get('errus')=='6') show active @endif" id="icon-selfi" role="tabpanel" aria-labelledby="icon-selfi-tab"> 





 <div class="row">  
<div class="col-md-12 grid-margin">
 <div class="card rounded">
 <div class="card-body">
 <h6 class="card-title">تایید مدارک</h6>

<script>
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png", ".ico"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
                
            }
        }
    }
  
    return true;
}
</script>


   <script type="text/javascript">
    $(document).ready(function(){
        $('#file').change(function(){
               var fp = $("#file");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 10447152) {
                    alert('حجم فایل آپلود شده نمی تواند بیشتر از 10 مگابایت باشد!');
                    $('#file').val('');
               }
           }
        });
    });
    </script>

	
	
	


 @if ($admin->user_authdoc=='0') 
 @if (empty($admin->user_filedoc))	
<form class="form-horizontal" method="POST" action="verificationdoc/post/3"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">


<div class="form-group" >
<label for="file"> آپلود مدارک   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
ارسال مدارک
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 
 
 @elseif($admin->user_filedoc)	

 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="alert-circle"></i> &nbsp; مدارک شما در انتظار تایید مدیریت می باشد   </b>  </strong> <br>        
</div> 
</div>   
</div>   

 @endif
 @endif
 
 
 
 @if ($admin->user_authdoc=='1') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-success alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="check-circle"></i> &nbsp; مدارک شما به تایید مدیریت رسید   </b>  </strong> <br>          
</div> 
</div>  
</div>   

 @endif
 
 
 
 @if ($admin->user_authdoc=='2') 
 
 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
 <strong><b> <i data-feather="x-circle"></i> &nbsp; متاسفانه مدارک شما توسط مدیریت رد شد    </b>  </strong> <br>          
</div> 
</div>  
</div>   



 
 <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
 <div class="d-flex align-items-center hover-pointer">
<i data-feather="alert-circle"></i>
 <div class="mr-2">
 <p>توضیحات : {{$admin->user_authdocdes}}</p> 
 </div>
 </div>
 </div> 
 

<form class="form-horizontal" method="POST" action="verificationdoc/post/3"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					 
        @if(count($errors))
			<div class="alert alert-danger">
		
				<strong>اخطار!</strong> لطفا بررسی نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif  

 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">

<div class="form-group" > 
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام و نام خانوادگی" name="name" @if ($admin->user_name) value="{{$admin->user_name}}"@else value="{{ old('name') }}" @endif  required> 
</div>	


<div class="form-group" >
<label for="file"> آپلود مدارک   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	



 </div>
 </div>
 
 


<div class="input-group">
 <div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
 <i class="btn-icon-prepend" data-feather="send"></i>
	ارسال مدارک
</button>
 </div>  
 </div> 


 



 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>


 

 @endif
 
 
  


 
 </div>
 </div>									
 </div>
 </div>
  
 
 @if ($admin->user_filedoc)

 <div>
<img src="{{env('APP_URL')}}/public/images/{{$admin->user_filedoc}}"  width="240"  height="160"  /> 
 </div>
 
@else
 

@endif











 
</div>										





<div class="tab-pane pt-3 fade  @if(Session::get('errus')=='7') show active @endif" id="icon-credit" role="tabpanel" aria-labelledby="icon-credit-tab">




 
<form method="post" class="forms-sample"   enctype="multipart/form-data"  onsubmit="return Validate(this);"   action="{{env('APP_URL')}}/user/addcardbank">
<div class="row"> 

	
<div class="col-sm-6"> 

 
	

<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">شماره کارت بانکی</label>
 <div class="col-sm-8">
<input class="form-control" data-inputmask-alias="9999-9999-9999-9999" inputmode="text"   placeholder="شماره کارت بانکی"  name="numcard" >
 </div>
 </div>
 
 
<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">شماره شبا</label>
 <div class="col-sm-8">
<input type="text" class="form-control"  id="numshaba"  dir="ltr"  autocomplete="off"      placeholder="شماره شبا" name="numshaba"  value="IR"    > 
 </div>
 </div>
  
  
  

 
 
 

</div>


<div class="col-sm-6"> 

 
  
 
<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">نام بانک</label>
 <div class="col-sm-8">
 <select class="form-control" id="exampleFormControlSelect1" name="bank" > 
 
 <option value="" ></option> 
 <option value="بانک آینده" >بانک آینده</option>  
 <option value="بانک اقتصاد نوین" >بانک اقتصاد نوین</option>  
 <option value="بانک انصار" >بانک انصار</option> 
 <option value="بانک ایران زمین" >بانک ایران زمین</option> 
 <option value="بانک پارسیان" >بانک پارسیان</option> 
 <option value="بانک پاسارگاد" >بانک پاسارگاد</option>  
  </select>
 </div>
 </div>

<div class="form-group" >
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> </label>
<label for="file"> برای اپلود کارت بانکی کلیک کنید
   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required > 
</div>	

 
  
 <input type="hidden" name="nameuser" value="{{$admin->user_name}}">
 
 
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 
	 
	  <hr>
	 
 
<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> </label>
 <div class="col-sm-8">
 <div class="input-group-btn">
<button type="submit" class="btn btn-success btn-lg btn-icon-text">
 <i class="btn-icon-prepend" data-feather="save"></i>
	ذخیره
</button>
 </div>  
 </div>
 </div>
 
 

		   
	
	
</div>				
 
  
<div class="col-sm-12"> 
 <hr>
 
</div>
  
 
</div>	 
</form>
  
<div class="row"> 


                <div class="table-responsive">
                
@if($wallets)
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
															<th>ردیف</th> 
															<th>نام بانک </th> 
															<th>شماره کارت بانکی </th> 
															<th>شماره شبا </th> 
															<th>تاریخ ایجاد</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($wallets as $admin)



 <tr>
 <td>{{$i++}}</td> 
 <td>{{$admin->wallet_name}} </td>
 <td>{{$admin->wallet_numbercard}} </td>  
 <td>{{$admin->wallet_numbershaba}} </td>
 <td>{{jDate::forge($admin->wallet_createdatdate)->format('l d F Y ساعت H:i a')}}</td> 
 </tr> 

 
 
  
@endforeach


 
                    </tbody>
                  </table>

@endif

                </div>

</div>	
</div>	



</div>

										</div>
									</div>
							
				 
							
							
							
							
							
							
							
							 
						</div> 
					</div>

              
              
              
             </div>
         
			</div>

@stop
<!--
<script src="{{env('APP_URL')}}/build/servicepay/firealert/components.js.download"></script> 
 
    <script>
        $(document).ready(function () {
                        Swal.fire({
                text: 'باموفقیت انجام شد که شد که شد',
                type: 'success',
                confirmButtonText: 'بستن',       toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1113000

            });
            
        });
    </script>  
-->






@if(!empty(Session::get('errorverfy')))
<script src="{{env('APP_URL')}}/build/servicepay/firealert/components.js.download"></script> 
 
    <script>
        $(document).ready(function () {
                        Swal.fire({
                text: '<?php echo Session::get('errorverfy'); ?>',
                type: '<?php echo Session::get('typstst'); ?>',
                confirmButtonText: 'بستن'

            });
            
        });
    </script>
@endif



</body>

</html>