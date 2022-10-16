

      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
          <form class="search-form">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i data-feather="search"></i>
                </div>
              </div>
              <input type="text" class="form-control" id="navbarForm" placeholder="جستجو ...">
            </div>
          </form>
          <ul class="navbar-nav">


            @if($guard=='admin')


            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>

                  @if($count_task_unread_admin!='0')
                  <div class="indicator">
                    <div class="circle"></div>
                  </div>
                  @endif

                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                  <div class="dropdown-header d-flex align-items-center justify-content-between">
                    <p class="mb-0 font-weight-medium">{{$count_task_unread_admin}} رویداد جدید</p>
                    {{-- <a href="javascript:;" class="text-muted">پاک کردن همه</a> --}}
                  </div>
                  <div class="dropdown-body">

                    @if($list_task_unread_admin)
                    @foreach ($list_task_unread_admin as $notif )

                    <a href="{{route('admin.user.edit',[ $notif->user_id , $notif->activition ])}}" class="dropdown-item">
                        <div class="figure">
                           @include('admin.layouts.table.avatar', [ 'avatarimage' => $notif->user->image , 'class'=>'' , 'style' => ''  ])

                        </div>
                        <div class="content">
                          <div class="d-flex justify-content-between align-items-center">
                            <p> {{$notif->user->name}}  </p>
                            <p class="sub-text text-muted"  >
                                 {{-- {{ date_frmat($notif->created_at) }} --}}
                                 ({{name_type($notif->activition)}})
                                  </p>
                          </div>
                          <p class="sub-text text-muted">کاربر</p>
                        </div>
                      </a>
                    @endforeach
                    @endif

                  </div>
                  <div class="dropdown-footer d-flex align-items-center justify-content-center">
                    <a href="{{route('admin.task.index' , [ 'unread' ] )}}">مشاهده همه</a>
                  </div>
                </div>
              </li>


            <li class="nav-item dropdown nav-messages">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i data-feather="mail"></i>

                  @if($count_ticket_unread_admin!='0')
                  <div class="indicator">
                    <div class="circle"></div>
                  </div>
                  @endif

                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                  <div class="dropdown-header d-flex align-items-center justify-content-between">
                    <p class="mb-0 font-weight-medium">{{$count_ticket_unread_admin}} تیکت جدید</p>
                    {{-- <a href="javascript:;" class="text-muted">پاک کردن همه</a> --}}
                  </div>
                  <div class="dropdown-body">

                    @if($list_ticket_unread_admin)
                    @foreach ($list_ticket_unread_admin as $notif )

                    <a href="{{route('admin.ticket.show' , $notif)}}" class="dropdown-item">
                        <div class="figure">
                           @include('admin.layouts.table.avatar', [ 'avatarimage' => $notif->user->image , 'class'=>'' , 'style' => ''  ])

                        </div>
                        <div class="content">
                          <div class="d-flex justify-content-between align-items-center">
                            <p> {{$notif->user->name}}  </p>
                            <p class="sub-text text-muted"  >
                                 {{-- {{ date_frmat($notif->created_at) }} --}}
                                 (پیام خوانده نشده)
                                  </p>
                          </div>
                          <p class="sub-text text-muted">کاربر</p>
                        </div>
                      </a>
                    @endforeach
                    @endif

                  </div>
                  <div class="dropdown-footer d-flex align-items-center justify-content-center">
                    <a href="{{route('admin.ticket.index')}}">مشاهده همه</a>
                  </div>
                </div>
              </li>


            <li class="nav-item dropdown nav-profile">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @include('admin.layouts.table.avatar', [ 'avatarimage' => auth()->guard('admin')->user()->image , 'class'=>'' , 'style' => ''  ])
            </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                  <div class="figure mb-3">
                    @include('admin.layouts.table.avatar', [ 'avatarimage' => auth()->guard('admin')->user()->image , 'class'=>'' , 'style' => ''  ])
                  </div>


                  @if (auth()->guard('admin'))
                  <div class="info text-center">
                    <p class="name font-weight-bold mb-0"> {{auth()->guard('admin')->user()->name}} </p>
                    <p class="email text-muted mb-3">{{auth()->guard('admin')->user()->email}} </p>
                  </div>
                  @endif



                </div>
                <div class="dropdown-body">
                  <ul class="profile-nav p-0 pt-3">
                    <li class="nav-item">
                      <a href="{{route('admin.profile.edit')}}" class="nav-link">
                        <i data-feather="user"></i>
                        <span>پروفایل</span>
                      </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('adminLogout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                          <i data-feather="log-out"></i>
                          <span>خروج</span>
                        </a>
                      </li>

                      <form id="logout-form" action="{{ route('adminLogout') }}" method="POST"
                          class="d-none">
                          @csrf
                      </form>






                  </ul>
                </div>
              </div>
            </li>
            @endif


            @if($guard=='user')

              <li class="nav-item dropdown nav-messages">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i data-feather="mail"></i>

                  @if($count_ticket_unread_user!='0')
                  <div class="indicator">
                    <div class="circle"></div>
                  </div>
                  @endif

                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                  <div class="dropdown-header d-flex align-items-center justify-content-between">
                    <p class="mb-0 font-weight-medium">{{$count_ticket_unread_user}} تیکت جدید</p>
                    {{-- <a href="javascript:;" class="text-muted">پاک کردن همه</a> --}}
                  </div>
                  <div class="dropdown-body">

                    @if($list_ticket_unread_user)
                    @foreach ($list_ticket_unread_user as $notif )

                    <a href="{{route('user.ticket.show' , $notif)}}" class="dropdown-item">
                        <div class="figure">
                           @include('admin.layouts.table.avatar', [ 'avatarimage' => $notif->user->image , 'class'=>'' , 'style' => ''  ])

                        </div>
                        <div class="content">
                          <div class="d-flex justify-content-between align-items-center">
                            <p> {{$notif->user->name}}  </p>
                            <p class="sub-text text-muted"  >
                                 {{-- {{ date_frmat($notif->created_at) }} --}}
                                 (پیام خوانده نشده)
                                  </p>
                          </div>
                          <p class="sub-text text-muted">کاربر</p>
                        </div>
                      </a>
                    @endforeach
                    @endif

                  </div>
                  <div class="dropdown-footer d-flex align-items-center justify-content-center">
                    <a href="{{route('user.ticket.index')}}">مشاهده همه</a>
                  </div>
                </div>
              </li>



            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  @include('admin.layouts.table.avatar', [ 'avatarimage' => auth()->guard('user')->user()->image , 'class'=>'' , 'style' => ''  ])
              </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                  <div class="dropdown-header d-flex flex-column align-items-center">
                    <div class="figure mb-3">

                      @include('admin.layouts.table.avatar', [ 'avatarimage' => auth()->guard('user')->user()->image , 'class'=>'profile-pic' , 'style' => 'height: 100px;width: 100px;'  ])

                    </div>

                     @if (auth()->guard('user')->user())
                    <div class="info text-center">
                      <p class="name font-weight-bold mb-0"> {{auth()->guard('user')->user()->name}} </p>
                      <p class="email text-muted mb-3">{{auth()->guard('user')->user()->email}} </p>
                    </div>
                    @endif



                  </div>
                  <div class="dropdown-body">
                    <ul class="profile-nav p-0 pt-3">
                      <li class="nav-item">
                        <a href="{{ route('user.profile.edit') }}" class="nav-link">
                          <i data-feather="user"></i>
                          <span>پروفایل</span>
                        </a>
                      </li>


                      <li class="nav-item">
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link">
                          <i data-feather="log-out"></i>
                          <span>خروج</span>
                        </a>
                      </li>

                      <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                          class="d-none">
                          @csrf
                      </form>



                    </ul>
                  </div>
                </div>
              </li>
@endif






          </ul>
        </div>
      </nav>
      <!-- partial -->
