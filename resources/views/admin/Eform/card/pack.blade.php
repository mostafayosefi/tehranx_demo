@if($name_pack=='header_form')
<div class="card">
<div class="card-body">
<h5 class="text-center text-uppercase mt-3 mb-4">{{$form->name}}</h5>
@include('admin.layouts.table.avatarnul', [  'avatarimage' => $form->image , 'class'=>'img-fluid' , 'style' => 'width: 180px; height: 180px;'  ])
<hr>
<p>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
شرایط و توضیحات
</button>
</p>
<div class="collapse" id="collapseExample">
<div class="card card-body">
<?php echo $form->text; ?>
</div>
</div>
</div>
</div>
@endif


@if($name_pack=='sans_textaria')
@php $form = form_or_date($form_data_list , $form); @endphp
@if ($form)
@foreach ($form->form_coloumns as $key => $admin)
  @php $mydata = mydata($form_data , $admin); @endphp
  @if($admin->form_field->name!='textaria')
{{-- <div class="col-sm-12"> --}}
    @include('admin.Eform.card.coloumns' , ['guard' => 'admin'  , $form  , $mydata  , 'coloumn' => $admin ] )
{{-- </div> --}}
@endif
@endforeach
@endif

@endif




@if($name_pack=='only_textaria')

@php $form = form_or_date($form_data_list , $form); @endphp
@if ($form)
@foreach ($form->form_coloumns as $key => $admin)
  @php $mydata = mydata($form_data , $admin); @endphp
  @if($admin->form_field->name=='textaria')
{{-- <div class="col-sm-12"> --}}
    @include('admin.Eform.card.coloumns' , ['guard' => 'admin'  , $form  , $mydata  , 'coloumn' => $admin ] )
{{-- </div> --}}
@endif
@endforeach
@endif

@endif






@if($name_pack=='price')

@php
  $currency =   my_list( $form ,$form_data_list , 'currency' );
  $money =   my_list( $form ,$form_data_list , 'money' );
  $rate =   my_list( $form ,$form_data_list , 'rate' );
  $price =   my_list( $form ,$form_data_list , 'price' );


@endphp

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">مبلغ
   </label>
    <div class="col-sm-9">
   <input type="text" class="form-control" id="money"  autocomplete="off"    placeholder="مقدار" name="money"
   value="{{$money}}"  required onkeyup="calc()"  {{$disable_money}}   >
    </div>
    </div>
 

    <div class="form-group row">
        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">نوع ارز
       </label>
        <div class="col-sm-9">
<select id="dropdown_test" onchange="calc()" name="currency" @if($disable_currency=='readonly') disabled @endif   >
@foreach ($currencies as $mecurrency  )
<option  value="{{$mecurrency->rate}}"  data-one="{{$mecurrency->rate}}" {{($mecurrency->id  == $currency ? 'selected' : '')}}  >{{$mecurrency->name}}</option>
@endforeach
</select>
        </div>
        </div>




<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">مبلغ ارز
   </label>
    <div class="col-sm-8">
<input type="text" class="form-control"  id="Myrate" readonly="true"
class="form-control"     value="{{number_format($rate)}} ريال"  />
    </div>
    </div>

    @include('admin.layouts.table.java_price')

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">هزینه سفارش
   </label>
    <div class="col-sm-8">
<input type="text" class="form-control"  id="resultBox" readonly="true" class="form-control"
 value="{{number_format($price)}} ريال"  style="color: #4ea201"     />
    </div>
    </div>

    @if($form->comision == 'active')

    <input type="hidden"  id="fee"  value="{{$fee_price_fee}}"     />
    <div class="form-group row">
        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">هزینه خدمات
       </label>
        <div class="col-sm-8">
    <input type="text" class="form-control"  id="fee_view" readonly="true" class="form-control"
     value="{{number_format($fee_price_fee)}} ريال"  style="color: #4ea201"     />
        </div>
        </div>
    @elseif($form->comision == 'inactive')
    <input type="hidden"  id="fee"  value="0"     />
    @endif


    @include('admin.layouts.table.java_price')


<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">مبلغ نهایی
   </label>
    <div class="col-sm-8">
<input type="text" class="form-control"  id="finalBox" readonly="true" class="form-control"
 value="{{number_format($price)}} ريال"  style="color: #4ea201"   onkeyup="separateNum(this.value,this);"     />
    </div>
    </div>


    <div class="form-group row">
        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">کدتخفیف</label>
        <div class="col-sm-8">
        <input type="text" class="form-control " name="discount" id="discount" placeholder=" ">
        </div>
        </div>



<script>

function calc(){
 var select1_control4 = 10;
var money = document.getElementById('money').value;
var myselecte = $('#dropdown_test').change(function () {
var select1_control = 1;

let fee = Number(document.getElementById('fee').value);
let priceorder = Number(document.getElementById('dropdown_test').value*money);
let final = Number(priceorder + fee );
var str = priceorder  +" ریال ";
var boxfinal = final  +" ریال ";

var  rate=$(this).find('option:selected').data('one');
// return str;
// alert(str);

$('#resultBox').val(str);
$('#finalBox').val(boxfinal);





});



let fee = Number(document.getElementById('fee').value);
let priceorder = Number(document.getElementById('dropdown_test').value*money);
let final = Number(priceorder + fee );
var str = priceorder  +" ریال ";
var boxfinal = final  +" ریال ";


// var str = (document.getElementById('dropdown_test').value*money ) + fee  +" ریال ";




$('#resultBox').val(str);
$('#finalBox').val(boxfinal);

 var myrate = 0;
var myrate=document.getElementById('dropdown_test').value +" ریال ";
$('#Myrate').val(myrate);

}
</script>








@endif




@if($name_pack=='btn')

@if($guard=='user')
                    <div class="form-group">
                    <label for="exampleInputUsername1"> </label>
                    <button type="submit" class="btn btn-primary btn-block  rounded-pill">ثبت درخواست</button>
                    </div>
@endif


@if($guard=='admin')
                    <div class="card-footer">
                        <a href="{{ route('admin.form.form_data_list.index') }}" class="btn btn-danger">بازگشت</a>
                        <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                    </div>
 @endif

@endif


@if($name_pack=='input_username')

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">نام کاربری</label>
    <div class="col-sm-8">
   <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="نام کاربری" name="name"
    value="{{$user->username}}"  required >
    </div>
    </div>

@endif

@if($name_pack=='input_name')

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-4 col-form-label">نام و نام خانوادگی </label>
    <div class="col-sm-7">
   <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="نام و نام خانوادگی " name="username"
    value="{{$user->name}}"    >
    </div>
    </div>

@endif
@if($name_pack=='input_tell')

<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">تلفن همراه</label>
    <div class="col-sm-8">
   <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="تلفن همراه" name="tell"
    value="{{$user->tell}}"    >
    </div>
    </div>

@endif
@if($name_pack=='input_email')


<div class="form-group row">
    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ایمیل</label>
    <div class="col-sm-8">
   <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" ایمیل " name="email"
    value="{{$user->email}}"    >
    </div>
    </div>

@endif
