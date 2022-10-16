@component('user.layouts.content',[
    'title'=>'داشبورد من ',
    'tabTitle'=>'داشبورد من',
    'breadcrumb'=>[
            ['title'=>'داشبورد من','class' => 'active']
    ]])



@slot('style')


<link rel="stylesheet" href="../assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/owlcarousel/assets/owl.theme.default.min.css">


<style>
    .owl-carousel .owl-stage-outer {
      direction: rtl !important;
    }
    </style>
 @endslot













 <div class="row">
    <div class="col-12 col-xl-12 stretch-card"   >
      <div class="row flex-grow">


             <div class="owl-carousel owl-theme">
              <div class="item">
                <h4>1</h4>
              </div>
              <div class="item">
                <h4>2</h4>
              </div>
              <div class="item">
                <h4>3</h4>
              </div>
              <div class="item">
                <h4>4</h4>
              </div>
              <div class="item">
                <h4>5</h4>
              </div>
              <div class="item">
                <h4>6</h4>
              </div>
              <div class="item">
                <h4>7</h4>
              </div>
              <div class="item">
                <h4>8</h4>
              </div>
              <div class="item">
                <h4>9</h4>
              </div>
              <div class="item">
                <h4>10</h4>
              </div>
              <div class="item">
                <h4>11</h4>
              </div>
              <div class="item">
                <h4>12</h4>
              </div>
            </div>


      </div>
    </div>
  </div>




    @slot('script')
    <script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/template.js') }}"></script>
    <script src="{{ asset('template/assets/js/carousel-rtl.js') }}"></script>


    @endslot




@endcomponent
