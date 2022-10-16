
     @yield('title')
 @if((Session::get('nav')=='viewsusers')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='viewslink')||(Session::get('nav')=='viewselan')||(Session::get('nav')=='viewsads')||(Session::get('nav')=='viewspage')||(Session::get('nav')=='viewsnotices')||(Session::get('nav')=='viewscurrency')||(Session::get('nav')=='viewsonlineshops')||(Session::get('nav')=='viewsadmins')||(Session::get('nav')=='viewstickets')) 


  <link rel="stylesheet" href="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
 
 
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
          <li class="nav-item nav-category">
          	
          	@if(Session::get('arou')=='superadmin')مدیرت کل  @else  	مدیریت @endif
          	
          </li>
          <li class="nav-item">
            <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/dashboard" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">داشبورد 
              @if(Session::get('arou')=='superadmin') مدیریت کل @else  	مدیریت @endif</span>
            </a>
          </li>
          
          
          
@if(Session::get('accessadmin_admin')=='1')
          <li class="nav-item @if((Session::get('nav')=='addadmin')||(Session::get('nav')=='viewsadmins')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت مدیران</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='addadmin')||(Session::get('nav')=='viewsadmins')) show  @endif" id="admin">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/addadmin" class="nav-link  @if((Session::get('nav')=='addadmin')) active @endif">ثبت مدیر </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsadmins" class="nav-link  @if((Session::get('nav')=='viewsadmins')) active @endif">مشاهده مدیران</a>
                </li> 
              </ul>
            </div>
          </li> 
@endif
          
          
@if(Session::get('accessadmin_user')=='1')
          <li class="nav-item @if((Session::get('nav')=='adduser')||(Session::get('nav')=='viewsusers')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#cats" role="button" aria-expanded="false" aria-controls="cats">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت کاربران</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='adduser')||(Session::get('nav')=='viewsusers')) show  @endif" id="cats">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/adduser" class="nav-link  @if((Session::get('nav')=='adduser')) active @endif">ثبت کاربر </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsusers" class="nav-link  @if((Session::get('nav')=='viewsusers')) active @endif">مشاهده کاربران</a>
                </li> 
              </ul>
            </div>
          </li> 
@endif
          

@if(Session::get('accessadmin_giftcard')=='1')
                    <li class="nav-item @if((Session::get('nav')=='mnggiftcart')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#gift" role="button" aria-expanded="false" aria-controls="gift">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت گیفت کارتها</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='mnggiftcart')||(Session::get('nav')=='views')) show  @endif" id="gift">
              <ul class="nav sub-menu">
                 
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/mnggiftcart" class="nav-link  @if((Session::get('nav')=='mnggiftcart')) active @endif ">مشاهده گیفت کارتها</a>
                </li> 
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/mnggiftcart" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">درخواستهای گیفت کارت</a>
                </li> 
              </ul>
            </div>
          </li> 

@endif
          

@if(Session::get('accessadmin_paypall')=='1')
          
          
 
                    <li class="nav-item @if((Session::get('nav')=='mngpaypal')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#paypal" role="button" aria-expanded="false" aria-controls="paypal">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت پی پال </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='mngpaypal')||(Session::get('nav')=='views')) show  @endif" id="paypal">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت پی پال </a>
                </li>
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/mngpaypal" class="nav-link  @if((Session::get('nav')=='mngpaypal')) active @endif">مشاهده پی پال</a>
                </li> 
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/mngpaypal" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">درخواستهای پی پال</a>
                </li> 
              </ul>
            </div>
          </li> 
          

@endif
          

@if(Session::get('accessadmin_skrill')=='1')
 
                    <li class="nav-item @if((Session::get('nav')=='mngskrill')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#scrol" role="button" aria-expanded="false" aria-controls="scrol">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت اسکریل</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='mngskrill')||(Session::get('nav')=='views')) show  @endif" id="scrol">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت اسکریل </a>
                </li>
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/mngskrill" class="nav-link  @if((Session::get('nav')=='mngskrill')) active @endif">مشاهده اسکریل</a>
                </li> 
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/mngskrill" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">درخواستهای اسکریل</a>
                </li> 
              </ul>
            </div>
          </li> 
          

@endif
          

@if(Session::get('accessadmin_visacart')=='1')
 
                    <li class="nav-item @if((Session::get('nav')=='mngvisacart')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#visit" role="button" aria-expanded="false" aria-controls="visit">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت ویزاکارتها </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='mngvisacart')||(Session::get('nav')=='views')) show  @endif" id="visit">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت ویزاکارتها </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/mngvisacart" class="nav-link  @if((Session::get('nav')=='mngvisacart')) active @endif">مشاهده ویزاکارتها</a>
                </li> 
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/mngvisacart" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">درخواست ویزاکارتها</a>
                </li> 
              </ul>
            </div>
          </li> 
          

@endif
          

