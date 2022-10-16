@slot('style')

@endslot

@if($guard=='admin')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3 mt-4">
                        مدیریت  {{$planes->name}}</h4>
                    <p class="text-muted text-center mb-4 pb-2">  جهت
                        مدیریت {{$planes->name}}
                        و همچنین مشاهده و ویرایش آن لطفا اقدام نمایید </p>
                    <div class="container">
                        <div class="row">


                            @foreach($planes->forms as $admin)
                                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0 p-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>

                                            @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])

                                            <hr>

                                            <p>
                                                <!--
<?php echo mb_substr($admin->short, 0, 125, mb_detect_encoding($admin->short)).'...'; ?>
                                                    -->
                                                <?php echo $admin->short; ?>
                                            </p>
                                            <hr>


                                            @if(validate_price($admin->id,0,$admin->form_currency_id,'currency')=='0')
                                            <h3 class="text-center font-weight-light">
                                                {{number_format($admin->price,0)}}  ریال
                                            </h3>
                                            @endif


                                            <h6 class="text-muted text-center mb-4 font-weight-normal">

                                                @if($admin->form_currency_id)
                                                    @foreach ($currencies as $currency )
                                                        @if($admin->form_currency_id==$currency->id)
                                                            {{$admin->money}}

                                                            {{$currency->name}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </h6>

                                            <a href="{{route('admin.form.plane.edit' , [ $planes->form_category->link  , $planes->link , $admin->link] )}}" class="btn btn-primary d-block mx-auto mt-4"><h5 class="text-center font-weight-light">
                                                    ویرایش
                                                </h5></a>


                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif


@if($guard=='user')





    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3 mt-4">{{$planes->name}}</h4>

                    <div class="container">


{{--
                        @if($planes->form_category->link=='giftcards')



                        @endif --}}

                        <div class="row">


                            @foreach($planes->forms as $admin)
                                <div class="col-md-3 stretch-card grid-margin grid-margin-md-0 p-md-2">
                                    <div class="card">
                                        <div class="card-body">
 <h5 class="text-center text-uppercase mt-3 mb-4"  style="
 font-weight: 700;
 line-height: 1.6;
 margin-bottom: 0;"    >{{$admin->name}}</h5>
 @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])
  <hr> 


 <a href="{{route('user.payment.plane.index_form' , [ $admin->form_subcategory->form_category->link , $admin->form_subcategory->link , $admin->link ]  )}}"
     class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">
     <i data-feather="plus-circle"></i>
     ثبت سفارش
      </a>

<hr>

<p style="color : rgba(81,81,81,.5) " > {!! $admin->texttimerecv !!} </p>
<p style="color : rgba(81,81,81,.5) " > {!! $admin->textrecv !!} </p>

                                                {{-- <p>

<?php echo mb_substr($admin->short, 0, 125, mb_detect_encoding($admin->short)).'...'; ?>

<?php echo $admin->short; ?>
                                                </p> --}}



{{-- @if($planes->form_category->link=='giftcards')
@if (validate_price($admin->id,0,$admin->form_currency_id,'currency')=='1')
<h4 class="text-center font-weight-light">
    {{number_format($admin->price,0)}}  ریال
</h4>
<h6 class="text-muted text-center mb-4 font-weight-normal">
{{validate_price($admin->id,0,$admin->form_currency_id,'currency_money')}} {{validate_price($admin->id,0,$admin->form_currency_id,'currency_name')}}
</h6>
@endif
@endif --}}


{{--
 @if($planes->form_category->link=='giftcards')
 @include('admin.Eform.card.giftcards', [ $admin ])
@endif --}}



{{--                                            @if($plan=='viscartfisics')--}}
{{--                                                <a href="{{env('APP_URL')}}/user/servicei1/order/{{$plan}}/{{$giftcard->form_linkname}}" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">ثبت سفارش  <i data-feather="check-circle"></i> &nbsp; </a>--}}
{{--                                            @endif--}}


{{--                                            @if($plan=='buywithcardinsite')--}}
{{--                                                <a href="{{env('APP_URL')}}/user/servicei2/order/{{$plan}}/{{$giftcard->form_linkname}}" class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">ثبت سفارش <i data-feather="check-circle"></i> &nbsp; </a>--}}
{{--                                            @endif--}}




                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif


@slot('script')

<script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('template/assets/js/template.js') }}"></script>
@endslot
