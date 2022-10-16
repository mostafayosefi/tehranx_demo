@component('user.layouts.content',[
    'title'=>'تایید مدارک',
    'tabTitle'=>'تایید مدارک',
    'breadcrumb'=>[
            ['title'=>'تایید مدارک','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">

 @endslot





 <div class="page-content">


  @include('admin.alert.activition', [ $authentication , 'oper'=>'email_verify' , 'guard' => 'user' ])
  @include('admin.alert.activition', [ $authentication , 'oper'=>'tell_verify' , 'guard' => 'user' ])
  @include('admin.alert.activition', [ $authentication , 'oper'=>'document_verify' , 'guard' => 'user' ])




          <div class="profile-page tx-13">



            <div class="row profile-body">


              <div class="col-md-12  col-xl-12  ">




                    <div class="card card-default">
                      <div class="card-header card-header-border-bottom">
   <h4>پروفایل کاربر    </h4>
                      </div>
                      <div class="card-body">
   <ul class="nav nav-tabs" id="myTab" role="tablist">
   <li class="nav-item">
   <a class="nav-link  @if(($tab_active=='email')||($tab_active==Null))   active @endif" id="icon-email-tab" data-toggle="tab" href="#icon-email" role="tab" aria-controls="icon-email"
   aria-selected=" @if(($tab_active=='email')||($tab_active==Null))  true @else false  @endif">  <i data-feather="mail"></i> تایید ایمیل </a>
    </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='tell')  active @endif " id="icon-tell-tab" data-toggle="tab" href="#icon-tell" role="tab" aria-controls="icon-tell" aria-selected="@if($tab_active=='tell')   true @else false  @endif"><i data-feather="phone"></i>تایید تلفن همراه </a></li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='tells')  active @endif " id="icon-tells-tab" data-toggle="tab" href="#icon-tells" role="tab" aria-controls="icon-tells" aria-selected="@if($tab_active=='tells')   true @else false  @endif"> <i data-feather="phone-incoming"></i> تایید تلفن ثابت</a>
   </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='passport')   active @endif " id="icon-passport-tab" data-toggle="tab" href="#icon-passport" role="tab" aria-controls="icon-passport" aria-selected="@if($tab_active=='passport')   true @else false  @endif"> <i data-feather="credit-card"></i> پاسپورت</a>
   </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='cardmelli')  active @endif " id="icon-cardmelli-tab" data-toggle="tab" href="#icon-cardmelli" role="tab" aria-controls="icon-cardmelli" aria-selected="@if($tab_active=='cardmelli')   true @else false  @endif"> <i data-feather="credit-card"></i> کارت ملی</a>
   </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='selfi')  active @endif " id="icon-selfi-tab" data-toggle="tab" href="#icon-selfi" role="tab" aria-controls="icon-selfi" aria-selected="@if($tab_active=='selfi')  true @else false  @endif"> <i data-feather="user"></i> تصویر سلفی</a>
   </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='document')  active @endif " id="icon-document-tab" data-toggle="tab" href="#icon-document" role="tab" aria-controls="icon-document" aria-selected="@if($tab_active=='document')   true @else false  @endif"> <i data-feather="file-text"></i> مدارک هویتی</a>
   </li>
   <li class="nav-item">
   <a class="nav-link @if($tab_active=='bank')  active @endif " id="icon-bank-tab" data-toggle="tab" href="#icon-bank" role="tab" aria-controls="icon-bank" aria-selected="@if($tab_active=='bank')   true @else false  @endif"> <i data-feather="credit-card"></i> اطلاعات حساب بانکی </a>
   </li>
   </ul>


  <div class="tab-content" id="myTabContent2">

  <div class="tab-pane pt-3 fade   @if(($tab_active=='email')||($tab_active==Null)) show active @endif" id="icon-email" role="tabpanel" aria-labelledby="icon-email-tab">


    @include('user.authentication.verify_contact', [  $authentication ,   'guard' => 'user' ,
    $myname = 'ایمیل'  , 'contact_verify' => $authentication->email_verify ,
   'contact' => $authentication->email , 'type' => 'email' ,
   'route_verify' => route('user.authentication.verify_email') ,
   'route_activition' =>  route('user.authentication.activition_email') ,
   'code_verify' =>   'email_code_verify'
    ])


</div>

  <div class="tab-pane pt-3 fade  @if($tab_active=='tell')  show active @endif" id="icon-tell" role="tabpanel" aria-labelledby="icon-tell-tab">




    @include('user.authentication.verify_contact', [  $authentication ,   'guard' => 'user' ,
    $myname = 'تلفن همراه '  , 'contact_verify' => $authentication->tell_verify ,
   'contact' => $authentication->tell , 'type' => 'tell' ,
   'route_verify' => route('user.authentication.verify_tell') ,
   'route_activition' =>  route('user.authentication.activition_tell') ,
   'code_verify' =>   'tell_code_verify'
    ])



  </div>



  <div class="tab-pane pt-3 fade  @if($tab_active=='tells')  show active @endif" id="icon-tells" role="tabpanel" aria-labelledby="icon-tells-tab">


    @include('user.authentication.verify_contact', [  $authentication ,   'guard' => 'user' ,
    $myname = 'تلفن ثابت '  , 'contact_verify' => $authentication->tells_verify ,
   'contact' => $authentication->tells , 'type' => 'tells' ,
   'route_verify' => route('user.authentication.verify_tells') ,
   'route_activition' =>  route('user.authentication.activition_tells') ,
   'code_verify' =>   'tells_code_verify'
    ])


  </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='passport')  show active @endif" id="icon-passport" role="tabpanel" aria-labelledby="icon-passport-tab">

    @include('user.authentication.verify_file', [  $authentication ,   'guard' => 'user' ,
    $myname = 'پاسپورت '  , 'file_verify' => $authentication->passport_verify ,
   'file' => $authentication->passport , 'type' => 'passport' ])


   </div>

  <div class="tab-pane pt-3 fade  @if($tab_active=='cardmelli')  show active @endif" id="icon-cardmelli" role="tabpanel" aria-labelledby="icon-cardmelli-tab">

    @include('user.authentication.verify_file', [  $authentication ,   'guard' => 'user' ,
    $myname = 'کارت ملی '  , 'file_verify' => $authentication->cardemelli_verify ,
   'file' => $authentication->cardemelli , 'type' => 'cardmelli' ])


   </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='selfi')  show active @endif" id="icon-selfi" role="tabpanel" aria-labelledby="icon-selfi-tab">

 @include('user.authentication.verify_file', [  $authentication ,   'guard' => 'user' ,
 $myname = 'تصویر سلفی  '  , 'file_verify' => $authentication->selfi_verify ,
'file' => $authentication->selfi , 'type' => 'selfi' ])

  </div>


  <div class="tab-pane pt-3 fade  @if($tab_active=='document')  show active @endif" id="icon-document" role="tabpanel" aria-labelledby="icon-document-tab">

 @include('user.authentication.verify_file', [  $authentication ,   'guard' => 'user' ,
 $myname = 'مدارک هویتی'  , 'file_verify' => $authentication->document_verify ,
'file' => $authentication->document , 'type' => 'document' ])

  </div>





  <div class="tab-pane pt-3 fade  @if($tab_active=='bank')  show active @endif" id="icon-bank" role="tabpanel" aria-labelledby="icon-bank-tab">

    @include('user.authentication.bank', [ $authentication ,  'guard' => 'user' ])

  </div>



  </div>

                      </div>
                    </div>




              </div>
            </div>




               </div>

        </div>

        @php
        Session::forget('errus')
        @endphp

    @slot('script')

    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
