@extends('mng.layout')


 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@section('title')
<title> مشاهده کارنسی ها </title>
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
            <li class="breadcrumb-item active" aria-current="page"> مشاهده کارنسی ها</li>
          </ol>
        </nav>

        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">لیست کارنسی ها</h6>
                <div class="table-responsive">
                
@if($admins)
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
     				    <th>ردیف</th> 
                        <th>نام کارنسی</th>
                        <th>قیمت به ریال</th>
                        <th>ویرایش</th> 
                      </tr>
                    </thead>
                    <tbody>
                    
<?php $i=1; ?>       
@foreach($admins as $admin)
                      <tr>
 <td>{{$i++}}</td>
  
 <td>{{$admin->cur_name}} <span class="badge badge-success">{{$admin->cur_nem}}</span> </td>  
 <td>{{$admin->cur_gh}} ريال</td>  
  
  
   
 
 
 
 <td><button type="button"  class="btn btn-primary btn-icon btn-lg"  data-toggle="modal" data-target="#delet{{$admin->id}}" ><i data-feather="edit"></i>  </button>
 
 
 
 
 <div class="modal fade" id="delet{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
<form method="post" action="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewscurrency/{{$admin->id}}">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{$admin->cur_name}} <span class="badge badge-success">{{$admin->cur_nem}}</span>  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       
 <div class="form-group" >
<label for="exampleInputUsername1">قیمت به ریال</label>
<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="قیمت به ریال" required pattern="\d+"  name="name" @if ($admin->cur_gh) value="{{$admin->cur_gh}}"@else value="{{ old('name') }}" @endif  required> 
</div>		
 

                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
       
       
      </div>
      <div class="modal-footer"> 
      
 
      
        <button type="submit" class="btn btn-primary"  >ویرایش</button>   
      </div>
</form>
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