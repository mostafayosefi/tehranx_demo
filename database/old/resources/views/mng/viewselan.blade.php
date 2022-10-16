@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>مشاهده اطلاعیه ها </title>
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
            <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/superadmin/dashboard">داشبورد مدیریت</a></li>
            <li class="breadcrumb-item active" aria-current="page">مشاهده اطلاعیه ها</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">مشاهده اطلاعیه ها</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ردیف</th>
                        <th>متن اطلاعیه</th>
                        <th>تاریخ ایجاد</th> 
                        <th>مشاهده</th>
                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)
                      <tr>
 <td>{{$i}}</td>
 <td>{{$admin->elanat_des}}</td>
 <td>{{jDate::forge($admin->elanat_createdatdate)->format('Y/m/d ساعت H:i a')}}</td> 
                        <td> 

 
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal{{$admin->elanat_id}}" >
  <i data-feather="eye"></i>   
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$admin->elanat_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$admin->elanat_des}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 
 
 <p>{{$admin->elanat_des}}</p> 



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button> 
      </div>
    </div>
  </div>
</div>

                        </td>
 <td><button type="button" class="btn btn-danger  "  data-toggle="modal" data-target="#delet{{$admin->elanat_id}}" ><i data-feather="trash"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->elanat_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف اطلاعیه {{$i}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  <p>     {{$admin->elanat_des}}  </p>
  <hr>
      
       آیه شما مایل به حذف اطلاعیه {{$i}} از سیستم هستید؟
       
       
       
      </div>
      <div class="modal-footer">
        <a href="{{env('APP_URL')}}/superadmin/viewselan/delet/{{$admin->elanat_id}}" class="btn btn-danger"  >حذف</a> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button> 
      </div>
    </div>
  </div>
</div>
 
</td>

<?php $i++; ?>
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