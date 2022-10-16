<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use Crypt;
use Rule;
use Mail;
use jDate;    
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

public function settingindex($idset){ 

 Session::set('idcategory', $idset);

if($idset!='0'){
$categorys = \DB::table('cat') ->where('cat_id', '=', $idset)->orderBy('cat_id', 'asc')->first(); 
 Session::set('cat_name', $categorys->cat_name);
}


$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 

$cats = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'asc')->get(); 

$links = \DB::table('links') ->where('link_id', '<>', '0')->orderBy('link_id', 'asc')->get(); 
 
$elanats = \DB::table('elanats') ->where('elanat_id', '<>', '0')->orderBy('elanat_id', 'asc')->get(); 

	Session::set('mngindexs', $mngindexs);
	Session::set('cats', $cats);
	Session::set('elanats', $elanats);
	Session::set('links', $links);

 
 
 
 

}


public function indexnews(){ 


$idset=0; 

$h = new IndexController();
$h->settingindex($idset );

	
	
$alladmins = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,90) ->limit(55)->orderBy('new_id', 'desc')->get(); 


$admins = \DB::table('news') ->where('new_id', '<>', '0')->orderBy('new_id', 'desc')->get(); 


$tab1 = \DB::table('news') ->where('new_id', '<>', '0')->offset(12,17) ->limit(6)->orderBy('new_id', 'desc')->get(); 
 
$tab2 = \DB::table('news') ->where('new_id', '<>', '0')->offset(6,11) ->limit(6)->orderBy('new_id', 'desc')->get(); 
 
$tab3 = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,59) ->limit(25)->orderBy('new_id', 'desc')->get(); 
  
$org1 = \DB::table('news') ->where('new_id', '<>', '0')->offset(0,2) ->limit(2)->orderBy('new_id', 'desc')->get(); 
  
$org2 = \DB::table('news') ->where('new_id', '<>', '0')->offset(0,5) -> limit(5)->orderBy('new_id', 'desc')->get(); 
 
$org3 = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,47) ->limit(7)->orderBy('new_id', 'desc')->get(); 
 
 

$adsesright = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(0,1) ->limit(1)->orderBy('ads_id', 'desc')->get(); 

$adsesleft = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(1) ->limit(4)->orderBy('ads_id', 'desc')->get(); 
 

$adsesdown = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(5) ->limit(5)->orderBy('ads_id', 'desc')->get(); 
 


 return view('index.index'  , [ 'admins' => $admins , 'alladmins' => $alladmins ,    'tab1' => $tab1  ,    'tab2' => $tab2  ,    'tab3' => $tab3    ,    'org1' => $org1  ,    'org2' => $org2   ,    'org3' => $org3  ,    'adsesright' => $adsesright ,    'adsesleft' => $adsesleft ,    'adsesdown' => $adsesdown    ]); 

}
  



public function categoryid($id){ 
 
 
 
$idset=$id; 


$h = new IndexController();
$h->settingindex($idset );

	
 

$alladmins = \DB::table('news')  ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> limit(55)->orderBy('new_id', 'desc')->get(); 


$admins = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> orderBy('new_id', 'desc')->get(); 


$tab1 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(20,39) ->limit(25)->orderBy('new_id', 'desc')->get(); 
 
$tab2 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,19) ->limit(25)->orderBy('new_id', 'desc')->get(); 
 
$tab3 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(40,59) ->limit(25)->orderBy('new_id', 'desc')->get(); 
  
$org1 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,2) ->limit(2)->orderBy('new_id', 'desc')->get(); 
  
$org2 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,5) -> limit(5)->orderBy('new_id', 'desc')->get(); 
 
$org3 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(40,47) ->limit(7)->orderBy('new_id', 'desc')->get(); 
 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 

$cats = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'asc')->get(); 
 
$elanats = \DB::table('elanats') ->where('elanat_id', '<>', '0')->orderBy('elanat_id', 'asc')->get(); 
 


$adsesright = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 2], 
])->offset(0,1) ->limit(1)->orderBy('ads_id', 'desc')->get(); 

$adsesleft = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 2], 
])->offset(1) ->limit(4)->orderBy('ads_id', 'desc')->get(); 
 

$adsesdown = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 2], 
])->offset(5) ->limit(5)->orderBy('ads_id', 'desc')->get(); 

 

 return view('index.category'  , [ 'admins' => $admins , 'alladmins' => $alladmins ,    'tab1' => $tab1  ,    'tab2' => $tab2  ,    'tab3' => $tab3    ,    'org1' => $org1  ,    'org2' => $org2   ,    'org3' => $org3,    'id' => $id    ,    'adsesright' => $adsesright ,    'adsesleft' => $adsesleft ,    'adsesdown' => $adsesdown   ]); 

}
  




