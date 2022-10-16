@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title>مشاهده صفحات</title>
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
            <li class="breadcrumb-item active" aria-current="page">مشاهده صفحات</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">مشاهده صفحات</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>ردیف</th>
                        <th>نام صفحه</th>
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
 <td>{{$admin->page_name}}</td>
 <td>{{jDate::forge($admin->page_createdatdate)->format('Y/m/d ساعت H:i a')}}</td> 
                        <td> 

 
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal{{$admin->page_id}}" >
  <i data-feather="eye"></i>   
</button>
<!-- Modal -->
<div class="modal fade  bd-example-modal-xl" id="exampleModal{{$admin->page_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$admin->page_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<form class="forms-sample"  method="POST" action="{{env('APP_URL')}}/superadmin/viewspage/edit/{{$admin->page_id}}" enctype="multipart/form-data"  onsubmit="return Validate(this);"   >
 
<div class="row">



<div class="col-sm-12"> 
<div class="form-group" >
<label for="exampleInputUsername1">عنوان صفحه</label>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="عنوان صفحه" name="name"   value="{{$admin->page_name}}"   required> 
</div>	 





 <div class="form-group">
 <h4 class="card-title">   متن خبر</h4>
 <textarea class="form-control" name="des"  id="tinymceExample" rows="10"  >{{$admin->page_des}}</textarea>
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
 <td><button type="button" class="btn btn-danger  "  data-toggle="modal" data-target="#delet{{$admin->page_id}}" ><i data-feather="trash"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->page_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف {{$admin->page_name}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       آیه شما مایل به حذف {{$admin->page_name}} از سیستم هستید؟
      </div>
      <div class="modal-footer">
        <a href="{{env('APP_URL')}}/superadmin/viewscats/delet/{{$admin->page_id}}" class="btn btn-danger"  >حذف</a> 
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