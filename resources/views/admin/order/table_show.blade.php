@slot('style')





<link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">


@endslot



<div class="row inbox-wrapper">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 email-content">
                        <div class="email-list">






@if($aroue=='admin')
 @include('admin.Eform.show.pack' , [ 'name_pack' => 'show_username' , $form_data_list  ])
@endif


@include('admin.Eform.show.pack' , [ 'name_pack' => 'show_sans_textaria' , $form_data_list ,
$form , $form_data , $form_data_list  ])


@include('admin.Eform.show.pack' , [ 'name_pack' => 'show_only_textaria' , $form_data_list ,
$form , $form_data , $form_data_list  ])




                            {{-- <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  طبقات انتخاب شده</span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <p class="msg">                     @include('admin.requestbrand.list', [  $aroue , 'lists' => $requestbrand->requestbrand_list_subcategories , 'type' => 'subcat' , ])
                                    </p>
                                </div>
                            </div>


                            <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  هزینه به ریال</span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <p class="msg">{{flage_price($requestbrand->price)}}</p>
                                </div>
                            </div> --}}

{{--
                            <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  آیا قبلا از خدمات ما استفاده کرده اید؟  </span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <p class="msg">
                                        <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="before"
                                                id="before" value="yes" @if ($requestbrand->before=='yes') checked @endif  disabled  >
                                            بله
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="before"
                                                id="before" value="no"  @if ($requestbrand->before=='yes') checked @endif disabled    >
                                            خیر
                                        </label>
                                    </div>
                </p>
                                </div>
                            </div>

                            <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  چطور با ما آشنا شدید؟  </span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <p class="msg">
                                        <div class="form-group">

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="reach"
                                                        id="reach" value="google"  @if ($requestbrand->reach=='google') checked @endif  disabled >
                                                     گوگل
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="reach"
                                                        id="reach" value="frind"  @if ($requestbrand->reach=='frind') checked @endif  disabled >
                                                     دوستان
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="reach"
                                                        id="reach" value="internet"  @if ($requestbrand->reach=='internet') checked @endif  disabled >
                                                     تبلیغات اینترنت
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="reach"
                                                        id="reach" value="other"  @if ($requestbrand->reach=='other') checked @endif  disabled  >
                                                     سایر
                                                </label>
                                            </div>


                                        </div>

    </p>
                                </div>
                            </div>
 --}}



{{--
                            <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  فایل ها  </span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <p class="msg">
                                        @include('admin.requestbrand.list', [  $aroue , 'lists' => $requestbrand->filebrands , 'type' => 'file' , ])

                                    </p>
                                </div>
                            </div> --}}








{{--
                            <div class="email-list-item email-list-item">
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                    <span class="from">  وضعیت پرداخت  </span>
                                </div>
                                <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">




                                    <p class="msg">  @include('admin.layouts.table.getstatus_requestbrand', ['admin' => $requestbrand ,'route' => ''  ,'type_name' => 'requestbrand'   ])



                                    </p>

                                    @if($requestbrand->payment)
                                    @if($requestbrand->payment->type=='offline')

                                    <div class="alert alert-secondary" role="alert">
                                        توضیحات پرداخت آفلاین: <br>
                                      {{$requestbrand->payment->textUser}}
                                  </div>

                                    @endif
                                    @endif
                                </div>
                            </div> --}}


                            @method('PUT')






{{--


                            @if ($aroue == 'user')


                                @php $payment = $requestbrand->payment;  @endphp
                                @if ($requestbrand->payment)
                                    @php $payment = $requestbrand->payment;  @endphp
                                @else
                                    @php $payment = $requestbrand;  @endphp
                                @endif



                                <div class="email-list-item email-list-item">
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                            <span class="from"> پرداخت </span>
                                    </div>



                                    @if ($requestbrand->status == 'register')
                                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                            <p class="msg"> @include(
                                                'admin.company.request.get_status',
                                                ['admin' => $requestbrand, 'route' => '']
                                            )

                                            </p>
                                        </div>
                                    @endif




                                    @if ($requestbrand->status != 'register')
                                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                                            <p class="msg">
                                    <form method="POST" action="{{ $route }}" enctype="multipart/form-data"
                                    onsubmit="return Validate(this);">
                                    @csrf
                                    <input type="hidden" name="price" value="{{ $requestbrand->price }}" />

                                                <select name="type" id="payment" onchange="fetch_select3(this.value);"
                                                    class="elementor-field elementor-size-sm  elementor-field-textual"
                                                    placeholder="" aria-required="true"
                                                    @if ($requestbrand->status == 'active' || $requestbrand->status == 'inactive' || $requestbrand->status == 'waitpay') disabled @endif>
                                                    <option value="online"
                                                        {{ old('type', $payment->type) == 'online' ? 'selected' : '' }}>
                                                        پرداخت آنلاین </option>
                                                    <option value="offline"
                                                        {{ old('type', $payment->type) == 'offline' ? 'selected' : '' }}>
                                                        پرداخت آفلاین</option>
                                                    <option value="depo"
                                                        {{ old('type', $payment->type) == 'depo' ? 'selected' : '' }}>
                                                        پرداخت از شارژ حساب</option>
                                                </select>
                                                <input type="hidden" name="textUser" value="پرداخت غیرمستقیم" />
                                            <div id="view_payment">
                                                @include('custome.fetch.payment', [
                                                    'oper' => 'requestcompany',
                                                    'order' => $requestbrand,
                                                    'value' => old('type', $payment->type),
                                                ])
                                            </div>

                                            <input type="hidden" name="charge"
                                            value="{{ Mywallet($requestbrand->user_id, 'mycharge') }}" />
                                        <input type="hidden" name="user_id" value="{{ $requestbrand->user_id }}" />
                                        @method('PUT')
                                        @if ($requestbrand->status == 'waiting')
                                            <button type="submit"  class="btn btn-primary btn-block">پرداخت</button>
                                        @endif
                        </form>
                    </p>
                </div>
            @endif
         </div>
 @endif




 --}}





                    @if($aroue=='admin')



                    {{-- <div class="email-list-item email-list-item">
                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                            <span class="from"> عملیات سفارش</span>
                        </div>
                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6  ">
                            <p class="msg">

                            @if ($requestbrand->status != 'active')

                            @php $status=$requestbrand->status; @endphp
                             @if($requestbrand->status=='inactive')
                             @php $status='reactive'; @endphp
                             @endif

                                    @include('admin.requestbrand.modal_operation', [ 'route' => route('admin.requestbrand.status' , [ 'id'=>$requestbrand->id , $status ]  ) ,
                                     'operat' => 'accept' , 'order'=>$requestbrand  , 'nameoper' =>  status_req($requestbrand->status,'nameoper')    ])
                                    @endif
                                    @if ($requestbrand->status != 'inactive')
                                    @include('admin.requestbrand.modal_operation', [ 'route' => route('admin.requestbrand.status' , [ 'id'=>$requestbrand->id , 'status'=>'inactive' ]  ) ,
                                    'operat' => 'cancel'  , 'order'=>$requestbrand  ])
                                    @endif
                            </p>
                        </div>
                    </div> --}}



                    @endif







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

