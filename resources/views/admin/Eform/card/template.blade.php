



                    <div class="container">
                        <div class="page-content">


{{-- @if($form->form_subcategory->form_category->link=='Money') --}}
@if($form->form_template->link=='template_money')

                            <div class="row">
                              <div class="col-12 col-xl-12 stretch-card">
                                <div class="row flex-grow">
                                  <div class="col-md-1 grid-margin stretch-card">
                                  </div>
                                  <div class="col-md-10 grid-margin stretch-card">

@include('admin.Eform.card.pack' , [ 'name_pack' => 'header_form' , $form  ])

                                  </div>
                                  <div class="col-md-1 grid-margin stretch-card">
                                  </div>
                                  <div class="col-md-1 grid-margin stretch-card">
                                  </div>
                                  <div class="col-md-10 grid-margin stretch-card">
                                    <div class="card">
                                      <div class="card-body">

                 <form method="post" class="forms-sample"   enctype="multipart/form-data"
                 {{-- onsubmit="return Validate(this);" onchange="totalIt()" --}}
                 action="{{$route}}">

                    @if($method=='update')
                    @method('put')
                    @endif



                    <div class="row">
                    <div class="col-sm-12">
                        @include('admin.layouts.errors')

                                </div>
                  <div class="col-sm-6">
                      @include('admin.Eform.card.pack' , [ 'name_pack' => 'sans_textaria' ,
                      $form , $form_data , $form_data_list ])
                    </div>

                    <div class="col-sm-6">
                        @include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => ''  , 'disable_money' => ''
                         , $currencies  , $form , $form_data , $form_data_list ])
                    </div>




                    <div class="col-sm-12">
                     @csrf
                     @include('admin.Eform.card.pack' , [ 'name_pack' => 'only_textaria' ,
                      $form , $form_data , $form_data_list ])
@include('admin.Eform.card.pack' , [ 'name_pack' => 'btn' , $guard ])
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

                               @endif

                               @if($form->form_template->link=='template_InternetPayment')


                            <div class="row">
                                <div class="col-12 col-xl-12 stretch-card">
                                  <div class="row flex-grow">
                                    <div class="col-md-1 grid-margin stretch-card">
                                    </div>
                                    <div class="col-md-10 grid-margin stretch-card">

  @include('admin.Eform.card.pack' , [ 'name_pack' => 'header_form' , $form  ])

                                    </div>
                                    <div class="col-md-1 grid-margin stretch-card">
                                    </div>
                                    <div class="col-md-1 grid-margin stretch-card">
                                    </div>
                                    <div class="col-md-10 grid-margin stretch-card">
                                      <div class="card">
                                        <div class="card-body">

                      <form method="post" class="forms-sample"   enctype="multipart/form-data"
                      {{-- onsubmit="return Validate(this);" onchange="totalIt()" --}}
                       action="{{$route}}">

                      @if($method=='update')
                      @method('put')
                      @endif




                      <div class="row">
                      <div class="col-sm-12">
                          @include('admin.layouts.errors')

                                  </div>
                    <div class="col-sm-6">


                       @include('admin.Eform.card.pack' , [ 'name_pack' => 'sans_textaria' ,
                        $form , $form_data , $form_data_list ])

