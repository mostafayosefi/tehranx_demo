@extends('user.layout')



 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>{{Session::get('user_titplan')}}</title>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h4 class="text-center mb-3 mt-4">{{Session::get('user_titplan')}}</h4>
               
                <div class="container">
                
                
                
                @if($link=='giftcard')
                   <div class="row"> 

                  @foreach($allgiftcards as $giftcard)   
                         
                    <div class="col-md-3 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="text-center text-uppercase mt-3 mb-4">{{$giftcard->subcatf_name}}</h5>

 <a href="{{env('APP_URL')}}/user/plane/{{$plan}}/{{$giftcard->subcatf_link}}" >
<img class="img-fluid" src="{{env('APP_URL')}}/public/images/{{$giftcard->subcatf_img}}" alt=""></a><hr>

<p>
 
<?php //echo $giftcard->subcatf_des; ?>
 </p>
<hr> 
             
                          
                          
                          
                                     
                          
 <a href="{{env('APP_URL')}}/user/plane/{{$plan}}/{{$giftcard->subcatf_link}}" class="btn btn-success d-block btn-lg   rounded-pill mx-auto mt-4">مشاهده سرویس ها  </a>
 
 
                        </div>
                      </div>
                    </div>
 
                  @endforeach
                     
                  </div>
                  
                  @endif
                
                  <div class="row">
                  

                  @foreach($giftcards as $giftcard)               
                    <div class="col-md-3 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="text-center text-uppercase mt-3 mb-4">{{$giftcard->form_name}}</h5>


<img class="img-fluid" src="{{env('APP_URL')}}/public/images/{{$giftcard->form_img}}" alt=""><hr>

<p>
<!--
<?php echo mb_substr($giftcard->form_des, 0, 125, mb_detect_encoding($giftcard->form_des)).'...'; ?>
-->
<?php //echo $giftcard->form_des; ?>
 </p>
<hr> 


@if($plan!='buywithcardinsite')

@foreach($listcurrency as $listcurrenc)
 @if($giftcard->form_rnd==$listcurrenc->listcur_idrnd)
 <h3 class="text-center font-weight-light">
<?php $gh=$listcurrenc->listcur_price*$listcurrenc->cur_gh; 
 $string= number_format($gh,0);  ?>
{{$string}} ریال
 </h3>
 
 <h6 class="text-muted text-center mb-4 font-weight-normal">{{$listcurrenc->listcur_price}} {{$listcurrenc->cur_name}}
 	
 </h6>
 @endif
 @endforeach 
  
 @endif                        
                          
                          
                          
                          
                          
        <!-- {{env('APP_URL')}}/user/order/{{$plan}}/{{$giftcard->form_linkname}} -->    
        

@if($plan=='giftcard')
<a href="#" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4"  type="button"  data-toggle="modal" data-target="#exampleModalCenter{{$giftcard->form_id}}">ثبت سفارش <i data-feather="check-circle"></i> &nbsp;  </a>




<form method="post" action="{{env('APP_URL')}}/user/addreq/{{$plan}}/{{$giftcard->form_linkname}}">
	
	
            <div class="example">
        

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter{{$giftcard->form_id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">{{$giftcard->form_name}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">


      <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="text-center text-uppercase mt-3 mb-4">{{$giftcard->form_name}}</h5>

 
<p>
 
<?php echo $giftcard->form_des; ?>
 </p>
<hr> 

 

@foreach($listcurrency as $listcurrenc)
 @if($giftcard->form_rnd==$listcurrenc->listcur_idrnd)
 <h3 class="text-center font-weight-light">
<?php $gh=$listcurrenc->listcur_price*$listcurrenc->cur_gh; 
 $string= number_format($gh,0);  ?>
{{$string}} ریال
 </h3>
 
 <h6 class="text-muted text-center mb-4 font-weight-normal">{{$listcurrenc->listcur_price}} {{$listcurrenc->cur_name}}
 	
 </h6>
 @endif
 @endforeach 
                        
                      
                      
     <hr>                 
                      
<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-2 col-form-label">کدتخفیف</label>
 <div class="col-sm-5">
 <input type="text" class="form-control rounded-pill" id="chatForm" placeholder=" " value=""> 
 </div>
 <div class="col-sm-5">
 <button type="button" class="btn btn-success ">
بررسی کدتخفیف 
 </button>
 </div>
 </div>
     
        
 
 
 
 
 <input type="hidden" name="price" value="{{$gh}}"> 
 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  
 <button class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4"  type="submit">ثبت سفارش <i data-feather="check-circle"></i> &nbsp;  </button>

 
 
 
                        </div>
                      </div>
                    </div>




                    
                    
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button> 
                    </div>
                  </div>
                </div>
              </div>
            </div>



</form>
         
            <hr>






@endif    

@if(($plan=='visacart')||($plan=='paypal')||($plan=='skrill')||($plan=='allservice'))
<a href="{{env('APP_URL')}}/user/order/{{$plan}}/{{$giftcard->form_linkname}}" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">ثبت سفارش  <i data-feather="check-circle"></i> &nbsp; </a> 
@endif   

@if($plan=='viscartfisics')
<a href="{{env('APP_URL')}}/user/servicei1/order/{{$plan}}/{{$giftcard->form_linkname}}" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">ثبت سفارش  <i data-feather="check-circle"></i> &nbsp; </a> 
@endif    
                          

@if($plan=='buywithcardinsite')
<a href="{{env('APP_URL')}}/user/servicei2/order/{{$plan}}/{{$giftcard->form_linkname}}" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">ثبت سفارش <i data-feather="check-circle"></i> &nbsp; </a> 
@endif    
                          

 
 
                        </div>
                      </div>
                    </div>

 
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