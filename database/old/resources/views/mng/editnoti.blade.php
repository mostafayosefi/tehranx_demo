@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>ویرایش فرمت اطلاع رسانی</title>
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

<script src="https://payment.azmoonpte.com/build/nicEdit.js"></script>   
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
			<!-- partial -->

			<div class="page-content">

		 
@foreach($admins as $admin)

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
            
             
              
              
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

 <div class="card-header card-header-border-bottom">
 <h4>ویرایش فرمت {{$admin->form_tit}}  </h4>
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

 


				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
							
							
							
 <!--
                            
                            
                        <div class="col-xs-12"> <div class="form-group">
 @if ($errors->has('des'))                 
<label class="control-label" style="color: red"  for="inputError"><i class="fa fa-times-circle-o"></i>متن پیامک</label>
@else 
<label for="des">متن پیامک</label> 
@endif
<input class="form-control"   name="des" type="text"  @if ($admin->form_des) value="{{$admin->form_des}}"@else value="{{ old('des') }}" @endif />
                            </div> </div>
                            
                            -->
                            
                           
                                         
                                  

           
                           <div class="col-xs-12"> 
                             <div class="form-group">
 @if ($errors->has('desem'))                 
<label class="control-label" style="color: red"  for="inputError"><i class="fa fa-times-circle-o"></i>متن ایمیل کاربر</label>
@else 
<label for="desem">متن ایمیل کاربر</label> 
@endif
 
<textarea  class="form-control" rows="5" name="desem" >@if ($admin->form_desem){{$admin->form_desem}}@else{{old('desem')}}@endif</textarea>
                            </div> 
                            </div> 
 <br>
 
 
  
                           
                                         
                      
 
 <hr /> 
<span style="color: blue;">*دقت نمایید برای نام و نام خانوادگی کاربر از #user استفاده نمایید.</span>         
<br>
<span style="color: blue;">*دقت نمایید برای عنوان سفارش از #tit استفاده نمایید.</span>                 
<br>
<span style="color: blue;">*دقت نمایید برای لینک سفارش از #linktiket استفاده نمایید.</span>         
<br>
<span style="color: blue;">*دقت نمایید برای لینک فاکتور از #linksef استفاده نمایید.</span>         
<br>
<span style="color: blue;">*دقت نمایید برای مبلغ فاکتور از #pay استفاده نمایید.</span>         
<br>
<span style="color: blue;">* دقت نمایید برای توضیحات فاکتور از #despay استفاده نمایید.</span>           
<br>
<span style="color: blue;">* دقت نمایید برای نام کاربری از #usname استفاده نمایید. </span>     
<br>
<span style="color: blue;">* دقت نمایید برای رمزعبور از #pass استفاده نمایید. </span>  
<br>
<span style="color: blue;">* دقت نمایید برای کدوریفای تلفن از #verfytell استفاده نمایید. </span>  
<br>
<span style="color: blue;">* دقت نمایید برای کدوریفای ایمیل از #verfyemail استفاده نمایید. </span>  
<br>


                                            
                    
 
                        
 

	

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block"><i data-feather="edit"></i> &nbsp; ویرایش </button> 
</div>		
</div>				
  

 	
</div>
 	
</div>
 	
</div>
 	
</div>
 	
</div>
		 
</form>

@endforeach






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