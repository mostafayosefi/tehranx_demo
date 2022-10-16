@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>ویرایش خبر</title>
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
 <h4>ثبت خبر</h4>
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
							
							
							
							
 <div class="form-group">
 <h4 class="card-title">تیتر خبر </h4>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="تیتر خبر" name="name"  value="{{$admin->new_tit}}"  required > 
 </div>
 


 <div class="form-group">	
 <label>گروه خبری</label>
 <select name="catid" class="form-control mb-3" required>

<option value="">لطفا انتخاب نمایید</option>

@foreach($cats as $cat)
 <option value="{{$cat->cat_id}}" @if($cat->cat_id==$admin->new_catid)  selected=""  @endif >{{$cat->cat_name}}</option>
@endforeach
										
 </select>
 </div>
 
 
							
							
							
							
	
 <div class="form-group">							
 <h4 class="card-title"> خلاصه خبر </h4>
 <textarea class="form-control" name="short"  rows="6" required>{{$admin->new_short}}</textarea>
							</div>
 
 
 
 	
 <div class="form-group">
 <h4 class="card-title">   متن خبر</h4>
 <textarea class="form-control" name="des"  id="tinymceExample" rows="10"  >{{$admin->new_des}}</textarea>
 </div>
 


<hr>

<?php 
echo $admin->new_img; ?>
<br>

<hr>
 

<div class="form-group" >
<label for="exampleInputUsername1"> آپلود عکس خبر</label>
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="file" > 
</div>		
 


	

 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block">ویرایش خبر</button> 
</div>		
</div>				
  

 	
</div>
 	
</div>
 	
</div>
 	
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