@extends('index.layout')


@section('title')
        <link href="{{env('APP_URL')}}/build/newsajency/ajencnews_files/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" async="" src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/linkid.js.download"></script>
<script async="" src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/analytics.js.download"></script>
<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/jquery-1.11.0.min.js.download"></script>
<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/jwplayer.js.download"></script>    
<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/modernizr-2.6.2.min.js.download"></script>
<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/select2.min.js.download"></script>
<title>{{Session::get('mngindexs')->ind_ftitile}}</title>
@stop



@section('body')
        <main class="mainbody">
            <div class="container">
                <div class="row">
    <div id="top" class="row">
        <div class="col-md-3 hidden-xs hidden-sm">
        </div>
        <div class="col-xs-12 col-ms-12 col-sm-8 col-md-6">
        </div>
        <div class="col-xs-12 col-ms-12 col-sm-4 col-md-3">
        </div>
    </div>

 
  <style>
.fix_left_menu {
	position : fixed;
	left     : 0;
	top      : 220px;
	z-index  : 1;
	border-top : 0px solid #CFD5DA; font-size: 14px;
}

.fix_left_menu ul li:first-child {
}

.fix_left_menu ul li {
	display             : block;
	position            : relative;
	border-right        : 1px solid #CFD5DA;
	border-bottom       : 1px solid #CFD5DA;
	width               : 120px;
	height              : 59px;
	line-height         : 56px;
	background-position : right center;
	background-repeat   : no-repeat;
	background-color    : #fff;
	-webkit-transition  : all 0.3s;
	-o-transition       : all 0.3s;
	transition          : all 0.3s;
	left                : -61px; 
}

.fix_left_menu ul li:hover {
	left : 0;
}

.fix_left_menu ul li.flm1 {
background-image :  url("{{env('APP_URL')}}/build/newsajency/ajencnews_files/img/icon60.png");
}

.fix_left_menu ul li.flm2 {
background-image :  url("{{env('APP_URL')}}/build/newsajency/ajencnews_files/img/icon61.png");
}

.fix_left_menu ul li.flm3 {
background-image :  url("{{env('APP_URL')}}/build/newsajency/ajencnews_files/img/icon62.png");
}

.fix_left_menu ul li a {
	display       : block;
	width         : 100%;
	height        : 100%;
	padding-right : 59px;
}



 






</style>
        
        
        

<div class="fix_left_menu"> 
<ul> 
<li class="flm1"> <a href="{{env('APP_URL')}}/page/1"> <span>تماس با ما</span> </a> </li>
<li class="flm2"> <a href="{{Session::get('mngindexs')->instagram}}" target="_blank"> <span>اینستاگرام</span> </a> </li> 
<li class="flm3"> <a href="{{Session::get('mngindexs')->telegram}}" target="_blank"> <span> تلگرام ما</span> </a> </li> </ul>
</div>
      
      
       
        

    <div id="bot" class="row">
        <div class="col-xs-12 col-md-3">
            <section id="box55" class="box clean hidden-xs hidden-sm" data-conf="{}">
                <div style="">
                    <ul>
                    
 @foreach($adsesright as $adse)
 <li data-conf="{}" id="ad55_{{$adse->ads_id}}">
 <figure><a href="{{$adse->ads_link}}" rel="empty" target="_blank">
 <img src="{{env('APP_URL')}}/public/images/{{$adse->ads_img}}" alt="{{$adse->ads_name}}"></a></figure> </li>
 @endforeach
 
 
                    </ul>
                </div>
            </section>
            <section id="box57" class="box list list-bullets bullet-icons hidden-xs hidden-sm" style="" data-conf="{}">
                <header>
                    <h2 style=""><a href="#" target="_blank" title="آرشیو تازه‌های شبکه‌های اجتماعی">تازه‌های شبکه‌های اجتماعی</a>
                    </h2>
                </header>
                <div>
                    <ul>

<?php $social=3; ?>
@foreach($alladmins as $admin)

<?php $social++; 

$fmodsocial = fmod($social, 3);

?>


<li  class=" @if($fmodsocial==0) twitter @elseif($fmodsocial==1) telegram @elseif($fmodsocial==2) instagram @endif ">
<div class="desc">
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
</div>
</li>




 


