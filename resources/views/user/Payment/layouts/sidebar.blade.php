

<li class="nav-item nav-category">    احرازهویت    </li>


<li class="nav-item">
              <a href="{{route('user.authentication.index')}}" class="nav-link  ">
                  <i class="link-icon" data-feather="user-check"></i>
                  <span class="link-title">تایید مدارک</span>
              </a>
          </li>

          <li class="nav-item nav-category">    سرویسها و خدمات    </li>




          <li class="nav-item">
              <a href="{{route('user.payment.plane.index', 'giftcards')}}" class="nav-link  ">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title"> گیفت کارتها</span>
              </a>
          </li>




          <li class="nav-item">
              <a href="{{route('user.payment.plane.index', 'Money')}}" class="nav-link  ">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title">پی پال / اسکریل / وب مانی
</span>
              </a>
          </li>


{{--

          <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#visa" role="button" aria-expanded="false" aria-controls="visa">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title"> مسترکارت ، ویزا کارت</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse  " id="visa">
                  <ul class="nav sub-menu">



                      <li class="nav-item">
                          <a href="#" class="nav-link  ">مسترکارت هدیه</a>
                      </li>




                      <li class="nav-item">
                          <a href="#" class="nav-link  ">ویزا کارت هدیه</a>
                      </li>




                      <li class="nav-item">
                          <a href="#" class="nav-link  ">ویزا کارت 1 دلاری</a>
                      </li>

                  </ul>
              </div>
          </li>
 --}}


          {{-- <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#visacrtfsc" role="button" aria-expanded="false" aria-controls="visacrtfsc">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title"> ویزاکارت / مسترکارت </span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse  " id="visacrtfsc">
                  <ul class="nav sub-menu">
                      <li class="nav-item">
                          <a href="{{route('user.payment.plane.index', 'VisaMasterCard')}}" class="nav-link  ">ویزا کارت فیزیکی</a>
                      </li>

                  </ul>
              </div>
          </li> --}}


          <li class="nav-item ">
              <a class="nav-link" data-toggle="collapse" href="#Internet_payments" role="button" aria-expanded="false" aria-controls="Internet_payments">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title">  پرداخت های اینترنتی    </span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
              </a>
              <div class="collapse  " id="Internet_payments">
                  <ul class="nav sub-menu">
                      <li class="nav-item">
                          <a href="{{route('user.payment.plane.index', 'Internet_payments')}}" class="nav-link  ">پرداخت در سایتهای خارجی    </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link  "> خرید و تحویل از آمازون انگلیس </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link  "> خرید و تحویل از آمازون امارات </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link  "> خرید و تحویل از ترندیول ترکیه </a>
                      </li>

                  </ul>
              </div>
          </li>









          <li class="nav-item">
              <a href="{{route('user.payment.plane.index', 'Service')}}" class="nav-link  ">
                  <i class="link-icon" data-feather="list"></i>
                  <span class="link-title">سرویس ها</span>
              </a>
          </li>


          <li class="nav-item  {{ isActive(['user.payment.order.index' , 'user.payment.order.index'])}}   ">
            <a class="nav-link" data-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="order">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">مدیریت سفارشها</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse  {{ isShow(['user.payment.order.index' , 'user.payment.order.index'])}}     "  id="order">
              <ul class="nav sub-menu">
                <li class="nav-item">
 <a href="{{ route('user.payment.order.index') }}" class="nav-link   {{ isActive(['user.payment.order.index']) }}  ">مشاهده سفارشها</a>
                </li>
              </ul>
            </div>
          </li>
