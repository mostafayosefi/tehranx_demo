  @component('user.layouts.content', [
      'title' => 'پروفایل من ',
      'tabTitle' => ' پروفایل من',
    'breadcrumb'=>[
            ['title'=>'پروفایل من','class' => 'active']
    ]])



      <div class="profile-page tx-13">


        @include('user.profile.header', [ 'guard' => 'user'  ,  $admin ])



          <div class="row profile-body">
              <!-- left wrapper start -->
              <div class="col-md-4 col-xl-3 left-wrapper">
                @include('user.profile.sidebar', [ 'guard' => 'user'  ,  $admin ])

              </div>


              <div class="col-md-8  col-xl-9  ">




                  <div class="card card-default">
                      <div class="card-header card-header-border-bottom">
                          <h4>پروفایل کاربر </h4>
                      </div>
                      <div class="card-body">
                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link  @if (empty(Session::get('err')))  active @endif" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="@if (empty(Session::get('err')))  true @else false  @endif"> <i data-feather="edit-2"></i>ویرایش
                                      پروفایل </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link @if (Session::get('err') == '1')  active @endif " id="icon-secret-tab" data-toggle="tab" href="#icon-secret" role="tab" aria-controls="icon-secret" aria-selected="@if (Session::get('err') == '1')   true @else false  @endif"> <i data-feather="lock"></i> تنظیمات
                                      رمزعبور</a>
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

                              <div class="tab-pane pt-3 fade   @if (empty(Session::get('err'))) show active @endif" id="icon-home" role="tabpanel"
                                  aria-labelledby="icon-home-tab">

 @include('user.profile.profile', [ 'guard' => 'user'  ,  $admin , 'route' => route('user.profile.update', $admin) ])


                              </div>

                              <div class="tab-pane pt-3 fade  @if (Session::get('err') == '1') show active @endif" id="icon-secret" role="tabpanel"
                                  aria-labelledby="icon-secret-tab">

                                  @include('user.profile.secret', [ 'guard' => 'user'  ,  $admin  , 'route' => route('user.profile.secret', $admin) ])

                              </div>



                              <div class="tab-pane pt-3 fade  @if (Session::get('err') == '10') show active @endif" id="icon-contact" role="tabpanel"
                              aria-labelledby="icon-contact-tab">

                              @include('user.profile.referal', [ 'guard' => 'user'  ,  $admin ])

                          </div>




                          <div class="tab-pane pt-3 fade  @if (Session::get('err') == '9') show active @endif" id="icon-histore" role="tabpanel"
                          aria-labelledby="icon-histore-tab">

                          @include('user.profile.loginhistory', [ 'guard' => 'user'  ,  $admin ])

                      </div>






                      </div>
                  </div>
              </div>

          </div>

      </div>










  @endcomponent
