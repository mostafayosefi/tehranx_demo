@extends('user.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>داشبورد کاربر</title>
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

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">داشبورد</h4>
          </div> 
        </div>



 <div class="row">
   
              
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body"> 
              
              
              
              
              
              
              
              
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">خدمات محبوب</h6>
                 
                </div>
                
                
 <div class="owl-carousel owl-theme owl-auto-play">
                   
@foreach(Session::get('gifcrds') as $giftcard) 

<div class="item">
                  
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="text-center text-uppercase mt-3 mb-4">{{$giftcard->subcatf_name}}</h5>

 <a href="{{env('APP_URL')}}/user/plane/giftcard/{{$giftcard->subcatf_link}}" >
<img class="img-fluid" src="{{env('APP_URL')}}/public/images/{{$giftcard->subcatf_img}}" alt=""></a><hr>
  
 
 
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  </div>
  
                         
 
                
                
                
                
                
                 
              </div>
            </div>
          </div>
          
          <div class="col-lg-10 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">خدمات جدید</h6>
                 
                </div>
                <div class="d-flex flex-column">
                

     
@foreach(Session::get('skrils') as $gfcrd) 
                  <a href="{{env('APP_URL')}}/user/plane/giftcard/{{$gfcrd->subcatf_link}}" class="d-flex align-items-center border-bottom pb-3">
                    <div class="ml-3">
 <img src="{{env('APP_URL')}}/public/images/{{$gfcrd->subcatf_img}}" class="rounded wd-75" alt="user">
                    </div>  
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{$gfcrd->subcatf_name}}</h6> 
                      </div>
                      <!-- <p class="text-muted tx-13">{{$gfcrd->subcatf_des}}  </p> -->
                    </div>
                  </a>
                  @endforeach
 
                </div>
              </div>
            </div>
          </div>
          
 </div>

 

        <div class="row">
          <div class="col-lg-10 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">خدمات با نرخ ویژه</h6>
                 
                </div>
                <div class="d-flex flex-column">
                

     
@foreach(Session::get('gifcrds') as $gfcrd)
                  <a href="#" class="d-flex align-items-center border-bottom pb-3">
                    <div class="ml-3">
                      <img src="{{env('APP_URL')}}/public/images/{{$gfcrd->subcatf_img}}" class="rounded-circle wd-75" alt="user">
                    </div>
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{$gfcrd->subcatf_name}}</h6> 
                      </div>
                      <!-- <p class="text-muted tx-13">{{$gfcrd->subcatf_des}}  </p> -->
                    </div>
                  </a>
                  @endforeach
 
                </div>
              </div>
            </div>
          </div>
 </div> 

      </div>
@stop
  
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