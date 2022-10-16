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




<form method="post" class="forms-sample"   enctype="multipart/form-data"  onsubmit="return Validate(this);"   action="{{env('APP_URL')}}/user/addreq/{{$plan}}/{{$form->form_linkname}}">


<div class="row">





<div class="col-sm-12">
        @if(count($errors))
			<div class="alert alert-danger">
				<strong>اخطار!</strong> لطفا اطلاعات را به درستی وارد نمایید
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

			</div>





<div class="col-sm-6">



<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">نام کاربری</label>
 <div class="col-sm-8">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="نام کاربری" name="name"  value="{{$user->user_name}}"  required >
 </div>
 </div>


<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">تلفن همراه</label>
 <div class="col-sm-8">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="تلفن همراه" name="name"  value="{{$user->user_tell}}"  required >
 </div>
 </div>


<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ایمیل</label>
 <div class="col-sm-8">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" ایمیل " name="name"  value="{{$user->user_email}}"  required >
 </div>
 </div>

<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-2 col-form-label">کدتخفیف</label>
 <div class="col-sm-5">
 <input type="text" class="form-control rounded-pill" id="chatForm" placeholder=" ">
 </div>
 <div class="col-sm-5">
 <button type="button" class="btn btn-success ">
بررسی کدتخفیف
 </button>
 </div>
 </div>





</div>


<div class="col-sm-6">


<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-3 col-form-label">نوع سرویس</label>
 <div class="col-sm-8">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" نوع سرویس " name="name"  value="{{$form->form_name}}"  required >
 </div>
 </div>




@foreach($listcurrency as $listcurrenc)
 @if($form->form_rnd==$listcurrenc->listcur_idrnd)

<?php $gh=$listcurrenc->listcur_price*$listcurrenc->cur_gh; $cur_gh= number_format($listcurrenc->cur_gh,0);  $string= number_format($gh,0);  ?>







<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت سرویس
</label>
 <div class="col-sm-7">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off"    placeholder="قیمت سرویس" name="name"  value="{{$listcurrenc->listcur_price}} {{$listcurrenc->cur_name}}"  required >
 </div>
 </div>

<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت واحد ارز ( ريال )
</label>
 <div class="col-sm-7">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" قیمت واحد ارز ( ريال ) " name="name"  value="{{$cur_gh}} ريال"  required >
 </div>
 </div>


<div class="form-group row">
 <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت سرویس به ریال
</label>
 <div class="col-sm-7">
<input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" قیمت سرویس به ریال " name="name"  value="{{$string}} ریال"  required >
 </div>
 </div>


 @endif
 @endforeach









</div>




<div class="col-sm-12">



 <input type="hidden" name="price" value="{{$gh}}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">



 <div class="form-group">
 <h4 class="card-title">توضیحات</h4>
 <textarea class="form-control" name="des" id="tinymceExample" rows="10"  ></textarea>
 </div>




<div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-primary btn-block  rounded-pill">ثبت درخواست</button>
</div>
</div>



</div>

</form>








                  </div>
                </div>
              </div>



              <div class="col-md-1 grid-margin stretch-card">
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
