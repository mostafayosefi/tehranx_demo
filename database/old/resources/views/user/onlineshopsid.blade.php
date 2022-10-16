@extends('user.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>{{$form->form_name}}</title>
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

		 
		 
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/user/dashboard">داشبورد کاربر</a></li>
 <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/user/viewsonlineshops">مشاهده درخواست های کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$form->form_name}}</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
        
            
            
            
            <div class="row flex-grow">
            
              <div class="col-md-1 grid-margin stretch-card">
			  </div>
              
              <div class="col-md-10 grid-margin stretch-card">
           
                <div class="card">
                  <div class="card-body">  



       <h5 class="text-center text-uppercase mt-3 mb-4">{{$form->form_name}}</h5>
  
     <img class="img-fluid" style="width: 180px; height: 180px;" src="{{env('APP_URL')}}/public/images/{{$form->form_img}}" alt=""><hr>   
                                  
 <p>
  
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    شرایط و توضیحات
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
 <?php echo $form->form_des; ?>
 
  </div>
</div> 
 </div> </div>
			  </div>
              
              <div class="col-md-1 grid-margin stretch-card">
			  </div>
			  
			  
			  
			  
			  
            
              <div class="col-md-1 grid-margin stretch-card">
			  </div>
			  
              <div class="col-md-10 grid-margin stretch-card">
              
                <div class="card">
                  <div class="card-body">  
                  
 
    <link rel="stylesheet" href="{{env('APP_URL')}}/build/demfr_files/fonts/fonts-fa.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/build/demfr_files/fonts/fonts-fa.css">
 <link rel="stylesheet" href="{{env('APP_URL')}}/build/demfr_files/custom.css"> 
                  
                   <ul class="list-unstyled multi-steps"> 

 
 
	@if($reqs->req_recv == '0')   
	
<li  class="is-actived"   >ثبت سفارش</li> 
<li  class="is-active"   > در انتظار پرداخت</li> 
<li  class="is-active"   > در انتظار تحویل محصول</li> 

	@elseif($reqs->req_recv == '1')
	
<li  class="is-actived"   >ثبت سفارش</li> 
<li  class="is-actived"   > پرداخت شده</li> 
<li  class="is-active"   > در انتظار تحویل محصول</li> 
	
	@elseif($reqs->req_recv == '2')
	
<li  class="is-actived"   >در انتظار پرداخت</li> 
<li  class="is-actived"   > پرداخت شده</li> 
<li  class="is-actived"   > تحویل داده شد</li> 
	
	@endif
	 
  
 </ul>
                  
                  </div>
                  </div>
			  </div>
			  
              <div class="col-md-1 grid-margin stretch-card">
			  </div>
            
              
          
              <div class="col-md-2 grid-margin stretch-card">
			  </div>
              
              
              
              
              <div class="col-md-8 grid-margin stretch-card">
               
              
              
                <div class="card">
                  <div class="card-body">
                  
                  
 <ul class="list-group">
  
  
  
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   نام و نام خانوادگی کاربر ثبت کننده </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$myrequest->user_name}}</span></span></h6> 
</div></li>
  
 

  
@if($plan=='viscartfisics') 
 @foreach($admins as $admin) 
 
 <?php 
    $code=$admin->formdata_code;
 if($code=='provinc') { $namerequest='استان'; 
 foreach($provinces as $province){ if($province->id==$admin->formdata_data){ $data=$province->province_name;} }
  }
 
 if($code=='city') { $namerequest='شهر'; 
 foreach($citys as $city){ if($city->city_id==$admin->formdata_data){ $data=$city->city_name; }} }
 
 
 
 if($code=='codp') { $namerequest='کدپستی'; $data=$admin->formdata_data; }
 if($code=='adres') { $namerequest='آدرس';  $data=$admin->formdata_data; }
 if($code=='des') { $namerequest='توضیحات'; $data=$admin->formdata_data; }
 ?>
 
 
 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">  {{$namerequest}} </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$data}}</span></span></h6> 
