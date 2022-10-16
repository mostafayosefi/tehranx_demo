@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>داشبورد 


          @if(Session::get('arou')=='superadmin') مدیریت کل @else  	مدیریت @endif
 </title>
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
            <h4 class="mb-3 mb-md-0"> داشبورد  
 
          </h4>
          </div> 
        </div>


@if(Session::get('accessadmin_giftcard')=='1')
 <div class="row">

   <div class="col-md-12">
            <div class="card">
              <div class="card-body">
 <h4 class="text-center mb-3 mt-4">
 مدیریت {{Session::get('titplan')}} </h4>
 <p class="text-muted text-center mb-4 pb-2">  جهت 
 مدیریت {{Session::get('titplan')}} 
   و همچنین مشاهده و ویرایش آن لطفا اقدام نمایید </p>
                <div class="container">
                  <div class="row">
                  
             
 @foreach($giftcards as $giftcard) 
                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                      <div class="card">
                        <div class="card-body">
 <h5 class="text-center text-uppercase mt-3 mb-4">{{$giftcard->subcatf_name}}</h5>


<img class="img-fluid" src="{{env('APP_URL')}}/public/images/{{$giftcard->subcatf_img}}" alt=""><hr>

<p>
<!--
<?php echo mb_substr($giftcard->subcatf_des, 0, 125, mb_detect_encoding($giftcard->subcatf_des)).'...'; ?>
-->
<!-- <?php echo $giftcard->subcatf_des; ?> -->
 </p>
<hr>

<a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/{{$plan}}/{{$giftcard->subcatf_id}}" class="btn btn-primary d-block mx-auto mt-4"><h5 class="text-center font-weight-light">

مدیریت {{$giftcard->subcatf_name}} 
  </h5></a>
                           
                            
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

@endif


@if(Session::get('accessadmin_sefaresh')=='1')
 <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"> مشاهده درخواست های کاربران</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
     				    <th>ردیف</th> 
                        <th>نام و نام خانوادگی کاربر</th>
                        <th>عنوان درخواست</th>
                        <th>هزینه به ریال</th>  
                        <th>وضعیت</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)
                      <tr>
 <td>{{$i++}}</td>
 
                        <td>{{$admin->user_name}} </td>  
                        <td>{{$admin->req_name}} </td>  
                        <td>{{$admin->req_price}} ريال</td>   
                        
 
  
 <td>
<a href="{{env('APP_URL')}}/manage/{{$mng}}/viewsonlineshops/{{$admin->req_linkname}}/{{$admin->req_id}}/{{$admin->req_plan}}"  >
@if($admin->req_flg == '1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; پرداخت شده </span>
@elseif($admin->req_flg != '1')  
<span class="badge badge-warning"><i data-feather="alert-circle"></i> &nbsp; منتظر پرداخت </span> 
@endif   
 </a> 
 </td> 
 
 
                      </tr>
@endforeach


 
                    </tbody>
                  </table>

@endif

                </div>
              </div>
            </div>
          </div>
          </div>

@endif



  

      </div>
@stop
  
  

</body>

</html>