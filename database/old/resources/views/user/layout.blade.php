
     @yield('title')
 @if((Session::get('nav')=='viewscats')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='viewslink')||(Session::get('nav')=='viewselan')||(Session::get('nav')=='viewsads')||(Session::get('nav')=='viewspage')||(Session::get('nav')=='viewstickets')) 


  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
 
 
 @endif
 
 
 
 @if((Session::get('nav')=='paneluser'))
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/owl.carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/owl.carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/animate.css/animate.min.css">
 
 <style>
  .owl-carousel .owl-stage-outer {
    direction: rtl !important;
  }
</style>

 @endif
 
 
 @if((Session::get('nav')=='paneluser'))
	<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/css/persian-datepicker-0.4.5.min.css">
	<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
	
	
 @endif
 
 <div class="main-wrapper">
 
    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
         سرویس <span>پرداخت</span>
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
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/panel" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">داشبورد</span>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/verificationdoc" class="nav-link  @if((Session::get('nav')=='settingprofile')||(Session::get('nav')=='settingprofile')) show  @endif">
              <i class="link-icon" data-feather="user-check"></i>
              <span class="link-title">تایید مدارک</span>
            </a>
          </li>
           
          
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/plane/giftcard" class="nav-link  @if((Session::get('nav')=='settingprofile')||(Session::get('nav')=='settingprofile')) show  @endif">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title"> گیفت کارتها</span>
            </a>
          </li>
           
          
          
           
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/viewplan/paypskrl" class="nav-link  @if((Session::get('nav')=='paypal')||(Session::get('nav')=='skrill')) show  @endif">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">پی پال / اسکریل / وب مانی
</span>
            </a>
          </li>
           
  
          
 
                    <li class="nav-item @if((Session::get('nav')=='add')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#visa" role="button" aria-expanded="false" aria-controls="visa">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title"> مسترکارت ، ویزا کارت</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='add')||(Session::get('nav')=='views')) show  @endif" id="visa">
              <ul class="nav sub-menu">
 @foreach(Session::get('viscarts') as $gfcrd) 
 

@if(($gfcrd->form_linkname=='mastercarthediye')||($gfcrd->form_linkname=='visacarthedye'))
 <li class="nav-item">
 <a href="{{env('APP_URL')}}/user/servicei3/order/visacart/{{$gfcrd->form_linkname}}" class="nav-link  @if((Session::get('nav')==$gfcrd->form_linkname)) active @endif">{{$gfcrd->form_name}}</a>
                </li>  

@else
 <li class="nav-item">
 <a href="{{env('APP_URL')}}/user/order/visacart/{{$gfcrd->form_linkname}}" class="nav-link  @if((Session::get('nav')==$gfcrd->form_linkname)) active @endif">{{$gfcrd->form_name}}</a>
                </li> 

