@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>مشاهده درخواست های کاربر</title>
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


 






				<div class="profile-page tx-13">
					<div class="row">
						<div class="col-12 grid-margin">
							<div class="profile-header">
								<div class="cover">
									<div class="gray-shade"></div>
									<figure>
										<img src="{{env('APP_URL')}}/build/template/assets/images/profile-cover.jpg" class="img-fluid"
											alt="profile cover">
									</figure>
									<div class="cover-body d-flex justify-content-between align-items-center">
										<div>

<img class="profile-pic" src="{{env('APP_URL')}}/public/images/{{$admin->user_img}}"
												alt="profile">
 <span class="profile-name">{{$admin->user_name}}</span>
										</div>
										<div class="d-none d-md-block">
											<button class="btn btn-primary btn-icon-text btn-edit-profile">
												<i data-feather="edit" class="btn-icon-prepend"></i> ویرایش پروفایل
											</button>
										</div>
									</div>
								</div>
								<div class="header-links">
									<ul class="links d-flex align-items-center mt-3 mt-md-0">
										<li
											class="header-link-item ml-3 pl-3 border-left d-flex align-items-center active">
											<i class="ml-1 icon-md" data-feather="columns"></i>
											<a class="pt-1px d-none d-md-block" href="#">تایم لاین</a>
										</li>
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<i class="ml-1 icon-md" data-feather="user"></i>
											<a class="pt-1px d-none d-md-block" href="#">درباره</a>
										</li>
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<i class="ml-1 icon-md" data-feather="users"></i>
											<a class="pt-1px d-none d-md-block" href="#">دوستان <span
													class="text-muted tx-12">3,765</span></a>
										</li>
										<li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
											<i class="ml-1 icon-md" data-feather="image"></i>
											<a class="pt-1px d-none d-md-block" href="#">تصاویر</a>
										</li>
										<li class="header-link-item d-flex align-items-center">
											<i class="ml-1 icon-md" data-feather="video"></i>
											<a class="pt-1px d-none d-md-block" href="#">ویدیو ها</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row profile-body">
						<!-- left wrapper start -->
 
 		
          <div class="col-md-12  ">		 
					
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"> مشاهده درخواست های {{$admin->user_name}} </h6>
                <div class="table-responsive">
                
@if($myrequests)
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
     				    <th>ردیف</th> 
                        <th>عنوان درخواست</th>
                        <th>هزینه به ریال</th> 
                        <th>تاریخ ایجاد درخواست</th>
                        <th>وضعیت</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($myrequests as $myrequest)
                      <tr>
 <td>{{$i++}}</td>
 
                        <td>{{$myrequest->req_name}} </td>  
                        <td>{{$myrequest->req_price}} ريال</td>  
                        <td>{{jDate::forge($myrequest->req_date)->format('Y/m/d ساعت H:i a')}}</td>
                        
 
  
 <td>
<a href="{{env('APP_URL')}}/user/viewsonlineshops/{{$myrequest->req_linkname}}/{{$myrequest->req_id}}/{{$myrequest->req_plan}}"  >
@if($myrequest->req_flg == '1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; پرداخت شده </span>
@elseif($myrequest->req_flg != '1')  
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

			
			</div>
							
						 

			</div>

@stop
<!--
<script src="{{env('APP_URL')}}/build/servicepay/firealert/components.js.download"></script> 
 
    <script>
        $(document).ready(function () {
                        Swal.fire({
                text: '<?php echo Session::get('statust'); ?>',
                type: 'success',
                confirmButtonText: 'بستن',       toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1113000

            });
            
        });
    </script>  
-->


 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">عدم تایید مدارک</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
  <form method="post" action="rejdoc/{{$admin->id}}">
  
      <div class="modal-body">


<div class="col-md-12"> 
<img src="{{env('APP_URL')}}/public/images/{{$admin->user_uploadpassport}}" width="240"  height="160"  />  
 </div>
 
 

<div class="form-group" >
<label for="adres">توضیحات</label>

<textarea class="form-control"  placeholder="توضیحات"  id="des" name="des"    rows="5" ></textarea>
 
</div>	



      <input type="hidden" name="_token" value="{{ csrf_token() }}">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        <button type="submit" class="btn btn-primary">ارسال</button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>




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