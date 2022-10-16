@component('admin.layouts.content', [
    'title' => 'مشاهده درخواست کاربر'.'('.$form_data_list->form->name.')',
    'tabTitle' => ' مشاهده درخواست کاربر'.'('.$form_data_list->form->name.')',
    'breadcrumb' => [['title' => 'لیست درخواست کاربر  ', 'url' => route('admin.form.form_data_list.index')], ['title' => 'مشاهده درخواست کاربر  '.'('.$form_data_list->form->name.')',
    'class' => 'active']],
    ])


    <div class="row">



@if($form_data_list == Null)
@include('admin.errors.404')
@elseif($form_data_list != Null)

<div class="col-12 col-xl-12 stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>  مشاهده درخواست کاربر ({{$form_data_list->form->name}})   </h4>
                            </div>
<br>
@include('admin.order.multiseteps', ['order' => $form_data_list  ])



          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link @if (empty(Session::get('err'))) active @endif "
                      id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab"
                      aria-controls="icon-home" aria-selected=" true "> <i
                          data-feather="edit-2"></i>
                      اطلاعات ثبت شده </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link  @if (Session::get('err') == '1') active @endif "
                      id="icon-secret-tab" data-toggle="tab" href="#icon-secret"
                      role="tab" aria-controls="icon-secret" aria-selected="false"> <i
                          data-feather="server"></i>
                      فاکتور پرداخت</a>
              </li>


              <li class="nav-item">
                  <a class="nav-link  " id="icon-timeline-tab" data-toggle="tab"
                      href="#icon-timeline" role="tab" aria-controls="icon-home"
                      aria-selected=" true "> <i data-feather="list"></i>
                      تایم لاین </a>
              </li>

          </ul>


          <div class="tab-content" id="myTabContent2">

              <div class="tab-pane pt-3 fade   @if (empty(Session::get('err'))) show active @endif  "
                  id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">

                  <div class="row">
                      <div class="col-xl-12">

                          @include('admin.order.table_show', [ 'aroue' => 'admin'  ,   $form_data_list   , 'form'=> $form_data_list->form
                          , 'user'=>$form_data_list->user , $currencies  , $form_data_list ,
                           'route'=> route('admin.form.form_data.update', $form_data_list->id) ,
                           'method' => 'update'  ])

                      </div>
                  </div>
              </div>

              <div class="tab-pane pt-3 fade  @if (Session::get('err') == '1') show active @endif "
                  id="icon-secret" role="tabpanel" aria-labelledby="icon-secret-tab">

                  <div class="row">
                      <div class="col-xl-12">

                          @include('admin.order.invoice', [ 'aroue' => 'admin' ,$form_data_list  , $setting ])


                      </div>
                  </div>
              </div>


              <div class="tab-pane pt-3 fade  " id="icon-timeline" role="tabpanel"
                  aria-labelledby="icon-timeline-tab">
                  <div class="row">
                      <div class="col-xl-12">

{{--
@if($requestbrand->discriptionorders)
@include('admin.order.timeline', [  'discriptionorders' => $requestbrand->discriptionorders , 'myoperator'=>'form_data_list' ])
@endif --}}




                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>






        @endif


    </div>





    @slot('script')
    @endslot
@endcomponent
