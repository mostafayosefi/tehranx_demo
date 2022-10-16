@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>پروفایل مدیر</title>
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

				<div class="profile-page tx-13">
					<div class="row">
						<div class="col-12 grid-margin">
							<div class="profile-header">
								<div class="cover">
									<div class="gray-shade"></div>
									<figure>
										<img src="{{env('APP_URL')}}/build/template/assets/images/profile-cover.jpg" class="img-fluid"
											alt="profile cover">
									</figure>
									<div class="cover-body d-flex justify-content-between align-items-center">
										<div>

<img class="profile-pic" src="{{env('APP_URL')}}/public/images/{{$admin->admin_img}}"
												alt="profile">
 <span class="profile-name">{{$admin->admin_name}}</span>
										</div>
										<div class="d-none d-md-block">
 <button class="btn btn-primary btn-icon-text btn-edit-profile">
 <i data-feather="edit" class="btn-icon-prepend"></i> ویرایش پروفایل
											</button>
										</div>
									</div>
								</div>
								<div class="header-links">
								 
								</div>
							</div>
						</div>
					</div>
					<div class="row profile-body">
						<!-- left wrapper start -->
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
{{$admin->admin_name}} 
 </p> 
 </div>

 <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">نام کاربری : </label>
 <p class="text-muted">
{{$admin->admin_username}} 
 </p> 
 </div>

 <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">ایمیل : </label>
 <p class="text-muted">
{{$admin->admin_email}} 
 </p> 
 </div>

 <div class="mt-3">
 <label class="tx-11 font-weight-bold mb-0 text-uppercase">تلفن : </label>
 <p class="text-muted">
{{$admin->admin_tell}} 
 </p> 
 </div>
 


<div class="mt-3">
<label class="tx-11 font-weight-bold mb-0 text-uppercase">تاریخ آخرین ورود : </label>
<p class="text-muted">{{jDate::forge($admin->admin_loginatdate)->format('Y/m/d ساعت H:i a')}}</p></div>

								</div>
							</div>
						</div>
						<!-- left wrapper end -->
						<!-- middle wrapper start -->
						<div class="col-md-8  col-xl-9  ">
						 
							
							
							
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
 <h4>پروفایل مدیریت   </h4>
										</div>
										<div class="card-body">
 <ul class="nav nav-tabs" id="myTab" role="tablist">
 <li class="nav-item">
 <a class="nav-link  @if(empty(Session::get('err')))  active @endif" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="@if(empty(Session::get('err')))  true @else false  @endif"> <i data-feather="edit-2"></i>ویرایش پروفایل </a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('err')=='1')  active @endif " id="icon-secret-tab" data-toggle="tab" href="#icon-secret" role="tab" aria-controls="icon-secret" aria-selected="@if(Session::get('err')=='1')   true @else false  @endif"> <i data-feather="lock"></i> تنظیمات رمزعبور</a>
 </li>
 <li class="nav-item">
 <a class="nav-link @if(Session::get('err')=='2')  active @endif " id="icon-access-tab" data-toggle="tab" href="#icon-access" role="tab" aria-controls="icon-access" aria-selected="@if(Session::get('err')=='2')   true @else false  @endif"> <i data-feather="server"></i> دسترسی ها</a>
 </li>
 </ul>


<div class="tab-content" id="myTabContent2">

<div class="tab-pane pt-3 fade   @if(empty(Session::get('err'))) show active @endif" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">

<div class="row">
<div class="col-xl-12"> 


<form class="forms-sample"  method="POST" action="" enctype="multipart/form-data"  onsubmit="return Validate(this);"   >
 
<div class="row">




            
<div class="col-sm-12">         
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
                    
			</div>




<div class="col-sm-6"> 
<div class="form-group" >
<label for="exampleInputUsername1">نام و نام خانوادگی</label>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام و نام خانوادگی" name="name" @if ($admin->admin_name) value="{{$admin->admin_name}}"@else value="{{ old('name') }}" @endif  required> 
</div>		
 


<div class="form-group" >
<label for="exampleInputUsername1">ایمیل</label>
<input type="email" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="ایمیل" name="email" @if ($admin->admin_email) value="{{$admin->admin_email}}"@else value="{{ old('email') }}" @endif > 
</div>		



<div class="form-group" >
<label for="exampleInputUsername1">تلفن</label>
<input type="text"    class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="تلفن" name="tell" @if ($admin->admin_tell) value="{{$admin->admin_tell}}"@else value="{{ old('tell') }}" @endif > 
</div>		

</div>			
 
 
<div class="col-sm-6"> 


<div class="form-group" >
<label for="exampleInputUsername1">نام کاربری</label>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام کاربری" name="username" @if ($admin->admin_username) value="{{$admin->admin_username}}"@else value="{{ old('username') }}" @endif required > 
</div>	

	


<div class="form-group" >
<label for="exampleInputUsername1"> تصویر پروفایل</label>
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="file" > 
</div>		
 
 
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-primary btn-block">ویرایش</button> 
</div>		
</div>				
 
 

 	
</div>
		 
</form>


							 
					</div>
		</div>									
											
												</div>

