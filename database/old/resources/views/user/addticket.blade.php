@extends('user.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>ایجاد تیکت</title>
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

		 

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
            
            
              <div class="col-md-3 grid-margin stretch-card">
			  </div>
              
              
              
              
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

 <div class="card-header card-header-border-bottom">
 <h4>ایجاد تیکت</h4>
 </div>

<br>

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



 
 
<div class="col-sm-12"> 


	<div class="form-group">
	<label for="depr">نوع دپارتمان</label>
										<select class="form-control" id="depr" name="depr" required="">
											<option selected disabled>لطفا دپارتمان را انتخاب نمایید</option>
											<option value="احراز هویت">احراز هویت</option>  
											<option value="ثبت سفارش">ثبت سفارش</option>  
											<option value="پیگیری سفارش">پیگیری سفارش</option>
											<option value="پیگیری سفارش">پیگیری سفارش</option>  
											<option value="سایر">سایر</option>  
										</select>
									</div>

	<div class="form-group">
	<label for="olv">اولویت</label>
										<select class="form-control" id="olv" name="olv" required="">
											<option selected disabled>لطفا اولویت تیکت را انتخاب نمایید</option>
											<option value="خیلی زیاد">خیلی زیاد</option>  
											<option value="زیاد">زیاد</option>  
											<option value="متوسط">متوسط</option>
											<option value="کم">کم</option>  
										</select>
									</div>
									
									
									

<div class="form-group" >
<label for="tit">عنوان تیکت</label>
<input type="text" class="form-control" id="tit" autocomplete="off" placeholder="عنوان تیکت" name="tit"  value="{{ old('tit') }}"  required > 
</div>	

 
		   


<div class="form-group" >
<label for="des">متن تیکت</label> 
<textarea class="form-control"  placeholder="متن تیکت" id="des" name="des" rows="7" >{{old('des')}}</textarea> 
</div>	

		   
		   
		   
 <div class="d-flex align-items-center hover-pointer"> 
 <div class="mr-2">


<div class="form-group" >
<label for="file"> آپلود فایل   </label>  
<input type="file" name="file"    id="file" autocomplete="off"  name="file"   > 
</div>	



 </div>
 </div>
 
	

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block">ثبت تیکت</button> 
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