@if(Session::get('accessadmin_visacartfisic')=='1')
                    <li class="nav-item @if((Session::get('nav')=='visacartfisic')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#visacartfisic" role="button" aria-expanded="false" aria-controls="visacartfisic">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت ویزا کارت فیزیکی </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='visacartfisic')||(Session::get('nav')=='views')) show  @endif" id="visacartfisic">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت ویزاکارتها </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/visacartfisic" class="nav-link  @if((Session::get('nav')=='visacartfisic')) active @endif">مشاهده ویزاکارت فیزیکی</a>
                </li> 
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/visacartfisic" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">  درخواست های ویزاکارت فیزیکی </a>
                </li> 
              </ul>
            </div>
          </li> 

@endif
          

@if(Session::get('accessadmin_credcard')=='1')  
                    <li class="nav-item @if((Session::get('nav')=='buywithcardinsite')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#buywithcardinsite" role="button" aria-expanded="false" aria-controls="buywithcardinsite">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title"> پرداخت با کارت اعتباری </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='buywithcardinsite')||(Session::get('nav')=='views')) show  @endif" id="buywithcardinsite">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت ویزاکارتها </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/buywithcardinsite" class="nav-link  @if((Session::get('nav')=='buywithcardinsite')) active @endif">خدمات پرداخت با کارت اعتباری</a>
                </li> 
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/buywithcardinsite" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif"> درخواست پرداختی ها</a>
                </li> 
              </ul>
            </div>
          </li> 

@endif
          
 

@if(Session::get('accessadmin_service')=='1')  
                    <li class="nav-item @if((Session::get('nav')=='allservice')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#allservice" role="button" aria-expanded="false" aria-controls="allservice">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title"> سرویس ها </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='allservice')||(Session::get('nav')=='views')) show  @endif" id="allservice">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='add')) active @endif">ثبت سرویس ها </a>
                </li>
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/plane/allservice" class="nav-link  @if((Session::get('nav')=='allservice')) active @endif"> مشاهده سرویس ها </a>
                </li> 
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/allservice" class="nav-link  @if((Session::get('nav')=='viewsreq')) active @endif">درخواست سرویس ها</a>
                </li> 
              </ul>
            </div>
          </li> 

@endif
          
 
          
@if(Session::get('accessadmin_sefaresh')=='1')
           <li class="nav-item @if((Session::get('nav')=='viewsonlineshops')||(Session::get('nav')=='views')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#mngsef" role="button" aria-expanded="false" aria-controls="mngsef">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت سفارشها </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='viewsonlineshops')||(Session::get('nav')=='views')) show  @endif" id="mngsef">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/all" class="nav-link  @if((Session::get('nav')=='viewsonlineshops')) active @endif">مشاهده سفارشهای کاربران </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link  @if((Session::get('nav')=='views')) active @endif">لیست درخواستها</a>
                </li>  
              </ul>
            </div>
          </li> 
          @endif
           
     <li class="nav-item @if((Session::get('nav')=='addticket')||(Session::get('nav')=='viewstickets')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#ticket" role="button" aria-expanded="false" aria-controls="ticket">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">پشتیبانی  
               @if (Session::get('tickreadstudentsup')!=0)   &nbsp; 
 <span class="badge badge-pill badge-info" title="پیام جدید"> {{ Session::get('tickreadstudentsup')}} </span>
@endif
              </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='addticket')||(Session::get('nav')=='viewstickets')) show  @endif" id="ticket">
              <ul class="nav sub-menu">
                
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewstickets" class="nav-link  @if((Session::get('nav')=='viewstickets')) active @endif">مشاهده تیکتهای کاربران
                  
                  



                  </a>
                </li>  
              </ul>
            </div>
          </li> 
          
          



@if(Session::get('accessadmin_tiket')=='1')
          <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#belli" role="button" aria-expanded="false" aria-controls="belli">
              <i class="link-icon" data-feather="bell"></i>
              <span class="link-title">اطلاع رسانی</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse   " id="belli">
              <ul class="nav sub-menu">
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsnotices" class="nav-link  ">فرمت اطلاع رسانی ها </a>
                </li> 
              </ul>
            </div>
          </li> 
          @endif
                     
			 
          <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#setfinic" role="button" aria-expanded="false" aria-controls="setfinic">
              <i class="link-icon" data-feather="dollar-sign"></i>
              <span class="link-title">مدیریت مالی</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse   " id="setfinic">
              <ul class="nav sub-menu">
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewscurrency" class="nav-link  "> مدیریت کارنسی ها</a>
                </li> 
              </ul>
            </div>
          </li> 
                         
 <li class="nav-item @if((Session::get('nav')=='viewsnotices')||(Session::get('nav')=='viewsnotices')) active @endif">
            <a class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
              <i class="link-icon" data-feather="bell"></i>
              <span class="link-title">تنظیمات</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  @if((Session::get('nav')=='viewsnotices')||(Session::get('nav')=='viewsnotices')) show  @endif" id="setting">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsnotices" class="nav-link  @if((Session::get('nav')=='add')) active @endif">نظیمات اطلاع رسانی </a>
                </li>
              
              </ul>
            </div>
          </li> 
                     
          