<div class="tab-pane pt-3 fade  @if(Session::get('err')=='1') show active @endif" id="icon-secret" role="tabpanel" aria-labelledby="icon-secret-tab">
	

	
<form method="post" action="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsadmins/secret/{{$admin->id}}" >

<div class="row">
 
<div class="col-sm-8"> 



@if(Session::get('err')=='1')
    
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
                
 @endif
           


	<div class="form-group row">
	<label for="nowpass" class="col-sm-2 col-form-label">رمزعبور فعلی</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" name="nowpass" id="nowpass" autocomplete="off" placeholder="رمزعبور فعلی"   value="{{$decryptedPassword}}" required> 
	</div>
	</div>
	
 <div class="form-group row">
 <label for="userpassword" class="col-sm-2 col-form-label">رمزعبور جدید</label>
 <div class="col-sm-10">
 <input type="password" class="form-control"  id="userpassword"  name="userpassword" autocomplete="off"    value="{{old('userpassword')}}" required> 
 </div>
 </div>
	
 <div class="form-group row">
 <label for="userpassword_confirmation" class="col-sm-2 col-form-label">تکرار رمزعبور</label>
 <div class="col-sm-10">
 <input type="password" class="form-control" id="userpassword_confirmation"  name="userpassword_confirmation" autocomplete="off"    value="{{old('userpassword_confirmation')}}" required> 
 </div>
 </div>
	
	<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-primary btn-block">ویرایش رمزعبور</button> 
</div>	
	
	</div>
<div class="col-sm-4"> 
	</div>
	
	
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
		</div>
	
</form>
	
	
	
	
	


</div>

 		
<div class="tab-pane pt-3 fade  @if(Session::get('err')=='2') show active @endif" id="icon-access" role="tabpanel" aria-labelledby="icon-access-tab">

<div class="row">
 
<div class="col-sm-6"> 

 <form    method="post"  class="form-horizontal"   action="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsadmins/access/{{$admin->id}}"    enctype="multipart/form-data"   >



 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="user" value="1" @if($admin->accessadmin_user=='1')  checked="checked"   @else  @endif >
مدیریت کاربران 
 </label>
 </div>	
 
 

 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="sefaresh" value="1" @if($admin->accessadmin_sefaresh=='1')  checked="checked"   @else  @endif >
مدیریت درخواستها 
 </label>
 </div>	
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="giftcard" value="1" @if($admin->accessadmin_giftcard=='1')  checked="checked"   @else  @endif >
مدیریت گیفت کارتها 
 </label>
 </div>	
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="paypall" value="1" @if($admin->accessadmin_paypall=='1')  checked="checked"   @else  @endif >
مدیریت پی پال 
 </label>
 </div>	
 
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="skrill" value="1" @if($admin->accessadmin_skrill=='1')  checked="checked"   @else  @endif >
مدیریت اسکریل 
 </label>
 </div>	
 
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="visacart" value="1" @if($admin->accessadmin_visacart=='1')  checked="checked"   @else  @endif >
مدیریت ویزاکارتها 
 </label>
 </div>	
 
 
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="visacartfisic" value="1" @if($admin->accessadmin_visacartfisic=='1')  checked="checked"   @else  @endif >
مدیریت ویزاکارت فیزیکی 
 </label>
 </div>	
 
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="credcard" value="1" @if($admin->accessadmin_credcard=='1')  checked="checked"   @else  @endif >
پرداخت با کارت اعتباری 
 </label>
 </div>	
 
 
 
 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="service" value="1" @if($admin->accessadmin_service=='1')  checked="checked"   @else  @endif >
مدیریت سرویس ها 
 </label>
 </div>	
 
 
 
 
 

 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="finical" value="1" @if($admin->accessadmin_finical=='1')  checked="checked"   @else  @endif >
مدیریت مالی 
 </label>
 </div>	
 
 

 <div class="form-check">
 <label class="form-check-label">
 <input class="form-check-input" type="checkbox" name="ticket" value="1" @if($admin->accessadmin_ticket=='1')  checked="checked"   @else  @endif >
مدیریت تیکتها 
 </label>
 </div>	
  


            
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block">ویرایش دسترسی</button> 
</div>
<hr>


 <input type="hidden" name="_token" value="{{ csrf_token() }}">											  


</form>							

 
 
 <a target="_blank"  class="btn btn-primary btn-block" href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsadmins/login/{{$admin->id}}"   onclick="openSearch()">
    ورود به پنل {{$admin->admin_name}} 
 <i class="mdi mdi-login"></i> 
 </a> 



 </div>	

<div class="col-sm-6"> 


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
                text: '<?php echo Session::get('statust'); ?>',
                type: 'success',
                confirmButtonText: 'بستن',       toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1113000

            });
            
        });
    </script>  
-->






@if(!empty(Session::get('statust')))
<script src="{{env('APP_URL')}}/build/servicepay/firealert/components.js.download"></script> 
 
    <script>
        $(document).ready(function () {
                        Swal.fire({
                text: '<?php echo Session::get('statust'); ?>',
                type: 'success',
                confirmButtonText: 'بستن'

            });
            
        });
    </script>
@endif



</body>

</html>