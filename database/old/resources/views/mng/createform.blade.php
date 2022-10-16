@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>ثبت فرم </title>
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






			<div class="page-content">

		 

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
            
             
              
              
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

 <div class="card-header card-header-border-bottom">
 <h4>ثبت فرم</h4>
 </div>

<br>


  <link rel="stylesheet" href="{{env('APP_URL')}}/build/servicepay/custom.css"> 
  

<div class="col-lg-12 animatedParent animateOnce z-index-47">
<div class="panel panel-default animated fadeInUp">
<div class="panel-body">
<ul class="list-unstyled multi-steps"> 
<li   class="is-active"  >ایجاد فرم</li> 
<li   class="is-active"  >نوع ورودی ها</li> 
<li   class="is-active"  >انتخاب فیلد هزینه</li> 
</ul>
</div>
</div>
</div>
	 


                  </div>
                </div>
              </div>
              
              
               
              
              
             </div>
            </div>
           </div>





 <div class="row">
 <div class="col-12 col-xl-12 stretch-card">
 <div class="row flex-grow">
            
            
            
              <div class="col-md-2 grid-margin stretch-card">
			  </div>
              
            
            
 <div class="col-md-8 grid-margin stretch-card">
 <div class="card">
 <div class="card-body">




<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jquery.js"></script>
	
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 20; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.form-groupp'); //Input field wrapper
	var fieldHTML = '<span><hr><div class="row"><div class="col-sm-5"><input type="text" name="field_name[]"  placeholder="نام فیلد" class="form-control"   value=""   ></div><div class="col-sm-5"><input type="text" name="field_namee[]"  placeholder="مقدار پیش فرض داخل فیلد" class="form-control" value=""   ></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="../build/servicepay/images/remove-icon.png"/></a><div class="row"></span>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('span').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>




<script>
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
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

					
					      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data"  onsubmit="return Validate(this);"   >
 
 
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




		
<script type="text/javascript">
function fetch_select(val){
	
	var val = document.getElementById("demo-select2-2").value;$.ajax({type: 'get',url: '{{env("APP_URL")}}/superadmin/fechtselectboxsubcatf/'+val,data: {get_option:val},success: function (response) {document.getElementById("catam").innerHTML=response;}});
	 
	var val = document.getElementById("demo-select2-2").value;$.ajax({type: 'get',url: '{{env("APP_URL")}}/superadmin/fechtablecatform/'+val,data: {get_option:val},success: function (response) {document.getElementById("cattable").innerHTML=response;}});
	
	
	
	}
</script>
     		
		


<div class="form-group {{ (($errors->has('cat'))||(Session::get('repeat')==1))  ? 'has-error' : '' }}"> 
@if($errors->has('cat')) <label  class="col-sm-12 control-label" for="inputError"><i class="fa fa-times-circle-o"></i>دسته</label> @else <label class="ر control-label">دسته</label>   @endif
									
 <div class="col-sm-12"> 
 <select class="select2-placeholer form-control " data-placeholder="دسته"     dir="rtl"     onchange="fetch_select(this.value);"    id="demo-select2-2"     name="cat"  required >
<option value="">انتخاب کنید</option> 
@foreach ($admins as $admin)   
<option value="{{$admin->catf_id}}">{{$admin->catf_name}}</option> 
@endforeach 
										</select>
									</div>
								</div>


								<div class="line-dashed"></div>



<p id="catam"></p>
								<div class="line-dashed"></div>
 
						 
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">   
 @if ($errors->has('name'))   
 <label class="col-sm-12 control-label" for="inputError">نام فرم</label> @else
 <label class="col-sm-12 control-label">نام فرم</label> @endif
<div class="col-sm-12"> 
<input type="text" name="name"  placeholder="نام فرم" class="form-control"   value="{{old('name')}}"   > 
</div> 
</div> 
<div class="line-dashed"></div>
 	

   
<div class="form-group {{ $errors->has('des') ? 'has-error' : '' }}">               
 @if ($errors->has('des'))                 
<label class="col-sm-12 control-label" for="inputError">توضیحات فرم</label>
@else 
 <label class="col-sm-12 control-label">توضیحات فرم </label> 
@endif
<div class="col-sm-12"> 
<textarea  class="form-control" id="des" name="des"    rows="5">{{old('des')}}</textarea>   </div>
 </div>  
 
 
 
 
						 
<div class="form-group {{ $errors->has('form_linkname') ? 'has-error' : '' }}">   
 @if ($errors->has('form_linkname'))   
 <label class="col-sm-12 control-label" for="inputError">لینک فرم</label> @else
 <label class="col-sm-12 control-label">لینک فرم</label> @endif
<div class="col-sm-12"> 
<input type="text" name="form_linkname"  placeholder="لینک فرم" class="form-control"   value="{{old('form_linkname')}}"   > 
</div> 
</div> 
<div class="line-dashed"></div>
 	
 

<div class="line-dashed"></div>


							<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
							 @if ($errors->has('file'))   
							 	<label class="col-sm-12 control-label"  for="inputError">آپلود آیکن </label> @else
							 	
							 	<label class="col-sm-12 control-label">آپلود آیکن</label>
							 	@endif
								<div class="col-sm-12"> 
 <input type="file" name="file" id="file"  multiple="multiple" class="form-control field-file"   >
								</div> 
							</div>
							<div class="line-dashed"></div>
 	
							 

<div class="form-groupp">   

<div class="row">
<div class="col-md-5"> 
<input type="text" name="field_name[]"  placeholder="نام فیلد" class="form-control"   value=""   > 
</div>     
<div class="col-md-5"> 
<input type="text" name="field_namee[]"  placeholder="مقدار پیش فرض داخل فیلد" class="form-control" value=""   > 
</div> 
 
<div class="col-md-2">
 <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{env('APP_URL')}}/build/servicepay/images/add-icon.png"/></a>	 </div>
 <div class="line-dashed"></div><br>	
</div> 	

</div> 

			 				
 			
 <div class="line-dashed"></div><br>	
							
                     <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block">ثبت مدیر</button> 
</div>		
</div>				
 
 

 	
</div>
		 
</form>





		 </div>
		 </div>
		 </div> 


              <div class="col-md-2 grid-margin stretch-card">
			  </div>
              



		 </div>
		 </div>
		 </div>
		 
			</div>



		
		<!-- Main content -->
		<div class="page-content"  >
		
		
		

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
            
		
		 
		
		
		
		  
 
				</div>
			</div> 
		</div>
 
 
		
	  
	 
	  
	  
	  </div>
	  <!-- /main content -->

@stop
 






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