@include('admin.Eform.card.pack' , [ 'name_pack' => 'only_textaria' ,
$form , $form_data , $form_data_list ])


  {{--
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
                       </div> --}}





                      </div>


                      <div class="col-sm-6">

                          @include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => ''  , 'disable_money' => ''
                           , $currencies   , $form , $form_data , $form_data_list ])

                      </div>


                      <div class="col-sm-12">

                       @csrf




  @include('admin.Eform.card.pack' , [ 'name_pack' => 'btn' , $guard ])




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

                               @endif




                               @if($form->form_template->link=='template_Physicalcard')
                               <div class="row">
                                   <div class="col-12 col-xl-12 stretch-card">
                                     <div class="row flex-grow">
                                       <div class="col-md-1 grid-margin stretch-card">
                                       </div>
                                       <div class="col-md-10 grid-margin stretch-card">
     @include('admin.Eform.card.pack' , [ 'name_pack' => 'header_form' , $form  ])
                                       </div>
                                       <div class="col-md-1 grid-margin stretch-card">
                                       </div>
                                       <div class="col-md-1 grid-margin stretch-card">
                                       </div>
                                       <div class="col-md-10 grid-margin stretch-card">
                                         <div class="card">
                                           <div class="card-body">
                         <form method="post" class="forms-sample"   enctype="multipart/form-data"
                         {{-- onsubmit="return Validate(this);" onchange="totalIt()" --}}
                         action="{{$route}}">
                         @if($method=='update')
                         @method('put')
                         @endif
                         <div class="row">
                         <div class="col-sm-12">
                             @include('admin.layouts.errors')
                                     </div>
                       <div class="col-sm-6">
                           @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_name' , $user ])
                           @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_tell' , $user ])
                           @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_email' , $user ])
                          @include('admin.Eform.card.pack' , [ 'name_pack' => 'sans_textaria' ,
                           $form , $form_data , $form_data_list ])

     {{--
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
                          </div> --}}

                         </div>
                         <div class="col-sm-6">
                             @include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => 'readonly'  , 'disable_money' => 'readonly'
                              , $currencies   , $form , $form_data , $form_data_list ])
                         </div>
                         <div class="col-sm-12">
                          @csrf
                          @include('admin.Eform.card.pack' , [ 'name_pack' => 'only_textaria' ,
                           $form , $form_data , $form_data_list ])

     @include('admin.Eform.card.pack' , [ 'name_pack' => 'btn' , $guard ])

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

                                  @endif



 @if(($form->form_template->link=='service_field')||($form->form_template->link=='service_desc')||($form->form_template->link=='modal1'))
                                  <div class="row">
                                      <div class="col-12 col-xl-12 stretch-card">
                                        <div class="row flex-grow">
                                          <div class="col-md-1 grid-margin stretch-card">
                                          </div>
                                          <div class="col-md-10 grid-margin stretch-card">
        @include('admin.Eform.card.pack' , [ 'name_pack' => 'header_form' , $form  ])
                                          </div>
                                          <div class="col-md-1 grid-margin stretch-card">
                                          </div>
                                          <div class="col-md-1 grid-margin stretch-card">
                                          </div>
                                          <div class="col-md-10 grid-margin stretch-card">
                                            <div class="card">
                                              <div class="card-body">
                            <form method="post" class="forms-sample"   enctype="multipart/form-data"
                            {{-- onsubmit="return Validate(this);" onchange="totalIt()" --}}
                            action="{{$route}}">
                            @if($method=='update')
                            @method('put')
                            @endif
                            <div class="row">
                            <div class="col-sm-12">
                                @include('admin.layouts.errors')
                                        </div>
                          <div class="col-sm-6">
                              @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_name' , $user ])
                              @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_tell' , $user ])
                              @include('admin.Eform.card.pack' , [ 'name_pack' => 'input_email' , $user ])
                             @include('admin.Eform.card.pack' , [ 'name_pack' => 'sans_textaria' ,
                              $form , $form_data , $form_data_list ])

        {{--
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
                             </div> --}}

                            </div>
                            <div class="col-sm-6">
                                @include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => 'readonly'  , 'disable_money' => 'readonly'
                                 , $currencies   , $form , $form_data , $form_data_list ])
                            </div>

                            @if($form->form_template->link=='service_desc')

                            <div class="col-sm-12">
                             @csrf
                             @include('admin.Eform.card.pack' , [ 'name_pack' => 'only_textaria' ,
                              $form , $form_data , $form_data_list ])

        @include('admin.Eform.card.pack' , [ 'name_pack' => 'btn' , $guard ])

                            </div>

                            @endif


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

                                     @endif







                    </div>
                    </div>





















