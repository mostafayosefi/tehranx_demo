
@extends('superadmin.layoutsuperadmin')

@section('title')
<title>ثبت زیرمجموعه دسته بندی </title>
@stop

 
@section('superadmin')

		
		<!-- Main content -->
		<div class="main-content"  >
			<h1 class="page-title" >ثبت زیرمجموعه دسته بندی</h1>


	<div class="row">
	 
	
			<div class="col-lg-12 animatedParent animateOnce z-index-47">
				<div class="panel panel-default animated fadeInUp">
				 
					
					<div class="panel-body">
					      <form class="form-horizontal" method="POST" action=""  >
                  
 
					 
					
@if(count($errors))
<div class="text-danger"  >
<strong  style="" >اخطار!</strong>
<li >	 لطفا اطلاعات را به درستی وارد نمایید. </li>
@foreach($errors->all() as $error)
<span class="badge badge-danger">{{$error}}</span> <br>
@endforeach
</div> 

<div class="line-dashed"></div>
@endif  
		
		 
				  
			 

<script type="text/javascript">
function fetch_select(val){
	
	var val = document.getElementById("demo-select2-2").value;$.ajax({type: 'get',url: '{{env("APP_URL")}}/superadmin/fechcatform/'+val,data: {get_option:val},success: function (response) {document.getElementById("catam").innerHTML=response;}});
	 
	var val = document.getElementById("demo-select2-2").value;$.ajax({type: 'get',url: '{{env("APP_URL")}}/superadmin/fechtablecatform/'+val,data: {get_option:val},success: function (response) {document.getElementById("cattable").innerHTML=response;}});
	
	
	
	}
</script>
     		
 	  
						 
<div class="form-group {{ $errors->has('cat') ? 'has-error' : '' }}">   
 @if ($errors->has('cat'))   
 <label class="col-sm-3 control-label" for="inputError">نام دسته بندی</label> @else
 <label class="col-sm-3 control-label">نام دسته بندی</label> @endif
<div class="col-sm-9"> 
<select      class="select2-placeholer form-control "   dir="rtl"  onchange="fetch_select(this.value);"    id="demo-select2-2"     name="cat"  required  > 
<option value=""  >لطفا انتخاب نمایید</option>  
@foreach($admins as $admin)
<option value="{{$admin->catf_id}}" >{{$admin->catf_name}}</option>  
@endforeach 
</select>
</div> 
</div> 
<div class="line-dashed"></div>

        
           
          

 
 
 

<p id="catam"></p>
        
                  
                  

 	
							 
				   
							
							
							
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<div class="col-sm-offset-3 col-sm-9"> 
 <button class="btn btn-success btn-block btn-flat">ثبت زیرمجموعه دسته بندی</button>
								</div> 
							</div>
						</form>


<br>

 <table class="table table-striped table-bordered table-hover dataTables-example" >
 <thead>
 <tr>
 <th>ردیف</th> 
 <th>نام گروه</th>
 <th>نام زیرگروه</th> 
 <th>حذف</th>
 <th>ویرایش</th>
 </tr>
 </thead>
 <tbody id="cattable">                   
 
 </tbody>
 </table>


					</div>
				</div>
			</div> 
		</div>
 
 
		
	  </div>
	  <!-- /main content -->


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




@stop


 
@section('scriptfooter')

 <link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/entypo.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/font-awesome.min.css" rel="stylesheet"> 
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/animations.css" rel="stylesheet"> 
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap.min.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/mouldifi-core.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap-datepicker.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap-colorpicker.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/nouislider.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/select2.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/mouldifi-forms.css" rel="stylesheet" >
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap-rtl.min.css" rel="stylesheet">
<link href="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/mouldifi-rtl-core.css" rel="stylesheet">
 
 
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jquery.min.js"></script>
<!-- Load CSS3 Animate It Plugin JS -->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/css3-animate-it.js"></script>
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/js/bootstrap.min.js"></script>
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jquery.metisMenu.js"></script>
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jquery-ui.js"></script>
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jquery.blockUI.js"></script>
<!--nouiSlider-->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/nouislider.min.js"></script>
<!-- Input Mask-->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/jasny-bootstrap.min.js"></script>
<!-- Select2-->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/select2.full.min.js"></script>
<!--Bootstrap ColorPicker-->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap-colorpicker.min.js"></script>
<!--Bootstrap DatePicker-->
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function () {
 

		$(".select2").select2();
		$(".select2-placeholer").select2({
			allowClear: true
		});

 

 
	});
</script>
<script src="{{env('APP_URL')}}/build/servicepay/Mouldifi _ Dashboard_files/functions.js"></script>
@stop

  