@endforeach
                                
                              
                    </ul>
                </div>
                
            </section>
        </div>
        <div class="col-xs-12 col-ms-12 col-sm-8 col-md-6">
        
   
        
        
            <section id="carousel50" class="box top no-header has-carousel" style="" data-conf="{&quot;items&quot;:1,&quot;auto&quot;:5000,&quot;fx&quot;:false,&quot;autoHeight&quot;:false,&quot;controls&quot;:false,&quot;paging&quot;:false,&quot;pagingHeader&quot;:false}">
                <div>
                    <ul>
                    
                    

                    @foreach($org2 as $admin)
                    
                                <li class="news hot" style="width: 552px;">
                                        <figure><a target="_blank" href="#" title="۶ ساعت قبل">

 <?php echo $admin->new_img; ?>

                                        </a></figure>
<div class="desc">
 
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
        <p>{{$admin->new_short}} 
        </p>
</div>
                                </li>
                    
                    @endforeach
                    </ul>
                </div>
                
            </section>
        
            <section id="box83" class="box top-full" style="" data-conf="{}">
                <div>
                    <ul>
                    
                    @foreach($org1 as $admin)
                                <li class="news">
                                        <figure><a target="_blank" href="#" title="۹ ساعت قبل">
 <?php echo $admin->new_img; ?>
                                        </a></figure>
<div class="desc">
 
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
        <p>{{$admin->new_short}} 
        </p>
</div>
                                </li>
                                
                                
                                @endforeach
                    </ul>
                </div>
                
            </section>

   <!--  
 <style>
.containerr {
    margin:0 auto;
    overflow:hidden; 
}
 
#content-slider {
    width:100%;
    height:380px;
    margin:10px auto 0; 
}
#slider {
    background:#000;
    border:5px solid #eaeaea;
    box-shadow:1px 1px 5px rgba(0,0,0,0.7);
    height:380px;
    width:680px;
    margin: 0px auto 0;
    overflow:visible;
    position:relative;
}
#mask {
    overflow:hidden;
    height:380px;
}
#slider ul {
    margin:0;
    padding:0;
    position:relative;
}
#slider li {
    width:680px;
    height:380px;
    position:absolute;
    top:-325px;
    list-style:none;
}


#slider li p {
	color: #27d82c;
}
 
#slider li.firstanimation {
    -moz-animation:cycle 25s linear infinite;    
    -webkit-animation:cycle 25s linear infinite;        
}
#slider li.secondanimation {
    -moz-animation:cycletwo 25s linear infinite;
    -webkit-animation:cycletwo 25s linear infinite;        
}
#slider li.thirdanimation {
    -moz-animation:cyclethree 25s linear infinite;
    -webkit-animation:cyclethree 25s linear infinite;        
}
#slider li.fourthanimation {
    -moz-animation:cyclefour 25s linear infinite;
    -webkit-animation:cyclefour 25s linear infinite;        
}
#slider li.fifthanimation {
    -moz-animation:cyclefive 25s linear infinite;
    -webkit-animation:cyclefive 25s linear infinite;        
}
 
#slider .tooltip {
    background:rgba(0,0,0,0.7);
    width:680px;
    height:40px;
    position:relative;
    bottom:85px;
    left:760px;
    -moz-transition:all 0.3s ease-in-out;
    -webkit-transition:all 0.3s ease-in-out;  
}
#slider .tooltip h1 {
    color:#fff;
    font-size:20px;
    font-weight:300;
    line-height:60px;
    padding:0 0 0 190px; 
}
#slider li#first:hover .tooltip,
#slider li#second:hover .tooltip,
#slider li#third:hover .tooltip,
#slider li#fourth:hover .tooltip,
#slider li#fifth:hover .tooltip {
    right:2px;
}
#slider:hover li,
#slider:hover .progress-bar {
    -moz-animation-play-state:paused;
    -webkit-animation-play-state:paused;
}
 
