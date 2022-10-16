
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-4 pl-0">

   @include('admin.layouts.table.avatarnul', [  'avatarimage' => $setting->logo , 'class'=>'rounded-circle wd-35' , 'style' => 'height: 100px;width: 100px;'  ])

                      <p class="mt-1 mb-1"><b>  {{$setting->title}}  </b></p>
                      <p>{{$setting->address}} </p>
                      <h5 class="mt-5 mb-2 text-muted">فاکتور به : </h5>
                      <p>  {{$form_data_list->user->name}} ،<br>  {{$form_data_list->user->address}}</p>
                    </div>
                    <div class="col-lg-4 pr-0">
                      <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">فاکتور</h4>
                      <h6 class="text-right mb-5 pb-4">INV-002308 #</h6>
                      <p class="text-right mb-1">  هزینه کل فاکتور</p>
                      <h4 class="text-right font-weight-normal">
                        {{flage_price($form_data_list->price_finical->sum)}}
                      </h4>
                      <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">تاریخ فاکتور :
                        </span>{{ date_frmat_mnth($form_data_list->created_at) }}</h6>

                    </div>
                  </div>






                  <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <h5>جزییات فاکتور  </h5>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-right">نام سرویس</th>
                            <th class="text-right">هزینه  </th>
                          </tr>
                        </thead>
                        <tbody>



                          <tr class="text-right">
                            <td class="text-right"> 1 </td>
                            <td class="text-right">ارسال پستی</td>
                            <td class="text-right">
        <span class="spanstatus spanstatus_warning">
این محصول مجازی می باشد و هزینه ارسال ندارد
        </span>  </td>
                          </tr>

                          <tr class="text-right">
                            <td class="text-right"> 2 </td>
                            <td class="text-right">{{$form_data_list->form->name}}</td>
                            <td class="text-right"> {{flage_price($form_data_list->price_finical->price)}} </td>
                          </tr>

                          <tr class="text-right">
                            <td class="text-right"> 3 </td>
                            <td class="text-right">هزینه کمیسیون سایت</td>
                            <td class="text-right"> {{flage_price($form_data_list->price_finical->fee)}} </td>
                          </tr>


                          <tr class="text-right">
                            <td class="text-right"> 4 </td>
                            <td class="text-right"> تخفیف </td>
                            <td class="text-right"> {{flage_price($form_data_list->price_finical->discount)}} </td>
                          </tr>


                        </tbody>
                        <tfoot>
                            <tr class="table-info">
                        <td>#</td>
                        <td><b>هزینه کل فاکتور   </b></td>
<td><b>
    {{flage_price($form_data_list->price_finical->sum)}}
</b></td>
                            </tr>
                        </tfoot>

                      </table>
                    </div>
                  </div>




                  <div class="container-fluid mt-5 w-100">
                    <div class="row">
                      <div class="col-md-6 mr-auto">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>

                              <tr>
                                <td class="text-bold-800">  هزینه سرویس </td>
                                <td class="text-bold-800 text-left">
                                    {{flage_price($form_data_list->price_finical->price)}}
                                </td>
                              </tr>

                              <tr>
                                <td>هزینه کمیسیون سایت</td>
                                <td class="text-left">
                                    {{flage_price($form_data_list->price_finical->fee)}}
                                </td>
                              </tr>

                              <tr>
                                <td>تخفیف  </td>
                                <td class="text-left">
                                    {{flage_price($form_data_list->price_finical->discount)}}
                                </td>
                              </tr>

                              <tr class="bg-light">
                                <td class="text-bold-800">مبلغ قابل پرداخت</td>
                                <td class="text-bold-800 text-left">
                                    {{flage_price($form_data_list->price_finical->sum)}}
                                </td>
                              </tr>


                            </tbody>
                          </table>
                        </div>


                        @if($aroue=='user')
                        <label for="exampleInputUsername1"> </label>
                        <a  href="{{route('user.zarinpal.request' , ['id'=>$form_data_list->id])}}" class="btn btn-success btn-block  rounded-pill">
                         پرداخت</a>
                         @endif



                      </div>
                    </div>
                  </div>

                  {{-- <div class="container-fluid w-100">
                    <a href="#" class="btn btn-primary float-left mt-4 mr-2"><i data-feather="send"
                        class="ml-2 icon-md"></i>ارسال فاکتور</a>
                    <a href="#" class="btn btn-outline-primary float-left mt-4"><i data-feather="printer"
                        class="ml-2 icon-md"></i>چاپ</a>
                  </div> --}}

                </div>
              </div>
            </div>
          </div>
