<!DOCTYPE html> 
<html lang="fa" xmlns="http://www.w3.org/1999/xhtml" style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">




     @yield('title')
     
     
<script type="text/javascript"src="http://dl.1learn.ir/admin/1learn/1learn.js"></script>
<link rel="stylesheet" type="text/css" href="http://dl.1learn.ir/admin/posts/slider1/slider1.css" />

<meta name="description" content="{{Session::get('mngindexs')->ind_cont}}">


<meta name="keywords" content="{{Session::get('mngindexs')->ind_key}}">
 
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Language" content="fa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <meta property="nastooh:pageType" content="home">
 
 
    <meta property="og:site_name" content="{{Session::get('mngindexs')->ind_cont}}">
    <meta property="og:locale" content="fa"> 
    <meta name="language" content="fa">
    <meta name="rating" content="General"> 
    <meta name="expires" content="never">
    <meta name="publisher" content="{{Session::get('mngindexs')->ind_cont}}">
    <meta name="dc.publisher" content="{{Session::get('mngindexs')->ind_key}}"> 



</head>

<!--

body.muharram #header{background:#1d1c1c}

body.muharram #header>.container{background-image:url("{{env('APP_URL')}}/build/newsajency/ajencnews_files/img/logo_muharram.png")}



body.muharram #header>.container{background-image:url("{{env('APP_URL')}}/public/images/1601138879file_7463.jpg")}

-->



 
 <style>
 




