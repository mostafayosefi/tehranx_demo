  @component('admin.layouts.content', [
      'title' => 'ویرایش پروفایل',
      'tabTitle' => ' ویرایش پروفایل',
      'breadcrumb' => [['title' => 'مشاهده پروفایل مدیریت', 'url' => route('admin.profile.edit')], ['title' => 'ویرایش پروفایل  ',
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
                      <h4>پروفایل مدیریت </h4>
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


                      </ul>


                      <div class="tab-content" id="myTabContent2">

                          <div class="tab-pane pt-3 fade   @if (empty(Session::get('err'))) show active @endif" id="icon-home" role="tabpanel"
                              aria-labelledby="icon-home-tab">

                              @include('user.profile.profile', [ 'guard' => 'admin'  ,  $admin  , 'route' => route('admin.profile.update', $admin)  ])


                          </div>

                          <div class="tab-pane pt-3 fade  @if (Session::get('err') == '1') show active @endif" id="icon-secret" role="tabpanel"
                              aria-labelledby="icon-secret-tab">

                              @include('user.profile.secret', [ 'guard' => 'admin'  ,  $admin  , 'route' => route('admin.profile.secret', $admin) ])

                          </div>







                  </div>
              </div>
          </div>

      </div>

  </div>










@endcomponent