.progress-bar {
    position:relative;
    top:-5px;
    width:680px;
    height:5px;
    background:#000;
    -moz-animation:fullexpand 25s ease-out infinite;
    -webkit-animation:fullexpand 25s ease-out infinite;
}
</style>
        
        
        <div class="containerr">
	<div id="content-slider">
    	<div id="slider">
        	<div id="mask">
            <ul>
            
            
            
           	<li id="first" class="firstanimation">
            <a href="#">
            <img src="http://dl.1learn.ir/admin/posts/slider1/img_1.jpg" alt="Cougar"/>
            <p  >جوامممم مم ممم</p>
            </a>
            <div class="tooltip">
            <h1>متن تصویرممتن تصویرمتن تصویرمتن تصویرتن تصویر</h1>
            </div>
            </li>
 
 
 
            <li id="second" class="secondanimation">
            <a href="#">
            <img src="http://dl.1learn.ir/admin/posts/slider1/img_2.jpg" alt="Lions"/>
            </a>
            <div class="tooltip">
            <h1>متن تصویر</h1>
            </div>
            </li>




            <li id="third" class="thirdanimation">
            <a href="#">
            <img src="http://dl.1learn.ir/admin/posts/slider1/img_3.jpg" alt="Snowalker"/>
            </a>
            <div class="tooltip">
            <h1>متن تصویر</h1>
            </div>
            </li>


         
            <li id="fourth" class="fourthanimation">
            <a href="#">
            <img src="http://dl.1learn.ir/admin/posts/slider1/img_4.jpg" alt="Howling"/>
            </a>
            <div class="tooltip">
            <h1>متن تصویر</h1>
            </div>
            </li>


    
            <li id="fifth" class="fifthanimation">
            <a href="#">
            <img src="http://dl.1learn.ir/admin/posts/slider1/img_5.jpg" alt="Sunbathing"/>
            </a>
            <div class="tooltip">
            <h1>متن تصویر</h1>
            </div>
            </li>
            
            
            </ul>
            </div>
            
            
            <div class="progress-bar"></div>
        </div>
    </div>
</div>
        
        
        
-->


            <section id="box40" class="box highlights list list-clean list-bordered list-thumbs has-featured has-detail-comments desc-padding has-more has-more-bottom has-more-default no-header hidden-xs hidden-sm" style="" data-conf="{}">
                <header>
                    <h2 style=""><a href="#" target="_blank" title="آرشیو اخبار ویژه">اخبار ویژه</a>
                    </h2>
                </header>
                <div>
                    <ul>
                    

 
@foreach($org3 as $admin)
  
                                <li class="news">

<figure><a target="_blank" href="#" title="۲۳ دقیقه قبل">

<?php echo $admin->new_img; ?>
                                        </a></figure>
<div class="desc">
    <h4><a target="_blank" href="#"> </a></h4>
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>

<p>{{$admin->new_short}}</p><div class="comments"><a href="#" target="_blank">نظر بدهید</a><a href="#" target="_blank">نظرات منتشر شده: ۰</a><a href="#" target="_blank">نظرات در صف انتشار: ۰</a></div>
</div>
                                </li>

 
@endforeach
          
           
                    </ul>
                </div>
                
            <footer><a class="more" href="#">بیشتر</a></footer></section>
        </div>
        <div class="col-xs-12 col-ms-12 col-sm-4 col-md-3">
          
            <section class="tabs-container box" id="home-top"><ul class="nav nav-tabs" role="tablist"><li role="presentation" class="active"><a href="#box16" role="tab" data-toggle="tab">پربازدیدترین ها
                    </a></li><li role="presentation"><a href="#box62" role="tab" data-toggle="tab">پربحث‌ترین‌ها
                    </a></li>
                    
                    
 
                    
                    </ul><div class="tab-content"><section id="box16" class="box list list-bullets has-tabs no-title tab-pane fade active in" style="" data-conf="{&quot;tabGroup&quot;:&quot;home-top&quot;}" role="tabpanel">
                <header>
                    <h2 style=""><span>پربازدیدترین ها</span>
                    </h2>
                </header>
                <div>
                    <ul>

<li class="news" style="display:none"> </li>

<br>
 
@foreach($tab1 as $admin)
 


<li class="news"><div class="desc">
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
</div></li>
  
@endforeach
 

 

</ul>
                </div>
                
            </section><section id="box62" class="box list list-bullets has-tabs no-title tab-pane fade" style="" data-conf="{&quot;tabGroup&quot;:&quot;home-top&quot;}" role="tabpanel">
                <header>
                    <h2 style=""><span>پربحث‌ترین‌ها</span>
                    </h2>
                </header>
                <div>
                    <ul>

  


<li class="news" style="display:none"> </li>

<br>
@foreach($tab2 as $admin)
 
 

<li class="news"><div class="desc">
    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
</div></li>

 
@endforeach
 



                    </ul>
                </div>
                
            </section>
            
            
             
            
            </div></section>
            
              <section id="box56" class="box clean hidden-xs" data-conf="{}">
                <div style="">
                    <ul>
 @foreach($adsesleft as $adse)
 <li data-conf="{}" id="ad66_{{$adse->ads_id}}">
 <figure><a href="{{$adse->ads_link}}" rel="empty" target="_blank">
 <img src="{{env('APP_URL')}}/public/images/{{$adse->ads_img}}" alt="{{$adse->ads_name}}"></a></figure> </li>
 @endforeach
                    </ul>
                </div>
            </section>
            
            <section id="box117" class="box highlights list list-clean list-bordered list-thumbs has-featured hidden-md hidden-lg desc-padding" style="" data-conf="{}">
                <header>
                    <h2 style=""><span>اخبار ویژه</span>
                    </h2>
                </header>
                <div>
                    <ul>
                                <li class="news">
                                        <figure><a target="_blank" href="#" title="۲۳ دقیقه قبل">
                                            <img src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/2920502.jpg" alt="ارتش با فرماندهی نیروی قدس در سوریه حضور یافت/ جزئیاتی از حادثه هواپیمای اوکراینی و ناوچه کنارک/ در ۱۵ سال اخیر، آمریکا دو بار قصد حمله به ما داشت">
                                        </a></figure>
