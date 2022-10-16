@extends('mng.layout')



 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>مشاهده درخواست های کاربران </title>
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
            <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/manage/{{$mng}}/dashboard">پنل مدیریت</a></li>
            <li class="breadcrumb-item active" aria-current="page"> مشاهده درخواست های کاربران</li>
          </ol>
        </nav>

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
                        <th>تاریخ ایجاد درخواست</th>
                        <th>وضعیت</th> 
                        <th>حذف</th> 
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
                        <td>{{jDate::forge($admin->req_date)->format('Y/m/d ساعت H:i a')}}</td>
                        
 
  
 <td>
<a href="{{env('APP_URL')}}/manage/{{$mng}}/viewsonlineshops/{{$admin->req_linkname}}/{{$admin->req_id}}/{{$admin->req_plan}}"  >
@if($admin->req_flg == '1')             
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; پرداخت شده </span>
@elseif($admin->req_flg != '1')  
<span class="badge badge-warning"><i data-feather="alert-circle"></i> &nbsp; منتظر پرداخت </span> 
@endif   
 </a> 
 </td> 
 
 <td>
 
 
 @if($admin->req_flg == '1')             
 
 -
@elseif($admin->req_flg != '1')  

 <button type="button"  class="badge badge-danger"  data-toggle="modal" data-target="#delet{{$admin->req_id}}" ><i data-feather="trash"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->req_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف سفارش  "{{$admin->req_name}}"    </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      آیا شما مایل به حذف سفارش "{{$admin->req_name}}" از سیستم هستید؟ 
      </div>
      <div class="modal-footer">
        <a href="{{env('APP_URL')}}/manage/{{$mng}}/viewsonlineshops/{{$admin->req_linkname}}/{{$admin->req_id}}/{{$admin->req_plan}}/delete" class="btn btn-danger"  >حذف</a> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button> 
      </div>
    </div>
  </div>
</div>

@endif  
 

 
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