public function newid($newid){ 


$newid = \DB::table('news')  ->where([ 
    ['new_id','=' , $newid], 
])-> orderBy('new_id', 'desc')->first(); 

$id = $newid->new_catid; 
$idset=$id; 


$h = new IndexController();
$h->settingindex($idset );




$alladmins = \DB::table('news')  ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> limit(55)->orderBy('new_id', 'desc')->get(); 


$admins = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> orderBy('new_id', 'desc')->get(); 


$tab1 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(20,39) ->limit(25)->orderBy('new_id', 'desc')->get(); 
 
$tab2 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,19) ->limit(25)->orderBy('new_id', 'desc')->get(); 
 
$tab3 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(40,59) ->limit(25)->orderBy('new_id', 'desc')->get(); 
  
$org1 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,2) ->limit(2)->orderBy('new_id', 'desc')->get(); 
  
$org2 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(0,5) -> limit(5)->orderBy('new_id', 'desc')->get(); 
 
$org3 = \DB::table('news')   ->where([
    ['new_catid','=' , $id], 
    ['new_id','<>' , 0], 
])-> offset(40,47) ->limit(7)->orderBy('new_id', 'desc')->get(); 
 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 

$cats = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'asc')->get(); 
 
$elanats = \DB::table('elanats') ->where('elanat_id', '<>', '0')->orderBy('elanat_id', 'asc')->get(); 
 


$adsesright = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 3], 
])->offset(0,1) ->limit(1)->orderBy('ads_id', 'desc')->get(); 

$adsesleft = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 3], 
])->offset(1) ->limit(4)->orderBy('ads_id', 'desc')->get(); 
 

$adsesdown = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 3], 
])->offset(5) ->limit(5)->orderBy('ads_id', 'desc')->get(); 

 

 return view('index.newid'  , [ 'admins' => $admins , 'alladmins' => $alladmins ,    'tab1' => $tab1  ,    'tab2' => $tab2  ,    'tab3' => $tab3    ,    'org1' => $org1  ,    'org2' => $org2   ,    'org3' => $org3,    'id' => $id    ,    'adsesright' => $adsesright ,    'adsesleft' => $adsesleft ,    'adsesdown' => $adsesdown  ,    'newid' => $newid   ]); 

}
  
  
  
  
  

public function pageid($id){ 


$idset=0; 

$h = new IndexController();
$h->settingindex($idset );

	
	
$alladmins = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,90) ->limit(55)->orderBy('new_id', 'desc')->get(); 


$admins = \DB::table('news') ->where('new_id', '<>', '0')->orderBy('new_id', 'desc')->get(); 


$tab1 = \DB::table('news') ->where('new_id', '<>', '0')->offset(12,17) ->limit(6)->orderBy('new_id', 'desc')->get(); 
 
$tab2 = \DB::table('news') ->where('new_id', '<>', '0')->offset(6,11) ->limit(6)->orderBy('new_id', 'desc')->get(); 
 
$tab3 = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,59) ->limit(25)->orderBy('new_id', 'desc')->get(); 
  
$org1 = \DB::table('news') ->where('new_id', '<>', '0')->offset(0,2) ->limit(2)->orderBy('new_id', 'desc')->get(); 
  
$org2 = \DB::table('news') ->where('new_id', '<>', '0')->offset(0,5) -> limit(5)->orderBy('new_id', 'desc')->get(); 
 
$org3 = \DB::table('news') ->where('new_id', '<>', '0')->offset(40,47) ->limit(7)->orderBy('new_id', 'desc')->get(); 
 
 

$adsesright = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(0,1) ->limit(1)->orderBy('ads_id', 'desc')->get(); 

$adsesleft = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(1) ->limit(4)->orderBy('ads_id', 'desc')->get(); 
 

$adsesdown = \DB::table('adses')   ->where([ 
    ['ads_id','<>' , 0], 
    ['ads_catid','=' , 1], 
])->offset(5) ->limit(5)->orderBy('ads_id', 'desc')->get(); 
 


$page = \DB::table('pages')   ->where([ 
    ['page_id','<>' , 0], 
    ['page_id','=' , $id], 
]) ->orderBy('page_id', 'desc')->first(); 
 


 return view('index.pageid'  , [ 'admins' => $admins , 'alladmins' => $alladmins ,    'tab1' => $tab1  ,    'tab2' => $tab2  ,    'tab3' => $tab3    ,    'org1' => $org1  ,    'org2' => $org2   ,    'org3' => $org3  ,    'adsesright' => $adsesright ,    'adsesleft' => $adsesleft ,    'adsesdown' => $adsesdown ,    'page' => $page    ]); 

}
  
  
  
  
  
  
  
  
  
  



}