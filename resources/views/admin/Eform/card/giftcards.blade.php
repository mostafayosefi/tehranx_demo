<a href="#" type="button"
data-toggle="modal" data-target="#exampleModalCenter{{$admin->id}}"
class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4">
<i data-feather="plus-circle"></i>
ثبت سفارش&nbsp;  {{$admin->id}} </a>


{{--                                                {{env('APP_URL')}}/user/addreq/{{$plan}}/{{$giftcard->form_linkname}}--}}

                                                <form method="post" action="{{  route('user.payment.order.store' ,[  'form'=> $admin ] )  }}">


                                                    <div class="example">


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter{{$admin->id}}" tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{$admin->name}}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


                                                                        <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>


                                                                                    <p>

                                                                                        <?php echo $admin->short; ?>
                                                                                    </p>
                                                                                    <hr>





                                                                                    <h3 class="text-center font-weight-light">
                                                                                        {{number_format($admin->price,0)}}  ریال
                                                                                    </h3>


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



                                                                                    <hr>

                                                                                    <div class="form-group row">
                                                                                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">کدتخفیف</label>
                                                                                        <div class="col-sm-5">
                                                                                            <input type="text" class="form-control rounded-pill" id="chatForm" placeholder=" " value="">
                                                                                        </div>
                                                                                        <div class="col-sm-5">
                                                                                            <button type="button" class="btn btn-success ">
                                                                                                بررسی کدتخفیف
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>





@method('put')
                                                                                    @csrf
                                                                                    <input type="hidden" name="price" value="{{$admin->price}}">

                                                                                    <button class="btn btn-primary d-block btn-lg   rounded-pill mx-auto mt-4"  type="submit">ثبت سفارش <i data-feather="check-circle"></i> &nbsp;  </button>




                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </form>

                                                <hr>