</div></li> 
 @endforeach 
 @endif




@if(($plan=='buywithcardinsite')||($req_linkname=='mastercarthediye')||($req_linkname=='visacarthedye')) 



 @foreach($alllists as $list) 
 @if($list->list_price!='1') 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">  {{$list->list_name}} </span> : 
<span class="float-center"> <span class="text-muted pl-3">


  @foreach($admins as $admin) @if($admin->list_chk==$list->list_chk)  
 @if($list->list_typ=='4')
 <a target="_blank" href="{{env('APP_URL')}}/public/images/{{$admin->list_name}}" >مشاهده فایل</a><br>
 <img style="width: 120px; height: 120px;" src="{{env('APP_URL')}}/public/images/{{$admin->list_name}}" alt="user image">
 @else
  {{$admin->list_name}}
  @endif
  @endif  @endforeach
</span></span></h6> 
</div></li> 
  @endif
 @endforeach 
 
 
 
 
 
 
 @foreach($formdatas as $admin) 
  <?php 
    $code=$admin->formdata_code;
 
 
 if($code=='curname') {  $curname=$admin->formdata_data; }
 if($code=='curval') {    $curval=$admin->formdata_data; }
 if($code=='curprice') {  $gh=$admin->formdata_data;   $string= number_format($gh,0);  }
 
 ?>
 
 @endforeach
 
 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   هزینه برحسب {{$curname}}  </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$curval}} {{$curname}}</span></span></h6> 
</div></li>

 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   مبلغ قابل پرداخت    </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$string}} ریال</span></span></h6> 
</div></li>

 @endif




  

@if(($plan=='giftcard')||($plan=='paypal')||($plan=='skrill')||($plan=='visacart')||($plan=='viscartfisics')||($plan=='allservice'))


@foreach($listcurrency as $listcurrenc)
 @if($reqs->form_rnd==$listcurrenc->listcur_idrnd)
 
<?php $gh=$listcurrenc->listcur_price*$listcurrenc->cur_gh; $cur_gh= number_format($listcurrenc->cur_gh,0);  $string= number_format($gh,0);  ?> 

 
 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   هزینه برحسب {{$listcurrenc->cur_name}}  </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$listcurrenc->listcur_price}} {{$listcurrenc->cur_name}}</span></span></h6> 
</div></li>

 
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   مبلغ قابل پرداخت    </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$string}} ریال</span></span></h6> 
</div></li>





@endif
@endforeach




@if(($plan=='paypal')||($plan=='skrill')||($plan=='visacart')||($req_linkname=='mastercarthediye')||($req_linkname=='visacarthedye')||($plan=='allservice'))

  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   توضیحات درخواست    </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$myrequest->req_des}} </span></span></h6> 
</div></li>

@endif




@endif
  
  
  
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">    تاریخ درخواست  </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{jDate::forge($reqs->req_date)->format('Y/m/d ساعت H:i a')}}</span></span></h6> 
</div></li>

   
  
  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">    وضعیت پرداخت  : </span> 
<span class="float-center"> <span class="text-muted pl-3">
	
	
	
	
	@if($reqs->req_flg == '1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; پرداخت شده </span>
@elseif($reqs->req_flg != '1')
<a href="#"   >  
<span class="badge badge-warning"><i data-feather="alert-circle"></i> &nbsp; منتظر پرداخت </span> 
</a>
@endif   

 
	
</span></span></h6> 
</div></li>

   
      
               

@if($reqs->req_flg == '0')  


  <li class="list-group-item">
  <div class="flex-grow"><h6 class="preview-subject">
  <span class="float-right">   مبلغ شارژ حساب  </span> : 
<span class="float-center"> <span class="text-muted pl-3">{{$chargeac}} ريال  </span></span></h6> 
</div></li>



@endif 
    
         

 
  
  
  
  
</ul>





 
                  </div>
                </div>
              </div>
              
              
              
              <div class="col-md-2 grid-margin stretch-card">
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