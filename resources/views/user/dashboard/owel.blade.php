@component('user.layouts.content',[
    'title'=>'داشبورد من ',
    'tabTitle'=>'داشبورد من',
    'breadcrumb'=>[
            ['title'=>'داشبورد من','class' => 'active']
    ]])



@slot('style')
<script src="https://kit.fontawesome.com/e7db147a51.js" crossorigin="anonymous"></script>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />


 @endslot


 <div class="owl-carousel owl-theme">
  <div class="item"><img src="https://via.placeholder.com/1200"></div>
  <div class="item"><img src="https://via.placeholder.com/1200"></div>
  <div class="item"><img src="https://via.placeholder.com/1200"></div>
</div>
 
@slot('script')
 
<script src="jquery-3.5.1.min.js"></script>
<script src="index.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<script>
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
loop:true,
margin:10,
nav:true,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:5
    }
}
})
});
</script>

@endslot

@endcomponent