@if(Session::get('mngform')=='1')
 
                    <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#createform" role="button" aria-expanded="false" aria-controls="createform">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت فرم</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse   " id="createform">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{env('APP_URL')}}/superadmin/createform" class="nav-link   ">ثبت فرم </a>
                </li>
                <li class="nav-item">
 <a href="{{env('APP_URL')}}/superadmin/viewsforms" class="nav-link  ">مشاهده فرمها</a>
                </li> 
             
              </ul>
            </div>
          </li> 
          

@endif
          
 
          
          
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


            <li class="nav-item dropdown nav-messages">
              <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="instagram"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="messageDropdown">
                <div class="dropdown-header d-flex align-items-center justify-content-between">
                  <p class="mb-0 font-weight-medium"> {{Session::get('countalert1')}} احرازهویت جدید</p>
                  <a href="javascript:;" class="text-muted">پاک کردن همه</a>
                </div>
                <div class="dropdown-body">
                

                @foreach(Session::get('alertnotf') as $notf)
                
                
                
                @if($notf->type=='1')
 
                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/docuser/{{$notf->iduser}}" class="dropdown-item">
                    <div class="icon">
                      <i data-feather="upload"></i>
                    </div>
                    <div class="content">
                      <p>{{$notf->user_name}}
                      مدارک هویتی خود را آپلود کرد</p>
                      <p class="sub-text text-muted">
                      	{{jDate::forge($notf->date)->format('Y/m/d ساعت H:i a')}}
                      </p>
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
            
            
            
            
            <li class="nav-item dropdown nav-notifications">
              <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
                
              </a>
              <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                <div class="dropdown-header d-flex align-items-center justify-content-between">
 <p class="mb-0 font-weight-medium">{{Session::get('countalert14')}} تیکت جدید</p>
                   
                </div>
                <div class="dropdown-body">
                  
                
                @foreach(Session::get('alertnotf') as $notf)
      
                    
                  
                @if($notf->type=='14')

                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewstickets/ticket/{{$notf->link}}" class="dropdown-item">
                    <div class="icon">
                      <i data-feather="mail"></i>
                    </div>
                    <div class="content">
                      <p>  {{$notf->user_name}} برای شما تیکت ارسال کرد</p>
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
            
            
            
            
            
            
            <li class="nav-item dropdown nav-notifications">
              <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                 
              </a>
              <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                <div class="dropdown-header d-flex align-items-center justify-content-between">
 <p class="mb-0 font-weight-medium">{{Session::get('countalert2')}} سفارش جدید</p>
                   
                </div>
                <div class="dropdown-body">
                  
                
                @foreach(Session::get('alertnotf') as $notf)
                @if($notf->type=='2')

                  <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/viewsonlineshops/{{$notf->req}}/{{$notf->link}}/{{$notf->plan}}" class="dropdown-item">
                    <div class="icon">
                      <i data-feather="gift"></i>
                    </div>
                    <div class="content">
                      <p>{{$notf->user_name}} سفارش جدید ایجاد کرد</p>
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
                
 <img src="{{env('APP_URL')}}/public/images/{{Session::get('supimg')}}" alt="userr">
                
                  
                 
              </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                <div class="dropdown-header d-flex flex-column align-items-center">
                  <div class="figure mb-3">
                    <img src="{{env('APP_URL')}}/public/images/{{Session::get('supimg')}}" alt="">
                  </div>
                  <div class="info text-center">
 <p class="name font-weight-bold mb-0">@if(Session::get('arou')=='superadmin')مدیریت کل  @else  	مدیریت @endif</p>
 <p class="email text-muted mb-3"> @if(Session::get('arou')=='superadmin')superadmin  @else  {{Session::get('nameadmin')}} @endif</p>
  
                  </div>
                </div>
                <div class="dropdown-body">
                  <ul class="profile-nav p-0 pt-3">
                    <li class="nav-item">
                      <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/profile" class="nav-link">
                        <i data-feather="user"></i>
                        <span>پروفایل</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/profile" class="nav-link">
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
                      <a href="{{env('APP_URL')}}/manage/{{Session::get('arou')}}/sign-out" class="nav-link">
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
  
  
  
 @if((Session::get('nav')=='viewsusers')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='viewslink')||(Session::get('nav')=='viewselan')||(Session::get('nav')=='viewsads')||(Session::get('nav')=='viewspage')||(Session::get('nav')=='viewsnotices')||(Session::get('nav')=='viewscurrency')||(Session::get('nav')=='viewsonlineshops')||(Session::get('nav')=='viewsadmins')||(Session::get('nav')=='viewstickets'))  

 
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{env('APP_URL')}}/build/template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  
  <script src="{{env('APP_URL')}}/build/template/assets/js/data-table.js"></script>
 
 @endif
    
 @if( (Session::get('nav')=='viewstickets'))  
    
  <script src="{{env('APP_URL')}}/build/template/assets/js/chat.js"></script>
  
  @endif
  

@if((Session::get('nav')=='addnew')||(Session::get('nav')=='viewsnews')||(Session::get('nav')=='addpage')||(Session::get('nav')=='viewspage')||(Session::get('nav')=='viewsnoticess')) 

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
  
  
  <!-- end custom js for this page -->