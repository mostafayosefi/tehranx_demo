<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
         داشبورد<span> کاربر</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">اصلی</li>


        <li class="nav-item {{ isActive(['user.dashboard']) }}">
          <a href="{{ route('user.dashboard.index') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">داشبورد</span>
          </a>
        </li>



          @include('user.Payment.layouts.sidebar' )







        <li class="nav-item  {{ isActive(['user.wallet.create' , 'user.wallet.index'])}}   ">
            <a class="nav-link" data-toggle="collapse" href="#wallet" role="button" aria-expanded="false" aria-controls="wallet">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت کیف پول من   </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  {{ isShow(['user.wallet.create' , 'user.wallet.index'])}}     "  id="wallet">
              <ul class="nav sub-menu">
                {{-- <li class="nav-item">
 <a href="{{ route('user.wallet.create') }}" class="nav-link   {{ isActive(['user.wallet.create']) }}  ">افزایش موجودی   </a>
                </li> --}}
                <li class="nav-item">
 <a href="{{ route('user.wallet.index') }}" class="nav-link   {{ isActive(['user.wallet.index']) }}  ">      مشاهده تراکنش ها</a>
                </li>
              </ul>
            </div>
          </li>






          <li class="nav-item  {{ isActive(['user.ticket.create' , 'user.ticket.index'])}}   ">
            <a class="nav-link" data-toggle="collapse" href="#ticket" role="button" aria-expanded="false" aria-controls="ticket">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت تیکت ها  </span>
              @include('admin.layouts.table.origin_getstatus', [ 'route' => ''  ,'type_name' => 'count_read_ticket'   ,'number' => $count_ticket_unread_user   ])

              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  {{ isShow(['user.ticket.create' , 'user.ticket.index'])}}     "  id="ticket">
              <ul class="nav sub-menu">
                <li class="nav-item">
 <a href="{{ route('user.ticket.create') }}" class="nav-link   {{ isActive(['user.ticket.create']) }}  ">ایجاد تیکت جدید     </a>
                </li>
                <li class="nav-item">
 <a href="{{ route('user.ticket.index') }}" class="nav-link   {{ isActive(['user.ticket.index']) }}  "> مشاهده تیکت های من
     @include('admin.layouts.table.origin_getstatus', [ 'route' => ''  ,'type_name' => 'count_read_ticket'   ,'number' => $count_ticket_unread_user   ])
    </a>
                </li>
              </ul>
            </div>
          </li>






      </ul>
    </div>
  </nav>
{{--

  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
      </a>
      <h6 class="text-muted">سایدبار : </h6>
      <div class="form-group border-bottom">
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
              value="sidebar-light">
            روشن
          </label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
              value="sidebar-dark" checked>
            تیره
          </label>
        </div>
      </div>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">تم روشن : </h6>
        <a class="theme-item active" href="../demo_1/dashboard-one.html">
          <img src="../assets/images/screenshots/light.jpg" alt="light theme">
        </a>
        <h6 class="text-muted mb-2">تم تیره : </h6>
        <a class="theme-item" href="../demo_2/dashboard-one.html">
          <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
        </a>
      </div>
    </div>
  </nav>
 --}}
