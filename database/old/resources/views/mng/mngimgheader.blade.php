@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>تنظیمات هدر و لوگو</title>
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
 <h4>تنظیمات هدر و لوگو</h4>
 </div>

<br>










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

	
<form class="form-horizontal" method="POST" action=""   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
                  
					
 
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
							
							
  
<hr>
<div class="form-group" >
<label for="exampleInputUsername1"> آپلود هدر سایت (نمایش در ویندوز) </label>  
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="file" > 
<br>
<span style="color: #3edcf2"> ابعاد تصویر پیشنهادی w1140 * h108</span>
</div>		
 

<img src="{{env('APP_URL')}}/public/images/{{$mngindexs->ind_header}}"   />
  
<hr>
<div class="form-group" >
<label for="ind_headertablet"> آپلود هدر سایت (نمایش در تبلت)</label>  
<input type="file"     id="ind_headertablet" autocomplete="off"  name="ind_headertablet" > 
<br>
<span style="color: #3edcf2"> ابعاد تصویر پیشنهادی w940 * h108</span>
</div>		
 

<img src="{{env('APP_URL')}}/public/images/{{$mngindexs->ind_headertablet}}"   />

<hr>
	
<div class="form-group" >
<label for="ind_headermobile"> آپلود هدر سایت (نمایش در موبایل )</label>  
<input type="file"     id="ind_headermobile" autocomplete="off"  name="ind_headermobile" > 
<br>
<span style="color: #3edcf2"> ابعاد تصویر پیشنهادی w324 * h108</span>
</div>		
 

<img src="{{env('APP_URL')}}/public/images/{{$mngindexs->ind_headermobile}}"   />

<hr>
	
<div class="form-group" >
<label for="filel"> آپلود لوگو سایت  </label>  
<input type="file"     id="filel" autocomplete="off"  name="filel" > 
<br>
<span style="color: #3edcf2"> ابعاد تصویر پیشنهادی w324 * h108</span>
</div>	 
<img src="{{env('APP_URL')}}/public/images/{{$mngindexs->ind_himglog}}"   />

<hr>
	

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