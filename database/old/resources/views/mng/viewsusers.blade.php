@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title> مشاهده کاربران </title>
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
            <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/dashboard">داشبورد مدیریت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> مشاهده کاربران</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"> مشاهده کاربران</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ردیف</th>
                        <th>نام و نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>تلفن</th>
                        <th>تاریخ ایجاد</th>  
                        <th>وضعیت</th>
                        <th>حذف</th>
                        <th>ورود</th>
                      </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)
                      <tr>
 <td>{{$i++}}</td>
 <td>
 @if($admin->user_autactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_name}} </span>
@elseif($admin->user_autactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_name}} </span>
@elseif($admin->user_autactive=='2') 
<span class="badge badge-danger"><i data-feather="alert-circle"></i> &nbsp; {{$admin->user_name}} </span>
@endif   
 </td>
 <td>
 @if($admin->user_emailactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_email}} </span>
@elseif($admin->user_emailactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_email}} </span> 
@endif   
 </td> 
 
 <td>
 @if($admin->user_tellactive=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; {{$admin->user_tell}} </span>
@elseif($admin->user_tellactive=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; {{$admin->user_tell}} </span> 
@endif   
 </td> 
 
 
 
 
 <td>{{jDate::forge($admin->user_createdatdate)->format('Y/m/d ساعت H:i a')}}</td> 
 
  
 <td>
<a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsusers/edituser/{{$admin->id}}"  >
 @if($admin->user_active=='1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; فعال </span>
@elseif($admin->user_active=='0') 
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; غیرفعال </span> 
@endif   
 </a> 
 </td> 
 
 <td><button type="button"  class="badge badge-danger"  data-toggle="modal" data-target="#delet{{$admin->id}}" ><i data-feather="trash"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف {{$admin->user_name}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       آیه شما مایل به حذف {{$admin->user_name}} از سیستم هستید؟
      </div>
      <div class="modal-footer">
        <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsusers/delet/{{$admin->id}}" class="btn btn-danger"  >حذف</a> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button> 
      </div>
    </div>
  </div>
</div>
 
</td>


 <td>
<a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsusers/loginuser/{{$admin->id}}"  target="_blank" >
 
<span class="badge badge-primary"> &nbsp; ورود <i data-feather="log-in"></i></span> 
  
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