@endif
@endforeach
              </ul>
            </div>
          </li> 
          
          
          
                    <li class="nav-item @if((Session::get('nav')=='viscartfisics')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#visacrtfsc" role="button" aria-expanded="false" aria-controls="visacrtfsc">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title"> ویزاکارت / مسترکارت </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='viscartfisics')||(Session::get('nav')=='views')) show  @endif" id="visacrtfsc">
              <ul class="nav sub-menu"> 
 <li class="nav-item">
 <a href="{{env('APP_URL')}}/user/plane/viscartfisics" class="nav-link  @if((Session::get('nav')=='viscartfisics')) active @endif">ویزا کارت فیزیکی</a>
                </li> 
 
              </ul>
            </div>
          </li> 
          
          
          
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/plane/buywithcardinsite" class="nav-link  @if((Session::get('nav')=='buywithcardinsite')||(Session::get('nav')=='buywithcardinsite')) show  @endif">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">پرداخت در سایتهای خارجی</span>
            </a>
          </li>
          
          
          
          
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/plane/allservice/servicelist" class="nav-link  @if((Session::get('nav')=='allservice')||(Session::get('nav')=='allservice')) show  @endif">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">سرویس ها</span>
            </a>
          </li>
          
          
 
          
          
          
 
          
           
          
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/viewsonlineshops" class="nav-link @if((Session::get('nav')=='viewsonlineshops')) active @endif">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">پیگیری سفارشات</span>
            </a>
          </li>
          
          
          
           
 
          
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/user/viewstickets" class="nav-link  @if((Session::get('nav')=='addticket')||(Session::get('nav')=='viewstickets')) active @endif">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">پشتیبانی</span>
            </a>
          </li>
          
          
 
          
          
        </ul>
      </div>
    </nav> 

    <div class="page-wrapper">


      <nav class="navbar">
        <a href="#" class="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
 
          <ul class="navbar-nav">

 
            <li class="nav-item dropdown nav-notifications">
              <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <div class="indicator">
                  <div class="circle"></div>
                </div>
              </a>
              <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                <div class="dropdown-header d-flex align-items-center justify-content-between">
 <p class="mb-0 font-weight-medium">{{Session::get('countalertuser')}} اعلان جدید</p>
 
                </div>
                <div class="dropdown-body">
                
                
                 
                @foreach(Session::get('alertnotfuser') as $notf)
                
                @if($notf->type=='15')

                  <a href="{{env('APP_URL')}}/user/viewstickets/ticket/{{$notf->link}}" class="dropdown-item">
                    <div class="icon">
                      <i data-feather="mail"></i>
                    </div>
                    <div class="content">
                      <p>  مدیریت به تیکت شما پاسخ داد</p>
                      <p class="sub-text text-muted">
                      	{{jDate::forge($notf->date)->format('Y/m/d ساعت H:i a')}}</p>
                    </div>
                  </a>
                  
                  @endif
                  
          
                  
                  @endforeach
                  
                  
                  
                  
                  
                </div>
                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                  <a href="javascript:;">مشاهده همه</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown nav-profile">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                
                
                <img src="{{env('APP_URL')}}/public/images/{{Session::get('usimg')}}" alt="userr">
              </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                  <div class="figure mb-3">
                    <img src="{{env('APP_URL')}}/public/images/{{Session::get('usimg')}}" alt="">
                  </div>
                  <div class="info text-center">
 <p class="name font-weight-bold mb-0">{{Session::get('signname')}}</p>
 <p class="email text-muted mb-3">{{Session::get('signuser')}}</p>
                  </div>
                </div>
                <div class="dropdown-body">
                  <ul class="profile-nav p-0 pt-3">
                    <li class="nav-item">
                      <a href="{{env('APP_URL')}}/user/myprofile/edit" class="nav-link">
                        <i data-feather="user"></i>
                        <span>پروفایل</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{env('APP_URL')}}/user/myprofile/edit" class="nav-link">
                        <i data-feather="edit"></i>
                        <span>ویرایش پروفایل</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:;" class="nav-link">
                        <i data-feather="repeat"></i>
                        <span>تغییر کاربر</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{env('APP_URL')}}/user/sign-out" class="nav-link">
                        <i data-feather="log-out"></i>
                        <span>خروج</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav> 


          
     @yield('body')
        
     
      <!-- partial:partials/_footer.html -->
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
        <p class="text-muted text-center text-md-left">Copyright © 2020، تمام حقوق محفوظ است</p>
      </footer>
      <!-- partial -->
     @yield('footer')






    </div>
  </div>

  <!-- core:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/core/core.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/chartjs/Chart.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/apexcharts/apexcharts.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/feather-icons/feather.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{env('APP_URL')}}/build/template/assets/js/dashboard.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/datepicker.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/persian-date-0.1.8.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/persian-datepicker-0.4.5.min.js"></script>
  
  
  
 @if((Session::get('nav')=='viewscats')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='viewslink')||(Session::get('nav')=='viewselan')||(Session::get('nav')=='viewsads')||(Session::get('nav')=='viewspage')||(Session::get('nav')=='viewstickets'))  

 
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  
  <script src="{{env('APP_URL')}}/build/template/assets/js/data-table.js"></script>
 
 @endif
    

@if((Session::get('nav')=='addnew')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='addpage')||(Session::get('nav')=='viewspage')) 

<script src="{{env('APP_URL')}}/build/template/assets/vendors/tinymce-rtl/tinymce.min.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/vendors/simplemde/simplemde.min.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/vendors/ace-builds/src-min/ace.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/vendors/ace-builds/src-min/theme-chaos.js"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{env('APP_URL')}}/build/template/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/js/template.js"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{env('APP_URL')}}/build/template/assets/js/tinymce.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/js/simplemde.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/js/ace.js"></script>
 
 @endif
 
 
 
@if((Session::get('nav')=='viewstickets')) 
 
	<script src="{{env('APP_URL')}}/build/template/assets/js/chat.js"></script>
 
 @endif
 
 
 
 @if((Session::get('nav')=='paneluser'))

	<script src="{{env('APP_URL')}}/build/template/assets/vendors/inputmask/jquery.inputmask.min.js"></script>
	<script src="{{env('APP_URL')}}/build/template/assets/js/inputmask.js"></script>
	
	
 @endif
  
  
  
  
 @if((Session::get('nav')=='paneluser'))
    <!-- core:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/core/core.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/jquery-mousewheel/jquery.mousewheel.js"></script>
  <!-- end plugin js for this page -->
  <!-- inject:js -->
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/feather-icons/feather.min.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{env('APP_URL')}}/build/template/assets/js/carousel-rtl.js"></script>
  
  <!-- end custom js for this page -->
  
  
 @endif
  