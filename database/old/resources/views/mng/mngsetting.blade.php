@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>تنظیمات سایت</title>
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
            
             
              
              
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

 <div class="card-header card-header-border-bottom">
 <h4>تنظیمات سایت</h4>
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



 
  
 
<div class="col-sm-2"> 

 
			</div>

 
<div class="col-sm-8"> 

 

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
							
							
							
							
 <div class="form-group">
 <h4 class="card-title">عنوان سایت </h4>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="عنوان سایت" name="ind_ftitile"  value="{{$mngindexs->ind_ftitile}}"  required > 
 </div>
 
 
 							
 <div class="form-group">
 <h4 class="card-title">اینستاگرام </h4>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="اینستاگرام" name="instagram"  value="{{$mngindexs->instagram}}"  required > 
 </div>
 
 
 							
 <div class="form-group">
 <h4 class="card-title">کانال تلگرام </h4>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="کانال تلگرام" name="telegram"  value="{{$mngindexs->telegram}}"  required > 
 </div>
 
 
 
  				
	
 <div class="form-group">							
 <h4 class="card-title">توضیحات سایت </h4>
 <textarea class="form-control" name="ind_cont"  rows="6" required>{{$mngindexs->ind_cont}}</textarea>
</div>
 
  				
	
 <div class="form-group">							
 <h4 class="card-title"> کلمات کلیدی </h4>
 <textarea class="form-control" name="ind_key"  rows="6" required>{{$mngindexs->ind_key}}</textarea>
 </div>
 
 <div class="form-group">							
 <h4 class="card-title"> فوتر سایت </h4>
 <textarea class="form-control" name="ind_fcopy"  rows="6" required>{{$mngindexs->ind_fcopy}}</textarea>
 </div>
 
 
  
	

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block">ویرایش</button> 
</div>		
</div>				
  

 	
</div>
 	
</div>
 	
</div>
 	
 	
 	
			</div>

 
<div class="col-sm-2"> 

 
			</div>

 	
</div>
 	  
</form>








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