@component('admin.layouts.content', [
    'title' => 'تنظیمات کارمزد',
    'tabTitle' => 'تنظیمات کارمزد',
    'breadcrumb' => [['title' => 'تنظیمات کارمزد', 'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>تنظیمات کارمزد</h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.form.price.update_fee', $price_fee) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">


                                        @include('admin.layouts.table.java_price')



                                        @php
                                        $currency =   $price_fee->currency->id;
                                        $money =   $price_fee->money;
                                        $rate =  $price_fee->currency->rate;
                                        $price =   $price_fee->price;


                                      @endphp

                                      <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">مبلغ
                                         </label>
                                          <div class="col-sm-9">
                                         <input type="text" class="form-control" id="money"  autocomplete="off"    placeholder="مقدار" name="money"
                                         value="{{$money}}"  required onkeyup="calc()"      >
                                          </div>
                                          </div>



                                          <div class="form-group row">
                                              <label for="exampleInputUsername2" class="col-sm-2 col-form-label">نوع ارز
                                             </label>
                                              <div class="col-sm-9">
                                      <select id="dropdown_test" onchange="calc()" name="currency"   >
                                      @foreach ($currencies as $mecurrency  )
                                      <option  value="{{$mecurrency->rate}}"  data-one="{{$mecurrency->rate}}" {{($mecurrency->id  == $currency ? 'selected' : '')}}  >{{$mecurrency->name}}</option>
                                      @endforeach
                                      </select>
                                              </div>
                                              </div>




                                      <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">مبلغ ارز
                                         </label>
                                          <div class="col-sm-9">
                                      <input type="text" class="form-control"  id="Myrate" readonly="true"
                                      class="form-control"     value="{{number_format($rate)}} ريال"  />
                                          </div>
                                          </div>

                                          @include('admin.layouts.table.java_price')

                                      <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-2 col-form-label">مبلغ نهایی
                                         </label>
                                          <div class="col-sm-9">
                                      <input type="text" class="form-control"  id="resultBox" readonly="true" class="form-control"
                                       value="{{number_format($price)}} ريال"  style="color: #4ea201"  name="price"   />
                                          </div>
                                          </div>



                                      <script>

                                      function calc(){
                                       var select1_control4 = 10;
                                      var money = document.getElementById('money').value;
                                      var myselecte = $('#dropdown_test').change(function () {
                                      var select1_control = 1;
                                      var str = select1_control * $(this).find('option:selected').data('one')   * money +" ریال ";

                                      var  rate=$(this).find('option:selected').data('one');
                                      // return str;
                                      // alert(str);

                                      $('#resultBox').val(str);

                                      });



                                      var str = document.getElementById('dropdown_test').value*money +" ریال ";
                                       $('#resultBox').val(str);

                                       var myrate = 0;
                                      var myrate=document.getElementById('dropdown_test').value +" ریال ";
                                      $('#Myrate').val(myrate);

                                      }
                                      </script>










                                        @method('PUT')

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-block">ویرایش </button>
                                        </div>


                                    </div>


                                    <div class="col-sm-3"></div>
                                </div>

                            </form>



                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>













    @slot('script')




    @endslot
@endcomponent
