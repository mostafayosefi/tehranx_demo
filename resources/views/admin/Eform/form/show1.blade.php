  @component('admin.layouts.content', [
      'title' => 'مشاهده فرم',
      'tabTitle' => ' مشاهده فرم',
      'breadcrumb' => [['title' => 'لیست فرمها ', 'url' => route('admin.requestbrand.index')], ['title' => 'مشاهده فرم  ',
      'class' => 'active']],
      ])


      <div class="row">



@if($form == Null)
@include('admin.errors.404')
@elseif($form != Null)

<div class="col-12 col-xl-12 stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>مشاهده فیلدها </h4>
                              </div>
<br>
@include('admin.requestbrand.multiseteps', ['order' => $requestbrand  ])



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

                            @include('admin.requestbrand.table_show', [ 'aroue' => 'admin'  ,   $users  ])

                        </div>
                    </div>
                </div>

                <div class="tab-pane pt-3 fade  @if (Session::get('err') == '1') show active @endif "
                    id="icon-secret" role="tabpanel" aria-labelledby="icon-secret-tab">

                    <div class="row">
                        <div class="col-xl-12">

                            @include('admin.requestbrand.invoice', [ 'aroue' => 'admin' ,$requestbrand  , $setting ])


                        </div>
                    </div>
                </div>


                <div class="tab-pane pt-3 fade  " id="icon-timeline" role="tabpanel"
                    aria-labelledby="icon-timeline-tab">
                    <div class="row">
                        <div class="col-xl-12">


@if($requestbrand->discriptionorders)
@include('admin.order.timeline', [  'discriptionorders' => $requestbrand->discriptionorders , 'myoperator'=>'requestbrand' ])
@endif




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
