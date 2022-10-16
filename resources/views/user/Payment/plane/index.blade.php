@if ( $planes)
@php
$title_name= 'مشاهده '.$planes->name;
$breadcrumb   = [
['title' => 'مشاهده '.$planes->name, 'url' => route('user.payment.plane.index' , $planes->link )],
         ['title' => '  ثبت سفارش  ', 'class' => 'active']
        ]  ;  @endphp
@else
@php
$title_name='404';
$breadcrumb =  [
        ['title' => '  صفحه موردنظر وجود ندارد!  ', 'class' => 'active']
        ]  ;  @endphp
@endif



@component('user.layouts.content',[
    'title'=>$title_name,
    'tabTitle'=>$title_name,
    'breadcrumb'=>  $breadcrumb
    ])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



@slot('style')

<link rel="stylesheet" href="{{ asset('template/assets/vendors/owl.carousel/owl.carousel.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/owl.carousel/owl.theme.default.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('template/assets/vendors/animate.css/animate.min.css') }}"> --}}

<style>
.owl-carousel .owl-stage-outer {
  direction: rtl !important;
}
</style>


<style>

#loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s;
    animation:fading 10s infinite;
  }
  /* .w3-animate-fading{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}} */
  /* .w3-animate-fading{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}} */

  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 }
    to { bottom:0px; opacity:1 }
  }

  @keyframes animatebottom {
    from{ bottom:-100px; opacity:0 }
    to{ bottom:0; opacity:1 }
  }

  #myDiv {
    display: none;
    text-align: center;
  }

</style>



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



 @endslot


@if($planes == Null)
@include('admin.errors.404')
@elseif($planes != Null)
    @include('admin.Eform.card.plane_index', [  'guard'=>'user' ,  $planes   ])





@endif



    @slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot


@slot('script')

{{-- <script src="{{ asset('template/assets/js/dashboard.js') }}"></script> --}}
{{-- <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script> --}}
<script src="{{ asset('template/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template/assets/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('template/assets/js/template.js') }}"></script>
{{-- <script src="{{ asset('template/assets/js/carousel-rtl.js') }}"></script> --}}


<script>
    $(function() {
'use strict';

if($('.owl-auto-play').length) {
$('.owl-auto-play').owlCarousel({
  items:5,
  loop:true,
  margin:10,
  rtl: true,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
    0:{
        items:3,
        nav:true
    },
    600:{
        items:4,
        nav:false
    },
    1000:{
        items:5,
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


@endslot



@endcomponent
