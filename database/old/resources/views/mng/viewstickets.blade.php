@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title> مشاهده تیکتهای من </title>
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
 
        <nav class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/user/panel">پنل کاربر</a></li>
            <li class="breadcrumb-item active" aria-current="page">مشاهده تیکتهای کاربران</li>
          </ol>
        </nav>

        <div class="row">

          
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"> لیست تیکتهای کاربران</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
															<th>ردیف</th> 
															<th>عنوان تیکت </th> 
															<th>کاربر </th> 
															<th>اولویت </th> 
															<th>دپارتمان </th> 
															<th>تاریخ ایجاد</th>
															<th>وضعیت</th>
															<th>حذف</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)



 <tr>
 <td>{{$i++}}</td> 
                        <td>{{$admin->tik_tit}} 
  @if($admin->tik_toread=='0') <span class="badge badge-primary"  title="یک پیام جدید" >1</span> @endif </td> 
  
  
                        <td>{{$admin->user_name}}</td>  
  
                        <td>{{$admin->tik_olv}} </td>
                        <td>{{$admin->tik_depr}} </td>
  <td>{{jDate::forge($admin->tik_createdatdate)->format('l d F Y ساعت H:i a')}}</td>

 

@if($admin->tik_active == '2')                       
<td><a href="viewstickets/ticket/{{$admin->id}}"   onclick="openSearch()"> 	 <button type="button" class="mb-1 btn btn-sm btn-success"> پاسخ داده شده <i class="mdi mdi-check-circle"></i> </button></a></td>
@elseif($admin->tik_active == '1')
<td><a href="viewstickets/ticket/{{$admin->id}}" onclick="openSearch()"> <button type="button" class="mb-1 btn btn-sm btn-warning">  منتظر پاسخ  <i class="mdi mdi-close-circle"></i></button></a></td>
@elseif($admin->tik_active == '0')
<td><a href="viewstickets/ticket/{{$admin->id}}" onclick="openSearch()"> <button type="button" class="mb-1 btn btn-sm btn-primary">  تیکت بسته شده است  <i class="mdi mdi-close-circle"></i></button></a></td>
@endif



 <td> 
                
<button type="button" class="mb-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal-{{$admin->id}}"> حذف  <i  class="mdi mdi-trash-can"></i></button>
                  
		<div class="modal fade" id="exampleModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal-{{$admin->id}}" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
 <h5 class="modal-title" id="exampleModal-{{$admin->id}}">حذف تیکت "{{$admin->tik_tit}}"</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
<p>آیا شما مایل به حذف تیکت "{{$admin->tik_tit}}" از سیستم می باشید؟</p>
									</div>
									<div class="modal-footer">
 <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">لغو</button>
 
 <a href="{{env('APP_URL')}}/{{Session::get('arou')}}/viewstickets/delet/{{$admin->id}}"  type="button" class="btn btn-primary btn-pill">تایید</a>
  
									</div>
								</div>
							</div>
						</div>           
 
 
 
 
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