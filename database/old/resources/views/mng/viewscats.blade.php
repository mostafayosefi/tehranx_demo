@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>مشاهده دسته بندی ها</title>
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
            <li class="breadcrumb-item active" aria-current="page">مشاهده دسته بندی ها</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">مشاهده دسته بندی ها</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ردیف</th>
                        <th>نام دسته بندی</th>
                        <th>تاریخ ایجاد</th> 
                        <th>مشاهده</th>
                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)
                      <tr>
 <td>{{$i++}}</td>
 <td>{{$admin->cat_name}}</td>
 <td>{{jDate::forge($admin->cat_createdatdate)->format('Y/m/d ساعت H:i a')}}</td> 
                        <td> 

 
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal{{$admin->cat_id}}" >
  <i data-feather="eye"></i>   
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$admin->cat_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$admin->cat_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/superadmin/viewscats/edit/{{$admin->cat_id}}" enctype="multipart/form-data"  onsubmit="return Validate(this);"   >
 
<div class="row">



<div class="col-sm-12"> 
<div class="form-group" >
<label for="exampleInputUsername1">نام دسته بندی</label>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="نام دسته بندی" name="name"   value="{{$admin->cat_name}}"   required> 
</div>	 
</div>	
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-primary btn-block">ویرایش</button> 
</div>


		
</div>	  
</form>
	
 



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button> 
      </div>
    </div>
  </div>
</div>

                        </td>
 <td><button type="button" class="btn btn-danger  "  data-toggle="modal" data-target="#delet{{$admin->cat_id}}" ><i data-feather="trash"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->cat_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف {{$admin->cat_name}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       آیه شما مایل به حذف {{$admin->cat_name}} از سیستم هستید؟
      </div>
      <div class="modal-footer">
        <a href="{{env('APP_URL')}}/superadmin/viewscats/delet/{{$admin->cat_id}}" class="btn btn-danger"  >حذف</a> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button> 
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