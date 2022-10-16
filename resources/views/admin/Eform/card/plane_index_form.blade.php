@if($guard=='admin')

@endif


@if($guard=='user')






                    <div class="container">

                        @if($planes->form_subcategory->form_category->link=='Money')

                        <div class="page-content">

                            <div class="row">
                              <div class="col-12 col-xl-12 stretch-card">


                                <div class="row flex-grow">

                                  <div class="col-md-1 grid-margin stretch-card">
                                  </div>

                                  <div class="col-md-10 grid-margin stretch-card">

                                    <div class="card">
                                      <div class="card-body">

                           <h5 class="text-center text-uppercase mt-3 mb-4">{{$planes->name}}</h5>



                           @include('admin.layouts.table.avatarnul', [  'avatarimage' => $planes->image , 'class'=>'img-fluid' , 'style' => 'width: 180px; height: 180px;'  ])

                         <hr>

                     <p>

                      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        شرایط و توضیحات
                      </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                     <?php echo $planes->text; ?>

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




                    <form method="post" class="forms-sample"   enctype="multipart/form-data"  onsubmit="return Validate(this);"
                    onchange="totalIt()"  action="#">


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
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="نام کاربری" name="name"
                     value="{{$user->username}}"  required >
                     </div>
                     </div>


                    <div class="form-group row">
                     <label for="exampleInputUsername2" class="col-sm-3 col-form-label">تلفن همراه</label>
                     <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder="تلفن همراه" name="name"
                     value="{{$user->tell}}"  required >
                     </div>
                     </div>


                    <div class="form-group row">
                     <label for="exampleInputUsername2" class="col-sm-3 col-form-label">ایمیل</label>
                     <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" ایمیل " name="name"
                     value="{{$user->email}}"  required >
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
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" نوع سرویس " name="name"
                     value="{{$planes->name}}"  required >
                     </div>
                     </div>








                    <div class="form-group row">
                     <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت سرویس
                    </label>
                     <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off"    placeholder="قیمت سرویس" name="name"
                    value="0"  required >
                     </div>
                     </div>

                    <div class="form-group row">
                     <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت واحد ارز ( ريال )
                    </label>
                     <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" قیمت واحد ارز ( ريال ) "
                    name="name"  value="0 ريال"  required >
                     </div>
                     </div>


                    <div class="form-group row">
                     <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت سرویس به ریال
                    </label>
                     <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" disabled="" autocomplete="off" placeholder=" قیمت سرویس به ریال "
                     name="name"  value="0 ریال"  required >
                     </div>
                     </div>



                    </div>




                    <div class="col-sm-12">



                     <input type="hidden" name="price" value="">
                     @csrf





                     <div class="form-group row" >

                        <div class="col-md-12">
                            <label for="view_mycategorybrand">  واحد    </label>
                            <select name="currency"    class="js-example-basic-single w-100"
                            placeholder=""   aria-required="true"      style="font-size: 18px;"
                            id="view_mycategorybrand"       onchange="myFunction()"
                               >


                            @foreach ($currencies as $currency  )

                                 <option value="{{$currency->id}}"   data-var1="1250"
                                     {{old('currency')?'selected':null}}>{{$currency->name}}</option>

                                 @endforeach



                        </select>
                        </div>

                        </div>


                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-4 col-form-label">قیمت سرویس
                           </label>
                            <div class="col-sm-7">
                           <input type="text" class="form-control" id="money"  autocomplete="off"    placeholder="مقدار" name="name"
                           value="0"  required onkeyup="calc()" >
                            </div>
                            </div>

<select id="dropdown_test" onchange="calc()">
    <option   data-one="1200" >1200</option>
    <option   data-one="800" >800</option>
</select>


<input type="text" id="resultBox" readonly="true" class="form-control" value="0"  />

<script>

  function calc(){
    var select1_control4 = 10;
    var money = document.getElementById('money').value;
 var myselecte = $('#dropdown_test').change(function () {
    var select1_control = 1;
    var str = select1_control * $(this).find('option:selected').data('one')   * money;

  var  rate=$(this).find('option:selected').data('one');
  // return str;
   // alert(str);

$('#resultBox').val(str);

});

   var str = document.getElementById('dropdown_test').value*money;
   $('#resultBox').val(str);

  }
</script>










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




                        @endif



                    </div>







@endif