<div class="desc">
    <h4><a target="_blank" href="#">
        امیر پورشاسب در برنامه دست‌خط:
        
    </a></h4>
    <h3><a href="#" target="_blank" title="۲۳ دقیقه قبل">ارتش با فرماندهی نیروی قدس در سوریه حضور یافت/ جزئیاتی از حادثه هواپیمای اوکراینی و ناوچه کنارک/ در ۱۵ سال اخیر، آمریکا دو بار قصد حمله به ما داشت</a>
        
    </h3>
</div>
                                </li>
                                <li class="news">
                                        <figure><a target="_blank" href="#" title="۳ ساعت قبل">
                                            <img src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/2854913.jpg" alt="صعود دوباره مبتلایان روزانه کرونا/ ۱۴۴ بیمار کرونا جان خود را از دست دادند/ آمار فوتی‌های کرونا به مرز ۲۴۰۰۰ نفر رسید">
                                        </a></figure>
<div class="desc">
    <h4><a target="_blank" href="#">
        لاری خبر داد:
        
    </a></h4>
    <h3><a href="#" target="_blank" title="۳ ساعت قبل">صعود دوباره مبتلایان روزانه کرونا/ ۱۴۴ بیمار کرونا جان خود را از دست دادند/ آمار فوتی‌های کرونا به مرز ۲۴۰۰۰ نفر رسید</a>
        
    </h3>
</div>
                                </li>
                                
                                
                                
                                
                                 
                    </ul>
                </div>
                
            </section>
            
            
            
<!-- Mobile -->
            <section   class="box list list-bullets bullet-icons hidden-md hidden-lg "  >
                <header>
                    <h2 style=""><span>تازه‌های شبکه‌های اجتماعی</span>
                    </h2>
                </header>
                <div>
                    <ul>

<li class="twitter">
<div class="desc">
    <h3><a href="#" target="_blank" title="۸ دقیقه قبل">پسرفت زنان ایرانی نسبت به قبل از انقلاب</a> </h3>
</div> </li>

 
 <li class="telegram">
<div class="desc"> <h3><a href="#" target="_blank" title="۱ ساعت قبل">منصوریان آثار استقلال را از صفحه‌اش پاک کرد</a> </h3>
</div> </li>
                                
                     
 <li class="instagram">
<div class="desc">
    <h3><a href="#" target="_blank" title="۸ ساعت قبل">دعوت نماینده مجلس از مردم برای پیوستن به پویش ایران همدل +فیلم</a>
 </h3>
</div> </li> 

                    </ul>
                </div>
                
            </section>
            
            
            
            
            
            
            <section id="box68" class="box clean hidden-xs" data-conf="{}">
                <div style="">
                    <ul>
 @foreach($adsesdown as $adse)
 <li data-conf="{}" id="ad66_{{$adse->ads_id}}">
 <figure><a href="{{$adse->ads_link}}" rel="empty" target="_blank">
 <img src="{{env('APP_URL')}}/public/images/{{$adse->ads_img}}" alt="{{$adse->ads_name}}"></a></figure> </li>
 @endforeach
                    </ul>
                </div>
            </section>
            
            <section id="box21" class="box list list-bullets " style="" data-conf="{}">
                <header>
                    <h2 style=""><a href="#" target="_blank" title="آرشیو برگزیده اخبار">برگزیده اخبار</a>
                    </h2>
                </header>
                <div>
                    <ul>

<li class="news">
<div class="desc">
    
</div> </li>



@foreach($tab2 as $admin)
 

<li class="news"><div class="desc">

    <h3><a href="{{env('APP_URL')}}/new/{{$admin->new_id}}" target="_blank" title="">{{$admin->new_tit}}</a> </h3>
</div></li>

 
@endforeach              
                                
                          
                    </ul>
                </div>
                
            </section>
        </div>
    </div>
                </div>
            </div>
        </main>
        
        
@stop
        
        