body.muharram ::-webkit-input-placeholder{color:#ccc}body.muharram :-moz-placeholder{color:#ccc;opacity:1}body.muharram ::-moz-placeholder{color:#ccc;opacity:1}body.muharram :-ms-input-placeholder{color:#ccc}body.muharram ::-ms-input-placeholder{color:#ccc}body.muharram #header{background:#1d1c1c}


body.muharram #header>.container{background-image:url("{{env('APP_URL')}}/public/images/{{Session::get('mngindexs')->ind_header}}")}body.muharram #header .search input{background:#373535;color:#fff;border-color:#3b3939}body.muharram #header .search button{color:#aaa}body.muharram #menu{background:#706d6d;border-top-color:#1d1c1c}body.muharram #menu ul li .submenu{background:#3b3939}body.muharram #menu ul li .submenu:after,body.muharram #menu ul li .submenu:before{background:#3b3939}body.muharram #menu ul li .submenu li a{color:#fff}body.muharram #menu ul li.active,body.muharram #menu ul li:hover{background:#3b3939}body.muharram .box>header{background:#333}body.muharram .box>header h2,body.muharram .box>header h2 a{color:#fff}body.muharram .box.tabs-container .nav{background:#333}body.muharram .box.header-clean>header,body.muharram .box.header-clean>header h2,body.muharram .box.header-clean>header h2 a{background:transparent;color:#333}


@media (max-width:1199px){body.muharram #header>.container{background-image:url("{{env('APP_URL')}}/public/images/{{Session::get('mngindexs')->ind_headertablet}}")}}

 

@media (max-width:991px){body.muharram #header>.container{background-image:url("{{env('APP_URL')}}/public/images/{{Session::get('mngindexs')->ind_headermobile}}")}


body.muharram #menu ul li{background:#706d6d}body.muharram #menu ul li ul.submenu li{background:#3b3939}}@media (min-width:1200px){body,html{max-width:100vw;overflow-x:hidden}.box.cols.cols-6 ul li figure{max-height:110px;overflow:hidden}.box.cols.cols-6 ul li figure img{min-height:110px}}


@media (max-width:1199px){.wrapper{width:948px}body,html{max-width:100vw;overflow-x:hidden}#header>.container{background:url("{{env('APP_URL')}}/public/images/{{Session::get('mngindexs')->ind_himglog}}") no-repeat right top transparent}
ind_himglog


.box.cols.cols-6 ul li figure{max-height:90px;overflow:hidden}.box.cols.cols-6 ul li figure img{min-height:90px}.box.cols.cols-6 ul li h4{display:none}.box.cols.cols-6 ul li h3{font-size:13px}.box.cols.cols-3 ul li figure a{max-height:96px}.box.cols.cols-3 ul li figure a img{min-height:96px}.box.cols.cols-4 ul li figure a{max-height:150px}.box.cols.cols-4 ul li figure a img{min-height:150px}.box.list{padding:4px}.box.list:not(.clean):not(.no-title):not(.no-header)>header+div{padding-top:8px}.box.list>header{margin:-4px}.box.list.list-thumbs.first-featured ul li:first-child{padding:4px;margin:-4px}.box.grid ul li figure{max-height:200px}.box.grid ul li figure img{min-height:200px}.box.itemlist.cols-3 ul li figure{height:150px;overflow:hidden}.box.itemlist.cols-3 ul li figure img{min-height:150px;height:auto}.box.itemlist.cols-4 ul li figure{height:118px;overflow:hidden}.box.itemlist.cols-4 ul li figure img{min-height:118px;height:auto}}@media (max-width:991px){.wrapper{width:728px}#header{height:153px}#header [id^=toggle]{margin-top:3px}#header #toggle-search{float:left}#header .date{text-align:left}#header .search{display:none;float:none;margin:0}#header .search:before{position:fixed;display:block;content:'';background:rgba(0, 0, 0, 0.6);width:100%;height:100%;z-index:500;top:0;left:0}#header .search .close{position:fixed;top:0;left:0;z-index:501;width:60px;height:60px;line-height:60px;text-align:center;background:rgba(0, 0, 0, 0.6);font-size:40px}#header .search form{position:fixed;top:30%;left:50%;width:70vw;margin-left:-35vw;z-index:502}#header .search form input{height:60px;font-size:30px}#header .search form button{height:60px;width:60px;font-size:40px}#header .site-url{margin:0;display:none}#menu{height:45px;position:relative}#menu ul{display:none;width:50%;position:absolute;top:44px;max-height:400px;overflow:scroll;overflow-x:hidden}#menu ul li{float:none;background:#01a0e1;text-align:right;position:relative}#menu ul li .submenu-toggler{display:inline-block;width:20%;position:absolute;left:0;top:0;text-align:left;line-height:30px;padding-left:8px;color:#fff;z-index:100}#menu ul li ul.submenu{display:none;position:static;background:transparent;width:100%}#menu ul li ul.submenu:after,#menu ul li ul.submenu:before{display:none}#menu ul li ul.submenu li{background:#135390}.box.photo.cols ul li{width:100%!important;padding:0!important;margin:0!important}.box.photo.cols ul li .desc{padding:8px!important}.box.list.list-thumbs.thumbs-medium ul li figure{width:100%;margin-left:auto;margin-right:auto;float:none}.box.list.list-thumbs.thumbs-medium ul li .desc time{right:0}.box.grid ul li figure{max-height:150px}.box.grid ul li figure img{min-height:150px}.box.itemlist.cols-3 ul li figure{height:108px;overflow:hidden}.box.itemlist.cols-3 ul li figure img{min-height:108px;height:auto}.box.itemlist.cols-4 ul li figure{height:80px;overflow:hidden}.box.itemlist.cols-4 ul li figure img{min-height:80px;height:auto}.box.itemlist.cols-4 ul li .desc p,.box.itemlist.cols-4 ul li .desc time{display:none}.box.cols.cols-2.first-featured ul li{width:100%;float:none}.box.cols.cols-2.first-featured ul li figure a{max-height:none!important}.box.cols.cols-2.first-featured ul li figure a img{min-height:0!important}.box.cols.cols-4 ul li figure a{max-height:119px}.box.cols.cols-4 ul li figure a img{min-height:119px}.modal .modal-dialog{max-width:100%}}@media (max-width:767px){.wrapper{width:100%}#masthead{display:none}#header .date{margin-top:45px}.box.top ul li figure{float:none;width:100%;margin-right:auto;margin-left:auto}.box.secondary ul li{width:100%!important}.box.comments .comment-stats{float:none;margin-top:0;width:100%;margin-bottom:8px}.box.comments .comment-stats ul{text-align:center}.box.comments .comment-header .rating .rate{width:16px}.box.comments ul li ul .comment-header .meta .date{display:none}.box.comments ul li ul .comment-header .meta .author{width:70%}.box.comments ul li ul .comment-header .meta .flag{width:30%}.box.grid ul li figure{max-height:120px}.box.grid ul li figure img{min-height:120px}.box.itemlist.cols-3 ul li figure{height:80px;overflow:hidden}.box.itemlist.cols-3 ul li figure img{min-height:80px;height:auto}.box.itemlist.cols-3 ul li .desc p,.box.itemlist.cols-3 ul li .desc time{display:none}.box.itemlist.cols-4 ul li figure{height:65px;overflow:hidden}.box.itemlist.cols-4 ul li figure img{min-height:65px;height:auto}.box.itemlist.cols-4 ul li .desc p,.box.itemlist.cols-4 ul li .desc time{display:none}.box.item#item .item-summary figure{width:100%;float:none}.box.item#item .item-summary .introtext{margin:0}.box.cols.cols-3 ul li{width:100%;margin-bottom:8px}.box.cols.cols-3 ul li:after,.box.cols.cols-3 ul li:before{content:" ";display:table}.box.cols.cols-3 ul li:after{clear:both}.box.cols.cols-3 ul li:after,.box.cols.cols-3 ul li:before{content:" ";display:table}.box.cols.cols-3 ul li:after{clear:both}.box.cols.cols-3 ul li figure a{max-height:96px;width:145px;float:right;margin-left:8px}.box.cols.cols-3 ul li figure a img{min-height:96px}.box.cols.cols-4 ul li{width:50%}.box.cols.cols-4 ul li figure a{max-height:120px}.box.cols.cols-4 ul li figure a img{min-height:120px}.modal .modal-dialog{margin:10px 0}}
 	
 	
 	
 </style>




    <body class="body-rtl rtl  pt-home nt- muharram _lg" style="">
<header id="header">
    <div id="masthead" class="clearfix">
        <div class="container"  >
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                </div>
                <div class="col-xs-12 col-sm-6" >
                    <ul class="nav-menu">
                        <li><a href="#"><span class="glyphicon-rss"></span> RSS</a></li>
                        <li><a href="#"><span class="glyphicon-list"></span> آرشیو</a></li>
                        <li><a href="{{env('APP_URL')}}/page/1"><span class="glyphicon-envelope"></span> تماس با ما</a></li>
                        <li><a href="{{env('APP_URL')}}/page/2"><span class="glyphicon-info-circled"></span> دربارهٔ ما</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="logo col-xs-8 col-sm-8 col-md-4">
                <h1><a href="#">Ewaz  news</a></h1>
            </div>
            <div class="col-xs-4 head-date">
                <span class="date"> 
                
                  <?php 
 $string=jDate::forge()->format('d F Y');  
 
 $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
 $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
 $output= str_replace( $english,$persian , $string);
 

?> 
        {{$output}}         
                
                <span class="ltr">{{ date(' Y  F d') }}</span>
                </span>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 header-tools">
                <div class="search" id="header-search">
                    <div class="close hidden-md hidden-lg" data-toggle="toggle" data-target="#header-search">×</div>
                    <form method="get" action="#" role="form">
                        <div class="input-group">
                            <input type="text" placeholder="جستجو..." value="" name="q">
                            <button class="unstyled" type="submit"><i class="glyphicon-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="site-url">Ewaz<span>news</span></div>
            </div>
        </div>
    </div>

    <nav id="menu">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                        
@if(Session::get('idcategory')==0)
 <li class="active has-child"><span class="submenu-toggler"><i class="glyphicon-plus icon-plus"></i></span>                    
@else
<li class=""> 
@endif                            
                            
                                <a href="{{env('APP_URL')}}/">خانه</a>
                              
                            </li>


 <li class="active" > 
 <ul class="submenu" >
 <li class="bg-red active" > <a href="#">اطلاعیه :</a>  </li>
 <li class=" active" >
                                           
                                            	 
<style>
#marquee-block {
    width: 500px;
    margin: 0 auto;
    white-space: nowrap;
    overflow: hidden;
    box-sizing: border-box;
    background: #ccc;
    direction: rtl;
}
#marquee-text {
    display: inline-block;
    padding-right: 100%;
    animation: marquee 20s linear infinite;
}
#marquee-text:hover {
    animation-play-state: paused;
}
@keyframes marquee {
    0% {
        transform: translate(0, 0);
    }
    100% {
        transform: translate(100%, 0);
    }
}
</style>                                    	
                                            	
<div id="marquee-block">
<span id="marquee-text">

@foreach(Session::get('elanats') as $elanat)
 * {{$elanat->elanat_des}} 
 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endforeach
  
 </span>
</div>
 </li> 
 </ul>
 </li>
 

@foreach(Session::get('cats') as $cat)



@if(Session::get('idcategory')==$cat->cat_id)
 <li class="active has-child"><span class="submenu-toggler"><i class="glyphicon-plus icon-plus"></i></span>                    
@else
<li class=""> 
@endif    


<a href="{{env('APP_URL')}}/category/{{$cat->cat_id}}">{{$cat->cat_name}}</a>
<ul class="submenu"></ul></li>
@endforeach

 
                        
                        
                        
                        
                        </ul>
                        <button class="btn btn-default hidden-md hidden-lg" id="toggle-search" data-toggle="toggle" data-target="#header-search" data-focus="#header-search input"><i class="glyphicon-search"></i></button>
                        <button class="btn btn-default hidden-md hidden-lg" id="toggle-menu"><i class="glyphicon-menu"></i> </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>







 

     @yield('body')
     
                
                   
                
                
                

        <footer id="footer">
            <div class="container">
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
                <div class="responsive-tools row visible-xs">
                    <div class="col-xs-12">
                        <div class="toggle-versions">
				<a id="desktop-version" href="#" class="btn btn-info visible-xs">نسخه دسکتاپ</a>
				<a id="mobile-version" href="#" class="btn btn-info hidden-xs">نسخه موبایل</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                

   
<div class="col-xs-4  text  copyright ">         

				<div class="item-boxes">
 
 <section class="box clean related-items list list-bullets hidden-time header-clean">
 <p>
 <h3> پیوندها</h3>
 </p>
 <div>

<ul>


@foreach(Session::get('links') as $link)


<li class="news hot"><div class="desc">
 <h3><a href="{{$link->link_link}}" target="_blank" title="">{{$link->link_name}}</a> </h3>
</div></li> 

 
@endforeach  


									</ul>
								</div>
							</section> 
				</div>

 </div>
            
            
            
                
                
                
                    <div class="col-xs-8 text-center copyright">
                    
                    
                    <p>{{Session::get('mngindexs')->ind_fcopy}}</p>
 
                    </div>
                   
                </div>
            </div>
            <div class="totop" style="display: block; opacity: 1;">
                <i class="glyphicon-up"></i> بالا
            </div>
        </footer>
        
        
		<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/bootstrap.min.js.download"></script>
		<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/persian-date.js.download"></script>
		<script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/persian-datepicker-0.4.5.min.js.download"></script>
        <script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/3.3.6.min.js.download"></script>
        <script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/owl.carousel.min.js.download"></script>
        
        <script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/global-2.0.min.js.download"></script>
        
        
        
        <script src="{{env('APP_URL')}}/build/newsajency/ajencnews_files/main.min.js.download"></script>
    
</body></html>
 

 