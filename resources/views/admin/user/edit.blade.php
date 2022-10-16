  @component('admin.layouts.content', [
      'title' => 'پروفایل کاربر ',
      'tabTitle' => ' پروفایل کاربر',
      'breadcrumb' => [['title' => 'مشاهده کاربران', 'url' => route('admin.user.index')], ['title' => 'پروفایل کاربر ',
      'class' => 'active']],
      ])



<div class="profile-page tx-13">


    @include('user.profile.header', [ 'guard' => 'admin'  ,  $admin ])



      <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="col-md-4 col-xl-3 left-wrapper">
            @include('user.profile.sidebar', [ 'guard' => 'admin'  ,  $admin ])

          </div>


          <div class="col-md-8  col-xl-9  ">




              <div class="card card-default">
                  <div class="card-header card-header-border-bottom">
                      <h4>پروفایل کاربر </h4>
                  </div>
                  <div class="card-body">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link  @if(($tab_active=='profile')||($tab_active==Null))   active @endif" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="@if (empty(Session::get('err')))  true @else false  @endif"> <i data-feather="edit-2"></i>ویرایش
                                  پروفایل </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link @if (Session::get('err') == '1')  active @endif " id="icon-secret-tab" data-toggle="tab" href="#icon-secret" role="tab" aria-controls="icon-secret" aria-selected="@if (Session::get('err') == '1')   true @else false  @endif"> <i data-feather="lock"></i> تنظیمات
                                  رمزعبور</a>
                          </li>




   <li class="nav-item">
    <a class="nav-link  @if($tab_active=='passport')  active @endif " id="icon-passport-tab" data-toggle="tab" href="#icon-passport" role="tab" aria-controls="icon-passport" aria-selected="@if(Session::get('err')=='passport')   true @else false  @endif"> <i data-feather="credit-card"></i> پاسپورت</a>
    </li>
    <li class="nav-item">
    <a class="nav-link @if($tab_active=='cardmelli')  active @endif " id="icon-cardmelli-tab" data-toggle="tab" href="#icon-cardmelli" role="tab" aria-controls="icon-cardmelli" aria-selected="@if(Session::get('err')=='cardmelli')   true @else false  @endif"> <i data-feather="credit-card"></i> کارت ملی</a>
    </li>
    <li class="nav-item">
    <a class="nav-link @if($tab_active=='selfi')  active @endif " id="icon-selfi-tab" data-toggle="tab" href="#icon-selfi" role="tab" aria-controls="icon-selfi" aria-selected="@if(Session::get('err')=='selfi')   true @else false  @endif"> <i data-feather="user"></i> تصویر سلفی</a>
    </li>
    <li class="nav-item">
    <a class="nav-link @if($tab_active=='document')  active @endif " id="icon-document-tab" data-toggle="tab" href="#icon-document" role="tab" aria-controls="icon-document" aria-selected="@if(Session::get('err')=='document')   true @else false  @endif"> <i data-feather="file-text"></i> مدارک هویتی</a>
    </li>
    <li class="nav-item">
    <a class="nav-link @if($tab_active=='bank_account')  active @endif " id="icon-bank-tab" data-toggle="tab" href="#icon-bank" role="tab" aria-controls="icon-bank" aria-selected="@if(Session::get('err')=='bank')   true @else false  @endif"> <i data-feather="credit-card"></i> اطلاعات حساب بانکی </a>
    </li>

                          <li class="nav-item">
                            <a class="nav-link @if (Session::get('err') == '8')  active @endif " id="icon-allusers-tab" data-toggle="tab" href="#icon-allusers" role="tab" aria-controls="icon-allusers" aria-selected="@if (Session::get('err') == '1')   true @else false  @endif"> <i data-feather="users"></i>کاربران
                                زیرمجموعه</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link @if (Session::get('err') == '9')  active @endif " id="icon-histore-tab" data-toggle="tab" href="#icon-histore" role="tab" aria-controls="icon-histore" aria-selected="@if (Session::get('err') == '1')   true @else false  @endif"> <i data-feather="clock"></i>
                                 تاریخچه ورود</a>
                        </li>

                      </ul>


                      <div class="tab-content" id="myTabContent2">

                          <div class="tab-pane pt-3 fade   @if(($tab_active=='profile')||($tab_active==Null))  show active @endif" id="icon-home" role="tabpanel"
                              aria-labelledby="icon-home-tab">

                              @include('user.profile.profile', [ 'guard' => 'admin'  ,  $admin  , 'route' => route('admin.user.update', $admin) ])


                          </div>

                          <div class="tab-pane pt-3 fade  @if (Session::get('err') == '1') show active @endif" id="icon-secret" role="tabpanel"
                              aria-labelledby="icon-secret-tab">

                              @include('user.profile.secret', [ 'guard' => 'admin'  ,  $admin  , 'route' => route('admin.user.secret', $admin) ])

                          </div>






  <div class="tab-pane pt-3 fade   @if($tab_active=='passport') show active @endif" id="icon-passport" role="tabpanel" aria-labelledby="icon-passport-tab">


    @include('user.authentication.verify_file', [  'authentication' =>  $admin->authentication  ,  'guard' => 'admin' ,
    $myname = 'پاسپورت'  , 'file_verify' => $admin->authentication->passport_verify ,
    'file' => $admin->authentication->passport , 'type' => 'passport' ])

   </div>

  <div class="tab-pane pt-3 fade  @if($tab_active=='cardmelli') show active @endif" id="icon-cardmelli" role="tabpanel" aria-labelledby="icon-cardmelli-tab">

    @include('user.authentication.verify_file', [  'authentication' =>  $admin->authentication  ,  'guard' => 'admin' ,
    $myname = 'کارت ملی '  , 'file_verify' => $admin->authentication->cardmelli_verify ,
    'file' => $admin->authentication->cardmelli , 'type' => 'cardmelli' ])
   </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='selfi') show active @endif" id="icon-selfi" role="tabpanel" aria-labelledby="icon-selfi-tab">


    @include('user.authentication.verify_file', [  'authentication' =>  $admin->authentication  ,  'guard' => 'admin' ,
    $myname = 'تصویر سلفی '  , 'file_verify' => $admin->authentication->selfi_verify ,
    'file' => $admin->authentication->selfi , 'type' => 'selfi' ])

  </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='document') show active @endif" id="icon-document" role="tabpanel" aria-labelledby="icon-document-tab">


@include('user.authentication.verify_file', [  'authentication' =>  $admin->authentication  ,  'guard' => 'admin' ,
$myname = 'مدارک هویتی'  , 'file_verify' => $admin->authentication->document_verify ,
'file' => $admin->authentication->document , 'type' => 'document' ])


  </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='bank_account') show active @endif" id="icon-bank" role="tabpanel" aria-labelledby="icon-bank-tab">
    @include('user.authentication.bank', [ 'authentication' => $admin->authentication ,  'guard' => 'admin' ])


  </div>



                          <div class="tab-pane pt-3 fade  @if (Session::get('err') == '10') show active @endif" id="icon-contact" role="tabpanel"
                          aria-labelledby="icon-contact-tab">

                          @include('user.profile.referal', [ 'guard' => 'admin'  ,  $admin ])

                      </div>




                      <div class="tab-pane pt-3 fade  @if (Session::get('err') == '9') show active @endif" id="icon-histore" role="tabpanel"
                      aria-labelledby="icon-histore-tab">

                      @include('user.profile.loginhistory', [ 'guard' => 'admin'  ,  $admin ])

                  </div>






                  </div>
              </div>
          </div>

      </div>

  </div>








@php
Session::forget('errus')
@endphp

@endcomponent
