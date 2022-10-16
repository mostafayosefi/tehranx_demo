@component('user.layouts.content',[
    'title'=>'داشبورد من ',
    'tabTitle'=>'داشبورد من',
    'breadcrumb'=>[
            ['title'=>'داشبورد من','class' => 'active']
    ]])



@slot('style')

<link rel="stylesheet" href="{{ asset('template/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl.carousel/owl.theme.default.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/animate.css/animate.min.css') }}"> --}}

<style>
.owl-carousel .owl-stage-outer {
  direction: rtl !important;
}
</style>

 @endslot




 <div class="page-content">

    @include('admin.alert.activition', [ $authentication , 'oper'=>'email_verify' , 'guard' => 'user' ])
    @include('admin.alert.activition', [ $authentication , 'oper'=>'tell_verify' , 'guard' => 'user' ])
    @include('admin.alert.activition', [ $authentication , 'oper'=>'document_verify' , 'guard' => 'user' ])


 <div class="row">



  <div class="col-md-9 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">آیتم های محبوب</h6>

        </div>

  <div class="owl-carousel owl-theme owl-auto-play">
              {{-- <div class="owl-carousel owl-theme"> --}}
   @foreach($planes->form_subcategories as $admin)
<div class="item">
               <div class="card">
                <div class="card-body">
                  <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>
<a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  >
  @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])

</a>

<hr>
<a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  class="btn btn-primary  btn-sm   rounded-pill mx-auto mt-4">
    <i data-feather="plus-circle"></i>
    ثبت سفارش
      </a>

               </div>
            </div>
          </div>
          @endforeach
          </div>
      </div>
    </div>
  </div>


  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">آیتم های جدید </h6>

          </div>

    <div class="owl-carousel owl-theme owl-auto-playy">
                {{-- <div class="owl-carousel owl-theme"> --}}
     @foreach($planes->form_subcategories as $admin)
  <div class="item">
                    <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>
  <a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  >
    @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])
  </a><hr>


<a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  class="btn btn-primary  btn-sm   rounded-pill mx-auto mt-4">
    <i data-feather="plus-circle"></i>
    ثبت سفارش
      </a>
            </div>
            @endforeach
            </div>
        </div>
      </div>
  </div>
</div>


<style>

.owl-carousel .owl-nav button.owl-next,
.owl-carousel .owl-nav button.owl-prev,
.owl-carousel button.owl-dot {
    background: 0 0;
    color: inherit;
    border: none;
    padding: 0 !important;
    font: inherit;
    font-size: 40px;
}
</style>




<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">آخرین تیکت ها     </h6>
        </div>



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h6 class="card-title">تیکت های من</h6>
                  <div class="table-responsive">

        @if($tickets)
                    <table id="dataTableExample" class="table">
                      <thead>
                        <tr>

                            <th>  ردیف </th>
                            <th>  موضوع تیکت</th>
                            <th> تاریخ ثبت </th>
                            <th> وضعیت</th>
                            <th> حذف</th>

                        </tr>
                      </thead>
                      <tbody>


        @foreach($tickets as $key => $admin)
                        <tr>
                            <td>{{ $key + 1 }}</td>


                            <td>{{$admin->title}} 	 @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'read_ticket_user'   ,'number' => '1'   ]) 	 </td>
                            <td>{{ date_frmat($admin->created_at) }}</td>
                            <td> <a href="{{route('user.ticket.show', $admin) }}"> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'status_ticket'   ]) </a> </td>




                 <td>   @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.ticket.destroy', $admin) , 'myname' => 'حذف تیکت '.$admin->title ]) </td>



                        </tr>
        @endforeach



                      </tbody>
                    </table>

        @endif

                  </div>
                </div>
              </div>
            </div>
          </div>




        </div>
        </div>
        </div>


    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">    ویژه های تهرانیکس     </h6>
        </div>


        <div class="owl-carousel owl-theme owl-auto-play-spical">
 @foreach($planes->form_subcategories as $admin)
<div class="item">
             <div class="card">
              <div class="card-body">
                <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>
<a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  >
@include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])
</a><hr>

<a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  class="btn btn-primary  btn-sm   rounded-pill mx-auto mt-4">
    <i data-feather="plus-circle"></i>
    ثبت سفارش
      </a>
              </div>
            </div>
         </div>
        @endforeach
        </div>
    </div>


        </div>
        </div>

        </div>





 <div class="row">
    <div class="col-12 col-xl-12 stretch-card"   >
      <div class="row flex-grow">



{{--
                    <div class="col-md-4 grid-margin stretch-card">
                        @include('user.dashboard.card', [  'icon_card' => 'mail'    , 'count_card' => count_dashboard($dash_id,'ticket') , 'title_card' => 'تیکت های من' , 'desc_card' => 'تیکت' ,
                        'route_create' => route('user.ticket.create') ,  'route_index' => route('user.ticket.index') , 'new_card' =>    count_dashboard($dash_id,'ticket')." تیکت جدید"    ])
                    </div> --}}






      </div>
    </div>
  </div>
  </div>





    @slot('script')
    {{-- <script src="{{ asset('template/assets/js/dashboard.js') }}"></script> --}}
    {{-- <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script> --}}
    <script src="{{ asset('template/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    {{-- <script src="{{ asset('template/assets/js/template.js') }}"></script> --}}
    {{-- <script src="{{ asset('template/assets/js/carousel-rtl.js') }}"></script> --}}


    <script>
        $(function() {
  'use strict';

  if($('.owl-auto-play').length) {
    $('.owl-auto-play').owlCarousel({
      items:3,
      loop:true,
      margin:10,
      rtl: true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true
        }
    }
    });
  }


  if($('.owl-auto-playy').length) {
    $('.owl-auto-playy').owlCarousel({
      items:1,
      loop:true,
      margin:10,
      rtl: true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
        0:{
            items:1,
            nav:true
        }
    }
    });
  }


  if($('.owl-auto-play-spical').length) {
    $('.owl-auto-play-spical').owlCarousel({
      items:1,
      loop:true,
      margin:10,
      rtl: true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
        0:{
            items:1,
            nav:true
        }
    }
    });
  }



});
    </script>


    <style>
        .owl-dots{
            display: none !important;
        }

        </style>

{{--


  <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                rtl: true,
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 5
                  }
                }
              })
            });

          </script> --}}

    @endslot


@endcomponent
