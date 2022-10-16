<?php

namespace App\Http\Controllers\Superadmin;

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

class SuperadminController extends Controller
{


	public function createcatsform(){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createcatsform'); return view('superadmin.addcatform');}	
else{ return redirect('superadmin/sign-in'); }
				}
				
				
				
				
public function createcatsformPost(Request $request){
if (Session::has('signsuperadmin')){    	    	
    	$this->validate($request,[
    			'name' => 'required',  
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید', 
    		]);   
    		 
DB::table('catform')->insert([
    [  'catf_name' => $request->name       ]
]);   
    	 
			 $nametr = Session::flash('statust', 'دسته بندی سایت باموفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewscatsform');
		   return redirect('superadmin/viewscatsform'); 
 }	
else{ return redirect('superadmin/sign-in'); }    	  
}
		
		
		
		
		

	public function subcatformdelet($id){
if (Session::has('signsuperadmin')){ Session::set('nav', 'addsubcatform'); 

		  	$admins = \DB::table('subcatform')->where('subcatf_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'زیرگروه دسته بندی باموفقیت حذف شد.');
		  	$nametrt = Session::flash('sessurl', 'addsubcatform');
		  		 return redirect('superadmin/addsubcatform'); 
}	
else{ return redirect('superadmin/sign-in'); }
}
			

	public function subcatformeditid($id){
if (Session::has('signsuperadmin')){ Session::set('nav', 'addsubcatform'); 

 $admins = \DB::table('subcatform')
->join('catform', 'subcatform.subcatf_catfid', '=', 'catform.catf_id')   ->where('subcatf_id', '=', $id)->first(); 


return view('superadmin.editsubcatform', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
}
	
			

	public function subcatformeditidpost(Request $request, $id){
if (Session::has('signsuperadmin')){ Session::set('nav', 'addsubcatform'); 

 $admins = \DB::table('subcatform')
->join('catform', 'subcatform.subcatf_catfid', '=', 'catform.catf_id')   ->where('subcatf_id', '=', $id)->first(); 


$imageName=$admins->subcatf_img; 

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }

 $updatee = \DB::table('subcatform')->where('subcatf_id', '=', $id)  ->update(['subcatf_name' => $request->name  , 'subcatf_des' => $request->des , 'subcatf_img' => $imageName  , 'subcatf_link' => $request->link  ]); 
 

		  	$nametr = Session::flash('statust', 'زیرگروه دسته بندی باموفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'addsubcatform');
		  		 return redirect('superadmin/addsubcatform'); 
}	
else{ return redirect('superadmin/sign-in'); }
}
	

	public function addsubcatform(){
if (Session::has('signsuperadmin')){ Session::set('nav', 'addsubcatform'); 
$admins = \DB::table('catform') ->orderBy('catf_id', 'desc')->get();
return view('superadmin.addsubcatform', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
}


public function addsubcatformpost(Request $request){
if (Session::has('signsuperadmin')){    	    	
  
    		 
DB::table('subcatform')->insert([
    [  'subcatf_name' => $request->name   ,  'subcatf_catfid' => $request->cat       ]
]);   
    	 
			 $nametr = Session::flash('statust', 'زیرگروه دسته بندی سایت باموفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewscatsform');
		   return redirect('superadmin/addsubcatform'); 
 }	
else{ return redirect('superadmin/sign-in'); }    	  
}
		
		
		

public function fechcatform($id){  

$countrys= \DB::table('catform')  ->where([ ['catf_id', '=',  $id] , ])->orderBy('catf_id', 'asc')->get();

foreach($countrys as $country){  
echo ' 
 <div class="form-group row">
 <label for="name" class="col-lg-3 col-form-label">زیرمجموعه '.$country->catf_name.'</label>
 <div class="col-lg-9">
 <input  name="name" type="text" class="form-control"   value="" required>
 </div>
 </div>';
  
	
}	
 }

		
		

public function fechtablecatform($id){  

$admins= \DB::table('subcatform')
->join('catform', 'subcatform.subcatf_catfid', '=', 'catform.catf_id')    ->where([ ['subcatf_catfid', '=',  $id] , ])->orderBy('subcatf_id', 'asc')->get();
$i=1;
if($admins){
	
foreach($admins as $admin){  
echo ' <tr class="gradeX">
 <td>'.$i.'</td>
 <td>'.$admin->catf_name.'</td> 
 <td>'.$admin->subcatf_name.'</td> 
<td><a href="subcatform/delet/'.$admin->subcatf_id.'"   ><span class="label label-danger"> حذف </span></a></td> 
<td><a href="subcatform/edit/'.$admin->subcatf_id.'"   ><span class="label label-primary"> ویرایش </span></a></td> 
 
  
 
 
 </tr>';
  
	$i++;
}
}	 

 }
public function fechtselectboxsubcatf($id){  

$admins= \DB::table('subcatform')
->join('catform', 'subcatform.subcatf_catfid', '=', 'catform.catf_id')    ->where([ ['subcatf_catfid', '=',  $id] , ])->orderBy('catform.catf_id', 'asc')->get();
 
if($admins){
echo ' 
 <div class="form-group row">
 <label for="name" class="col-lg-3 col-form-label">زیرمجموعه  </label>
 <div class="col-lg-9">
  <select      class="select2-placeholer form-control "   dir="rtl"     name="subcat"  required     > 
<option value=""  >لطفا انتخاب نمایید</option>  ';
 
  
foreach($admins as $admin){  
echo '<option value="'.$admin->subcatf_id.'" >'.$admin->subcatf_name.'</option>  
';
   
}

 echo '</select></div> </div>';
}	 

 }



	public function viewscatsform(){
if (Session::has('signsuperadmin')){ Session::set('nav', 'viewscatsform'); 
$admins = \DB::table('catform') ->orderBy('catf_id', 'desc')->get();
return view('superadmin.viewscatsform', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
}





	public function viewscatsformeditid($id){
if (Session::has('signsuperadmin')){ Session::set('nav', 'viewscatsform'); 
$admins = \DB::table('catform') ->where([ 
    ['catf_id', '=', $id],  ])
    ->orderBy('catf_id', 'desc')->get();
return view('superadmin.editcatform', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
}



public function viewscatsformeditpostid(Request $request  , $id){
if (Session::has('signsuperadmin')){    	    	
    	$this->validate($request,[
    			'name' => 'required',  
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید', 
    		]);   
    		  
 $updatee = \DB::table('catform')->where('catf_id', '=', $id)  ->update(['catf_name' => $request->name    ]); 

 $nametr = Session::flash('statust', 'دسته بندی باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewscatsform/edit/'.$id.'');	
	 return redirect('superadmin/viewscatsform'); 


 }	
else{ return redirect('superadmin/sign-in'); }    	  
}
		
		
		

	public function deletcatsformeditid($id){
		if (Session::has('signsuperadmin')){  
		  	$admins = \DB::table('catform')->where('catf_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'دسته بندی باموفقیت حذف شد.');
		  	$nametrt = Session::flash('sessurl', 'viewscatsform');
		  		 return redirect('superadmin/viewscatsform'); 
	}	
else{ return redirect('superadmin/sign-in'); }
				}
		






	public function createform(){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createform'); 
 
$admins = \DB::table('catform') ->orderBy('catf_id', 'desc')->get();

	return view('superadmin.createform', ['admins' => $admins  ]); }	
else{ return redirect('superadmin/sign-in'); }
				}
			


public function createformpost(Request $request){
if (Session::has('signsuperadmin')){    	    	
    	$this->validate($request,[
    			'subcat' => 'required', 
    			'name' => 'required|min:3', 
    			'des' => 'required|min:3'
    		],[
    			'subcat.required' => 'لطفا یک دسته بندی برای فرم خود ایجاد نمایید',
    			'name.required' => 'لطفا نام فرم را وارد نمایید',
    			'name.min' => 'نام کاربری شما باید بیشتر ازنام فرم کوتاه استکاراکتر باشد', 
    			'des.required' => 'لطفا توضیحات فرم را وارد نمایید',
    			'des.min' => ' توضیحات فرم کوتاه است', 
    		]);   
$imageName='';

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    } else {   }


$rnd=rand(1, 99999999); 

DB::table('form')->insert([
    [ 'form_rnd' => $rnd , 'form_subcat' => $request->subcat  , 'form_cat' => $request->cat  ,  'form_name' => $request->name ,   'form_date' =>  date('Y-m-d H:i:s') , 'form_des' => $request->des  , 'form_img' => $imageName  ,  'form_linkname' => $request->form_linkname      ]
]);   

 
    		
$myCheckboxes = $request->input('field_name');  
 

$field_values_array = $_REQUEST['field_name'];	
$ii=count($field_values_array);	
$i=0;
while($i<$ii) {	
$checkBox = implode(' , ' , $_REQUEST['field_name']);
$checkBoxe = implode(' , ' , $_REQUEST['field_namee']);
$pieces = explode(" , ", $checkBox);
$piecese = explode(" , ", $checkBoxe);
$s0=$pieces[$i];
$s0e=$piecese[$i];

DB::table('list')->insert([
    [ 'list_rnd' => $rnd , 'list_name' => $s0 ,  'list_pan' => $s0e ,   'list_date' =>  date('Y-m-d H:i:s') , 'list_typ' => 0 ,'list_aro' => 0 , 'list_chk' => $i       ]
]);   
$i++;
}
  return redirect('superadmin/formtype/'.$rnd.'');
    		
} else{ return redirect('superadmin/sign-in'); }
				}
			
			
			
	public function formtypeid($id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createform');


$form = \DB::table('form')  
->where([ 
    ['form.form_rnd', '=', $id], ])
    ->orderBy('form.form_id', 'asc')->first();
    
$admins = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['form.form_rnd', '=', $id], ])
    ->orderBy('list.list_id', 'asc')->get();

	return view('superadmin.formtypeid', ['admins' => $admins ,'form' => $form  ]);  }	
else{ return redirect('superadmin/sign-in'); }
				}
			


			
	public function formtypeidpost($id , Request $request){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'field_typ.*' => 'required',  
    		],[ 
    			'field_typ.required' => 'لطفا نوع فیلد را وارد نمایید ',      
    			
    		]);
    		
 

$myCheckboxes = $request->input('field_typ'); 

$i=0;
if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {
	
	$updatee = \DB::table('list')->where([
    ['list.list_aro', '=', 0],
    ['list.list_rnd', '=', $id],
    ['list.list_chk', '=', $i], ])
    ->update(['list_typ' => $quan   ]); 
    
	
	$i++;	 
	
	} 
	}

   return redirect('superadmin/selectpriceform/'.$id.'');
 }	
else{ return redirect('superadmin/sign-in'); }
				}



			
	public function selectpriceformid($id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createform');


$form = \DB::table('form')  
->where([ 
    ['form.form_rnd', '=', $id], ])
    ->orderBy('form.form_id', 'asc')->first();
    
$admins = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['form.form_rnd', '=', $id], ])
    ->orderBy('list.list_id', 'asc')->get();

	return view('superadmin.selectpriceformid', ['admins' => $admins ,'form' => $form  ]);  }	
else{ return redirect('superadmin/sign-in'); }
				}
			



			
	public function selectpriceformidpost($id , Request $request){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'price' => 'required',  
    		],[ 
    			'price.required' => 'لطفا فیلد هزینه را انتخاب نمایید ',      
    			
    		]);
 
 
$updatee = \DB::table('list')->where([
    ['list.list_aro', '=', 0],
    ['list.list_rnd', '=', $id],
    ['list.list_id', '=', $request->price], ])
    ->update(['list_price' => 1   ]); 

			 $nametr = Session::flash('statust', 'فرم مربوطه باموفقیت ایجاد شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms');
		
 return redirect('superadmin/viewsforms'); 

 
 }	
else{ return redirect('superadmin/sign-in'); }
				}



		
	public function viewsforms(){
if (Session::has('signsuperadmin')){ Session::set('nav', 'viewsforms'); 
$admins = \DB::table('form') ->where([
    ['form.form_id', '<>', 0],  ])
    ->orderBy('form_id', 'desc')->get();
return view('superadmin.viewsforms', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
}



			
	public function viewsformseditid($id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'viewsforms');


$form = \DB::table('form')  
->where([ 
    ['form.form_rnd', '=', $id], ])
    ->orderBy('form.form_id', 'asc')->first();
    
$admins = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['form.form_rnd', '=', $id], ])
    ->orderBy('list.list_chk', 'asc')->get();
    
$formselects=0;
    
$formchecks=0;
    
$deletes = \DB::table('sortfild')    
->where([  
    ['sort_id', '<>', 0], ])->delete(); 
$i=0;  
 foreach($admins as $admin){
 	
 	
DB::table('sortfild')->insert([
 [  'sort_rnd' => $id ,  'sort_listid' => $admin->list_id ,   'sort_listchk' => $admin->list_chk ,   'sort_number' => $i  ]
]);   



$updatee = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([ 
    ['form.form_rnd', '=', $id], 
    ['list.list_chk', '=', $admin->list_chk], ])->update([  'list_n' => $admin->list_chk   ]);
     	
 $i++;	
 	
 if($admin->list_typ=='8'){
	

$formselects = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id') 
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 8],
    ['formselect.formselect_rnd', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->get();
    
    
 } 
 
 
 
 
 
    
 if($admin->list_typ=='9'){
	
$formchecks = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 9],
    ['form.form_rnd', '=', $id], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->get();
     
}
 
 
 
 
 
  }
    
    
$catforms = \DB::table('catform') ->orderBy('catf_id', 'desc')->get();



$currency = \DB::table('currency') ->orderBy('id', 'desc')->get();

 

foreach($currency as $cur){
	
 $listcurs = \DB::table('listcur')->where([
    ['listcur.listcur_idrnd','=' , $id],  
    ['listcur.listcur_idcur','=' , $cur->id], 
    ['listcur.listcur_idrnd','<>' , 0], 
])->first();


if(empty($listcurs)){
DB::table('listcur')->insert([
    [  'listcur_idcur' => $cur->id  , 'listcur_idrnd' => $id           ]
]);  	
}


$listcurrency = \DB::table('listcur')
->leftJoin('currency', 'listcur.listcur_idcur', '=', 'currency.id') ->where([
    ['listcur.listcur_idrnd','=' , $id], 
])->orderBy('id', 'asc')->get();


	
} 
 
 /*

if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {   
 

 $updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id], 
    ['listcur.listcur_idcur','=' , $quan],   
])->update(['listcur_idcur' =>   '1'     ]); 


DB::table('listcur')->insert([
    [  'listcur_idcur' => $quan , 'listcur_idrnd' => $id           ]
]);  
    		 
	 
  } 
  } 
*/



	return view('superadmin.editform', ['admins' => $admins ,'form' => $form ,'catforms' => $catforms  ,'formselects' => $formselects  ,'formchecks' => $formchecks  ,'listcurrency' => $listcurrency   ,'currency' => $currency  ]);  }	
else{ return redirect('superadmin/sign-in'); }
				}
			

	public function viewsformseditidpost($id , Request $request){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'viewsforms');

 
$this->validate($request,[ 
    			'cat' => 'required', 
    			'name' => 'required',  
    			'des' => 'required',  
    		],[ 
    			'cat.required' => 'لطفا یک دسته بندی برای فرم خود ایجاد نمایید',
    			'name.required' => 'لطفا نام فرم را وارد نمایید ', 
    			'des.required' => 'لطفا توضیحات فرم را وارد نمایید ',      
    			
    		]);
 
$form = \DB::table('form')  
->where([ 
    ['form.form_rnd', '=', $id], ])
    ->orderBy('form.form_id', 'asc')->first();
    $imageName=$form->form_img;
    
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }  

 
$updatee = \DB::table('form')->where([ ['form_rnd', '=', $id],  ]) ->update([  'form_name' => $request->name  , 'form_subcat' => $request->subcat  , 'form_cat' => $request->cat  ,  'form_des' => $request->des   ,  'form_img' => $imageName  ,  'form_linkname' => $request->form_linkname   ]); 

			 $nametr = Session::flash('statust', 'فرم مربوطه باموفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms');
	
 return redirect('superadmin/viewsforms'); 
 
 }	
else{ return redirect('superadmin/sign-in'); }
				}







	
	public function addfeild($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'field_name.*' => 'required',  
    		],[ 
    			'field_name.required' => 'لطفا نام فیلد را وارد نمایید ',      
    			
    		]);


$chkfirst = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([ 
    ['form.form_rnd', '=', $id], 
    ['list.list_aro', '=', 0],])
    ->orderBy('list.list_chk', 'desc')->first();
    
    $chki=$chkfirst->list_chk;

$myCheckboxes = $request->input('field_name');  
  
$field_values_array = $_REQUEST['field_name'];	
$ii=count($field_values_array);	
$i=0;
while($i<$ii) {	
$checkBox = implode(' , ' , $_REQUEST['field_name']);
$checkBoxe = implode(' , ' , $_REQUEST['field_namee']);
$pieces = explode(" , ", $checkBox);
$piecese = explode(" , ", $checkBoxe);
$s0=$pieces[$i];
$s0e=$piecese[$i];
$chki++;

DB::table('list')->insert([
    [ 'list_rnd' => $id , 'list_name' => $s0 ,  'list_pan' => $s0e ,   'list_date' =>  date('Y-m-d H:i:s') , 'list_typ' => 1 ,'list_aro' => 0 , 'list_chk' => $chki       ]
]);   
$i++;
}
  
			 $nametr = Session::flash('statust', 'فیلد مربوطه به فرم اضافه گردید.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$id.'');
		
 return redirect('superadmin/viewsforms/edit/'.$id.''); 
 }	
else{ return redirect('superadmin/sign-in'); }
				}


	
	public function sortfeild($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'field_name.*' => 'required',  
    			'field_chk.*' => 'required',  
    		],[ 
    			'field_name.required' => 'فیلد نمی تواند خالی باشد ', 
    			'field_chk.required' => 'لطفا اولویت را مشخص نمایید ',      
    			
    		]);
    		
    		 
 
 
/*
$field_values_array = $_REQUEST['field_chk'];	
$ii=count($field_values_array);	
*/
$i=0;


$sortfilds = \DB::table('sortfild')    
->where([ 
    ['sort_rnd', '=', $id], 
    ['sort_id', '<>', 0], ])
    ->orderBy('sort_number', 'asc')->get();



foreach($sortfilds as $sortfild){
 
 
$fildsortid='field_chkhide'.$sortfild->sort_listid;
 $sort_listidhide=$request->$fildsortid;
 
$fildsortid='field_chk'.$sortfild->sort_listid; 
 $sort_listid=$request->$fildsortid;
	 
	$updatee = \DB::table('list')->where([ 
    ['list_rnd', '=', $id],  ['list_n', '=', $sortfild->sort_listchk]    ])
    ->update([  'list_chk' => $sort_listid   ]); 
	 
	//echo $sort_listid.'<br>';
	
 $i++;
}
  
 
 
 
 /*
 
$admins = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([ 
    ['form.form_rnd', '=', $id],  ])
    ->orderBy('list.list_id', 'asc')->get();
    
    $j=0;
    
    foreach($admins as $admin){
	
	$updatee = \DB::table('list')->where([ 
    ['list_rnd', '=', $id],  ['list_id', '=', $admin->list_id],   ])
    ->update([ 'list_chk' => $j   ]); 
	
	$j++;
}

    */
     
			 $nametr = Session::flash('statust', 'فیلدهای فرم مربوطه با موفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$id.'');
		
 return redirect('superadmin/viewsforms/edit/'.$id.''); 
		   
		 
 }	
else{ return redirect('superadmin/sign-in'); }
				}



	
	public function addselectfeild($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'field_tit' => 'required',
    			'field_name.*' => 'required',  
    		],[ 
    			'field_tit.required' => 'لطفا عنوان اینپات را وارد نمایید ',    
    			'field_name.required' => 'لطفا نام گزینه را وارد نمایید ',      
    			
    		]);


$chkfirst = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([ 
    ['form.form_rnd', '=', $id], 
    ['list.list_aro', '=', 0],])
    ->orderBy('list.list_chk', 'desc')->first();
    
    
    $chki=$chkfirst->list_chk; $chkii=$chki+1;
    
DB::table('list')->insert([
    [ 'list_rnd' => $id , 'list_name' => $request->field_tit , 'list_typ' => 8 ,'list_aro' => 0 , 'list_chk' => $chkii  ,   'list_date' =>  date('Y-m-d H:i:s')      ]
]);  


$formilistd = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([ 
    ['form.form_rnd', '=', $id], 
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 8],])
    ->orderBy('list.list_chk', 'desc')->first();

$formselect_formilistd = $formilistd->list_id;

 

$myCheckboxes = $request->input('field_name');  
  
$field_values_array = $_REQUEST['field_name'];	
$ii=count($field_values_array);	
$i=0;
while($i<$ii) {	
$checkBox = implode(' , ' , $_REQUEST['field_name']); 
$pieces = explode(" , ", $checkBox); 
$s0=$pieces[$i]; 
$chki++;

DB::table('formselect')->insert([
    [ 'formselect_rnd' => $id , 'formselect_name' => $s0 , 'formselect_formilistd' => $formselect_formilistd   , 'formselect_value' => $i       ]
]);   
$i++;
}
  
			 $nametr = Session::flash('statust', 'سلکت اینپات باموفقیت به فرم اضافه شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$id.'');
		 
 return redirect('superadmin/viewsforms/edit/'.$id.''); 
 }	
else{ return redirect('superadmin/sign-in'); }
				}



	
	public function editfeldformid($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'field_typ.*' => 'required',  
    		],[ 
    			'field_typ.required' => 'لطفا نوع فیلد را وارد نمایید ',      
    			
    		]);
    		
 

$myCheckboxes = $request->input('field_typ'); 

$i=0;
if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {
	
	$updatee = \DB::table('list')->where([
    ['list.list_aro', '=', 0],
    ['list.list_rnd', '=', $id],
    ['list.list_chk', '=', $i], ])
    ->update(['list_typ' => $quan   ]); 
    
	
	$i++;	 
	
	} 
	}
			 $nametr = Session::flash('statust', 'فیلدهای فرم مربوطه با موفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$id.'');
		
 return redirect('superadmin/viewsforms/edit/'.$id.''); 
 }	
else{ return redirect('superadmin/sign-in'); }
				}





		
	public function deletidfeild($id,$idfeild){
		if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
		  	$admins = \ DB::table('user')->where('id', $id)->get();
		  	
		  	
$admins = \DB::table('list')    
->where([ 
    ['list.list_rnd', '=', $id], 
    ['list.list_id', '=', $idfeild], ])
    ->orderBy('list.list_id', 'asc')->get();
		  	
		  	
$admins = \DB::table('list')    
->where([ 
    ['list.list_rnd', '=', $id], 
    ['list.list_id', '=', $idfeild], ])->delete(); 
		  	$nametr = Session::flash('statust', 'فیلد مربوطه باموفقیت حذف شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$id.'');
		  	
 return redirect('superadmin/viewsforms/edit/'.$id.''); 
	}	
else{ return redirect('superadmin/sign-in'); }
				}
		
		





		
	public function editselectbox($id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'viewsforms');
 
$formselects=0;
    
$formselects = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->get();
    
$formselectfirst = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->first();
     

$listfirst = \DB::table('list')  
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('list.list_rnd', 'asc')->first();
     
	return view('superadmin.editselectbox', [ 'formselects' => $formselects ,  'formselectfirst' => $formselectfirst ,  'listfirst' => $listfirst  ]);  }	
else{ return redirect('superadmin/sign-in'); }
				}
			


	
	public function editselectboxpost($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'name' => 'required', 
    		],[ 
    			'name.required' => 'لطفا عنوان اینپات را وارد نمایید ',          
    			
    		]);

 

$formselects = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->get();
$m=0;$plass=1;
if($formselects){
foreach($formselects as $formselect){

$checkBox = implode(' , ' , $_REQUEST['formselect_name']); 
$pieces = explode(" , ", $checkBox); 
$m0=$pieces[$m]; 



	$updatee = \DB::table('formselect')->where([ 
    ['formselect_value', '=', $m],  ])
    ->update(['formselect_name' => $m0   ]); 
    $m++;
$formselect_value = $formselect->formselect_value;


}
}
 

$formselectfirst = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->first();


$listfirst = \DB::table('list')  
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 8],
    ['list.list_id', '=', $id], ])
    ->orderBy('list.list_rnd', 'asc')->first();

$formselect_formilistd = $listfirst->list_id;
$formselect_rnd = $listfirst->form_rnd;  

 

$myCheckboxes = $request->input('field_name');  
  
$field_values_array = $_REQUEST['field_name'];	
$ii=count($field_values_array);	

if(empty($formselects)){ $formselect_value = 0; $plass = 0; }

$j=$formselect_value+$plass;
$i=0;
while($i<$ii) {	
$checkBox = implode(' , ' , $_REQUEST['field_name']); 
$pieces = explode(" , ", $checkBox); 
$s0=$pieces[$i]; 
 
if($s0!=''){
	
DB::table('formselect')->insert([
    [ 'formselect_rnd' => $formselect_rnd , 'formselect_name' => $s0 , 'formselect_formilistd' => $formselect_formilistd   , 'formselect_value' => $j       ]
]);   
}
$i++;
$j++;
}
  
			 $nametr = Session::flash('statust', 'گزینه ها با موفقیت به سلکت باکس اضافه شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$formselect_rnd.'');
		
 return redirect('superadmin/viewsforms/edit/'.$formselect_rnd.''); 
 }	
else{ return redirect('superadmin/sign-in'); }
				}

		


	
	public function editcheckboxpost($id , Request $request){
if (Session::has('signsuperadmin')){ 
 if(Session::get('idsuperadmin')!='1'){ return redirect('superadmin/accessadmin');   } 
	Session::set('nav', 'createform');

 
$this->validate($request,[ 
    			'name' => 'required', 
    		],[ 
    			'name.required' => 'لطفا عنوان اینپات را وارد نمایید ',          
    			
    		]);

 

$formselects =  \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->get();
$m=0;$plass=1;
if($formselects){
foreach($formselects as $formselect){

$checkBox = implode(' , ' , $_REQUEST['formselect_name']); 
$pieces = explode(" , ", $checkBox); 
$m0=$pieces[$m]; 
 
	$updatee = \DB::table('formcheckbox')->where([ 
    ['formcheckbox_value', '=', $m],  ])
    ->update(['formcheckbox_name' => $m0   ]); 
    $m++;
$formselect_value = $formselect->formcheckbox_value;

	
}
}
 

$formselectfirst = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->first();
    
    
    
$listfirst = \DB::table('list')  
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('list.list_rnd', 'asc')->first();

$formselect_formilistd = $listfirst->list_id;
$formselect_rnd = $listfirst->form_rnd;  

 

$myCheckboxes = $request->input('field_name');  
  
$field_values_array = $_REQUEST['field_name'];	
$ii=count($field_values_array);	


if(empty($formselects)){ $formselect_value = 0; $plass = 0; }

$j=$formselect_value+$plass;
$i=0;
while($i<$ii) {	
$checkBox = implode(' , ' , $_REQUEST['field_name']); 
$pieces = explode(" , ", $checkBox); 
$s0=$pieces[$i]; 
 
if($s0!=''){
	
DB::table('formcheckbox')->insert([
    [ 'formcheckbox_rnd' => $formselect_rnd , 'formcheckbox_name' => $s0 , 'formcheckbox_formilistd' => $formselect_formilistd   , 'formcheckbox_value' => $j       ]
]);   
}
$i++;
$j++;
}
  
			 $nametr = Session::flash('statust', 'گزینه ها با موفقیت به چک باکس اضافه شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsforms/edit/'.$formselect_rnd.'');

 return redirect('superadmin/viewsforms/edit/'.$formselect_rnd.''); 

 }	
else{ return redirect('superadmin/sign-in'); }
				}



	public function deletselectbox($id){
		if (Session::has('signsuperadmin')){  
$formselectfirst = \DB::table('formselect') 
->join('list', 'formselect.formselect_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 8],
    ['formselect.formselect_id', '=', $id], ])
    ->orderBy('formselect.formselect_id', 'asc')->first();

$formselect_formilistd = $formselectfirst->list_id;
		  	$admins = \DB::table('formselect')->where('formselect_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف فیلد با موفقیت انجام شد.');
		  	 
 $nametrt = Session::flash('sessurl', 'viewsforms/editselectbox/'.$formselect_formilistd.'');
		  	
	return view('superadmin.success', ['admins' => $admins]);
	}	
else{ return redirect('superadmin/sign-in'); }
				}
		
	public function deletcheckbox($id){
		if (Session::has('signsuperadmin')){  
$formselectfirst = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0],
    ['list.list_typ', '=', 9],
    ['formcheckbox.formcheckbox_id', '=', $id], ])
    ->orderBy('formcheckbox.formselect_id', 'asc')->first();

$formselect_formilistd = $formselectfirst->list_id;
		  	$admins = \DB::table('formcheckbox')->where('formcheckbox_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف فیلد با موفقیت انجام شد.');
		  	 
 $nametrt = Session::flash('sessurl', 'viewsforms/editcheckbox/'.$formselect_formilistd.'');
		  	
 return redirect('superadmin/viewsforms/editcheckbox/'.$formselect_formilistd.''); 
	}	
else{ return redirect('superadmin/sign-in'); }
				}
		




public function addcurinformid($id , Request $request){
if (Session::has('signsuperadmin')){    

 
	$updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id],   
])->update([  'listcur_flg' =>   '0'     ]); 

$myCheckboxes = $request->input('cur');  

if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {    
	$updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id], 
    ['listcur.listcur_idcur','=' , $quan],   
])->update([  'listcur_flg' =>   '1'     ]);  
  }  } 
  
 


$listcurrency = \DB::table('listcur')
->leftJoin('currency', 'listcur.listcur_idcur', '=', 'currency.id') ->where([
    ['listcur.listcur_idrnd','=' , $id], 
])->orderBy('id', 'asc')->get();

foreach($listcurrency as $cur){ 
    	$req='price'; $reqname=$req.$cur->id; 
        $postdate=$request->$reqname;
        
	$updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id], 
    ['listcur.listcur_idcur','=' , $cur->id],   
])->update([    'listcur_price' =>  $postdate     ]);   
        
}

        
        





 $nametr = Session::flash('statust', ' کارنسی های جدید باموفقیت ویرایش شدند.');
 $nametrt = Session::flash('sessurl', 'viewsforms');


 return redirect('superadmin/viewsforms/edit/'.$id); 

	}	 else{ return redirect('superadmin/sign-in'); } }
		





		
	public function editcheckbox($id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'viewsforms');
 
$formselects=0;
    
$formselects = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->get();
    
$formselectfirst = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->first();
    
    
$listfirst = \DB::table('list')  
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['list.list_typ', '=', 9],
    ['list.list_id', '=', $id], ])
    ->orderBy('list.list_rnd', 'asc')->first();
     
	return view('superadmin.editcheckbox', [ 'formselects' => $formselects ,  'formselectfirst' => $formselectfirst  ,  'listfirst' => $listfirst  ]);  }	
else{ return redirect('superadmin/sign-in'); }
				}
			


			
	public function viewsformseditidstat($stat , $id){
if (Session::has('signsuperadmin')){ 
	Session::set('nav', 'viewsforms');

if($stat=='0'){$statee=1; 
			 $nametr = Session::flash('statust', 'فرم باموفقیت فعال شد.');} else {$statee=0;
			 
			 $nametr = Session::flash('statust', 'فرم باموفقیت غیرفعال شد.');}

	$updatee = \DB::table('form')->where([ 
    ['form_rnd', '=', $id],  ])
    ->update(['form_active' => $statee   ]); 
    
		  	$nametrt = Session::flash('sessurl', 'viewsforms');
		
 return redirect('superadmin/viewsforms'); 

 }	
else{ return redirect('superadmin/sign-in'); }
				}
			




				
			

public function signin(){ 
 return redirect('manage/superadmin/sign-in'); 	 
 }
	
public function login($mng){ 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
 return view('mng.login'  , [ 'mngindexs' => $mngindexs , 'mng'=> $mng   ]); 
 }
	
	
	
	 
    public function loginpost($mng , Request $request)
    {
    	$this->validate($request,[
    			'firstname' => 'required',
    			'lastname' => 'required'
    		],[
    			'firstname.required' => 'لطفا نام کاربری را وارد نمایید',
    			'lastname.required' => 'لطفا رمز ورود را وارد نمایید',
    			
    		]);
	//$output = false;
	//$key =  env('APP_KEY');
	//$iv = md5($key);
	//$output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $request->lastname, MCRYPT_MODE_CBC, $iv);
	//$output = base64_encode($output);
	
//$encryptedPassword =  Crypt::encrypt($request->lastname);


if($mng=='superadmin'){  Session::set('arou', 'superadmin');



$superadmins = DB::table('superadmins')->where([
    ['superadmin_username',  $request->firstname],
])->first();
if($superadmins){

$password_db= $superadmins->superadmin_userpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
$userscou = DB::table('superadmins')->where([
    ['superadmin_username',  $request->firstname],
])->count();
$id_db= $superadmins->id;
$username_db= $superadmins->superadmin_username; 
$password_db= $superadmins->superadmin_userpassword; 
$username_log = $request->firstname; 
if(($username_log == $username_db)&&( $decryptedPassword == $request->lastname)){
	

$adminslp = \DB::table('superadmins')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->superadmin_logindate;	
$supimg=$adminslp->superadmin_img;	

	Session::set('namemng', $superadmins->superadmin_name );
	Session::set('idsuperadmin', $id_db);
	Session::set('signsuperadmin', $username_db);	
	Session::set('logindatepas', $logindatepas);
	Session::set('supimg', $supimg);
	
 $updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_logindate' => date('Y-m-d H:i:s') ,    'superadmin_ip' => $request->ip()  ]); 
	
 Session::set('flagpanel', '1');
 return redirect('manage/superadmin/dashboard'); 
 } else{
  $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
 return redirect('manage/superadmin/sign-in'); 	
 } 

 } else if(empty($superadmins)) {
 $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
 return redirect('manage/superadmin/sign-in'); 
 }
		
 }		
		
	
	
	
	

if($mng=='admin'){  Session::set('arou', 'admin');
 
$superadmins = DB::table('admins')->where([
    ['admin_username',  $request->firstname],
])->first();
if($superadmins){

$password_db= $superadmins->admin_password; 
$decryptedPassword =  Crypt::decrypt($password_db);
$userscou = DB::table('admins')->where([
    ['admin_username',  $request->firstname],
])->count();
$id_db= $superadmins->id;
$username_db= $superadmins->admin_username; 
$password_db= $superadmins->admin_password; 
$username_log = $request->firstname; 
if(($username_log == $username_db)&&( $decryptedPassword == $request->lastname)){
	

$adminslp = \DB::table('admins')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->admin_loginatdate;	
$supimg=$adminslp->admin_img;	

	Session::set('namemng', $superadmins->admin_name );
	Session::set('idmanager', $id_db);
	Session::set('signadmin', $username_db);	
	Session::set('logindatepas', $logindatepas);
	Session::set('supimg', $supimg);
	
 $updatee = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->update(['admin_loginatdate' => date('Y-m-d H:i:s') ,    'admin_ip' => $request->ip()  ]); 
	
 Session::set('flagpanel', '1');
 return redirect('manage/admin/dashboard'); 
 } else{
  $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
 return redirect('manage/admin/sign-in'); 	
 } 

 } else if(empty($superadmins)) {
 $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
 return redirect('manage/admin/sign-in'); 
 }
		
 }		
		
	
	
	
	
	
		
    }

	 
	

	public function superadminsignout($mng){	
	
if($mng=='superadmin'){  Session::set('arou', 'superadmin');
	Session::forget('idsuperadmin');	
	Session::forget('signsuperadmin');
	Session::forget('logindatepas');
	Session::forget('supimg');
	Session::forget('idimg');
	Session::forget('tickreadprofessorsup');
	Session::forget('namemng');
		return redirect('manage/'.$mng.'/sign-in');
}

		}

 
public function test_number(){
	
	$res=convert_number('26900');
	
   return view('mng.number'  , [ 'res' => $res     ]); 
	 
	
	}

public function convert_number(  $number){
	

        $ones = array("", "یک",'دو&nbsp;', "سه", "چهار", "پنج", "شش", "هفت", "هشت", "نه", "ده", "یازده", "دوازده", "سیزده", "چهارده", "پانزده", "شانزده", "هفده", "هجده", "نونزده");
        $tens = array("", "", "بیست", "سی", "چهل", "پنجاه", "شصت", "هفتاد", "هشتاد", "نود");
        $tows = array("", "صد", "دویست", "سیصد", "چهارصد", "پانصد", "ششصد", "هفتصد", "هشتصد", "نهصد");
 
 
        if (($number < 0) || ($number > 999999999)) {
			throw new Exception("Number is out of range");
		}
		$Gn = floor($number / 1000000);
		/* Millions (giga) */
		$number -= $Gn * 1000000;
		$kn = floor($number / 1000);
		/* Thousands (kilo) */
		$number -= $kn * 1000;
		$Hn = floor($number / 100);
		/* Hundreds (hecto) */
		$number -= $Hn * 100;
		$Dn = floor($number / 10);
		/* Tens (deca) */
		$n = $number % 10;
		/* Ones */
		$res = "";
		if ($Gn) {
			$res .= $this->convert_number($Gn) .  " میلیون و ";
		}
		if ($kn) {
			$res .= (empty($res) ? "" : " ") .$this->convert_number($kn) . " هزار و";
		}
		if ($Hn) {
			$res .= (empty($res) ? "" : " ") . $tows[$Hn] . " و ";
		}
		if ($Dn || $n) {
			if (!empty($res)) {
				$res .= "";
			}
			if ($Dn < 2) {
				$res .= $ones[$Dn * 10 + $n];
			} else {
				$res .= $tens[$Dn];
				if ($n) {
					$res .= " و " . $ones[$n];
				}
			}
		}
		if (empty($res)) {
			$res = "صفر";
		}
		$res=rtrim($res," و");
	 return $res;
  
	//Session::set('res', $res);
	
   //return view('mng.number'  , [ 'res' => $res ,  'number' => $number     ]); 
	 
	
	}



public function dashboard($mng){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}


 
 $plan='mnggiftcart';
 
$h = new SuperadminController();
$h->planevalidate($plan);


$h = new SuperadminController();
$h->viewalertnot();



$giftcards = \DB::table('subcatform')  ->where([
    ['subcatform.subcatf_id','<>' , 0], 
    ['subcatform.subcatf_catfid','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('subcatf_catfid', 'desc')->get();
 

$admins  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id')  ->where([
    ['user.id', '<>',  0],  ])
    ->orderBy('req_id', 'desc')->get(); 


 Session::set('nav', 'dashboard'); 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
 return view('mng.dashboard'  , [ 'mngindexs' => $mngindexs ,  'mng' => $mng  ,  'admins' => $admins    ,  'giftcards' => $giftcards ,  'plan' => $plan   ]); 
 
 
 
 }
		 
		 
	
 








public function viewsonlineshopssup($mng, $plan){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}




$h = new SuperadminController();
$h->planevalidate($plan);


 if($plan=='all'){ $rabt='<>';   $catf_id=0;  }  else {
 	 $rabt='=';  $catf_id=Session::get('subcatf_catfid'); 
 }
 
 

 
   
$admins  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id')   
->join('form', 'myrequest.req_linkname', '=', 'form.form_linkname') 
->join('subcatform', 'form.form_subcat', '=', 'subcatform.subcatf_id') 
->join('catform', 'subcatform.subcatf_catfid', '=', 'catform.catf_id')   ->where([
    ['user.id', '<>',  0],   
    ['catform.catf_id', $rabt,  $catf_id],  ])
    ->orderBy('req_id', 'desc')->get(); 
 
    /*
$admins  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id')     ->where([
    ['user.id', '<>',  0],  ])
    ->orderBy('req_id', 'desc')->get(); 
     */
         
 Session::set('nav', 'viewsonlineshops'); 
  

 return view('mng.viewsonlineshops'  , [    'mng' => $mng , 'admins' => $admins      ]); 
 }
		 
		 
	
public function viewsonlineshopsuseridplansupdelett( $mng , $req_linkname , $req_id , $plan){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}


 
  
         
   //   ['myrequest.req_userid', '=',  Session::get('iduser')], 
		  	
		  	
$updatee = \DB::table('myrequest') ->where([
    ['myrequest.req_linkname', '=',  $req_linkname],  
    ['myrequest.req_id', '=',  $req_id], 
    ['myrequest.req_flg', '=',  0], 
    ['myrequest.req_plan', '=',  $plan],  ])
  ->delete(); 
    
		  	
		  	$nametr = Session::flash('statust', 'حذف سفارش با موفقیت انجام شد.');
		  	
		  	
 return redirect('manage/'.$mng.'/viewsonlineshops/all'); 
 }
		 
		 
	
	 
	
	
public function viewsonlineshopsuseridplansup( $mng , $req_linkname , $req_id , $plan ){

  
$typ='2';
$link=$req_id;
$req=$req_linkname;
$plan=$plan;
$h = new SuperadminController();
$h->showupdatealert($typ,$link,$req,$plan);

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}

 

 $rnd=rand(1, 99999999);   
 

$updatee = \DB::table('myrequest') ->where([ 
    ['myrequest.req_linkname', '=',  $req_linkname],  
    ['myrequest.req_id', '=',  $req_id], 
    ['myrequest.req_plan', '=',  $plan],  ])
    ->update(['req_rnd' => $rnd ]); 
    

 Session::set('nav', 'viewsonlineshops'); 
$provinces =0; 
$citys =0;
$formdatas=0;$alllists=0;

  
$myrequest  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id') ->where([ 
    ['myrequest.req_linkname', '=',  $req_linkname],  
    ['myrequest.req_id', '=',  $req_id], 
    ['myrequest.req_plan', '=',  $plan],  ])
    ->orderBy('req_id', 'desc')->first(); 


$form = \DB::table('form')  
->where([ 
    ['form.form_linkname', '=',  $req_linkname], ])
    ->orderBy('form.form_id', 'asc')->first();

 

$admins = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([
    ['list.list_aro', '=', 1], 
    ['form.form_linkname', '=',  $req_linkname],
    ['list.list_myreqid', '=',  $req_id], ])
    ->orderBy('list.list_chk', 'asc')->get();
    
    
    
$alllists = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd')  
->where([
    ['list.list_aro', '=', 0], 
    ['form.form_linkname', '=',  $req_linkname], ])
    ->orderBy('list.list_chk', 'asc')->get();



if(($plan=='buywithcardinsite')||($req_linkname=='mastercarthediye')||($req_linkname=='visacarthedye')){
	 
$formdatas = \DB::table('myrequest') 
->join('formdata', 'myrequest.req_id', '=', 'formdata.formdata_reqid')  
->where([
    ['myrequest.req_id', '<>', 0], 
    ['myrequest.req_id', '=',  $req_id], ])
    ->orderBy('myrequest.req_id', 'asc')->get();
	
	}



if($plan=='viscartfisics'){

$admins = \DB::table('myrequest') 
->join('formdata', 'myrequest.req_id', '=', 'formdata.formdata_reqid')  
->where([
    ['myrequest.req_id', '<>', 0], 
    ['myrequest.req_id', '=',  $req_id], ])
    ->orderBy('myrequest.req_id', 'asc')->get();
    
$provinces = \DB::table('province')  
->where([
    ['province.id', '<>', 0],  ])
    ->orderBy('province.id', 'asc')->get();
    
$citys = \DB::table('city')  
->where([
    ['city.city_id', '<>', 0],  ])
    ->orderBy('city.city_id', 'asc')->get();


}

    
    
    $lists=0;
if($plan=='test'){
	

$lists = \DB::table('form') 
->join('list', 'form.form_rnd', '=', 'list.list_rnd') 
->join('myrequest', 'list.list_myreqid', '=', 'myrequest.req_id')  
->where([ 
    ['form.form_linkname', '=',  $req_linkname],  
    ['myrequest.req_id', '=',  $req_id],  ])
    ->orderBy('list.list_chk', 'asc')->get();
    }
    
    
$reqs = \DB::table('form')  
->join('myrequest', 'form.form_linkname', '=', 'myrequest.req_linkname')  
->where([ 
    ['form.form_linkname', '=',  $req_linkname],   
    ['myrequest.req_id', '=',  $req_id],  ])
    ->orderBy('myrequest.req_id', 'asc')->first();
    
$form_rnd=$form->form_rnd;

 

    
$formselects=0;
$formchecks=0;
$reqchecks=0;
  
    
    
if(($plan!='buywithcardinsite')&&($plan!='viscartfisics')){

 foreach($admins as $admin){
 if($admin->list_typ=='8'){
	

$formselects = \DB::table('formselect') 
->join('list', 'formselect.formselect_id', '=', 'list.list_name')
->join('myrequest', 'list.list_myreqid', '=', 'myrequest.req_id')  
->where([
    ['list.list_aro', '=', 1],
    ['list.list_typ', '=', 8],
    ['myrequest.req_id', '=',  $req_id],  
    ['formselect.formselect_rnd', '=', $form_rnd], ])
    ->orderBy('formselect.formselect_id', 'asc')->get();
    
    
 }
 
 
 
    
 if($admin->list_typ=='9'){
	
$formchecks = \DB::table('formcheckbox') 
->join('list', 'formcheckbox.formcheckbox_formilistd', '=', 'list.list_id')
->join('form', 'list.list_rnd', '=', 'form.form_rnd')  
->join('myrequest', 'list.list_myreqid', '=', 'myrequest.req_id')  
->where([
    ['list.list_aro', '=', 1], 
    ['list.list_typ', '=', 9],
    ['myrequest.req_id', '=',  $req_id],  
    ['form.form_rnd', '=', $form_rnd], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->get();
    
    
 
$reqchecks = \DB::table('reqcheck') 
->join('formcheckbox', 'reqcheck.rchk_formchkid', '=', 'formcheckbox.formcheckbox_id')
->join('myrequest', 'reqcheck.rchk_reqid', '=', 'myrequest.req_id') 
->join('list', 'reqcheck.rchk_listid', '=', 'list.list_id')
->where([ 
    ['list.list_aro', '=', 1], 
    ['myrequest.req_id', '=',  $req_id],  
    ['reqcheck.rchk_rndform', '=', $form_rnd], ])
    ->orderBy('formcheckbox.formcheckbox_id', 'asc')->get();
    
     
}
  }
    	
}




$listcurrency = \DB::table('listcur')
->leftJoin('currency', 'listcur.listcur_idcur', '=', 'currency.id')  ->where([ 
    ['listcur.listcur_flg','=' , 1], 
])->orderBy('id', 'asc')->get();
 
  

return view('mng.onlineshopsid', ['admins' => $admins ,'form' => $form ,'myrequest' => $myrequest ,'lists' => $lists ,'reqs' => $reqs    ,'formselects' => $formselects  ,'formchecks' => $formchecks   ,'reqchecks' => $reqchecks    ,'listcurrency' => $listcurrency  ,'plan' => $plan   ,'citys' => $citys   ,'provinces' => $provinces  ,'formdatas' => $formdatas ,'alllists' =>   $alllists    ,'req_id' =>    $req_id    ,'mng' =>    $mng  ,'req_linkname' =>     $req_linkname  ]);        
     



    
    

 } 


	
	
	
	
	
	
	


public function mnggiftcart($mng,$plan){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
$h = new SuperadminController();
$h->planevalidate($plan);



$giftcards = \DB::table('subcatform')  ->where([
    ['subcatform.subcatf_id','<>' , 0], 
    ['subcatform.subcatf_catfid','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('subcatf_catfid', 'desc')->get();

 return view('mng.mngplan'  , [   'mng' => $mng   ,  'giftcards' => $giftcards ,  'plan' => $plan     ]); 
 }
		 
		 
		 

public function mnggiftcartid($mng,$plan , $id){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}

 
$h = new SuperadminController();
$h->planevalidate($plan);


$subcatform = \DB::table('form') 
->leftJoin('subcatform', 'form.form_subcat', '=', 'subcatform.subcatf_id') ->where([
    ['form.form_id','<>' , 0], 
    ['form.form_subcat','=' , $id], 
    ['form.form_cat','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('form_id', 'asc')->first();



$giftcards = \DB::table('form') ->where([
    ['form.form_id','<>' , 0], 
    ['form.form_subcat','=' , $id], 
    ['form.form_cat','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('form_id', 'asc')->get();



$listcurrency = \DB::table('listcur')
->leftJoin('currency', 'listcur.listcur_idcur', '=', 'currency.id')  ->where([ 
    ['listcur.listcur_flg','=' , 1], 
])->orderBy('id', 'asc')->get();
 




 return view('mng.mngplanid'  , [  'mng' => $mng   ,  'giftcards' => $giftcards    ,  'subcatform' => $subcatform    ,  'listcurrency' => $listcurrency       ,  'plan' => $plan     ]); 
 }
		 
		 
	
		 

public function mnggiftcartidedit($mng,$plan , $id){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}


 
$h = new SuperadminController();
$h->planevalidate($plan);


$giftcards = \DB::table('form') ->where([
    ['form.form_id','<>' , 0], 
    ['form.form_rnd','=' , $id], 
    ['form.form_cat','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('form_id', 'desc')->first();
 
 $catform = \DB::table('catform')  ->where('catf_id', '=',  Session::get('subcatf_catfid'))->get(); 
 $subcatform = \DB::table('subcatform')  ->where('subcatf_catfid', '=',  Session::get('subcatf_catfid'))->get(); 
 
 
$listcurrency = \DB::table('listcur')
->leftJoin('currency', 'listcur.listcur_idcur', '=', 'currency.id')  ->where([  
    ['listcur.listcur_idrnd','=' , $id],   
    ['listcur.listcur_flg','=' , 1], 
])->orderBy('id', 'asc')->first();



$currency = \DB::table('currency') ->orderBy('id', 'desc')->get();
  



 return view('mng.editplan'  , [   'mng' => $mng   ,  'giftcards' => $giftcards    ,  'catform' => $catform    ,  'subcatform' => $subcatform    ,  'listcurrency' => $listcurrency   ,  'currency' => $currency     ,  'plan' => $plan          ]); 
 }
		 
		 
		 
		 
		 

public function mnggiftcartideditpost($mng,$plan,$id,Request $request){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 
$h = new SuperadminController();
$h->planevalidate($plan);





$forms = \DB::table('form') ->where([
    ['form.form_id','<>' , 0], 
    ['form.form_rnd','=' , $id], 
    ['form.form_cat','=' ,  Session::get('subcatf_catfid')], 
])->orderBy('form_id', 'desc')->first();

$imageName=$forms->form_img;

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    } else {   }

$updatee =\DB::table('form') ->where([
    ['form.form_id','<>' , 0], 
    ['form.form_rnd','=' , $id], 
    ['form.form_cat','=' ,  Session::get('subcatf_catfid')], 
])->update([  'form_des' => $request->des  ,   'form_img' => $imageName ]); 


	$updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id],   
])->update([  'listcur_flg' =>   '0' ,   'listcur_price' =>   '0'     ]); 

	$updatee = \DB::table('listcur') ->where([
    ['listcur.listcur_idrnd','=' , $id],   
    ['listcur.listcur_idcur','=' , $request->cur],   
])->update([  'listcur_flg' =>   '1' ,   'listcur_price' =>  $request->price     ]); 

  
 
$nametr = Session::flash('statust', 'اطلاعات پلن باموفقیت ویرایش شد.');
$nametrt = Session::flash('sessurl', 'mnggiftcart'); 
return redirect('manage/'.$mng.'/plane/'.$plan.'/'.$id.'/edit'); 

 }
		 
	
		 
		 


public function validatesuperadmin(){  
  
  
  
    Session::set('nameadmin', 'مدیریت کل'); 
    
	Session::set('arou', 'superadmin');  
	Session::set('accessadmin_admin', '1');	
	Session::set('accessadmin_user', '1');	  
	Session::set('accessadmin_ticket', '1');	
	Session::set('accessadmin_finical', '1');	 
	Session::set('accessadmin_sefaresh', '1');		
	
	
	Session::set('accessadmin_giftcard', '1');
	Session::set('accessadmin_paypall', '1');
	Session::set('accessadmin_skrill', '1');
	Session::set('accessadmin_visacart', '1');
	Session::set('accessadmin_visacartfisic', '1');
	Session::set('accessadmin_credcard', '1');
	Session::set('accessadmin_service', '1');
	Session::set('mngform', '1');
	
	
  }




public function validatemanager(){ 
 
$acc = \DB::table('accessadmins')->where('accessadmin_idadmin', '=',  Session::get('idmanager'))  ->orderBy('accessadmin_idadmin', 'desc')->first();	


	Session::set('arou', 'admin'); 	
	Session::set('accessadmin_admin', 0);
	Session::set('accessadmin_user', $acc->accessadmin_user);	  
	Session::set('accessadmin_ticket', $acc->accessadmin_ticket);	
	Session::set('accessadmin_finical', $acc->accessadmin_finical);	 
	Session::set('accessadmin_sefaresh', $acc->accessadmin_sefaresh);
	
	Session::set('accessadmin_giftcard', $acc->accessadmin_giftcard);
	Session::set('accessadmin_paypall', $acc->accessadmin_paypall);
	Session::set('accessadmin_skrill', $acc->accessadmin_skrill);
	Session::set('accessadmin_visacart', $acc->accessadmin_visacart);
	Session::set('accessadmin_visacartfisic', $acc->accessadmin_visacartfisic);
	Session::set('accessadmin_credcard', $acc->accessadmin_credcard);
	Session::set('accessadmin_service', $acc->accessadmin_service);
	Session::set('mngform', '0');
	
	
	 
		
 }



public function viewalertnot(){ 
   
 
$admins  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['user.id', '<>',  0], 
    ['alert.type', '<>',  15], 
    ['alert.show', '=',  0],  ])
    ->orderBy('alert_id', 'desc')->limit(5)->get(); 
    
    
$countalert  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['user.id', '<>',  0], 
    ['alert.type', '<>',  15], 
    ['alert.show', '=',  0],  ])
    ->orderBy('alert_id', 'desc')->count(); 
    
 Session::set('countalert', $countalert);  
 
 
$countalert  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['user.id', '<>',  0], 
    ['alert.type', '=',  14], 
    ['alert.show', '=',  0],  ])
    ->orderBy('alert_id', 'desc')->count();  
 Session::set('countalert14', $countalert);  
 
 
$countalert  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['user.id', '<>',  0], 
    ['alert.type', '=',  2], 
    ['alert.show', '=',  0],  ])
    ->orderBy('alert_id', 'desc')->count();  
 Session::set('countalert2', $countalert);  
 
 
$countalert  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['user.id', '<>',  0], 
    ['alert.type', '=',  1], 
    ['alert.show', '=',  0],  ])
    ->orderBy('alert_id', 'desc')->count();  
 Session::set('countalert1', $countalert);  
 
 
 
 
 
 Session::set('alertnotf', $admins);  
    
$tickread = DB::table('user') 
->join('ticket', 'user.id', '=', 'ticket.tik_fromid')->where([
    ['tik_fromarou', '=', 4],
    ['tik_toarou', '=', 2],
    ['tik_tosh', '=', 1],
    ['tik_toread', '=', 0],])
    ->orderBy('ticket.id', 'desc')->count();
	Session::set('tickreadstudentsup', $tickread);   
    
 
 
 }
	 

public function planevalidate($plan){ 
 
if($plan=='mnggiftcart'){ 
 Session::set('titplan', 'گیفت کارتها'); 
 Session::set('nav', 'mnggiftcart');  
 Session::set('subcatf_catfid', '7');   
 }
if($plan=='mngvisacart'){
 Session::set('titplan', 'ویزاکارتها');
 Session::set('nav', 'mngvisacart'); 
 Session::set('subcatf_catfid', '8'); 
 }
if($plan=='mngpaypal'){
 Session::set('titplan', 'پی پال');
 Session::set('nav', 'mngpaypal'); 
 Session::set('subcatf_catfid', '9'); 
 }
if($plan=='mngskrill'){
 Session::set('titplan', 'اسکریل');
 Session::set('nav', 'mngskrill'); 
 Session::set('subcatf_catfid', '10'); 
 }
if($plan=='visacartfisic'){
 Session::set('titplan', 'ویزا کارت فیزیکی');
 Session::set('nav', 'visacartfisic'); 
 Session::set('subcatf_catfid', '11'); 
 }
if($plan=='buywithcardinsite'){
 Session::set('titplan', 'پرداخت در سایتهای خارجی');
 Session::set('nav', 'buywithcardinsite'); 
 Session::set('subcatf_catfid', '12'); 
 }
if($plan=='allservice'){
 Session::set('titplan', 'تمام سرویس ها');
 Session::set('nav', 'allservice'); 
 Session::set('subcatf_catfid', '13'); 
 }
 
 }
		 

public function profile($mng){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'profile'); 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();


if($mng=='superadmin'){ 
$superadmins = \DB::table('superadmins') ->where('id', '=', Session::get('idsuperadmin'))->orderBy('id', 'desc')->first();  
$crpt = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first(); 
$oldpassword=$crpt->superadmin_userpassword; 
$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
$vblade='profile';
}


if($mng=='admin'){ 
$superadmins = \DB::table('admins') ->where('id', '=', Session::get('idmanager'))->orderBy('id', 'desc')->first();  
$crpt = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->orderBy('id', 'desc')->first(); 
$oldpassword=$crpt->admin_password; 
$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
$vblade='myprofileadmin';}



 return view('mng/'.$vblade  , [ 'mngindexs' => $mngindexs  , 'superadmins' => $superadmins  , 'decryptedPassword' => $decryptedPassword    ]); 
 
 
 } 
 
 
 
 
	public function profilesecretipost( $mng , Request $request ){ 



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 
 
$nametr = Session::flash('err', '1');


 
    	$this->validate($request,[
    			'nowpass' => 'required',
    			'userpassword' => 'required|min:5|max:35|confirmed', 
    		],[
    			'nowpass.required' => 'لطفا رمزعبور فعلی را وارد نمایید',
    			'userpassword.required' => 'لطفا رمزعبور جدید را وارد نمایید',
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.confirmed' => 'رمزعبور باهم مطابقت ندارد', 
    		]); 


 
 
$admins = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
 
$decryptedPasswordnow =  Crypt::decrypt($admins->superadmin_userpassword);


 if($request->nowpass!=$decryptedPasswordnow){
 	$nametr = Session::flash('statusterror', 'رمزعبور فعلی اشتباه وارد شده است');
 	return  redirect('manage/'.Session::get('arou').'/viewsusers/profile');
 }
 
 
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->update(['superadmin_userpassword' => $encryptedPassword   ]); 

  
$nametr = Session::flash('statust', 'رمزعبور باموفقیت تغییر پیدا کرد'); 
 
 	return  redirect('manage/'.Session::get('arou').'/profile');
	
	
	
	
	}
 
 	
	public function profilepost( $mng , Request $request ){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


//$nametr = Session::flash('err', '1');


$this->validate($request,[
    			'username' => 'required|min:3|max:35',
    			'tell' => 'required|numeric',
    			'email' => 'required|email',
    			'file'  => 'max:1000', 
    		],[
    			'username.required' => 'نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری کوتاه است',
    			'username.max' => 'نام کاربری غیرقابل قبول است',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.numeric' => 'شماره غیرقابل قبول است',
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		

if($mng=='superadmin'){  
$admins = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first(); 
$imageName=$admins->superadmin_img;  
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    } 
$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_name' => $request->name , 'superadmin_username' => $request->username ,  'superadmin_tell' => $request->tell ,  'superadmin_email' => $request->email ,  'superadmin_ip' => $request->ip()  ,  'superadmin_img' => $imageName  ]); 
Session::set('supimg', $imageName);
}



 if($mng=='admin'){ 
$admins = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->orderBy('id', 'desc')->first(); 
$imageName=$admins->admin_img;  
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    } 
$updatee = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->update(['admin_name' => $request->name , 'admin_username' => $request->username ,  'admin_tell' => $request->tell ,  'admin_email' => $request->email ,  'admin_ip' => $request->ip()  ,  'admin_img' => $imageName  ]); 
Session::set('supimg', $imageName);
 
 }






 
			 $nametr = Session::flash('statust', 'اطلاعات پروفایل من باموفقیت ویرایش شد.'); 
 
 
 return redirect('manage/'.$mng.'/profile'); 
 
}	  


 

public function addelan(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addelan');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 return view('mng.addelan'  , [ 'mngindexs' => $mngindexs     ]); 
 }}




	public function addelanpost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'des' => 'required', 
    		],[
    			'des.required' => 'لطفا متن اطلاعیه را وارد نمایید',
    			
    		]);
    		
    		
    		
 
    		
DB::table('elanats')->insert([
    [  'elanat_des' => $request->des  ,   'elanat_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', ' اطلاعیه جدید باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewselan');

 return redirect('superadmin/viewselan'); 
 }}
 



public function viewselan(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewselan');  
$admins = \DB::table('elanats') ->where('elanat_id', '<>', '0')->orderBy('elanat_id', 'desc')->get(); 
 return view('mng.viewselan'  , [ 'admins' => $admins     ]); 
 }}
 



	public function deletelanid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('elanats')->where([
    ['elanats.elanat_id','=' , $id], 
    ['elanats.elanat_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'اطلاعیه باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewselan');			  	 
 return redirect('superadmin/viewselan');  
 
}   }

 
 

public function addlink(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addlink');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 return view('mng.addlink'  , [ 'mngindexs' => $mngindexs     ]); 
 }}




 public function addlinkpost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا عنوان سایت را وارد نمایید',
    			
    		]);
    		
    		
    		

$mystring = $request->link; $findme   = 'http'; $pos = strpos($mystring, $findme);
  if ($pos !== false) {  $mystring = $request->link; }else{ $mystring = 'http://'.$request->link; }
    		
DB::table('links')->insert([
    [  'link_name' => $request->name ,  'link_link' => $mystring ,   'link_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', 'پیوند جدید باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewslink');

 return redirect('superadmin/viewslink'); 
 }}
 



public function viewslink(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewslink');  
$admins = \DB::table('links') ->where('link_id', '<>', '0')->orderBy('link_id', 'desc')->get(); 
 return view('mng.viewslink'  , [ 'admins' => $admins     ]); 
 }}
 



	public function deletlinkid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('links')->where([
    ['links.link_id','=' , $id], 
    ['links.link_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'لینک باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewslink');			  	 
 return redirect('superadmin/viewslink');  
 
}   }



 

public function addads(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addads');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 return view('mng.addads'  , [ 'mngindexs' => $mngindexs     ]); 
 }}




	public function addadspost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام تبلیغات را وارد نمایید',
    			
    		]);
    		

$imageName='';
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
    		
    		

$mystring = $request->link;
    $findme   = 'http';
    $pos = strpos($mystring, $findme);
 
    if ($pos !== false) {  $mystring = $request->link; }else{
		$mystring = 'http://'.$request->link;
	}
    		
DB::table('adses')->insert([
    [  'ads_name' => $request->name ,   'ads_img' =>$imageName ,   'ads_catid' => $request->catid ,  'ads_link' => $mystring ,   'ads_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', ' تبلیغات جدید باموفقیت ثبت شد');
 $nametrt = Session::flash('sessurl', 'viewsads');

 return redirect('superadmin/viewsads'); 
 }}
 



public function viewsads(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewsads');  
$admins = \DB::table('adses') ->where('ads_id', '<>', '0')->orderBy('ads_id', 'desc')->get(); 
 return view('mng.viewsads'  , [ 'admins' => $admins     ]); 
 }}
 



	public function deletadsid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('adses')->where([
    ['adses.ads_id','=' , $id], 
    ['adses.ads_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'تبلیغات باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewsads');			  	 
 return redirect('superadmin/viewsads');  
 
}   }





public function addcat(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addcat');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 return view('mng.addcat'  , [ 'mngindexs' => $mngindexs     ]); 
 }}
 

	public function addcatpost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید',
    			
    		]);
    		
    		
DB::table('cat')->insert([
    [  'cat_name' => $request->name ,   'cat_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', 'دسته بندی باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewscats');

 return redirect('superadmin/viewscats'); 
 }}
 
 
 

public function viewscats(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewscats');  
$admins = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'desc')->get(); 
 return view('mng.viewscats'  , [ 'admins' => $admins     ]); 
 }}
 
	
	public function deletcatid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('cat')->where([
    ['cat.cat_id','=' , $id], 
    ['cat.cat_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'دسته بندی باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewscats');			  	 
 return redirect('superadmin/viewscats');  
 
}   }
		
		

	public function editcatidpost($id , Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید',
    			
    		]);
    		
    		
 
$updatee = \DB::table('cat')->where('cat_id', '=', $id)  ->update(['cat_name' => $request->name ]); 

 
    		 
 $nametr = Session::flash('statust', 'دسته بندی باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewscats');

 return redirect('superadmin/viewscats'); 
 }}
 
 
 
public function addpage(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addpage');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 return view('mng.addpage'  , [ 'mngindexs' => $mngindexs     ]); 
 }}




 public function addpagepost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا عنوان صفحه را وارد نمایید',
    			
    		]);
    		
    		
    	 	
DB::table('pages')->insert([
    [  'page_name' => $request->name   ,  'page_des' => $request->des   ,   'page_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', 'صفحه جدید باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewspage');

 return redirect('superadmin/viewspage'); 
 }}
 



public function viewspage(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewspage');  
$admins = \DB::table('pages') ->where('page_id', '<>', '0')->orderBy('page_id', 'desc')->get(); 
 return view('mng.viewspage'  , [ 'admins' => $admins     ]); 
 }}
 


 public function pageidpost( $id ,  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 


$updatee = \DB::table('pages')->where('page_id', '=', $id)  ->update([   'page_name' => $request->name    ,  'page_des' => $request->des      ]); 

  
    		 
 $nametr = Session::flash('statust', 'صفحه باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewspage');

 return redirect('superadmin/viewspage'); 
 }}
 




	public function deletpageid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('pages')->where([
    ['pages.page_id','=' , $id], 
    ['pages.page_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'صفحه باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewspage');			  	 
 return redirect('superadmin/viewspage');  
 
}   }



 

public function mngsetting(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'mngsetting');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 
 return view('mng.mngsetting'  , [ 'mngindexs' => $mngindexs     ]); 
 }}
 
 
 
 
 
 
 
 
public function mngsettingpost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'mngimgheader');  

$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 


$mystring = $request->instagram; $findme   = 'https'; $pos = strpos($mystring, $findme);
  if ($pos !== false) {  $mystring = $request->instagram; }else{ $mystring = 'https://'.$request->instagram; }
    		

$telegram = $request->telegram; $findme   = 'https'; $pos = strpos($telegram, $findme);
  if ($pos !== false) {  $telegram = $request->telegram; }else{ $telegram = 'https://'.$request->telegram; }
    		

    
$updatee = \DB::table('mngindex')->where('id', '=', 1)  ->update([   'ind_ftitile' => $request->ind_ftitile    ,  'instagram' => $mystring    ,  'telegram' => $telegram    ,  'ind_cont' => $request->ind_cont    ,  'ind_key' => $request->ind_key    ,  'ind_fcopy' => $request->ind_fcopy       ]); 

 

 
 $nametr = Session::flash('statust', ' تنظیمات سایت باموفقیت ویریایش شد');
 $nametrt = Session::flash('sessurl', 'mngsetting');

 return redirect('superadmin/mngsetting'); 
 
 } }
 
 

public function mngimgheader(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'mngimgheader');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 
 
 return view('mng.mngimgheader'  , [ 'mngindexs' => $mngindexs     ]); 
 }}
 
 
 

public function mngimgheaderpost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'mngimgheader');  

$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 

 

$imageName=$mngindexs->ind_header;
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
    

$ind_headermobile=$mngindexs->ind_headermobile;
 if( $request->hasFile('ind_headermobile')){ 
        $image = $request->file('ind_headermobile');
        $ind_headermobile = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$ind_headermobile);  
	 
    }
    

$ind_headertablet=$mngindexs->ind_headertablet;
 if( $request->hasFile('ind_headertablet')){ 
        $image = $request->file('ind_headertablet');
        $ind_headertablet = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$ind_headertablet);  
	 
    }
    


 
$imagelogo=$mngindexs->ind_himglog;
 if( $request->hasFile('filel')){ 
        $image = $request->file('filel');
        $imagelogo = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imagelogo);    }
 
    
    

    
$updatee = \DB::table('mngindex')->where('id', '=', 1)  ->update([  'ind_header' => $imageName   , 'ind_himglog' => $imagelogo    , 'ind_headertablet' => $ind_headertablet    , 'ind_headermobile' => $ind_headermobile     ]); 

 

    
 $nametr = Session::flash('statust', 'تنظیمات لوگو و هدر باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'mngimgheader');

 return redirect('superadmin/mngimgheader'); 


 
 }}
 
 
 

public function addnew(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'addnew');  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first(); 

$cats = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'desc')->get(); 
 
 
 return view('mng.addnew'  , [ 'mngindexs' => $mngindexs ,  'cats' => $cats      ]); 
 }}
 
 
 
 
 
	public function addnewpost(  Request $request ){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){ 

$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا تیتر خبر را وارد نمایید',
    			
    		]);
    		
$imageName='';


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
    
    
 $b=env('APP_URL').'/public/images/'.$imageName; 
if($imageName==""){
 $imageName='';
}elseif($imageName!=""){ 
 $imageName='<img src="'.$b.'"      />'; 
 } 
    
    
    
//  style="width:400px; height: 400px"     

 
 
    		
DB::table('news')->insert([
    [  'new_tit' => $request->name ,  'new_short' => $request->short ,  'new_des' => $request->des ,  'new_img' => $imageName ,   'new_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
    		 
 $nametr = Session::flash('statust', 'خبر باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewsnews');

 return redirect('superadmin/viewsnews'); 
 }}
 

public function viewsnews(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewsnews');  
$admins = \DB::table('news') ->where('new_id', '<>', '0')->orderBy('new_id', 'desc')->get(); 
 return view('mng.viewsnews'  , [ 'admins' => $admins     ]); 
 }}
 

public function viewsnewseditid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewsnews');  
$admin = \DB::table('news') ->where('new_id', '=', $id)->orderBy('new_id', 'desc')->first(); 

$cats = \DB::table('cat') ->where('cat_id', '<>', '0')->orderBy('cat_id', 'desc')->get(); 

 return view('mng.editnew'  , [ 'admin' => $admin ,  'cats' => $cats    ]); 
 }}
 

public function viewsnewseditidpost($id , Request $request ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/login');  }
if (Session::has('signsuperadmin')){  
 Session::set('nav', 'viewsnews'); 
 


$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا تیتر خبر را وارد نمایید',
    			
    		]);
    		
 
  
$admin = \DB::table('news') ->where('new_id', '=', $id)->orderBy('new_id', 'desc')->first(); 





 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
 $b=env('APP_URL').'/public/images/'.$imageName; 
 $imageName='<img src="'.$b.'"    />'; 
  }  else { $imageName=$admin->new_img; }
    
    
    
    
$updatee = \DB::table('news')->where('new_id', '=', $id)  ->update([  'new_tit' => $request->name ,  'new_short' => $request->short ,  'new_catid' => $request->catid  ,  'new_des' => $request->des ,  'new_img' => $imageName ,   'new_createdatdate' =>  date('Y-m-d H:i:s')       ]); 

 

 
 
    	  
    		 
 $nametr = Session::flash('statust', 'خبر باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewsnews');

 return redirect('superadmin/viewsnews'); 







 return view('mng.editnew'  , [ 'admin' => $admin    ]); 
 }}
 

	public function deletnewid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('news')->where([
    ['news.new_id','=' , $id], 
    ['news.new_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'اخبار باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewsnews');			  	 
 return redirect('superadmin/viewsnews');  
 
}   }
		
		

public function curlfetch(){ 

$handle = curl_init();
 
 // https://www.mehrnews.com/rss?pl=1
 //https://www.mehrnews.com/rss
 //http://www.evaz-shahrdari.ir//RSS.php
 
$url = "https://www.mehrnews.com/rss?pl=1"; 
curl_setopt($handle, CURLOPT_URL, $url); 
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($handle);
curl_close($handle);
 

//echo $output;

 

for($i=2;$i<10;$i++){
 $m=$i-1;
 
 $bcodee = explode("<title>",$output);
 $coname=$bcodee[$i];  
 $titlee = explode("</title>",$coname);
 $title=$titlee['0'];  
 
   
 $bcodee = explode("<guid>",$output);
 $coname=$bcodee[$m];  
 $guidee = explode("</guid>",$coname);
 $guide=$guidee['0'];  
 
$handle = curl_init(); 
curl_setopt($handle, CURLOPT_URL, $guide); 
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$outputguide = curl_exec($handle);
curl_close($handle);


   
 $bcodee = explode('<p class="summary introtext" itemprop="description">',$outputguide);
 $coname=$bcodee['1'];  
 $shortee = explode("</p></div>",$coname);
 $shorte=$shortee['0'];  
 
 
 $bcodee = explode('<div itemprop="articleBody" class="item-text">',$outputguide);
 $coname=$bcodee['1'];  
 $desee = explode('</div><div class="item-code">',$coname);
 $dese=$desee['0'];  
 
 
 $dese= str_replace( 'https://www.mehrnews.com','#' , $dese);  
 $dese= str_replace( 'خبرنگار مهر','خبرنگار ما' , $dese);  
 $dese= str_replace( 'خبرگزاری مهر','خبرنگار ما' , $dese);  
 
 
 
 $bcodee = explode('<figure class="item-img">',$outputguide);
 $coname=$bcodee['1'];  
 $imgee = explode('</figure>',$coname);
 $imge=$imgee['0'];  
 
 
   
  
DB::table('news')->insert([
    [  'new_tit' => $title ,   'new_des' => $dese ,   'new_short' => $shorte ,     'new_link' => $guide ,    'new_img' => $imge ,   'new_createdatdate' =>  date('Y-m-d H:i:s')       ]
]);  
 
 echo $title.'<br>';
 echo $dese.'<br>';


}

}
 



public function curlfetch1(){ 

$handle = curl_init();
 
$url = "https://www.mehrnews.com/news/5030979/زورآزمایی-اتحادیه-جهانی-کشتی-با-موج-سوم-کرونا";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
 

 //echo $output;

 

for($i=1;$i<2;$i++){
 
 
 $bcodee = explode("<title>",$output);
 $coname=$bcodee[$i];  
 $titlee = explode("</title>",$coname);
 $title=$titlee['0'];  
 
   
   
 echo $title.'<br>';


}

}
 


		 

	 
public function superadminlogin(){
 Session::set('arou', 'superadmin');  
  
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
  
 return view('sup.login'  , [ 'mngindexs' => $mngindexs     ]); 
  
}
	

	 

public function superadminloginpass(){

$superadmins = DB::table('superadmins')->where([
    ['id', '=' , 1],
])->first(); 

$password_db= $superadmins->superadmin_userpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
	echo $decryptedPassword;
  
}
	


    public function superadminPosts(Request $request)
    {
    	$this->validate($request,[
    			'firstname' => 'required',
    			'lastname' => 'required'
    		],[
    			'firstname.required' => 'لطفا نام کاربری را وارد نمایید',
    			'lastname.required' => 'لطفا رمز ورود را وارد نمایید',
    			
    		]);
	//$output = false;
	//$key =  env('APP_KEY');
	//$iv = md5($key);
	//$output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $request->lastname, MCRYPT_MODE_CBC, $iv);
	//$output = base64_encode($output);
	
//$encryptedPassword =  Crypt::encrypt($request->lastname);

$superadmins = DB::table('superadmins')->where([
    ['superadmin_username',  $request->firstname],
])->first();
if($superadmins){

$password_db= $superadmins->superadmin_userpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
$userscou = DB::table('superadmins')->where([
    ['superadmin_username',  $request->firstname],
])->count();
$id_db= $superadmins->id;
$username_db= $superadmins->superadmin_username; 
$password_db= $superadmins->superadmin_userpassword; 
$username_log = $request->firstname; 
if(($username_log == $username_db)&&( $decryptedPassword == $request->lastname)){
	
	Session::set('idsuperadmin', $id_db);
	Session::set('signsuperadmin', $username_db);	
$adminslp = \DB::table('superadmins')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->superadmin_logindate;	
$supimg=$adminslp->superadmin_img;	
 
if(empty($supimg)){$supimg='user2x.png';}	
	Session::set('logindatepas', $logindatepas);
	Session::set('supimg', $supimg);
	$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_logindate' => date('Y-m-d H:i:s') ,    'superadmin_ip' => $request->ip()  ]); 
	
	Session::set('flagpanel', '1');
			return redirect('superadmin/panel'); 
		} else 
			 $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
				return redirect('superadmin/sign-in'); 
		
			
}
		else if(empty($superadmins)) {
			 $nametr = Session::flash('statust', 'اطلاعات را به درستی وارد نمایید.');
				return redirect('superadmin/sign-in'); 
		}
		
		
		
    }

 public function mngindexsession(){   	  
 
$mngindex = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();

  
 Session::set('ind_himglog', $mngindex->ind_himglog);   
 Session::set('ind_fcopy', $mngindex->ind_fcopy);   
 Session::set('instagram', $mngindex->instagram);   
 Session::set('linkedin', $mngindex->linkedin);   
 Session::set('telegram', $mngindex->telegram);   
 Session::set('youtube', $mngindex->youtube); 
 Session::set('facebook', $mngindex->facebook); 
 Session::set('twitter', $mngindex->twitter); 
 
 }
  


public function panel(){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 	
Session::set('nav', 'panel');   


$h = new SuperadminController();
$h->validatesuperadmin();	

$h = new SuperadminController();
$h->updatenotifalert();

 
 $h = new SuperadminController();
 $h->mngindexsession();
 
$admins =  DB::table('user')->where([['id', '<>',  '0'],])->count(); 
$useractives =  DB::table('user')->where([['id', '<>',  '0'],['user_active', '=',  '1'],])->count(); 


	$countusers = DB::table('user')->where([
    ['id',  '<>' , 0],
])->count();
 
	$countadmins = DB::table('admins')->where([
    ['id',  '<>' , 0],
])->count();


 

$levels = \DB::table('teacher')  
->leftJoin('level', 'teacher.id', '=', 'level.level_teacher') 
->where('level.level_active', '=' , 1)->orderBy('level.id', 'desc')->get();
  
  
return view('superadmin.testpanel2' , ['admins' => $admins , 'useractives' => $useractives  , 'countusers' => $countusers  , 'countadmins' => $countadmins , 'levels' => $levels  ]); 
  
}
}




 public function addcountry(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcountry');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('sup.addcountry');
	 }}
			
 public function addcountrypost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcountry');  
$h = new SuperadminController();
$h->validatesuperadmin();

    	$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام کشور را وارد نمایید', 
    		]);   
    	 
DB::table('country')->insert([
    [  'country_name' => $request->name         ]
]);  
    		 
 $nametr = Session::flash('statust', 'کشور باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'viewscountry');

 return redirect('superadmin/viewscountry'); 


	 } }
			
			
			
			
			

public function viewscountry(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewscountry'); 

$admins = \DB::table('country') ->orderBy('country_id', 'desc')->get();
return view('sup.viewscountry', ['admins' => $admins]);
 
} }



 public function addsubcatcourse(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addsubcatcourse');  
$h = new SuperadminController();
$h->validatesuperadmin();

$idd=0;
$idd=Session::get('idd');

$admins = \DB::table('catcourse') ->orderBy('catcourse_id', 'desc')->get();
$states = \DB::table('subcatcourse')
->join('catcourse', 'subcatcourse.subcatcourse_catid', '=', 'catcourse.catcourse_id')  ->where([ ['catcourse_id', '=',  $idd],])->orderBy('subcatcourse_id', 'desc')->get();
$names = \DB::table('catcourse')  ->where([ ['catcourse_id', '=',  $idd],])->orderBy('catcourse_id', 'desc')->first();
if($names){ $name=$names->catcourse_name; } else { $name='';}



return view('superadmin.addsubcatcourse' , ['admins' => $admins , 'states' => $states  , 'name' => $name   ]); 

 
	 }}
	 
	 
	 
			
 public function addsubcatcoursepost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addstate');  
$h = new SuperadminController();
$h->validatesuperadmin();

    	$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام استان را وارد نمایید', 
    		]);   
    	 
    	 
	Session::flash('idd', $request->country);
	  
DB::table('subcatcourse')->insert([
    [  'subcatcourse_catid' => $request->country   , 'subcatcourse_name' => $request->name         ]
]);  
    		 
 $nametr = Session::flash('statust', 'ساب کتوگری دوره با موفقیت ایجاد شد.');
 $nametrt = Session::flash('sessurl', 'addsubcatcourse'); 
 return redirect('superadmin/addsubcatcourse');  

	 } }
			

 public function subcatcourseid($id){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addsubcatcourse');  
$h = new SuperadminController();
$h->validatesuperadmin();

$subcatcourse= \DB::table('subcatcourse')
->join('catcourse', 'subcatcourse.subcatcourse_catid', '=', 'catcourse.catcourse_id')  ->where([ ['subcatcourse_id', '=',  $id],])->orderBy('subcatcourse_id', 'desc')->first();
 
return view('superadmin.editsubcat' , [  'subcatcourse' => $subcatcourse   ]); 
 

	 }}
	 
	 
public function subcatcourseidpost($id ,Request $request ){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'addsubcatcourse'); 


$admins = \DB::table('subcatcourse')
->join('catcourse', 'subcatcourse.subcatcourse_catid', '=', 'catcourse.catcourse_id')  ->where('subcatcourse_id', '=', $id)  ->orderBy('subcatcourse_id', 'desc')->first();


	Session::flash('idd', $admins->catcourse_id);

$imageName=$admins->subcatcourse_coverimg;
$icon=$admins->subcatcourse_icon;

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }

 if( $request->hasFile('icon')){ 
        $image = $request->file('icon');
        $icon = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$icon);  
	 
    }


$updatee = \DB::table('subcatcourse')->where('subcatcourse_id', '=', $id)  ->update(['subcatcourse_name' => $request->name , 'subcatcourse_coverimg' => $imageName  , 'subcatcourse_icon' => $icon   ]); 
 
 $nametr = Session::flash('statust', ' زیرمجموعه دوره باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'addsubcatcourse');

 return redirect('superadmin/addsubcatcourse'); 
 
} }

	 
	 
	 


		
	public function deletstate($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 


$names = \DB::table('subcatcourse')  ->where([ ['subcatcourse_id', '=',  $id],])->orderBy('subcatcourse_id', 'desc')->first();

if($names){ $state_country=$names->subcatcourse_catid; } else { $state_country='';}
	Session::flash('idd', $state_country);
	

 $admins = \DB::table('subcatcourse')->where('subcatcourse_id', '=', $id)->delete();
 
		  	$nametr = Session::flash('statust', 'حذف زیرمجموعه دوره با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'addsubcatcourse');
		  	 return redirect('superadmin/addsubcatcourse');
	}	 }
		
		
	




public function fechcourse($id){  

$countrys= \DB::table('catcourse')  ->where([ ['catcourse_id', '=',  $id] , ])->orderBy('catcourse_id', 'asc')->get();


$states= \DB::table('subcatcourse')  ->where([ ['subcatcourse_catid', '=',  $id] , ])->orderBy('subcatcourse_id', 'desc')->get();

foreach($countrys as $country){  
echo ' <option value=""  >لطفا انتخاب نمایید</option> ';

foreach($states as $admin){
	echo '<option value="'.$admin->subcatcourse_id.'"   >'.$admin->subcatcourse_name.'</option> ';
}
 
  
 

	
}	
 }


	 

public function fechpost($id){  

$countrys= \DB::table('catcourse')  ->where([ ['catcourse_id', '=',  $id] , ])->orderBy('catcourse_id', 'asc')->get();

foreach($countrys as $country){  
echo ' 
 <div class="form-group row">
 <label for="name" class="col-lg-3 col-form-label">ساب کتوگری دوره</label>
 <div class="col-lg-9">
 <input  name="name" type="text" class="form-control"   value="" required>
 </div>
 </div>';
 

	
}	
 }

	 

public function fechtablestate($id){  

$states= \DB::table('subcatcourse')  ->where([ ['subcatcourse_catid', '=',  $id] , ])->orderBy('subcatcourse_id', 'desc')->get();

$names = \DB::table('catcourse')  ->where([ ['catcourse_id', '=',  $id],])->orderBy('catcourse_id', 'desc')->first();
if($names){ $name=$names->catcourse_name; } else { $name='';}
 
echo ' 
<div class="col-12"> <div class="card"> <div class="card-body">
 <h4 class="card-title"> زیرمجموعه  "'.$name.'"</h4>
 

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> <thead>
                      <tr>
     				    <th>ردیف</th> 
                        <th>نام زیرمجموعه</th> 
                        <th>تصویر</th> 
                        <th>ویرایش</th> 
                        <th>حذف</th> 
                      </tr>
                    </thead> 
                    <tbody>';
  $i=1;             
foreach($states as $state){ 
 echo'<tr>
                      <td>'.$i++.'</td>
                        <td>'.$state->subcatcourse_name.'</td>
 <td>  <img  '; if ($state->subcatcourse_coverimg)  { echo 'src="'.env('APP_URL').'/public/images/'.$state->subcatcourse_coverimg.'" ';  } else { echo 'src=""'; }  echo 'alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle"> </td>
 <td><a href="'.env('APP_URL').'/superadmin/subcatcourse/edit/'.$state->subcatcourse_id.'"    class="btn btn-success btn-sm"  >مشاهده<i class="far fa-check-square btn-icon-prepend"></i></a>  </td> 
<td>'.'<a href="'.env('APP_URL').'/superadmin/state/delet/'.$state->subcatcourse_id.'"   class="btn btn-danger btn-sm"     >حذف<i  class="fa fa-trash mr-1 mt-1"></i></a> </td> </tr> '; }
 echo '</tbody> </table> </div> </div>  </div>  ';  
	
 
 }

	 
	 


 public function addcity(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcity');  
$h = new SuperadminController();
$h->validatesuperadmin();

$idd=0;
$idd=Session::get('idd');

$admins = \DB::table('country') ->orderBy('country_id', 'desc')->get();


$states = \DB::table('state')
->join('country', 'state.state_country', '=', 'country.country_id')  ->where([ ['state_country', '<>',  0],])->orderBy('state_id', 'desc')->get();

$citys = \DB::table('country')  
->join('state', 'country.country_id', '=', 'state.state_country') 
->join('city', 'state.state_id', '=', 'city.city_state')  ->where([ ['city_state', '=',  $idd],])->orderBy('city_id', 'desc')->get();
 
$names = \DB::table('state')  ->where([ ['state_id', '=',  $idd],])->orderBy('state_id', 'desc')->first();
if($names){ $name=$names->state_name; } else { $name='';}



return view('sup.addcity' , ['admins' => $admins , 'states' => $states  , 'citys' => $citys  , 'name' => $name   ]); 

 
	 }}
	 
	 
	 
	 
	  public function addcitypost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcity');  
$h = new SuperadminController();
$h->validatesuperadmin();

 
    	 
	Session::flash('idd', $request->state);
	  
DB::table('city')->insert([
    [  'city_state' => $request->state   , 'city_name' => $request->city         ]
]);  
    		 
 $nametr = Session::flash('statust', 'شهر باموفقیت ثبت شد.');
 $nametrt = Session::flash('sessurl', 'addcity'); 
 return redirect('superadmin/addcity');  

	 } }
	 
	 

public function fechstate($id){  

$states= \DB::table('country')
->join('state', 'country.country_id', '=', 'state.state_country')  ->where([ ['country_id', '=',  $id] , ])->orderBy('state_id', 'asc')->get();
 

echo '
<div class="form-group form-group"  > 
<label class="control-label"  for="location2" >استان</label> 
<select     class="md-form-control" onchange="fetch_selects(this.value);"    id="demo-select2-1"     name="state"  required  > 


<option value=""  >لطفا انتخاب نمایید</option> ';

foreach($states as $state){  
echo '<option value="'.$state->state_id.'"   >'.$state->state_name.'</option>';  
}
 
echo '</select>
                  <label class="md-control-label"></label>
</div> 	
      
      ';  
 }





public function fechstatecity($id){  

$citys= \DB::table('state')
->join('city', 'state.state_id', '=', 'city.city_state')  ->where([ ['state_id', '=',  $id] , ])->orderBy('city_id', 'asc')->get();
 

echo '
<div class="form-group form-group"  > 
<label class="control-label"  for="location2" >شهر</label> 
<select     class="md-form-control" onchange="fetch_selectcity(this.value);"    id="demo-select2-4"     name="state"  required  > 


<option value=""  >لطفا انتخاب نمایید</option> ';

foreach($citys as $city){  
echo '<option value="'.$city->city_id.'"   >'.$city->city_name.'</option>';  
}
 
echo '</select>  <label class="md-control-label"></label> </div>  ';  
 }





public function fechstatecityarea($id){  

$citys= \DB::table('state')
->join('city', 'state.state_id', '=', 'city.city_state')  ->where([ ['state_id', '=',  $id] , ])->orderBy('city_id', 'asc')->get();
 

echo '
<div class="form-group form-group"  > 
<label class="control-label"  for="location2" >شهر</label> 
<select     class="md-form-control" onchange="fetch_selectcity(this.value);"    id="demo-select2-4"     name="city"  required  > 


<option value=""  >لطفا انتخاب نمایید</option> ';

foreach($citys as $city){  
echo '<option value="'.$city->city_id.'"   >'.$city->city_name.'</option>';  
}
 
echo '</select>  <label class="md-control-label"></label> </div>  ';  


echo '
<div class="form-group form-group"  > <label for="email-1">نام منطقه</label><input   name="area" class="form-control" type="text"  value=""  required  minlength="1" ></div>';  

 }







	 

public function inputcity($id){  

$countrys= \DB::table('state')  ->where([ ['state_id', '=',  $id] , ])->orderBy('state_id', 'asc')->get();

foreach($countrys as $country){  
echo '<label for="email-1">نام شهر</label><input   name="city" class="form-control" type="text"  value=""  required  minlength="2" ></div>';  
	
}	
 }


	 

public function inputcityarea($id){  

$countrys= \DB::table('state')  ->where([ ['state_id', '=',  $id] , ])->orderBy('state_id', 'asc')->get();

foreach($countrys as $country){  
echo '<label for="email-1">نام شهر</label><input   name="city" class="form-control" type="text"  value=""  required  minlength="2" ></div>';  
	
}	
 }



	 

public function inputarea($id){  

$citys= \DB::table('city') ->where([ ['city_id', '=',  $id] , ])->orderBy('city_id', 'asc')->get();

foreach($citys as $city){  
echo '<label for="email-1">نام منطقه</label><input   name="area" class="form-control" type="text"  value=""  required  minlength="1" ></div>';  
	
}	
 }


	 

public function inputcityloc($id){  

$countrys= \DB::table('state')  ->where([ ['state_id', '=',  $id] , ])->orderBy('state_id', 'asc')->get();

foreach($countrys as $country){  
echo '<div class="form-group form-group-lg"><label for="email-1">نام شهر</label><input   name="city" class="form-control" type="text"  value=""  required  minlength="2" ></div><div class="form-group form-group-lg"><label for="email-1">منطقه</label><input   name="loc" class="form-control" type="text"  value=""  required  minlength="2" ></div>';  
	
}	
 }


	 

public function fechtablecity($id){  

$citys= \DB::table('city')  ->where([ ['city_state', '=',  $id] , ])->orderBy('city_id', 'desc')->get();

$names = \DB::table('state')  ->where([ ['state_id', '=',  $id],])->orderBy('state_id', 'desc')->first();
if($names){ $name=$names->state_name; } else { $name='';}
 
echo ' 
 <div class="col-xs-12"> <div class="card"> <div class="card-header">
  <strong>شهرهای استان "'.$name.'"</strong> </div>
 <div class="card-body">
 <table id="demo-datatables-3" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%"> <thead>
                      <tr>
     				    <th>ردیف</th> 
                        <th>شهر</th> 
                        <th>حذف</th> 
                      </tr>
                    </thead> 
                    <tbody>';
  $i=1;             
foreach($citys as $city){ 
 echo'<tr>
                      <td>'.$i++.'</td>
                        <td>'.$city->city_name.'</td> 
<td>'.'<a href="'.env('APP_URL').'/'.Session::get("arou").'/city/delet/'.$city->city_id.'"    > <span class="sidenav-badge badge badge-danger">حذف</span></a> </td> </tr> '; }
 echo '</tbody> </table> </div> </div>  </div>  ';  
	
 
 }






	public function mngindex(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'mngindex'); 
 
 $allevents = \DB::table('events') ->where([
    ['event_id','<>' , 0],  
])->orderBy('event_id', 'desc') ->get(); 
 
return view('sup.mngindex', ['allevents' => $allevents]);
}	 
}





	public function blogmng(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'blogmng'); 
 
$admins = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
  
return view('sup.blogmng', ['admins' => $admins]);
}	 
}




  public function blogmngpost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 
$h = new SuperadminController();
$h->validatesuperadmin();

 
    		
$admins = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();

$imageName=$admins->ind_coverblog;

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 

$updatee = \DB::table('mngindex')->where('id', '=', 1)  ->update([  'ind_createdatdate' =>  date('Y-m-d H:i:s') ,'ind_coverblog' => $imageName ]); 

 

 $nametr = Session::flash('statust', 'اطلاعات باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'blogmng'); 
 return redirect('superadmin/blogmng');  


} }

		




	 
	  public function mngindexpost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcity');  
$h = new SuperadminController();
$h->validatesuperadmin();

$updatee = \DB::table('events')->where('event_id', '<>', 0)  ->update(['event_show' => 0   ]); 

$updatee = \DB::table('events')->where('event_id', '=', $request->event1)  ->update(['event_show' => 1   ]); 

$updatee = \DB::table('events')->where('event_id', '=', $request->event2)  ->update(['event_show' => 2   ]); 

$updatee = \DB::table('events')->where('event_id', '=', $request->event3)  ->update(['event_show' => 3   ]); 


 $nametr = Session::flash('statust', 'اطلاعات باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'mngindex'); 
 return redirect('superadmin/mngindex');  


} }

	 
		
	public function deletcity($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 


$names = \DB::table('city')  ->where([ ['city_id', '=',  $id],])->orderBy('city_id', 'desc')->first();

if($names){ $city_state=$names->city_state; } else { $city_state='';}
	Session::flash('idd', $city_state);
	

		  	$admins = \DB::table('city')->where('city_id', '=', $id)->delete();
 
		  	$nametr = Session::flash('statust', 'حذف شهر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'addcity');
		  	 return redirect('superadmin/addcity');
	}	 }
		
		
	

 public function addcitysup(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcity');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('superadmin.addcity');
	 }}
	 
	 
	 
	 


 public function addcitysuppost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcity');  
$h = new SuperadminController();
$h->validatesuperadmin();
 
DB::table('city')->insert([
    [   'city_name' =>  $request->name , 'city_active' => 1     ]
]);  
    		 
 $nametr = Session::flash('statust', ' شهر باموفقیت ثبت شد ');
 $nametrt = Session::flash('sessurl', 'viewscity');

 return redirect('superadmin/viewscity'); 


	 } }
			


	 
	 

public function viewscitysup(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewscity'); 

$admins = \DB::table('city') ->orderBy('city_id', 'asc')->get();
return view('superadmin.viewscity', ['admins' => $admins]);
 
} }




	public function editstatcity($stat , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 
  
$updatee = \DB::table('city')->where('city_id', '=', $id)  ->update(['city_active' => $stat ]); 

if($stat=='1'){
 $nametr = Session::flash('statust', 'شهر باموفقیت فعال شد ');
} else {
 $nametr = Session::flash('statust', 'شهر باموفقیت غیرفعال شد ');
}

 $nametrt = Session::flash('sessurl', 'viewscity');			  	
 return redirect('superadmin/viewscity');  
 
}   }
		
		


	public function deletcitysup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 
 
		  	$admins = \DB::table('city')->where('city_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف شهر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewscity');
		  	
		  	
 return redirect('superadmin/viewscity'); 
	}	  }



 public function docuser($mng,$id){  

	Session::set('err', '7');	
 return redirect('manage/'.$mng.'/viewsusers/edituser/'.$id); 

}
	  

 public function viewsticketssup($mng){  


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


 Session::set('nav', 'viewstickets');  
$h = new SuperadminController();
$h->validatesuperadmin(); 





	Session::set('nav', 'viewstickets'); 
$admins = \DB::table('user') 
->join('ticket', 'user.id', '=', 'ticket.tik_fromid')
->where([
    ['tik_fromarou', '=', 4],
    ['tik_toarou', '=', 2],
    ['tik_tosh', '=', 1],])
    ->orderBy('ticket.tik_date', 'desc')->get();



$h = new SuperadminController();
$h->viewalertnot();



return view('mng.viewstickets', ['admins' => $admins]);

 
	 } 
			

 public function viewsticketssupid($mng,$id){  


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


 Session::set('nav', 'viewstickets');  
$h = new SuperadminController();
$h->validatesuperadmin(); 





	Session::set('nav', 'viewstickets'); 
$tickets = \DB::table('user') 
->join('ticket', 'user.id', '=', 'ticket.tik_fromid')->where([
    ['ticket.id', '=', $id],
    ['tik_fromarou', '=', 4],
    ['tik_toarou', '=', 2],
    ['tik_tosh', '=', 1],])  ->orderBy('ticket.id', 'desc')->get();
$messages = \DB::table('message')->where('mes_ticket', '=', $id)  ->orderBy('id')->get();

$updatee = \DB::table('user') 
->join('ticket', 'user.id', '=', 'ticket.tik_fromid')->where([
    ['ticket.id', '=', $id],
    ['tik_fromarou', '=', 4],
    ['tik_toarou', '=', 2],
    ['tik_tosh', '=', 1],])  ->update(['tik_toread' => 1   ]); 



$typ='14';
$link=$id;
$req=0;
$plan='0';
$h = new SuperadminController();
$h->showupdatealert($typ,$link,$req,$plan);


return view('mng.ticket', ['tickets' => $tickets  ,  'messages' => $messages ]); 

 
	 } 
			

 

public function showupdatealert($typ,$link,$req,$plan){ 
 

$updatee = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id')  ->where([
    ['alert.type', '=', $typ],
    ['alert.link', '=', $link],
    ['alert.req', '=', $req],
    ['alert.plan', '=', $plan],
    ['alert.alert_id', '<>', 0], ])  ->update(['show' => 1   ]); 


$h = new SuperadminController();
$h->viewalertnot();

}

 public function viewsticketssupidpost($mng,$id, Request $request){  


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


 Session::set('nav', 'viewstickets');  
$h = new SuperadminController();
$h->validatesuperadmin(); 




$h = new SuperadminController();
$h->viewalertnot();




$this->validate($request,[
    			'des' => 'required|min:2|max:666',
    		],[
    			'des.required' => 'لطفا پیام خود را وارد نمایید',
    			'des.min' => 'پیام شما نا معتبر است',
    			'des.max' => 'پیام شما نا معتبر است',
    			
    		]);
    		
    		
    		
    		
    		
    
    DB::table('message')->insert([
    ['mes_ticket' => $id ,  'mes_des' => $request->des   , 'mes_createdatdate' =>  date('Y-m-d H:i:s') , 'mes_flg' =>  2    ]
]);


   	$file='0'; 
    		
 if( $request->hasFile('file')){
 	$file='1'; 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    } 
    	
    	
    	
if($file=='1'){
	DB::table('message')->insert([
    ['mes_ticket' => $id ,  'mes_des' => $imageName   , 'mes_createdatdate' =>  date('Y-m-d H:i:s') , 'mes_flg' =>  2 , 'mes_file' =>  1    ]
]);

}

 $updatee = \DB::table('user') 
->join('ticket', 'user.id', '=', 'ticket.tik_fromid')->where([
    ['ticket.id', '=', $id],
    ['tik_fromarou', '=', 4],
    ['tik_toarou', '=', 2],
    ['tik_tosh', '=', 1],])  ->update(['tik_fromread' => 0 , 'tik_active' => 2  ,     'tik_date' =>  date('Y-m-d H:i:s')   ]); 
    
 
$tickets = \DB::table('ticket') 
->join('user', 'ticket.tik_fromid', '=', 'user.id')->where([
    ['ticket.id', '=', $id], ])  ->orderBy('ticket.id', 'desc')->first(); 

$iduser=$tickets->id;     
$typ='15';
$link=$id;
$req='0';
$h = new SuperadminController();
$h->alertsup($iduser,$typ,$link,$req);
     

 

$nametr = Session::flash('statust', 'پیام شما با موفقیت ارسال شد.');
$nametrt = Session::flash('sessurl', 'viewsuserticketssup/ticket/'.$id.'');
 

    	 	return  redirect('manage/'.$mng.'/viewstickets/ticket/'.$id.'');

 

 
	 } 
			

public function alertsup($iduser,$typ,$link,$req){ 
 

DB::table('alert')->insert([
    [ 'iduser' =>  $iduser , 'type' =>  $typ , 'show' =>  0  ,   'date' =>  date('Y-m-d H:i:s') , 'link' =>  $link, 'req' =>  $req ]
]);  
    	

}



 public function addusersup($mng){  


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


 Session::set('nav', 'adduser');  
$h = new SuperadminController();
$h->validatesuperadmin(); 
return view('mng.adduser');
	 } 
			

	  

 public function mngindexdes(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'mngindexdes'); 
 
$admins = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
 
$h = new SuperadminController();
$h->validatesuperadmin();
return view('sup.mngindexdes', ['admins' => $admins]);
	 }}
			


  public function mngindexdespost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 
$h = new SuperadminController();
$h->validatesuperadmin();

 
    		
$admins = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();

$imageName=$admins->ind_himglog;

 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 

$updatee = \DB::table('mngindex')->where('id', '=', 1)  ->update(['ind_ftitile' => $request->name  , 'ind_fcopy' => $request->ind_fcopy  , 'instagram' => $request->instagram  , 'facebook' => $request->facebook  , 'telegram' => $request->telegram  , 'youtube' => $request->youtube  , 'linkedin' => $request->linkedin   , 'twitter' => $request->twitter  , 'ind_createdatdate' =>  date('Y-m-d H:i:s') ,'ind_himglog' => $imageName ]); 

 

 $nametr = Session::flash('statust', 'اطلاعات باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'mngindexdes'); 
 return redirect('superadmin/mngindexdes');  


} }

		

 
		
		

 


		
		
		
		


	public function myprofile(){
if (Session::has('signsuperadmin')){ 

$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'panel'); 
$admins = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
return view('sup.profile', ['admins' => $admins]);
}	
else{ return redirect('superadmin/sign-in'); }
				}
				
		
		
			
	public function editmyprofilePost(  Request $request ){
if (Session::has('signsuperadmin')){ 

$h = new SuperadminController();
$h->validatesuperadmin();
 
$h = new SuperadminController();
$h->validatesuperadmin();


$nametr = Session::flash('err', '1');


$this->validate($request,[
    			'username' => 'required|min:3|max:35',
    			'tell' => 'required|numeric',
    			'email' => 'required|email',
    			'file'  => 'max:1000', 
    		],[
    			'username.required' => 'نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری کوتاه است',
    			'username.max' => 'نام کاربری غیرقابل قبول است',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.numeric' => 'شماره غیرقابل قبول است',
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		
 
$admins = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();

$imageName=$admins->superadmin_img;


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 
 
 
$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_username' => $request->username ,  'superadmin_tell' => $request->tell ,  'superadmin_email' => $request->email ,  'superadmin_ip' => $request->ip()  ,  'superadmin_img' => $imageName  ]); 


	Session::set('supimg', $imageName);

$admins = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->get();

			 $nametr = Session::flash('statust', 'اطلاعات پروفایل من باموفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'myprofile/edit/sup');


$admins = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();


	
$user = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();

/*
 $usernamee = $user->superadmin_username; 
 $titmes='اطلاعات شما با موفقیت تغییر کرد';
 $mestt='نام کاربری جدید';
 $mesnot = $usernamee; 
 
  Mail::send('superadmin.mail', ['user' => $user , 'usernamee' => $usernamee, 'mesnot' => $mesnot, 'titmes' => $titmes , 'mestt' => $mestt], function ($m) use ($user) {      
$decryptedPassword =  Crypt::decrypt($user->superadmin_userpassword);
            $m->from('info@demo.com', 'تغییر نام کاربری');
            $m->to($user->superadmin_email, $user->superadmin_email)->subject('ویرایش اطلاعات');
        }); 	
         	*/ 
         	
         	return redirect('superadmin/myprofile/edit/sup'); 
 
}	
else{ return redirect('superadmin/sign-in'); }
				}



		
	public function securityuserprofilesup( Request $request ){

if (empty(Session::has('signsuperadmin'))){ return redirect('superadmin/sign-in'); }
else if (Session::has('signsuperadmin')){ 

 
$h = new SuperadminController();
$h->validatesuperadmin();
 
$h = new SuperadminController();
$h->validatesuperadmin();



$nametr = Session::flash('err', '2');
 
    	$this->validate($request,[
    			'nowpass' => 'required',
    			'userpassword' => 'required|min:5|max:35|confirmed', 
    		],[
    			'nowpass.required' => 'لطفا رمزعبور فعلی را وارد نمایید',
    			'userpassword.required' => 'لطفا رمزعبور جدید را وارد نمایید',
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.confirmed' => 'رمزعبور باهم مطابقت ندارد', 
    		]);

 
 
$admins = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
 
$decryptedPasswordnow =  Crypt::decrypt($admins->superadmin_userpassword);


 if($request->nowpass!=$decryptedPasswordnow){
 	$nametr = Session::flash('statusterror', 'رمزعبور فعلی اشتباه وارد شده است');
 	return  redirect('superadmin/myprofile/edit/sup');
 }
 
 
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_userpassword' => $encryptedPassword   ]); 

$admins = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
 
$nametr = Session::flash('statust', 'رمزعبور باموفقیت تغییر پیدا کرد');
$nametrt = Session::flash('sessurl', 'myprofile/edit/sup');
   	 
 
 	return  redirect('superadmin/myprofile/edit/sup');

}	 
				}
		


public function dropzoneStoredmyprofile(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);        
$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_img' => $imageName   ]); 
$adminslp = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
$supimg=$adminslp->superadmin_img;	
	Session::set('supimg', $supimg);
        return response()->json(['success'=>$imageName]);
    }		





		
		
	public function securityysup( Request $request ){
if (Session::has('signsuperadmin')){ 

$h = new SuperadminController();
$h->validatesuperadmin();
  	$this->validate($request,[
    			'userpassword' => 'required|min:5|max:35|confirmed',
    			'tell' => 'required',
    			'email' => 'required',
    		],[
    			'userpassword.required' => 'لطفا رمز ورود را وارد نمایید',
    			'userpassword.min' => ' رمز کوتاه است',
    			'userpassword.max' => ' رمزعبور طولانی است ',
    			'userpassword.confirmed' => 'رمزعبور با تکرار آن مطابقت ندارد ',
    			'tell.required' => 'دقت نمایید تا زمانی که شماره تلفن شما ثبت نشده باشد شما نمی توانید رمز خود را تغییر دهید',
    			'email.required' => 'دقت نمایید تا زمانی که ایمیل شما ثبت نشده باشد شما نمی توانید رمز خود را تغییر دهید',
    		]);
    		
	
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->update(['superadmin_userpassword' => $encryptedPassword   ]); 

$admins = \DB::table('superadmins')->where('id', '=',  Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();

			 $nametr = Session::flash('statust', 'رمز شما با موفقیت تغییر کرد.');
		  	$nametrt = Session::flash('sessurl', 'myprofile/edit/sup');	
		  	
 	
$user = \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
/*
 	if ( $user->superadmin_email != '')  {
 	 $usernamee = $user->superadmin_username; 
 $titmes='رمز شما با موفقیت تغییر کرد';
 $mestt='رمزجدید';
 $mesnot = Crypt::decrypt($user->superadmin_userpassword); 
   Mail::send('superadmin.mail', ['user' => $user , 'usernamee' => $usernamee, 'mesnot' => $mesnot, 'titmes' => $titmes , 'mestt' => $mestt], function ($m) use ($user) {       
$decryptedPassword =  Crypt::decrypt($user->superadmin_userpassword);
            $m->from('info@demo.com', 'رمز جدید');
            $m->to($user->superadmin_email, $user->superadmin_email)->subject('امنیت اطلاعات');
        }); 	
 } 
 */
 
 /*
 	if ( $user->superadmin_tell != '')  {
 		
 $admins =  \DB::table('superadmins')->where('id', '=', Session::get('idsuperadmin'))  ->orderBy('id', 'desc')->first();
$panelsms = \DB::table('panelsms')->where('id', '=',  1)  ->orderBy('id', 'desc')->first();
include(app_path().'/../sms/api_send_sms.php');
$message='با عرض سلام. رمز شما با موفقیت تغییر کرد . رمز جدید : '.$decryptedPassword.' ';
$result = Send_SMS($panelsms->sms_username, $panelsms->sms_password, $panelsms->sms_fromnumber, $admins->superadmin_tell, $message , 0, false) ; 		
 		
 		} 
 		*/
 
 

        
        
        
          return view('superadmin.success');

}	
else{ return redirect('superadmin/sign-in'); }
				}
		


		
	public function rejdocpost($mng,$id , Request $request){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
			
Session::set('errus', '7'); 
$adminacc =  DB::table('user')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
 
						
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_autdes' => $request->des , 'user_autactive' => 2      ]); 

 
$user = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
if ( ($user->user_emailactive == 1) &&  ($user->user_tellactive == 1) &&  ($user->user_autactive == 1)   ){  $active=1; } else {  $active=0;}
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_active' => $active   ]);

		  	$admins = \ DB::table('user')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'مدارک کاربر توسط مدیریت تایید نشد .');
		  	$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');		
		  	
		  	
$nametr = Session::flash('err', '7');

$updatee = \DB::table('alert')->where('iduser', '=', $id)  ->update(['show' => 1  ]); 
    

$h = new SuperadminController();
$h->updatenotifalert();
		  	
 	 return redirect('manage/'.$mng.'/viewsusers/edituser/'.$id);	
		  	
		  	  }




	public function accdocusersup($mng,$id){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
			
$adminacc =  DB::table('user')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
 
						
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_autactive' => 1   ]); 
		  	$admins = \ DB::table('user')->where('id', $id)->get();	
		  	
		  	$user = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
if ( ($user->user_emailactive == 1) &&  ($user->user_tellactive == 1) &&  ($user->user_autactive == 1)   ){  $active=1; } else {  $active=0;}
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_active' => $active   ]);
		  	
		  				
		  	$nametr = Session::flash('statust', 'مدارک کاربر باموفقیت به تایید مدیریت رسید .');
		  	$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');		
		  	
		  	
$nametr = Session::flash('err', '7');

$updatee = \DB::table('alert')->where('iduser', '=', $id)  ->update(['show' => 1  ]); 
    

$h = new SuperadminController();
$h->updatenotifalert();
		  	
 	 return redirect('manage/'.$mng.'/viewsusers/edituser/'.$id);	
		  	
		  	 }
		
		

		
	public function addadmin($mng){  


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
  
  
	Session::set('nav', 'addadmin'); 
	return view('mng.addadmin');  }
			


public function addadminPost($mng , Request $request) {

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
     	
    	
    	$this->validate($request,[
    			'name' => 'required',
    			'username' => 'required|min:5|max:35|unique:admins,admin_username,$request->username',
    			'userpassword' => 'required|min:5|max:35|confirmed'
    		],[
    			'name.required' => 'لطفا نام و نام خانوادگی را وارد نمایید',
    			'username.required' => 'لطفا نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری شما باید بیشتر از 5 کاراکتر باشد',
    			'username.max' => 'یوزرنیم شما باید کمتر از 35 کارکتر باشد',
    			'username.unique' => 'این نام کاربری قبللا در سیستم ثبت شده است',
    			'userpassword.required' => 'لطفا رمز ورود را وارد نمایید',
    			'userpassword.min' => ' رمز کوتاه است',
    			'userpassword.max' => ' رمزعبور طولانی است ',
    			'userpassword.confirmed' => 'رمزعبور با تکرار آن مطابقت ندارد ',
    		]);
    		 
$encryptedPassword = \Crypt::encrypt($request->userpassword);
$decryptedPassword = \Crypt::decrypt($encryptedPassword);
		
DB::table('admins')->insert([
    ['admin_username' => $request->username , 'admin_name' => $request->name , 'admin_password' => $encryptedPassword ,   'admin_createdatdate' =>  date('Y-m-d H:i:s') , 'admin_active' => 0]
]);

$users = DB::table('admins')->where('admin_username', $request->username)->first();
$userscou = DB::table('admins')->where('admin_username', $request->username)->count();

$id_db= $users->id; 
$password_db= $users->admin_password; 

DB::table('accessadmins')->insert([
    ['accessadmin_idadmin' => $id_db , 'accessadmin_elanat' => 1 , 'accessadmin_ticket' => 1     ]
]);
			 $nametr = Session::flash('statust', 'ثبت نام مدیر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins');
 return redirect('manage/'.$mng.'/viewsadmins'); 
       
    	
    }
	
	
	
	
	
			
		
	public function viewsadmins($mng){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
     	

Session::set('nav', 'viewsadmins');
$admins = \DB::table('admins') ->orderBy('id', 'desc')->get();
return view('mng.viewsadmins', ['admins' => $admins , 'mng' => $mng  ]); 
}
	
	
	
			
		
	public function viewsadminedit($mng , $id){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
     	

Session::set('nav', 'viewsadmins');



$accessadmins = \DB::table('accessadmins')->where('accessadmin_idadmin', '=',  $id)  ->orderBy('accessadmin_idadmin', 'desc')->count();	

if($accessadmins=='0'){ 
DB::table('accessadmins')->insert([
    ['accessadmin_idadmin' => $id ]
]);
} 
 






$admin = \DB::table('admins') 
->Join('accessadmins', 'admins.id', '=', 'accessadmins.accessadmin_idadmin')  
->where([['admins.id', '<>', 0],  
['admins.id', '=', $id], ])->orderBy('id', 'desc')->first(); 




$crpt =  \DB::table('admins') ->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
$oldpassword=$crpt->admin_password; 
$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);



return view('mng.profileadmin', ['admin' => $admin , 'mng' => $mng  , 'decryptedPassword' => $decryptedPassword  ]); 
}
	
	
			
		
	public function viewsadmindelet($mng , $id){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
     	


		  	$admins = \ DB::table('admins')->where('id', $id)->get();
		  	$admins = \DB::table('admins')->where('id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف مدیر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins');
		  	
 return redirect('manage/'.$mng.'/viewsadmins'); 
 
 
}
	
	
	
			
		
 public function viewsadminlogin($mng , $id){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
     	
     	
  

$admins = \DB::table('admins')   
->where([['admins.id', '<>', 0],  
['admins.id', '=', $id], ])->orderBy('id', 'desc')->first(); 
   	 

if($admins){

$password_db= $admins->admin_password; 
$decryptedPassword =  Crypt::decrypt($password_db);
 



$name_db= $admins->admin_name;
$id_db= $admins->id;
$activeadmin= $admins->admin_active; 
$teachername_db= $admins->admin_username; 
$password_db= $admins->admin_password;  
  
	
    Session::set('nameadmin', $admins->admin_name); 
	Session::set('idmanager', $admins->id); 
	Session::set('signadmin', $admins->admin_username);
	Session::set('activeadmin', $admins->admin_active);

 $updatee = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->update(['admin_loginatdate' => date('Y-m-d H:i:s') ,    'admin_active' => '1'   ,    'admin_emailactive' => '1'   ,    'admin_tellactive' => '1'     ]); 
	

$adminslp = \DB::table('admins')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->admin_loginatdate;	

$admimg=$adminslp->admin_img;
if(empty($admimg)){$admimg='user2x.png';}	
 
		
	Session::set('logindatemanager', $logindatepas);
	Session::set('supimg', $admimg);
	
 $updatee = \DB::table('admins')->where('id', '=', Session::get('idmanager'))  ->update(['admin_loginatdate' => date('Y-m-d H:i:s')    ]); 
			 return redirect('manage/admin/dashboard'); 
	 
}
		else if(empty($admins)) {
			 $nametr = Session::flash('statust',   'اطلاعات را به درستی وارد نمایید.');
		  return redirect('manage/'.Session::get('arou').'/viewsadmins/edit/'.$id.'');

		}


     	
     	



 
 
}
	
	
	
	
		
		
		
	public function viewsadminsecret( Request $request , $mng , $id ){
 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}

 
$nametr = Session::flash('err', '1');


 
    	$this->validate($request,[
    			'nowpass' => 'required',
    			'userpassword' => 'required|min:5|max:35|confirmed', 
    		],[
    			'nowpass.required' => 'لطفا رمزعبور فعلی را وارد نمایید',
    			'userpassword.required' => 'لطفا رمزعبور جدید را وارد نمایید',
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.confirmed' => 'رمزعبور باهم مطابقت ندارد', 
    		]); 


 
 
$admins = \DB::table('admins')->where('id', '=',  $id)  ->orderBy('id', 'desc')->first();
 
$decryptedPasswordnow =  Crypt::decrypt($admins->admin_password);


 if($request->nowpass!=$decryptedPasswordnow){
 	$nametr = Session::flash('statusterror', 'رمزعبور فعلی اشتباه وارد شده است');
 	return  redirect('manage/'.Session::get('arou').'/viewsadmins/edit/'.$id.'');
 }
 
 
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('admins')->where('id', '=',  $id)  ->update(['admin_password' => $encryptedPassword   ]); 

  
$nametr = Session::flash('statust', 'رمزعبور باموفقیت تغییر پیدا کرد'); 
 
 	return  redirect('manage/'.Session::get('arou').'/viewsadmins/edit/'.$id.'');
 

}	  	 





public function viewsadminaccess( Request $request , $mng , $id ){
 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}

 
$nametr = Session::flash('err', '2');




$updatee = \DB::table('accessadmins')->where('accessadmin_idadmin', '=', $id)  ->update([  'accessadmin_user' => $request->user   ,  'accessadmin_ticket' => $request->ticket  ,  'accessadmin_finical' => $request->finical   ,  'accessadmin_sefaresh' => $request->sefaresh   ,  'accessadmin_giftcard' => $request->giftcard   ,  'accessadmin_paypall' => $request->paypall   ,  'accessadmin_skrill' => $request->skrill   ,  'accessadmin_visacart' => $request->visacart   ,  'accessadmin_visacartfisic' => $request->visacartfisic   ,  'accessadmin_credcard' => $request->credcard    ,  'accessadmin_service' => $request->service     ]);  


$nametr = Session::flash('statust', 'دسترسی باموفقیت ویرایش شد.');
$nametrt = Session::flash('sessurl', 'viewsacademy');
		 
		  return redirect('manage/'.Session::get('arou').'/viewsadmins/edit/'.$id.'');


}
		

	
	
	
 	
	public function viewsadmineditpost( $mng , $id , Request $request ){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


//$nametr = Session::flash('err', '1');


$this->validate($request,[
    			'username' => 'required|min:3|max:35',
    			'tell' => 'required|numeric',
    			'email' => 'required|email',
    			'file'  => 'max:1000', 
    		],[
    			'username.required' => 'نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری کوتاه است',
    			'username.max' => 'نام کاربری غیرقابل قبول است',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.numeric' => 'شماره غیرقابل قبول است',
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		
 
$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

$imageName=$admins->admin_img;


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 
 
 
$updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_name' => $request->name , 'admin_username' => $request->username ,  'admin_tell' => $request->tell ,  'admin_email' => $request->email ,     'admin_img' => $imageName  ]); 


	Session::set('supimg', $imageName);

$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();

			 $nametr = Session::flash('statust', 'اطلاعات پروفایل مدیر باموفقیت ویرایش شد.');
		   


$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();


	
$user = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

 
 return redirect('manage/'.$mng.'/viewsadmins/edit/'.$id); 
 
}	  


 
	
	
	
	
	
	
	


	public function editadmin($id){
if (Session::has('signsuperadmin')){ 
	Session::put('idimg', $id); Session::set('nav', 'viewsadmins'); 
$h = new SuperadminController();
$h->validatesuperadmin();
$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();
$accadmins = \DB::table('accessadmins')->where('accessadmin_idadmin', '=', $id)  ->orderBy('id', 'desc')->first();

 

return view('sup.editadmin', ['admins' => $admins ,  'accadmins' => $accadmins   ]); }	
else{ return redirect('superadmin/sign-in'); }
}



		
	public function accessadminpost( $id , Request $request ){
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
$nametr = Session::flash('err', '3');
$updatee = \DB::table('accessadmins')->where('accessadmin_idadmin', '=',$id)  ->update([ 'accessadmin_user' => $request->accessadmin_user   ,'accessadmin_blog' => $request->accessadmin_blog    ]); 
 

			 $nametr = Session::flash('statust', 'سطح دسترسی با موفقیت ویرایش شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins/edit/'.$id.'');		  	


$nametr = Session::flash('err', '3');

 return redirect('superadmin/viewsadmins/edit/'.$id.'');  

}	
else{ return redirect('superadmin/sign-in'); }
				}
		



		
	public function accadmsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
$adminacc =  DB::table('admins')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
 
						
$updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_active' => 1   ]); 
		  	$admins = \ DB::table('admins')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت مدیر باموفقیت فعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins/edit/'.$id.'');			  	
		  			  	
		  	$user = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
 
$nametr = Session::flash('err', '1');

 return redirect('superadmin/viewsadmins/edit/'.$id.'');  
		
	
 
}   }
		
		
	public function rejadmsup($id){
 if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();				
$updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_active' => 0   ]); 
		  	$admins = \ DB::table('admins')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت مدیر باموفقیت غیرفعال شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins/edit/'.$id.'');	
$nametr = Session::flash('err', '1');

 return redirect('superadmin/viewsadmins/edit/'.$id.''); 
	}  }
				 
			
		


		
	public function editadminpost($id  , Request $request ){
if (Session::has('signsuperadmin')){ 

$h = new SuperadminController();
$h->validatesuperadmin();
$nametr = Session::flash('err', '1');

$this->validate($request,[
    			'name' => 'required|min:3|max:35', 
    			'tell' => 'required|numeric',
    			'email' => 'required|email',
    			'adres' => 'required|min:3|max:555',
    			'file'  => 'max:1000', 
    		],[
    			'name.required' => 'نام و نام خانوادگی را وارد نمایید',
    			'name.min' => 'نام کوتاه است',
    			'name.max' => 'نام غیقابل قبول',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.numeric' => 'شماره غیرقابل قبول است',
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',
    			'adres.required' => 'آدرس را بصورت صحیح وارد کنید',
    			'adres.min' => 'دآدرس کوتاه است',
    			'adres.max' => 'آدرس خیلی بلند است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		


$user = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

$imageName=$user->admin_img;


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 
 

 		if ( $request->email ==  $user->admin_email   ){  $activeemail =  $user->admin_emailactive ; }
 else   if ( $request->email !=  $user->admin_email   ){  $activeemail ='0';}

 		if ( $request->tell ==  $user->admin_tell   ){  $activetell =  $user->admin_tellactive ; }
 else   if ( $request->tell !=  $user->admin_tell   ){  $activetell ='0';}
 
  
 
$updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_name' => $request->name    ,  'admin_tell' => $request->tell ,  'admin_email' => $request->email ,  'admin_adres' => $request->adres ,  'admin_emailactive' => $activeemail ,  'admin_tellactive' => $activetell , 'admin_img' => $imageName  ]); 

$user = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
if ( ($user->admin_emailactive == 1) &&  ($user->admin_tellactive == 1)   ){  $active=1;}
if ( ($user->admin_emailactive == 0) ||  ($user->admin_tellactive == 0)   ){  $active=0;}
$updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_active' => $active   ]);

$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();
$nametr = Session::flash('statust', 'ویرایش اطلاعات مدیر با موفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsadmins/edit/'.$id.''); 
	 

 return redirect('superadmin/viewsadmins/edit/'.$id.'');  
		 
}	else{ return redirect('superadmin/sign-in'); }
}
	


	
		
	public function securityyadmin( Request $request, $id ){
if (Session::has('signsuperadmin')){ 

$h = new SuperadminController();
$h->validatesuperadmin();
$nametr = Session::flash('err', '2');


 
    	$this->validate($request,[
    			'nowpass' => 'required',
    			'userpassword' => 'required|min:5|max:35|confirmed', 
    		],[
    			'nowpass.required' => 'لطفا رمزعبور فعلی را وارد نمایید',
    			'userpassword.required' => 'لطفا رمزعبور جدید را وارد نمایید',
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.confirmed' => 'رمزعبور باهم مطابقت ندارد', 
    		]); 


 
 
$admins = \DB::table('admins')->where('id', '=',  $id)  ->orderBy('id', 'desc')->first();
 
$decryptedPasswordnow =  Crypt::decrypt($admins->admin_password);


 if($request->nowpass!=$decryptedPasswordnow){
 	$nametr = Session::flash('statusterror', 'رمزعبور فعلی اشتباه وارد شده است');
 	return  redirect(''.Session::get('arou').'/viewsadmins/edit/'.$id.'');
 }
 
 
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('admins')->where('id', '=',  $id)  ->update(['admin_password' => $encryptedPassword   ]); 

  
$nametr = Session::flash('statust', 'رمزعبور باموفقیت تغییر پیدا کرد'); 
 
 	return  redirect(''.Session::get('arou').'/viewsadmins/edit/'.$id.'');
 

}	
else{ return redirect('superadmin/sign-in'); }
				}
		



		
		
	public function deletadmin($id){
		if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
		  	$admins = \ DB::table('admins')->where('id', $id)->get();
		  	$admins = \DB::table('admins')->where('id', '=', $id)->delete();
		  	$admins = \DB::table('accessadmins')->where('accessadmin_idadmin', '=', $id)->delete();
		  	$nametr = Session::flash('statust', 'حذف مدیر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsadmins');
		  	 return redirect('superadmin/viewsadmins');
	}	
else{ return redirect('superadmin/sign-in'); }
				}
		
		
	
	
	
			
		
	public function loginadmin($id){
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::put('idimg', $id);
	 
	
 $updatee = \DB::table('admins')->where('id', '=', $id)  ->update(['admin_loginatdate' => date('Y-m-d H:i:s')    ,    'admin_active' => '1'   ,    'admin_emailactive' => '1'   ,    'admin_tellactive' => '1'      ]); 
	
$admins = \DB::table('admins')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

if($admins){

$password_db= $admins->admin_password; 
$decryptedPassword =  Crypt::decrypt($password_db);
$userscou = DB::table('admins')->where([
    ['admin_username',  $admins->admin_username],
])->count();
$name_db= $admins->admin_name;
$id_db= $admins->id;
$activeadmin= $admins->admin_active; 
$name_db= $admins->admin_name; 
$username_db= $admins->admin_username; 
$password_db= $admins->admin_password; 
$username_log = $admins->admin_username; 
if(($username_log == $username_db)&&( $decryptedPassword == Crypt::decrypt($password_db))){
 
	Session::set('idadmin', $id_db); 
	Session::set('signadmin', $username_db);
	Session::set('activeadmin', $activeadmin);
	Session::set('idlang', '3');
	
	

$accessadmins = \DB::table('accessadmins')->where('accessadmin_idadmin', '=',  Session::get('idadmin'))  ->orderBy('id', 'desc')->first();	 
 
	Session::set('accessadmin_user', $accessadmins->accessadmin_user);	
	Session::set('accessadmin_blog', $accessadmins->accessadmin_blog);	 
	
	

$adminslp = \DB::table('admins')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->admin_loginatdate;	

$admimg=$adminslp->admin_img;
if(empty($admimg)){$admimg='user2x.png';}	
	Session::set('logindatepasadm', $logindatepas);
	Session::set('admimg', $admimg);
	$updatee = \DB::table('admins')->where('id', '=', Session::get('idadmin'))  ->update(['admin_loginatdate' => date('Y-m-d H:i:s')    ]); 
	
	 return redirect('admin/panel'); 
		} else 
			 $nametr = Session::flash('statust',  'اخطار');
				return redirect('admin/sign-in');  
} 
 
}	
else{ return redirect('superadmin/sign-in'); }
}



	


public function forgetpasssuperadmin(){ 
 Session::set('arou', 'superadmin');  
 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();
  
 return view('cust.forgetpass'  , [ 'mngindexs' => $mngindexs     ]); 
 
}
		
		
		

	public function forgetpasssuperadminpost( Request $request){ 

  $this->validate($request,[ 
    			'email' => 'required|email', 
    		],[
    			'email.required' => 'لطفا ایمیل راوارد نمایید ', 
    			'email.email' => 'لطفا فرمت ایمیل را بصورت صحیح وارد نمایید',  
    			
    		]); 
    		
    	 

$counts = DB::table('superadmins')->where([
    ['superadmin_email',  $request->email],
])->count();
if($counts!='0'){ 
 
$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$shuffled = str_shuffle($str);

	$updatee = \DB::table('superadmins')->where([
    ['superadmin_email',  $request->email],
])->update(['superadmin_linkforget' => $shuffled  ]); 

$user = DB::table('superadmins')->where([
    ['superadmin_email',  $request->email],
])->first(); 
$user_linkforget=$user->superadmin_linkforget;
  
 
 $mesnot =$user_linkforget; 
 
 $url='https://kargo.biz/mail/forgetpass.php?email='.$user->superadmin_email.'&code='.$mesnot.'&arou=superadmin';  
 
      
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, array());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch); 
   
 $nametr = Session::flash('success', 'لینک فعالسازی رمزعبور شما باموفقیت به ایمیل شما ارسال شد .'); 
 return  redirect('superadmin/sign-in');  
 
	  
 		} 
 	elseif($counts=='0') {
 
 $nametr = Session::flash('statust', 'متاسفانه این ایمیل در سیستم وجود ندارد .'); 
 return  redirect('superadmin/forgetpass');
} 

}	


 

 
	public function newpasswordsuperadmin(Request $request , $id){  
 
 $adminscount = DB::table('superadmins')->where([
    ['superadmin_linkforget' ,   $id ],
])->count();

if($adminscount=='0'){
	 return redirect('superadmin/sign-in'); 
} else{
	
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();

 $admins = DB::table('superadmins')->where([
    ['superadmin_linkforget' ,   $id ],
])->first();

return view('sup.newpassword', ['mngindexs' => $mngindexs , 'admins' => $admins]);
}
 }
	
		


 
				
				
public function newpasswordsuperadminpost(Request $request ,  $id)
    {   	
 
  	
    	$this->validate($request,[ 
    			'userpassword' => 'required|min:5|max:35|confirmed'
    		],[ 
    			'userpassword.required' => 'لطفا رمز عبور را وارد نمایید', 
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.max' => 'رمزعبور طولانی است', 
    			'userpassword.confirmed' => 'رمزعبور با تکرار آن مطابقت ندارد', 
    		]);
    		
    		
$encryptedPassword = \Crypt::encrypt($request->userpassword);
    		
	$updatee = \DB::table('superadmins')->where([
    ['superadmin_linkforget',  $id],
])->update(['superadmin_userpassword' => $encryptedPassword  ]); 



 $nametr = Session::flash('success', 'رمزعبور شما باموفقیت تعییر پیدا کرد .'); 
 return  redirect('superadmin/sign-in');  

    		
    		}
				
			
	




		


 public function addusertPost($mng , Request $request){ 


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 


 Session::set('nav', 'adduser');  
$h = new SuperadminController();
$h->validatesuperadmin();



    	$this->validate($request,[
    			'username' => 'required|min:3|unique:user,user_username,$request->username', 
    			'userpassword' => 'required|min:5|max:35|confirmed'
    		],[
    			'username.required' => 'لطفا نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری شما باید بیشتر از 3 کاراکتر باشد',
    			'username.unique' => 'این نام کاربری قبللا در سیستم ثبت شده است',
    			'userpassword.required' => 'لطفا رمز ورود را وارد نمایید',
    			'userpassword.min' => ' رمز کوتاه است',
    			'userpassword.max' => ' رمزعبور طولانی است ',
    			'userpassword.confirmed' => 'رمزعبور با تکرار آن مطابقت ندارد ',
    		]);   
    		
 

$encryptedPassword = \Crypt::encrypt($request->userpassword);
$decryptedPassword = \Crypt::decrypt($encryptedPassword);
$rnd=rand(1, 99999999); 

$user=\DB::table('user')  ->where('id' , '<>' , '0')->orderBy('id' , 'desc')->first();  
    		

DB::table('user')->insert([
    [ 'user_password' => $encryptedPassword ,   'user_createdatdate' =>  date('Y-m-d H:i:s') , 'user_active' => 0 , 'user_moaref' => $rnd   , 'user_username' => $request->username    , 'user_name' => $request->name       ]
]);  
    		 

 
			 $nametr = Session::flash('statust', 'ثبت نام کاربر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsusers');
		  	 
 
 return redirect('manage/'.$mng.'/viewsusers'); 


	 }  
			



public function mngcontact(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 
Session::set('nav', 'mngcontact'); 

$admins = \DB::table('contact') ->orderBy('contact_id', 'desc')->get();
return view('sup.mngcontact', ['admins' => $admins]);
 
} }





	public function deletcontact($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 
		  	$admins = \DB::table('contact')->where('contact_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف پیام با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'mngcontact');
		  	
 return redirect('superadmin/mngcontact'); 
	}	 
				}


		

public function viewsuserssup($mng){  



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 
Session::set('nav', 'viewsusers'); 
 
$admins = \DB::table('user') ->orderBy('id', 'desc')->get();
return view('mng.viewsusers', ['admins' => $admins]);
 
}  



		
 

	public function requsersup($mng,$id){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
	Session::put('idimg', $id); Session::set('nav', 'viewsusers'); 
$admin = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();



$crpt = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first(); 
$oldpassword=$crpt->user_password; 
$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);


$myrequests  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id')  ->where([
    ['user.id', '=',  $id],  ])
    ->orderBy('req_id', 'desc')->get(); 
 	  
return view('mng.requser', ['admin' => $admin , 'decryptedPassword' => $decryptedPassword   , 'myrequests' => $myrequests   ]);  	 
}






	public function editusersup($mng,$id){

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
	Session::put('idimg', $id); Session::set('nav', 'viewsusers'); 
$admin = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

if($admin->user_img==''){ $imageName='user2x.png';
 $updatee = \DB::table('user')->where('id', '=', $id)  ->update([  'user_img' => $imageName   ]); 
}

$admin = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();


$crpt = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first(); 
$oldpassword=$crpt->user_password; 
$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);


$myrequests  = \DB::table('myrequest')
->join('user', 'myrequest.req_userid', '=', 'user.id')  ->where([
    ['user.id', '=',  $id],  ])
    ->orderBy('req_id', 'desc')->get(); 
 	  
return view('mng.profileuser', ['admin' => $admin , 'decryptedPassword' => $decryptedPassword   , 'myrequests' => $myrequests   ]);  	 
}

		
	public function editusersupPost($mng , $id  , Request $request ){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 

$this->validate($request,[
    			'name' => 'required|min:3|max:35',
    			'username' => 'required',
    			'tell' => 'required|regex:/^09[0-9]{9}$/',
    			'email' => 'required|email',
    			'adres' => 'required|min:3|max:555',
    			'file'  => 'max:1000', 
    		],[
    			'name.required' => 'نام و نام خانوادگی را وارد نمایید',
    			'name.min' => 'نام کوتاه است',
    			'name.max' => 'نام غیقابل قبول',
    			'username.required' => 'لطفا نام کاربری را وارد نمایید',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.regex' => 'لطفا شماره را با کد 09 و مربوط به اپراتورهای ایران انتخاب نمایید.',    
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',
    			'adres.required' => 'آدرس را بصورت صحیح وارد کنید',
    			'adres.min' => 'دآدرس کوتاه است',
    			'adres.max' => 'آدرس خیلی بلند است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		


$user = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

$imageName=$user->user_img;


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 
 

 		if ( $request->email ==  $user->user_email   ){  $activeemail =  $user->user_emailactive ; }
 else   if ( $request->email !=  $user->user_email   ){  $activeemail ='0';}

 		if ( $request->tell ==  $user->user_tell   ){  $activetell =  $user->user_tellactive ; }
 else   if ( $request->tell !=  $user->user_tell   ){  $activetell ='0';}
 
  
 
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_name' => $request->name    ,  'user_tell' => $request->tell ,  'user_email' => $request->email ,  'user_adres' => $request->adres ,  'user_emailactive' => $activeemail ,  'user_tellactive' => $activetell , 'user_img' => $imageName  ]); 

$user = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
if ( ($user->user_emailactive == 1) &&  ($user->user_tellactive == 1)   ){  $active=1;}
if ( ($user->user_emailactive == 0) ||  ($user->user_tellactive == 0)   ){  $active=0;}
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_active' => $active   ]);

$admins = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();
$nametr = Session::flash('statust', 'ویرایش اطلاعات کاربر با موفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.''); 
	 
 return redirect('manage/'.Session::get('arou').'/viewsusers/edituser/'.$id.'');      
}
	




	public function editusersupincchargePost($mng , $id , Request $request){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

$nametr = Session::flash('err', '3');

    	$this->validate($request,[
    			'tit' => 'required|numeric' 
    		],[
    			'tit.required' => 'لطفا مبلغ شارژ را وارد نمایید',
    			'tit.numeric' => 'مبلغ شارژ نامعتبر است', 
    		]);
    	

DB::table('finicals')->insert([
    ['finical_pay' => $request->tit , 'finical_shenasepardakht' => $request->des ,     'finical_createdatdate' =>  date('Y-m-d H:i:s') , 'finical_inc' => 6 , 'finical_payment' => 1 ,  'finical_arou' => 4 ,  'finical_iduser' => $id  ]
]);

$chargefinical=\DB::table('finicals') ->where([['finical_inc', '=',  6 ],['finical_arou', '=',  4 ],['finical_iduser', '=',  $id],])->orderBy('id', 'desc')->first();	
		    	
DB::table('charge')->insert([
    ['charge_pay' => $request->tit ,     'charge_createdatdate' =>  date('Y-m-d H:i:s') , 'charge_arou' => 4 ,  'charge_iduser' => $id ,  'charge_finical' => $chargefinical->id  ]
]);	    	

 
  
$nametr = Session::flash('statust',  'افزایش شارژ کاربر با موفقیت انجام شد');
$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');		  	
 return view('superadmin.success'); 
 
}	 
 





	public function chargeuserincpostodat($mng , $id , Request $request){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 
$nametr = Session::flash('err', '4');

    	$this->validate($request,[
    			'tit' => 'required|numeric' 
    		],[
    			'tit.required' => 'لطفا مبلغ را وارد نمایید',
    			'tit.numeric' => 'مبلغ نامعتبر است', 
    		]);
    	
if($request->jamekol < $request->tit) {
	$nametr = Session::flash('statust',  'مبلغ انتخاب شده جهت عودت بیشتر از شارژ اکانت کاربر می باشد');
$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');			  	
 return view('superadmin.error');  	
}  else {


DB::table('finicals')->insert([
    ['finical_pay' => $request->tit ,  'finical_shenasepardakht' => $request->des ,     'finical_createdatdate' =>  date('Y-m-d H:i:s') , 'finical_inc' => 7 , 'finical_payment' => 1 ,  'finical_arou' => 4 ,  'finical_iduser' => $id  ]
]);

$chargefinical=\DB::table('finicals') ->where([['finical_inc', '=',  7 ],['finical_arou', '=',  4 ],['finical_iduser', '=',  $id],])->orderBy('id', 'desc')->first();	
		    	
DB::table('charge')->insert([
    ['charge_pay' => $request->tit ,     'charge_createdatdate' =>  date('Y-m-d H:i:s') , 'charge_arou' => 4 ,  'charge_iduser' => $id ,  'charge_finical' => $chargefinical->id  ]
]);	    	

 
  
$nametr = Session::flash('statust',  'عودت مبلغ شارژ از کاربر باموفقیت انجام شد');
$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');		  	
 return view('superadmin.success');  	
 
} }
 









public function dropzoneStoreuser($mng , Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);        
$updatee = \DB::table('user')->where('id', '=', Session::get('idimg'))  ->update(['user_img' => $imageName   ]); 
        return response()->json(['success'=>$imageName]);
    }
			
	public function deletusersup($mng ,$id){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
		  	$admins = \ DB::table('user')->where('id', $id)->get();
		  	$admins = \DB::table('user')->where('id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف کاربر با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsusers');
		  	
 return redirect('manage/'.$mng.'/viewsusers'); 
	 		}
		
		
		
		
		
		
	public function securityystud( Request $request , $mng , $id ){
 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 
 
$nametr = Session::flash('err', '1');


 
    	$this->validate($request,[
    			'nowpass' => 'required',
    			'userpassword' => 'required|min:5|max:35|confirmed', 
    		],[
    			'nowpass.required' => 'لطفا رمزعبور فعلی را وارد نمایید',
    			'userpassword.required' => 'لطفا رمزعبور جدید را وارد نمایید',
    			'userpassword.min' => 'رمزعبور کوتاه است', 
    			'userpassword.confirmed' => 'رمزعبور باهم مطابقت ندارد', 
    		]); 


 
 
$admins = \DB::table('user')->where('id', '=',  $id)  ->orderBy('id', 'desc')->first();
 
$decryptedPasswordnow =  Crypt::decrypt($admins->user_password);


 if($request->nowpass!=$decryptedPasswordnow){
 	$nametr = Session::flash('statusterror', 'رمزعبور فعلی اشتباه وارد شده است');
 	return  redirect('manage/'.Session::get('arou').'/viewsusers/edituser/'.$id.'');
 }
 
 
$encryptedPassword =  Crypt::encrypt($request->userpassword);
$decryptedPassword =  Crypt::decrypt($encryptedPassword);

$updatee = \DB::table('user')->where('id', '=',  $id)  ->update(['user_password' => $encryptedPassword   ]); 

  
$nametr = Session::flash('statust', 'رمزعبور باموفقیت تغییر پیدا کرد'); 


 	if ( $admins->user_email != '')  {
 	 $usernamee = $admins->user_username; 
 $titmes='رمز شما با موفقیت تغییر کرد';
 $mestt='رمزجدید';
 $mesnot = Crypt::decrypt($admins->user_password); 
   Mail::send('mng.mail', ['admins' => $admins , 'usernamee' => $usernamee, 'mesnot' => $mesnot, 'titmes' => $titmes , 'mestt' => $mestt], function ($m) use ($admins) {       
$decryptedPassword =  Crypt::decrypt($admins->user_password);
            $m->from('info@demo.com', 'رمز جدید');
            $m->to($admins->user_email, $admins->user_email)->subject('امنیت اطلاعات');
        }); 	
 } 



 
 	return  redirect('manage/'.Session::get('arou').'/viewsusers/edituser/'.$id.'');
 

}	  	 
		

		
		
		
	public function accusersup($mng , $id){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
$nametr = Session::flash('err', '3');
$adminacc =  DB::table('user')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
  
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_active' => 1   ]); 
		  	$admins = \ DB::table('user')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت کاربر با موفقیت فعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');			  	
		  			  	
		  	$user = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
  
 	return  redirect('manage/'.Session::get('arou').'/viewsusers/edituser/'.$id.''); 
 
}    
		
		
		
		 

	public function updatenotifalert(){	
		    
$alerts  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id') ->where([ 
    ['alert.show', '=', 0],    ])
    ->orderBy('alert.date', 'desc')->get(); 
    
Session::set('alerts', $alerts);  
    
$countalerts  = \DB::table('alert')
->join('user', 'alert.iduser', '=', 'user.id') ->where([ 
    ['alert.show', '=', 0],    ])
    ->orderBy('alert.date', 'desc')->count(); 	  

Session::set('countalerts', $countalerts);  

}
		
 


		
	public function rejusersup($mng , $id){



if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
 	
$nametr = Session::flash('err', '3');		
$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_active' => 0   ]); 
		  	$admins = \ DB::table('user')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت کاربر باموفقیت غیرفعال شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsusers/edituser/'.$id.'');		  	

 	return  redirect('manage/'.Session::get('arou').'/viewsusers/edituser/'.$id.''); 
	}   






		
	public function loginusersup($mng,$id){


if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 
	Session::put('idimg', $id);
	
	
	$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_loginatdate' => date('Y-m-d H:i:s')     ]); 
	
	
	
	/*
	$updatee = \DB::table('user')->where('id', '=', $id)  ->update(['user_loginatdate' => date('Y-m-d H:i:s')    ,    'user_active' => '1'   ,    'user_emailactive' => '1'   ,    'user_tellactive' => '1'   ,    'user_autactive' => '1'   ]); 
	
	*/
	
$admins = \DB::table('user')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

if($admins){

$password_db= $admins->user_password; 
$decryptedPassword =  Crypt::decrypt($password_db);
$userscou = DB::table('user')->where([
    ['user_username',  $admins->user_username],
])->count();
$name_db= $admins->user_name ;
$id_db= $admins->id;
$activeadmin= $admins->user_active; 
$name_db= $admins->user_name ; 
$username_db= $admins->user_username; 
$password_db= $admins->user_password; 
$username_log = $admins->user_username; 
if(($username_log == $username_db)&&( $decryptedPassword == Crypt::decrypt($password_db))){
	Session::set('fullname', $name_db);
	Session::set('iduser', $id_db);
	Session::set('signname', $name_db);
	Session::set('signuser', $username_db);
	Session::set('activeuser', $activeadmin);
	Session::set('idlang', '3');

$adminslp = \DB::table('user')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->user_loginatdate;	

$admimg=$adminslp->user_img;
if(empty($admimg)){$admimg='user2x.png';}	
	Session::set('logindatepasus', $logindatepas);
	Session::set('usimg', $admimg);
	$updatee = \DB::table('user')->where('id', '=', Session::get('iduser'))  ->update(['user_loginatdate' => date('Y-m-d H:i:s')    ]); 
			return redirect('user/panel'); 
		} else 
			 $nametr = Session::flash('statust',  'اخطار');
				return redirect('user/sign-in');  
} 
 
}	 



	  

 public function addlevel(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addlevel');  
$h = new SuperadminController();
$h->validatesuperadmin();


$admins = \DB::table('teacher')->where('teach_active', '=', 1)  ->orderBy('id', 'desc')->get();
return view('sup.addlevel', ['admins' => $admins]);
 
	 }}
			


public function addlevelPost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addlevel');  
$h = new SuperadminController();
$h->validatesuperadmin(); 	    	
    	$this->validate($request,[
    			'name' => 'required|min:3|max:66|unique:level,level_name,$request->name',
    			'teacher' => 'required',
    		],[
    			'name.required' => 'لطفا نام دوره را وارد نمایید',
    			'name.min' => 'نام دروه کوتاه است',
    			'name.max' => ' نام دوره معتبر نیست',
    			'name.unique' => 'نام دوره قبلا در سیستم ثبت شده است',
    			'teacher.required' => 'لطفا استاد مدرس را وارد نمایید',
    			
    		]);   
     			
DB::table('level')->insert([
    ['level_name' => $request->name ,'level_teacher' => $request->teacher ,  'level_active' => 0 ,   'level_createdatdate' =>  date('Y-m-d H:i:s'),'level_des' => $request->level_des ,'level_sesion' => $request->level_sesion    ]
]); 

$users = DB::table('level')->where('level_name', $request->name)->first();
$userscou = DB::table('level')->where('level_name', $request->name)->count();

$nametr = Session::flash('statust', 'دوره با موفقیت ثبت شد.');
$nametrt = Session::flash('sessurl', 'viewslevels');
		
 return redirect('superadmin/viewslevels');     	 
 }}
		

	  

 public function viewslevels(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'viewslevels');  
$h = new SuperadminController();
$h->validatesuperadmin();
$admins = \DB::table('level') ->orderBy('id', 'desc')->get();
return view('sup.viewslevels', ['admins' => $admins]); 
	 }}
			


	  

 public function viewslevelsid($id){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'viewslevels');  
$h = new SuperadminController();
$h->validatesuperadmin(); 
$admins = \DB::table('level')   
->where('level.id', '=' , $id)->orderBy('level.id', 'desc')->get();
$terms = \DB::table('term') ->where('term_level', '=' , $id)->orderBy('id', 'asc')->get();
$teachers = \DB::table('teacher')->where('teach_active', '=', 1)  ->orderBy('id', 'desc')->get();
return view('sup.editlevel', ['admins' => $admins ,'terms' => $terms ,'teachers' => $teachers  ]); 
	 }}
			




	public function viewslevelsidpost($id  , Request $request ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();

$nametr = Session::flash('err', '1');

$this->validate($request,[
    			'name' => 'required|min:3|max:35', 
    			'teacher' => 'required',
    		],[
    			'name.required' => 'نام دوره را وارد نمایید',
    			'name.min' => 'نام کوتاه است',
    			'name.max' => 'نام غیقابل قبول', 
    			'teacher.required' => 'لطفا استاد مدرس را وارد نمایید',
    			
    		]);
    		 
$user = \DB::table('level')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
  
$updatee = \DB::table('level')->where('id', '=', $id)  ->update(['level_name' => $request->name ,'level_teacher' => $request->teacher  ,'level_provpor' => $request->provpor  ,'level_des' => $request->level_des ,'level_sesion' => $request->level_sesion  ]); 
  
$nametr = Session::flash('statust', 'ویرایش اطلاعات دوره با موفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewslevels/editlevel/'.$id.''); 
	 
 return redirect('superadmin/viewslevels/editlevel/'.$id.'');     }
}
	

	public function acclevelsid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 	
  
$updatee = \DB::table('level')->where('id', '=', $id)  ->update(['level_active' => 1   ]);  			
		  	$nametr = Session::flash('statust', 'دوره باموفقیت فعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewslevels/editlevel/'.$id.'');		 
  
 return redirect('superadmin/viewslevels/editlevel/'.$id.'');  
 
}   }
		



	public function rejlevelsid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 	
  
$updatee = \DB::table('level')->where('id', '=', $id)  ->update(['level_active' => 0   ]);  			
		  	$nametr = Session::flash('statust', 'دوره باموفقیت غیرفعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewslevels/editlevel/'.$id.'');		 
  
 return redirect('superadmin/viewslevels/editlevel/'.$id.'');  
 
}   }
		



	public function deletlevelsid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 
		  	$admins = \DB::table('level')->where('id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف دوره با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewslevels');
		  	
 return redirect('superadmin/viewslevels'); 
	}	  }



public function addtermidPost($id , Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addlevel');  
$h = new SuperadminController();
$h->validatesuperadmin(); 	  


$nametr = Session::flash('err', '2');
  	
    	$this->validate($request,[
    			'namee' => 'required'
    		],[
    			'namee.required' => 'لطفا نام ترم را وارد نمایید', 
    			
    		]);   
     			
DB::table('term')->insert([
    ['term_name' => $request->namee ,  'term_active' => 0 ,   'term_createdatdate' =>  date('Y-m-d H:i:s')  ,  'term_level' => $id  ]
]); 
 

$nametr = Session::flash('statust', 'ترم با موفقیت ثبت شد.');
		  	$nametrt = Session::flash('sessurl', 'viewslevels/editlevel/'.$id.'');
		
 return redirect('superadmin/viewslevels/editlevel/'.$id.'');     	 
 }}
		



 public function addcatcourse(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcatcourse');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('superadmin.addcatcourse');
	 }}
			


 public function addcatcoursepost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcatcourse');  
$h = new SuperadminController();
$h->validatesuperadmin();
  
$imageName=''; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }
        
DB::table('catcourse')->insert([
    [   'catcourse_createdatdate' =>  date('Y-m-d H:i:s')     , 'catcourse_name' => $request->name    , 'catcourse_coverimg' => $imageName      ]
]);  
    		 
 $nametr = Session::flash('statust', 'ثبت کتوگری دوره با موفقیت انجام شد.');
 $nametrt = Session::flash('sessurl', 'viewscatcourse');

 return redirect('superadmin/viewscatcourse');  

	 } }
			


		

public function viewscatcourse(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewscatcourse'); 

$admins = \DB::table('catcourse') ->orderBy('catcourse_id', 'desc')->get();
return view('superadmin.viewscatcourse', ['admins' => $admins]);
 
} }


public function catcourseeditpost($id ,Request $request ){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewscatcourse'); 


$admin = \DB::table('catcourse') ->where('catcourse_id', '=', $id)  ->orderBy('catcourse_id', 'desc')->first();

$imageName=$admin->catcourse_coverimg; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }



$updatee = \DB::table('catcourse')->where('catcourse_id', '=', $id)  ->update(['catcourse_name' => $request->name , 'catcourse_coverimg' => $imageName    ]); 
 
 $nametr = Session::flash('statust', ' کتوگری دوره با موفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewscatcourse');

 return redirect('superadmin/viewscatcourse'); 
 
} }


	public function catcoursedeletid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('catcourse')->where([
    ['catcourse.catcourse_id','=' , $id], 
    ['catcourse.catcourse_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'کتوگری دوره باموفقیت حدف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewscatcourse');			  	 
 return redirect('superadmin/viewscatcourse');  
 
}   }
		
		
		
		
		

 public function addcatart(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcatart');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('superadmin.addcatart');
	 }}
			
 public function addcatartpost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcatart');  
$h = new SuperadminController();
$h->validatesuperadmin();
  
DB::table('catart')->insert([
    [   'catart_createdatdate' =>  date('Y-m-d H:i:s')     , 'catart_name' => $request->name      ]
]);  
    		 
 $nametr = Session::flash('statust', 'ثبت کتوگری مقالات با موفقیت انجام شد.');
 $nametrt = Session::flash('sessurl', 'viewsarts');

 return redirect('superadmin/viewsarts');  

	 } }
			

public function viewsarts(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewsarts'); 

$admins = \DB::table('catart') ->orderBy('catart_id', 'desc')->get();
return view('superadmin.viewsarts', ['admins' => $admins]);
 
} }


public function editartidpost($id ,Request $request ){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewsarts'); 

$updatee = \DB::table('catart')->where('catart_id', '=', $id)  ->update(['catart_name' => $request->name    ]); 
 
 $nametr = Session::flash('statust', ' کتوگری مقاله با موفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewsarts');

 return redirect('superadmin/viewsarts'); 
 
} }

			
	public function catartdeletid( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('catart')->where([
    ['catart.catart_id','=' , $id], 
    ['catart.catart_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'کتوگری مقاله باموفقیت حدف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewsarts');			  	 
 return redirect('superadmin/viewsarts');  
 
}   }
		
		


 public function addteacher(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addteacher');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('superadmin.addteacher');
	 }}
			



		


 public function addteacherpost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addteacher');  
$h = new SuperadminController();
$h->validatesuperadmin();

    	$this->validate($request,[
    			'name' => 'required',
    			'family' => 'required',
    			'email' => 'required|unique:teacher,teach_email,$request->email',
    			'tell' => 'required|unique:teacher,teach_tell,$request->tell|regex:/^09[0-9]{9}$/',
    			'username' => 'required|min:3|unique:teacher,teach_username,$request->username', 
    			'userpassword' => 'required|min:5|max:35|confirmed'
    		],[
    			'name.required' => 'لطفا نام را وارد نمایید',
    			'family.required' => 'لطفا نام خانوادگی را وارد نمایید',
    			'email.required' => 'لطفا ایمیل را وارد نمایید',
    			'email.unique' => 'این ایمیل قبلا در سیستم ثبت شده است',
    			'tell.required' => 'لطفا شماره همراه را وارد نمایید', 
    			'tell.unique' => 'این شماره همراه قبلا در سیستم ثبت شده است',
    			'tell.regex' => 'لطفا شماره را با کد 09 و مربوط به اپراتورهای ایران انتخاب نمایید.',    
    			'username.required' => 'لطفا نام کاربری را وارد نمایید',
    			'username.min' => 'نام کاربری شما باید بیشتر از 3 کاراکتر باشد',
    			'username.unique' => 'این نام کاربری قبللا در سیستم ثبت شده است',
    			'userpassword.required' => 'لطفا رمز ورود را وارد نمایید',
    			'userpassword.min' => ' رمز کوتاه است',
    			'userpassword.max' => ' رمزعبور طولانی است ',
    			'userpassword.confirmed' => 'رمزعبور با تکرار آن مطابقت ندارد ',
    		]);   
    		
$encryptedPassword = \Crypt::encrypt($request->userpassword);
$decryptedPassword = \Crypt::decrypt($encryptedPassword);
$rnd=rand(1, 99999999); 

$user=\DB::table('teacher')  ->where('id' , '<>' , '0')->orderBy('id' , 'desc')->first();  
    		

DB::table('teacher')->insert([
    [ 'teach_password' => $encryptedPassword ,   'teach_createdatdate' =>  date('Y-m-d H:i:s') , 'teach_active' => 0    , 'teach_username' => $request->username  , 'teach_email' => $request->email  , 'teach_tell' => $request->tell  , 'teach_name' => $request->name   , 'teach_family' => $request->family       ]
]);  
    		 
 $nametr = Session::flash('statust', 'ثبت نام استاد با موفقیت انجام شد.');
 $nametrt = Session::flash('sessurl', 'viewsteachers');

 return redirect('superadmin/viewsteachers'); 


	 } }
			





		

public function viewsteachers(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewsusers');  

$admins = \DB::table('teacher') ->orderBy('id', 'desc')->get();
return view('superadmin.viewsteachers', ['admins' => $admins]);
 
} }




	public function viewsteachersid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::put('idimg', $id); Session::set('nav', 'viewsusers');  
$admins = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();


$profileteachers = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where('teacher.id', '=', $id)  ->orderBy('profileteacher.profile_id', 'desc')->get();


$crpt = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

$oldpassword=$crpt->teach_password;

$password_db= $oldpassword; 
$decryptedPassword =  Crypt::decrypt($password_db);
 

 	  
return view('superadmin.editteacher', ['admins' => $admins  , 'profileteachers' => $profileteachers , 'decryptedPassword' => $decryptedPassword    ]);

 }	 
}





	public function viewsprofileteachers(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 

Session::set('nav', 'viewsprofileteachers'); 

$profileteachers = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where([
    ['teacher.id','<>' , 0], 
])->orderBy('profileteacher.profile_id', 'desc')->get();

 
return view('superadmin.viewsprofileteachers', [ 'profileteachers' => $profileteachers    ]); }	 }


	public function editprofileteacherid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 

Session::set('nav', 'profileteachers'); 

$admin = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where([
    ['teacher.id','<>' , 0], 
    ['profileteacher.profile_id','=' , $id], 
])->orderBy('profileteacher.profile_id', 'desc')->first();



$langs = \DB::table('lang') ->where('lang.lang_id', '<>', 0)  ->orderBy('lang.lang_id', 'desc')->get();

$sens = \DB::table('sen') ->where('sen.sen_id', '<>', 0)  ->orderBy('sen.sen_id', 'asc')->get();
 

$levels = \DB::table('leveltadris') ->where('leveltadris.levelt_id', '<>', 0)  ->orderBy('leveltadris.levelt_id', 'asc')->get();

$citys = \DB::table('city') ->where('city.city_active', '<>', 0)  ->orderBy('city.city_id', 'asc')->get();


$listsens = \DB::table('listsen') 
->Join('sen', 'listsen.listsen_idsen', '=', 'sen.sen_id')    ->where([
    ['listsen.listsen_id','<>' , 0], 
    ['listsen.listsen_idprofile','=' , $id], 
])->orderBy('listsen.listsen_id', 'asc')->get();

$listleveltadriss = \DB::table('listleveltadris') 
->Join('leveltadris', 'listleveltadris.listleveltadris_idleveltadris', '=', 'leveltadris.levelt_id')    ->where([
    ['listleveltadris.listleveltadris_id','<>' , 0], 
    ['listleveltadris.listleveltadris_idprofile','=' , $id], 
])->orderBy('listleveltadris.listleveltadris_id', 'asc')->get();
 

$listlangs = \DB::table('listlang') 
->Join('lang', 'listlang.listlang_idlang', '=', 'lang.lang_id')    ->where([
    ['listlang.listlang_id','<>' , 0], 
    ['listlang.listlang_idprofile','=' , $id], 
])->orderBy('listlang.listlang_id', 'asc')->get();
 

$catcourses = \DB::table('catcourse') ->where('catcourse.catcourse_id', '<>', 0)  ->orderBy('catcourse.catcourse_id', 'asc')->get();


$subcatcourses= \DB::table('subcatcourse')  ->where([ ['subcatcourse_catid', '=',  $admin->profile_typcat] , ])->orderBy('subcatcourse_id', 'desc')->get();
 
return view('superadmin.editprofileteacher', [ 'admin' => $admin   ,'langs' => $langs  ,'sens' => $sens  ,'levels' => $levels  ,'citys' => $citys    ,'listsens' => $listsens  ,'catcourses' => $catcourses   , 'listleveltadriss' => $listleveltadriss  , 'listlangs' => $listlangs   , 'subcatcourses' => $subcatcourses     ]); 


}	 }



	public function editprofileteacheridpost($id  , Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();


$admin = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where([
    ['teacher.id','<>' , 0], 
    ['profileteacher.profile_id','=' , $id], 
])->orderBy('profileteacher.profile_id', 'desc')->first();

if($request->typsubcat!=""){$typsubcat=$request->typsubcat;} else{
	$typsubcat=$admin->profile_typsubcat;
}


$imageName=$admin->profile_img; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }

$filedoc=$admin->profile_madrak; 
 if( $request->hasFile('filed')){ 
        $image = $request->file('filed');
        $filedoc = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$filedoc);    }

$filevid=$admin->profile_uplvid; 
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $filevid = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$filevid);    }

$sis5darsad=5*$request->ojratsis*($request->takh5/100);
$sis5=(5*$request->ojratsis)-$sis5darsad;
$sis10darsad=10*$request->ojratsis*($request->takh10/100);
$sis10=(10*$request->ojratsis)-$sis10darsad; 





 
 $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹']; 
 $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
 
 
 $about= str_replace( $english,$persian , $request->about);  
 $adres= str_replace( $english,$persian , $request->adres);  
 $ojratlevel= str_replace( $english,$persian , $request->ojratlevel); 
 $ojrataz= str_replace( $english,$persian , $request->ojrataz); 
 $ojratsis= str_replace( $english,$persian , $request->ojratsis);   

$idprofile=$admin->profile_id;
 
 $delet = \DB::table('listsen')->where('listsen_idprofile', '=', $idprofile)->delete(); 
 $delet = \DB::table('listlang')->where('listlang.listlang_idprofile', '=', $idprofile)->delete(); 
 $delet = \DB::table('listleveltadris')->where('listleveltadris_idprofile', '=', $idprofile)->delete(); 





//sen
$sens = \DB::table('sen') ->where('sen.sen_id', '<>', 0) ->orderBy('sen.sen_id', 'asc')->get();
foreach($sens as $sen) {  
DB::table('listsen')->insert([
    [   'listsen_idsen' => $sen->sen_id ,   'listsen_arou' => 3   ,   'listsen_idprofile' => $idprofile  ,   'listsen_active' => 0    ]
]);  
}


$myCheckboxes = $request->input('sen');  
$sen=''; $sen .= implode(",", $myCheckboxes);  
if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {   
 
	$updatee = \DB::table('listsen') ->where([
    ['listsen.listsen_idprofile','=' , $idprofile], 
    ['listsen.listsen_idsen','=' , $quan],   
])->update(['listsen_active' =>   '1'     ]); 
	 
  } }
  
  	




//lang

$langs = \DB::table('lang') ->where('lang.lang_id', '<>', 0)  ->orderBy('lang.lang_id', 'desc')->get();
foreach($langs as $lang) {  
DB::table('listlang')->insert([
    [   'listlang_idlang' => $lang->lang_id ,   'listlang_arou' => 3   ,   'listlang_idprofile' => $idprofile    ]
]);  
}


$myCheckboxes = $request->input('lang'); 
$lang=''; $lang .= implode(",", $myCheckboxes);  
if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {  
 
	$updatee = \DB::table('listlang') ->where([
    ['listlang.listlang_idprofile','=' , $idprofile], 
    ['listlang.listlang_idlang','=' , $quan],   
])->update(['listlang_active' =>   '1'     ]); 

 
} }
  	

//leveltadris
$levels = \DB::table('leveltadris') ->where('leveltadris.levelt_id', '<>', 0)  ->orderBy('leveltadris.levelt_id', 'asc')->get();
foreach($levels as $level) {  
DB::table('listleveltadris')->insert([
    [   'listleveltadris_idleveltadris' => $level->levelt_id ,   'listleveltadris_arou' => 3   ,   'listleveltadris_idprofile' => $idprofile   ,   'listleveltadris_active' => 0    ]
]); 
}
  
  
$myCheckboxes = $request->input('level'); 
$level=''; $level .= implode(",", $myCheckboxes);  
if($myCheckboxes != NULL)  {
foreach($myCheckboxes as $quan) {  
 
	$updatee = \DB::table('listleveltadris') ->where([
    ['listleveltadris.listleveltadris_idprofile','=' , $idprofile], 
    ['listleveltadris.listleveltadris_idleveltadris','=' , $quan],   
])->update(['listleveltadris_active' =>   '1'     ]); 

 
} }
  		
   



	$updatee = \DB::table('profileteacher') ->where([
    ['profileteacher.profile_id','=' , $idprofile],   
])->update([  'profile_active' => 0    , 'profile_tit' => $request->tit  , 'profile_instagram' => $request->instagram    , 'profile_about' => $about , 'profile_madrak' => $request->madrak   ,    'profile_uplvid' => $filevid ,    'profile_img' => $imageName ,    'profile_doc' => $filedoc  , 'profile_sex' => $request->sex  , 'profile_city' => $request->city  , 'profile_adres' => $adres  , 'profile_tahsil' => $request->madrak  , 'profile_ojratlevel' => $request->ojratlevel  , 'profile_ojratexam' => $request->ojrataz  , 'profile_ojratsis' => $request->ojratsis  , 'profile_ojrat5' => $request->takh5  , 'profile_ojrat10' => $request->takh10  , 'profile_sis5' => $sis5  , 'profile_sis10' => $sis10 ,  'profile_createdatdate' =>  date('Y-m-d H:i:s')  , 'profile_radesen' => $sen  , 'profile_lang' => $lang  , 'profile_level' => $level   , 'profile_typcat' => $request->typcat  , 'profile_typsubcat' => $typsubcat      ]); 

 

  		
    			 
 $nametr = Session::flash('statust', 'ویرایش پروفایل با موفقیت انجام شد ');
 $nametrt = Session::flash('sessurl', 'viewsteachers');
 

 return redirect('superadmin/editprofileteacher/'.$id); 
  
  
  	


}}


		
	public function viewsteachersidpost($id  , Request $request ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();

$nametr = Session::flash('err', '1');

$this->validate($request,[
    			'name' => 'required|min:3|max:35',
    			'family' => 'required',
    			'username' => 'required',
    			'tell' => 'required|regex:/^09[0-9]{9}$/',
    			'email' => 'required|email',
    			'adres' => 'required|min:3|max:555',
    			'file'  => 'max:1000', 
    		],[
    			'name.required' => 'لطفا نام را وارد نمایید',
    			'name.min' => 'نام کوتاه است',
    			'name.max' => 'نام غیقابل قبول',
    			'family.required' => 'لطفا نام خانوادگی را وارد نمایید',
    			'username.required' => 'لطفا نام کاربری را وارد نمایید',
    			'tell.required' => 'شماره تلفن را بصورت صحیح وارد کنید',
    			'tell.regex' => 'لطفا شماره را با کد 09 و مربوط به اپراتورهای ایران انتخاب نمایید.',    
    			'email.required' => 'ایمیل را بصورت صحیح وارد کنید',
    			'email.email' => 'فرمت ایمیل غیرقابل قبول است',
    			'adres.required' => 'آدرس را بصورت صحیح وارد کنید',
    			'adres.min' => 'دآدرس کوتاه است',
    			'adres.max' => 'آدرس خیلی بلند است',  
    			'file.max' => 'حجم فایل آپلود شده بیشتر از حد مجاز می باشد. (حدمجاز 1مگابایت یا کمتر از این مقدار باید باشد)', 
    			
    		]);
    		


$user = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();

$imageName=$user->teach_img;


 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
 
 

 		if ( $request->email ==  $user->teach_email   ){  $activeemail =  $user->teach_emailactive ; }
 else   if ( $request->email !=  $user->teach_email   ){  $activeemail ='0';}

 		if ( $request->tell ==  $user->teach_tell   ){  $activetell =  $user->teach_tellactive ; }
 else   if ( $request->tell !=  $user->teach_tell   ){  $activetell ='0';}
 
  
 
$updatee = \DB::table('teacher')->where('id', '=', $id)  ->update(['teach_name' => $request->name    ,  'teach_tell' => $request->tell ,  'teach_email' => $request->email ,  'teach_adres' => $request->adres ,  'teach_emailactive' => $activeemail ,  'teach_tellactive' => $activetell , 'teach_img' => $imageName  ]); 

$user = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
if ( ($user->teach_emailactive == 1) &&  ($user->teach_tellactive == 1)   ){  $active=1;}
if ( ($user->teach_emailactive == 0) ||  ($user->teach_tellactive == 0)   ){  $active=0;}
$updatee = \DB::table('teacher')->where('id', '=', $id)  ->update(['teach_active' => $active   ]);

$admins = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();
$nametr = Session::flash('statust', 'ویرایش اطلاعات استاد با موفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsteachers/edit/'.$id.''); 
	 
 return redirect('superadmin/viewsteachers/edit/'.$id.'');     }
}
	



		

	public function deletteachersid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
		  	$admins = \ DB::table('teacher')->where('id', $id)->get();
		  	$admins = \DB::table('teacher')->where('id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف استاد با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsteachers');
		  	
 return redirect('superadmin/viewsteachers'); 
	}	 
				}


		
	public function accteacher($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();


$nametr = Session::flash('err', '3');

$adminacc =  DB::table('teacher')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
  
$updatee = \DB::table('teacher')->where('id', '=', $id)  ->update(['teach_active' => 1   ]); 
		  	$admins = \ DB::table('teacher')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت استاد با موفقیت فعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewsteachers/edit/'.$id.'');			  	
		  			  	
		  	$user = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
  
 return redirect('superadmin/viewsteachers/edit/'.$id.'');  
 
}   }
		

		
	public function rejteacher($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();

$nametr = Session::flash('err', '3');

$adminacc =  DB::table('teacher')->where('id', '=', $id) ->orderBy('id', 'desc')->first();	
  
$updatee = \DB::table('teacher')->where('id', '=', $id)  ->update(['teach_active' => 0   ]); 
		  	$admins = \ DB::table('teacher')->where('id', $id)->get();				
		  	$nametr = Session::flash('statust', 'اکانت استاد با موفقیت غیرفعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewsteachers/edit/'.$id.'');			  	
		  			  	
		  	$user = \DB::table('teacher')->where('id', '=', $id)  ->orderBy('id', 'desc')->first();
  
 return redirect('superadmin/viewsteachers/edit/'.$id.'');  
 
}   }





	public function profileteacherstatid($stat , $id  ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 


$profileteachers = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where('profileteacher.profile_id', '=', $id)  ->orderBy('profileteacher.profile_id', 'desc')->first();


$nametr = Session::flash('err', '4'); 
  
$updatee = \DB::table('profileteacher')->where('profile_id', '=', $id)  ->update(['profile_active' => $stat  ]); 

if($stat=='1'){
		  	$nametr = Session::flash('statust', 'پروفایل باموفقیت فعال شد  '); } else{
		  	$nametr = Session::flash('statust', 'پروفایل باموفقیت غیرفعال شد  '); }

		  	$nametrt = Session::flash('sessurl', 'viewsprofileteachers');			  	
		  			  	 
  
 return redirect('superadmin/viewsprofileteachers');  



}}



	public function profileteacherdeletid( $id  ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 


$profileteachers = \DB::table('teacher')
->Join('profileteacher', 'teacher.id', '=', 'profileteacher.profile_idteacher') ->where('profileteacher.profile_id', '=', $id)  ->orderBy('profileteacher.profile_id', 'desc')->first(); 

$nametr = Session::flash('err', '4');  
 $admins = \DB::table('profileteacher')->where('profile_id', '=', $id)  ->delete(); 

 
 $nametr = Session::flash('statust', 'پروفایل باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewsteachers/edit/'.$profileteachers->profile_idteacher.'');			  	 
 return redirect('superadmin/viewsprofileteachers');   
  
}}



		
	public function loginteacher(Request $request , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
  

$admins = DB::table('teacher')->where([
    ['id' , '=' ,  $id],
])->first();
 

if($admins){

$password_db= $admins->teach_password; 
$decryptedPassword =  Crypt::decrypt($password_db);
 



$name_db= $admins->teach_name.' '.$admins->teach_family;
$id_db= $admins->id;
$activeadmin= $admins->teach_active; 
$teachername_db= $admins->teach_username; 
$password_db= $admins->teach_password;  
  
	
    Session::set('nameteacher', $admins->teach_name.' '.$admins->teach_family);
	Session::set('idteacher', $admins->id); 
	Session::set('signteacher', $admins->teach_username);
	Session::set('activeteacher', $admins->teach_active);

 $updatee = \DB::table('teacher')->where('id', '=', Session::get('idteacher'))  ->update(['teach_loginatdate' => date('Y-m-d H:i:s') ,    'teach_active' => '1'   ,    'teach_emailactive' => '1'   ,    'teach_tellactive' => '1'     ]); 
	

$adminslp = \DB::table('teacher')->where('id', '=', $id_db)  ->orderBy('id', 'desc')->first();
$logindatepas=$adminslp->teach_loginatdate;	

$admimg=$adminslp->teach_img;
if(empty($admimg)){$admimg='user2x.png';}	
 
		
	Session::set('logindateteacher', $logindatepas);
	Session::set('teacherimg', $admimg);
	
 $updatee = \DB::table('teacher')->where('id', '=', Session::get('idteacher'))  ->update(['teach_loginatdate' => date('Y-m-d H:i:s') ,    'teach_ip' => $request->ip()  ]); 
			 return redirect('teacher/panel'); 
	 
}
		else if(empty($admins)) {
			 $nametr = Session::flash('statust',   'اطلاعات را به درستی وارد نمایید.');
			 return redirect('superadmin/viewsteachers'); 
		}















}}





 public function addvideo(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addvideo');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('superadmin.addvideo');
	 }}
			
			
			


 public function addvideopost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addteacher');  
$h = new SuperadminController();
$h->validatesuperadmin();



$imageName=''; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }
 
    		 

DB::table('eduvideo')->insert([
    [   'eduvideo_createdatdate' =>  date('Y-m-d H:i:s') , 'eduvideo_active' => 0     , 'eduvideo_name' => $request->name    , 'eduvideo_link' => $request->link  , 'eduvideo_show' => $request->show   , 'eduvideo_cover' => $imageName ]
]);  
    		 
 $nametr = Session::flash('statust', 'ثبت ویدیو با موفقیت انجام شد.');
 $nametrt = Session::flash('sessurl', 'viewsvideos');

 return redirect('superadmin/viewsvideos'); 


	 } }
			



	

public function viewsvideos(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewsvideos'); 

$admins = \DB::table('eduvideo') ->orderBy('eduvideo_id', 'desc')->get();
return view('superadmin.viewsvideos', ['admins' => $admins]);
 
} }



		
	public function editstatvideos($stat , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 
  
$updatee = \DB::table('eduvideo')->where('eduvideo_id', '=', $id)  ->update(['eduvideo_active' => $stat ]); 

if($stat=='1'){
 $nametr = Session::flash('statust', 'ویدیو باموفقیت فعال شد ');
} else {
 $nametr = Session::flash('statust', 'ویدیو باموفقیت غیرفعال شد ');
}

 $nametrt = Session::flash('sessurl', 'viewsvideos');			  	
 return redirect('superadmin/viewsvideos');  
 
}   }
		





	public function editvideoid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::put('idimg', $id); Session::set('nav', 'viewsvideos'); 
$admin = \DB::table('eduvideo') ->where('eduvideo_id', '=', $id)->orderBy('eduvideo_id', 'desc')->first();
  
return view('superadmin.editvide', ['admin' => $admin    ]); } }





public function editvideoidpost($id ,Request $request ){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewsvideos'); 

$admin = \DB::table('eduvideo') ->where('eduvideo_id', '=', $id)->orderBy('eduvideo_id', 'desc')->first();
 

$imageName=$admin->eduvideo_cover; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }

$updatee = \DB::table('eduvideo')->where('eduvideo_id', '=', $id)  ->update([    'eduvideo_name' => $request->name    , 'eduvideo_link' => $request->link  , 'eduvideo_show' => $request->show   , 'eduvideo_cover' => $imageName  ]); 
 
 $nametr = Session::flash('statust', ' ویدیو باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewsvideos');

 return redirect('superadmin/viewsvideo/edit/'.$id); 
 
} }





	public function deletvideos($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 


$admins = \DB::table('eduvideo') ->orderBy('eduvideo_id', 'desc')->first();

$imgpath=$admins->eduvideo_file; 

if($imgpath){
$path = public_path()."/eduvideo/".$imgpath;
unlink($path);
	
}


		  	$admins = \DB::table('eduvideo')->where('eduvideo_id', '=', $id)->delete(); 
		  	$nametr = Session::flash('statust', 'حذف ویدیو با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsvideos');
		  	
		  	
 return redirect('superadmin/viewsvideos'); 
	}	  }





	public function settingvideo(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
  Session::set('nav', 'settingvideo'); 
$admin = \DB::table('setting') ->where('setting_id', '=', 1)->orderBy('setting_id', 'desc')->first();
  
return view('superadmin.settingvideo', ['admin' => $admin    ]); } }







	public function settingvideopost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
  Session::set('nav', 'settingvideo'); 
$admin = \DB::table('setting') ->where('setting_id', '=', 1)->orderBy('setting_id', 'desc')->first();


$imageName=$admin->setting_covervideoteach; 
 if( $request->hasFile('filei')){ 
        $image = $request->file('filei');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);    }
  
  
$updatee = \DB::table('setting')->where('setting_id', '=', 1)  ->update([  'setting_covervideoteach' => $imageName   ]); 
 
 $nametr = Session::flash('statust', ' تنظیمات سایت با موفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'settingvideo');

 return redirect('superadmin/settingvideo'); 
  
  
  
   } }





		

 public function addcatshop(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addcatshop');  
$h = new SuperadminController();
$h->validatesuperadmin();
return view('sup.addcatshop');
	 }}
			





 public function viewsarticlessup(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
Session::set('nav', 'viewsarticles');   
$admins = \DB::table('articles')  
->leftJoin('teacher', 'articles.art_idteacher', '=', 'teacher.id') 
->where('articles.art_id', '<>', 0)  ->orderBy('art_id', 'desc')->get(); 
return view('superadmin.viewsarticles', ['admins' => $admins]); 
 }}
 
 
 
		
	public function articlesstatid($stat , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 
  
$updatee = \DB::table('articles')->where('art_id', '=', $id)  ->update(['art_active' => $stat ]); 

if($stat=='1'){
 $nametr = Session::flash('statust', 'مقاله باموفقیت تایید شد ');
} else {
 $nametr = Session::flash('statust', 'مقاله به تایید مدیریت نرسید ');
}

 $nametrt = Session::flash('sessurl', 'viewsarticles');			  	
 return redirect('superadmin/viewsarticles');  
 
}   }
		
 
		
	public function deletarticleidsup( $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 

 $admins = \DB::table('articles')->where([
    ['articles.art_id','=' , $id], 
    ['articles.art_id','<>' , 0], 
])->delete(); 
 
 $nametr = Session::flash('statust', 'مقاله باموفقیت حذف شد  ');  
 $nametrt = Session::flash('sessurl', 'viewsarticles');			  	 
 return redirect('superadmin/viewsarticles');  
 
}   }
		
			


 public function viewscoursessup(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
Session::set('nav', 'viewscourses');   
$admins = \DB::table('course')  
->Join('teacher', 'course.course_teacherid', '=', 'teacher.id') 
->where('course.course_teacherid', '<>', 0)  ->orderBy('course_id', 'desc')->get(); 
return view('superadmin.viewscourses', ['admins' => $admins]); 
 }}
			




 public function viewscoursessupeditid($id){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
Session::set('nav', 'viewscourses');   
$admin = \DB::table('course')  
->Join('teacher', 'course.course_teacherid', '=', 'teacher.id') 
->where('course.course_id', '=', $id)  ->orderBy('course_id', 'desc')->first(); 


$langs = \DB::table('lang') ->where('lang.lang_id', '<>', 0)  ->orderBy('lang.lang_id', 'desc')->get();

$sens = \DB::table('sen') ->where('sen.sen_id', '<>', 0)  ->orderBy('sen.sen_id', 'asc')->get();
 

$levels = \DB::table('leveltadris') ->where('leveltadris.levelt_id', '<>', 0)  ->orderBy('leveltadris.levelt_id', 'asc')->get();
 

return view('superadmin.editcourse', ['admin' => $admin ,  'langs' => $langs  ,'sens' => $sens  ,'levels' => $levels   ] ); 
 }}
			
			



 public function viewscoursessupeditidpost($id , Request $request ){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 
 
Session::set('nav', 'viewscourses'); 


$this->validate($request,[ 
    			'name' => 'required',   
    		],[ 
    			'name.required' => 'لطفا نام دوره را وارد نمایید',  
    			
    		]);

 
 $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹']; 
 $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
 
 
 $sis= str_replace( $english,$persian , $request->sis); 
 $dur= str_replace( $english,$persian , $request->dur);
 $kh= str_replace( $english,$persian , $request->kh);
 $des= str_replace( $english,$persian , $request->des);
 $cost= str_replace( $english,$persian , $request->cost);
 $startdate= str_replace( $english,$persian , $request->startdate);
 $enddate= str_replace( $english,$persian , $request->enddate);
 $pes= str_replace( $english,$persian , $request->pes);
 
 if($request->recvdoc){$recvdoc='1'; }else {$recvdoc='0'; }



$updatee = \DB::table('course')->where('course_id', '=', $id)  ->update( ['course_name' => $request->name , 'course_sis' => $sis , 'course_dur' => $dur , 'course_kh' => $kh , 'course_des' => $des , 'course_cost' => $request->cost , 'course_startdate' => $startdate  , 'course_enddate' => $enddate  , 'course_pes' => $pes  , 'course_operator' => $request->operator  , 'course_level' => $request->level  , 'course_lang' => $request->lang  , 'course_sen' => $request->sen , 'course_recvdoc' =>$recvdoc  , 'course_typ' => $request->typ  ]); 

 
 $nametr = Session::flash('statust', 'ویرایش دوره باموفقیت ثبت شد '); 
 $nametrt = Session::flash('sessurl', 'viewscourses/edit/'.$id.'');	
 		  	
 return redirect('superadmin/viewscourses/edit/'.$id.'');  

 }}
			


	
			
			
			


		
	public function viewscoursessupeditstatid($stat , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){  
 
  
$updatee = \DB::table('course')->where('course_id', '=', $id)  ->update(['course_active' => $stat ]); 

if($stat=='1'){
 $nametr = Session::flash('statust', 'دوره باموفقیت فعال شد ');
} else {
 $nametr = Session::flash('statust', 'دوره باموفقیت غیرفعال شد ');
}

 $nametrt = Session::flash('sessurl', 'viewscourses/edit/'.$id.'');			  	
 return redirect('superadmin/viewscourses/edit/'.$id.'');  
 
}   }
		






 public function addcatshopPost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'adduser');  
$h = new SuperadminController();
$h->validatesuperadmin();

    	$this->validate($request,[
    			'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید', 
    		]);   
    	 
DB::table('catshop')->insert([
    [  'cat_name' => $request->name ,   'cat_createdatdate' =>  date('Y-m-d H:i:s')         ]
]);  
    		 
 $nametr = Session::flash('statust', 'ثبت دسته بندی با موفقیت انجام شد.');
 $nametrt = Session::flash('sessurl', 'viewscatshops');

 return redirect('superadmin/viewscatshops'); 


	 } }
			



public function viewscatshops(){  
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
Session::set('nav', 'viewscatshops'); 

$admins = \DB::table('catshop') ->orderBy('cat_id', 'desc')->get();
return view('sup.viewscatshops', ['admins' => $admins]);
 
} }




	public function editcatshopidpost(Request $request , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewscatshops'); 

    	$this->validate($request,[
    	    	'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام دسته بندی را وارد نمایید', 
    			
    		]);    
    		  
$updatee = \DB::table('catshop')->where([
    ['catshop.cat_id','<>' , 0],
    ['catshop.cat_id','=' , $id], 
])->update(['cat_name' => $request->name       ]); 

$nametr = Session::flash('statust', 'دسته بندی باموفقیت ویرایش شد.');
$nametrt = Session::flash('sessurl', 'viewscatshops');

 return redirect('superadmin/viewscatshops');  
	
	} 
}




	public function editcatshopidacc($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 
$updatee = \DB::table('catshop')->where('cat_id', '=', $id)  ->update(['cat_active' => 1   ]); 
 		
		  	$nametr = Session::flash('statust', 'دسته بندی باموفقیت فعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewscatshops');			  	
		  			  	 
  
 return redirect('superadmin/viewscatshops');  
 
}   }
		



	public function editcatshopidrej($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 
$updatee = \DB::table('catshop')->where('cat_id', '=', $id)  ->update(['cat_active' => 0   ]); 
 		
		  	$nametr = Session::flash('statust', 'دسته بندی باموفقیت غیرفعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewscatshops');			  	
		  			  	 
  
 return redirect('superadmin/viewscatshops');  
 
}   }
		

		
	public function deletcatshop($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewscatshops'); 
		  	$admins = \DB::table('catshop') ->where([
    ['catshop.cat_id','<>' , 0],
    ['catshop.cat_id','=' , $id], 
])->delete(); 

		  	$nametr = Session::flash('statust', 'حذف دسته بندی با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewscatshops');
		  	
 return redirect('superadmin/viewscatshops');  
	}	 
				}				
		




	public function addeventsup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 Session::set('nav', 'addevent');   
 
 
$admins = \DB::table('country') ->orderBy('country_id', 'desc')->get();
  
return view('sup.addevent', ['admins' => $admins]);
}	 
}




	public function addeventsuppost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 Session::set('nav', 'addevent');  
 
 
	    	$this->validate($request,[
    	    	'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام رویداد را وارد نمایید', 
    			
    		]);   
 
 
  $imageName='';  
  
  
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
		
    	
    		
 
 DB::table('events')->insert([
    ['event_name' => $request->name , 'event_des' => $request->des , 'event_time' => $request->time  , 'event_loc' => $request->loc ,  'event_linksoc' => $request->linksoc  ,  'event_mem' => $request->mem ,  'event_linkbuy' => $request->linkbuy ,  'event_pay' => $request->pay ,  'event_country' => $request->country ,  'event_state' => $request->state,  'event_city' => $request->city ,  'event_area' => $request->area , 'event_createdatdate' =>  date('Y-m-d H:i:s')   ,   'event_iduser' => 0  ,   'event_img' => $imageName   ,  'event_free' => $request->free   ]
]);   	
 
 
$nametr = Session::flash('statust', 'ثبت رویداد باموفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsevents'); 	   
	
 	return  redirect('superadmin/viewsevents');
 
 
 
}	 
}




	public function viewseventssup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsevents'); 
	 

$admins = 	 \DB::table('events') 
->leftJoin('user', 'events.event_iduser', '=', 'user.id') 
->where([
    ['events.event_id','<>' , 0], 
])->orderBy('events.event_id', 'desc')->get();

return view('sup.viewsevents', ['admins' => $admins]);
}	 
}


  

	public function eventsupid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsevents'); 
	Session::put('idimg', $id);

 


$admins = 	 \DB::table('events') 
->leftJoin('user', 'events.event_iduser', '=', 'user.id') 
->where([
    ['events.event_id','<>' , 0], 
    ['events.event_id','=' , $id], 
])->orderBy('events.event_id', 'desc')->get();
 

return view('sup.editevent', ['admins' => $admins ]); } 
}





	public function eventsupidpost(Request $request , $id  ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();

	Session::set('nav', 'viewsevents'); 


    	$this->validate($request,[
    	    	'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام رویداد را وارد نمایید', 
    			
    		]);   
  		   
$admins = 	 \DB::table('events') 
->leftJoin('user', 'events.event_iduser', '=', 'user.id') 
->where([
    ['events.event_id','<>' , 0],
    ['events.event_id','=' , $id], 
])->orderBy('events.event_id', 'desc')->first();
    		   
 $imageName=$admins->event_img;
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
		
    		   
$updatee = \DB::table('events')->where([
    ['events.event_id','<>' , 0],
    ['events.event_id','=' , $id], 
])->update(['event_name' => $request->name , 'event_des' => $request->des , 'event_time' => $request->time  , 'event_loc' => $request->loc ,  'event_linksoc' => $request->linksoc  ,  'event_mem' => $request->mem ,  'event_linkbuy' => $request->linkbuy ,  'event_pay' => $request->pay , 'event_createdatdate' =>  date('Y-m-d H:i:s')  , 'event_img' =>  $imageName  ,  'event_free' => $request->free ]); 

$nametr = Session::flash('statust', 'ویرایش اطلاعات باموفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsevents/edit/'.$id.'');

 	return  redirect('superadmin/viewsevents/edit/'.$id.'');

} 
}



public function shopdropzone(Request $request )
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);        
 

DB::table('file')->insert([
    ['file_name' =>  $imageName ,  'file_indexid' =>  Session::get('idimg') ,  'file_status' =>  1     ]
]);



        return response()->json(['success'=>$imageName]);
    }
		



	public function stateventssupidpost(Request $request , $status, $id ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsevents'); 
if($status=='1'){
    		   
$updatee = \DB::table('events')->where([
    ['events.event_id','<>' , 0],
    ['events.event_id','=' , $id], 
])->update(['event_desacc' => $request->des ,   'event_active' => '1'     ]); 
$nametr = Session::flash('statust', 'رویداد باموفقیت به تایید مدیریت رسید.');
	
}elseif($status=='2'){
	
$updatee = \DB::table('events')->where([
    ['events.event_id','<>' , 0],
    ['events.event_id','=' , $id], 
])->update(['event_desrej' => $request->des ,   'event_active' => '2'     ]); 
$nametr = Session::flash('statust', 'رویداد به تایید مدیریت نرسید.');
	
}

$nametrt = Session::flash('sessurl', 'viewsevents/edit/'.$id.'');

 	return  redirect('superadmin/viewsevents/edit/'.$id.'');
	
	} 
}





	public function deleteventidsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsevents'); 
	
	
		  	$admins = \DB::table('events')->where([
    ['events.event_id','<>' , 0],
    ['events.event_id','=' , $id], 
])->delete(); 

		  	$nametr = Session::flash('statust', 'حذف رویداد با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsevents');
		  	
 	return  redirect('superadmin/viewsevents');
	}	 
				}				
		

 



	public function viewsshopssup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 
	
	   
	 
$admins = 	 \DB::table('shops') 
->leftJoin('user', 'shops.shop_iduser', '=', 'user.id') 
->where([
    ['shops.shop_id','<>' , 0], 
])->orderBy('shops.shop_id', 'desc')->get();

return view('sup.viewsshops', ['admins' => $admins]);
}	 
}


  
 



	public function addfaqsups(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();  
 
 Session::set('nav', 'addfaqs');
 
$admins = 	 \DB::table('shops') 
->leftJoin('user', 'shops.shop_iduser', '=', 'user.id') 
->where([
    ['shops.shop_id','<>' , 0], 
])->orderBy('shops.shop_id', 'desc')->get();



$faqs = 	 \DB::table('faqs') 
->leftJoin('shops', 'faqs.faq_indexid', '=', 'shops.shop_id') 
->where([
    ['faqs.faq_id','<>' , 0],  
    ['faqs.faq_status','=' , 1], 
])->orderBy('faqs.faq_id', 'desc')->get();



return view('sup.addfaqs', ['admins' => $admins , 'faqs' => $faqs]);
	 
	 
} }




	public function addfaqspostsup(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();  
 
 Session::set('nav', 'addfaqs');
  
 DB::table('faqs')->insert([
    ['faq_qst' => $request->qst , 'faq_rep' => $request->rep , 'faq_status' => '1'  ,   'faq_indexid' => $request->shop     ]
]);   	
 
 
$nametr = Session::flash('statust', 'پرسش و پاسخ باموفقیت ایجاد شد.');
$nametrt = Session::flash('sessurl', 'addfaqs'); 	   
	
 	return  redirect('superadmin/addfaqs');
 
} }












	public function addshopsup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 Session::set('nav', 'addshop');   
 
  
$catshops = \DB::table('catshop')->where([
    ['catshop.cat_id','<>' , 0],
    ['catshop.cat_active','=' , 1], 
])->orderBy('cat_id', 'desc')->get();

$admins = \DB::table('country') ->orderBy('country_id', 'desc')->get();


return view('sup.addshop', ['catshops' => $catshops , 'admins' => $admins]);
	 
	 
}	 
}


  

	
	public function addshopsuppost(Request $request){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 Session::set('nav', 'addshop');   

	    	$this->validate($request,[
    	    	'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام فروشگاه یا مشاغل را وارد نمایید', 
    			
    		]);   
 
 
    		
 
 DB::table('shops')->insert([
    ['shop_name' => $request->name , 'shop_adres' => $request->adres , 'shop_cat' => $request->cat  , 'shop_tell' => $request->tell ,  'shop_instagram' => $request->instagram  ,  'shop_facebook' => $request->faceebook ,  'shop_desservice' => $request->about ,  'shop_googlemap' => $request->googlemap ,  'shop_tell' => $request->tell ,    'shop_time' => $request->time ,    'shop_country' => $request->country ,    'shop_state' => $request->state ,    'shop_city' => $request->city ,    'shop_area' => $request->area   ,   'shop_createdatdate' =>  date('Y-m-d H:i:s')   ,   'shop_iduser' => 0   ]
]);   	
 
 
$nametr = Session::flash('statust', 'ثبت فروشگاه باموفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsshops'); 	   
	
 	return  redirect('superadmin/viewsshops');
	 
}	 
}


  

	public function viewsshopssupid($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 
	Session::put('idimg', $id);

	 
$admins = 	 \DB::table('shops') 
->leftJoin('user', 'shops.shop_iduser', '=', 'user.id') 
->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id], 
])->orderBy('shops.shop_id', 'desc')->get();



$catshops = \DB::table('catshop')->where([
    ['catshop.cat_id','<>' , 0],
    ['catshop.cat_active','=' , 1], 
])->orderBy('cat_id', 'desc')->get();
 

$files = \DB::table('shops')
->join('file', 'shops.shop_id', '=', 'file.file_indexid') ->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id],
    ['file.file_status','=' , 1], 
])->orderBy('shop_id', 'desc')->get();
 

return view('sup.edishop', ['admins' => $admins , 'catshops' => $catshops , 'files' => $files]); } 
}







	public function viewsshopssupidpost(Request $request , $id  ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 

    	$this->validate($request,[
    	    	'name' => 'required', 
    		],[
    			'name.required' => 'لطفا نام فروشگاه یا مشاغل را وارد نمایید', 
    			
    		]);   
 
    		   
$updatee = \DB::table('shops')->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id], 
])->update(['shop_name' => $request->name , 'shop_adres' => $request->adres , 'shop_cat' => $request->cat  , 'shop_tell' => $request->tell ,  'shop_instagram' => $request->instagram  ,  'shop_facebook' => $request->faceebook ,  'shop_desservice' => $request->about ,  'shop_googlemap' => $request->googlemap ,  'shop_tell' => $request->tell ,  'shop_time' => $request->time     ]); 

$nametr = Session::flash('statust', 'ویرایش اطلاعات باموفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewsshops/edit/'.$id.'');

 	return  redirect('superadmin/viewsshops/edit/'.$id.'');
	
	} 
}




	public function statshopssupidpost(Request $request , $status, $id ){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 
if($status=='1'){
    		   
$updatee = \DB::table('shops')->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id], 
])->update(['shop_desacc' => $request->des ,   'shop_active' => '1'     ]); 
$nametr = Session::flash('statust', 'فروشگاه مشاغل باموفقیت به تایید مدیریت رسید.');
	
}elseif($status=='2'){
	
$updatee = \DB::table('shops')->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id], 
])->update(['shop_desrej' => $request->des ,   'shop_active' => '2'     ]); 
$nametr = Session::flash('statust', 'فروشگاه مشاغل به تایید مدیریت نرسید.');
	
}

$nametrt = Session::flash('sessurl', 'viewsshops/edit/'.$id.'');

 	return  redirect('superadmin/viewsshops/edit/'.$id.'');
	
	} 
}





	public function deletimgshopsidsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 
  
$files = \DB::table('shops')
->join('file', 'shops.shop_id', '=', 'file.file_indexid') ->where([
    ['shops.shop_id','<>' , 0],
    ['file.file_id','=' , $id],
    ['file.file_status','=' , 1], 
])->orderBy('shop_id', 'desc')->first();

$filedelets = \DB::table('file') ->where([ 
    ['file.file_id','=' , $id],
    ['file.file_status','=' , 1], 
])->delete(); 
  
		  	$nametr = Session::flash('statust', 'حذف تصویر مربوطه از فروشگاه مشاغل با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsshops/edit/'.$files->shop_id);
		  	
 	return  redirect('superadmin/viewsshops/edit/'.$files->shop_id);
	}	  }				
		



	public function deletshopsidsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewsshops'); 
		  	$admins = \DB::table('shops') ->where([
    ['shops.shop_id','<>' , 0],
    ['shops.shop_id','=' , $id], 
])->delete(); 

		  	$nametr = Session::flash('statust', 'حذف فروشگاه مشاغل با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewsshops');
		  	
 	return  redirect('superadmin/viewsshops');
	}	  }				
		









	
	public function viewstexblogssup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewstexblogs');  
$admins = \DB::table('page')
->leftjoin('user', 'page.page_userid', '=', 'user.id') ->where([
    ['page.page_id','<>' , 0], 
])->orderBy('page.page_id', 'desc')->get();

return view('sup.viewstexblogs', ['admins' => $admins]);
}	 
}




	
	public function addtexblogsup(){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin(); 

Session::set('nav', 'addtexblog'); 
return view('sup.addtexblog'); 
}	 
}




 public function addtexblogsuppost(Request $request){ 
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
 Session::set('nav', 'addtexblog');  
$h = new SuperadminController();
$h->validatesuperadmin();

	    	$this->validate($request,[
    	    	'tit' => 'required|min:3',
    			'prides' => 'required|min:7',
    			'des' => 'required|min:10',
    		],[
    			'tit.required' => 'لطفا عنوان را وارد نمایید',
    			'tit.min' => 'عنوان کوتاه است',
    			'prides.required' => 'لطفا خلاصه متن را وارد نمایید',
    			'prides.min' => 'خلاصه متن کوتاه است',
    			'des.required' => 'لطفا متن را بصورت صحیح وارد نمایید',
    			'des.min' => 'متن کوتاه است',
    			
    		]);   
 
 
  $imageName='';  
  
  
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
		
    		
 
 DB::table('page')->insert([
    ['page_kh' => $request->prides , 'page_tit' => $request->tit , 'page_des' => $request->des ,   'page_createdatdate' =>  date('Y-m-d H:i:s')  ,  'page_active' => 0    ,   'page_img' => $imageName   ,   'page_userid' => 0   ]
]);   	
 
 
$nametr = Session::flash('statust', 'ثبت محتوا باموفقیت انجام شد.');
$nametrt = Session::flash('sessurl', 'viewstexblogs'); 	   
 
 return redirect('superadmin/viewstexblogs'); 


	 } }
			




	public function edittexblogsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewstexblogs'); 
	Session::put('idimg', $id);
	
$admins = \DB::table('page')
->leftjoin('user', 'page.page_userid', '=', 'user.id') ->where([
    ['page.page_id','<>' , 0], 
    ['page.page_id','=' , $id], 
])->orderBy('page.page_id', 'desc')->get();

return view('sup.edittexblog', ['admins' => $admins]); } 
}






	public function acctexblogsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
$adminacc =  DB::table('page')->where('page_id', '=', $id) ->orderBy('page_id', 'desc')->first();	
  
$updatee = \DB::table('page')->where('page_id', '=', $id)  ->update(['page_active' => 1   ]); 
		  	$admins = \ DB::table('page')->where('page_id', $id)->get();				
		  	$nametr = Session::flash('statust', 'محتوا باموفقیت تایید شد .');
		  	$nametrt = Session::flash('sessurl', 'viewstexblogs');			  	
		  			  	
		  	$user = \DB::table('page')->where('page_id', '=', $id)  ->orderBy('page_id', 'desc')->first();
  
 return redirect('superadmin/viewstexblogs/edit/'.$id.'');  
		
	
 
}   }
		
		

	public function rejtexblogsup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
$adminacc =  DB::table('page')->where('page_id', '=', $id) ->orderBy('page_id', 'desc')->first();	
  
$updatee = \DB::table('page')->where('page_id', '=', $id)  ->update(['page_active' => 0   ]); 
		  	$admins = \ DB::table('page')->where('page_id', $id)->get();				
		  	$nametr = Session::flash('statust', 'محتوا باموفقیت غیرفعال شد .');
		  	$nametrt = Session::flash('sessurl', 'viewstexblogs');			  	
		  			  	
		  	$user = \DB::table('page')->where('page_id', '=', $id)  ->orderBy('page_id', 'desc')->first();
  
 return redirect('superadmin/viewstexblogs/edit/'.$id.'');  
		
	
 
}   }
		
		
	public function deletpagesup($id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewstexblogs'); 
		  	$admins = \DB::table('page') ->where([
    ['page.page_id','<>' , 0],
    ['page.page_id','=' , $id], 
])->delete(); 

		  	$nametr = Session::flash('statust', 'حذف محتوا با موفقیت انجام شد.');
		  	$nametrt = Session::flash('sessurl', 'viewstexblogs');
		  	
 return redirect('superadmin/viewstexblogs');  
	}	 
				}				
		




	public function edittexblogpostsup(Request $request , $id){
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
	Session::set('nav', 'viewstexblogs'); 

    	$this->validate($request,[
    	    	'tit' => 'required|min:3',
    			'kh' => 'required|min:3',
    			'des' => 'required|min:5',
    		],[
    			'tit.required' => 'لطفا عنوان را وارد نمایید',
    			'tit.min' => 'عنوان کوتاه است', 
    			'kh.required' => 'لطفا خلاصه را وارد نمایید',
    			'kh.min' => 'خلاصه کوتاه است',
    			'des.required' => 'لطفا توضیحات را بصورت صحیح وارد نمایید',
    			'des.min' => 'توضیحات کوتاه است',
    			
    		]);   
 
    		
$admins = \DB::table('page')->where([
    ['page.page_id','<>' , 0],
    ['page.page_id','=' , $id], 
])->orderBy('page.page_id', 'desc')->first();
  
  $imageName=$admins->page_img;  
  
  
 if( $request->hasFile('file')){ 
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);  
	 
    }
		
    		  
$updatee = \DB::table('page')->where([
    ['page.page_id','<>' , 0],
    ['page.page_id','=' , $id], 
])->update(['page_kh' => $request->kh  , 'page_tit' => $request->tit , 'page_des' => $request->des  , 'page_img' => $imageName   , 'page_active' => '0'     ]); 
$admins = \DB::table('page')->where('page_id', '=', $id)  ->orderBy('page.page_id', 'desc')->get();
$nametr = Session::flash('statust', 'محتوا باموفقیت ویرایش شد.');
$nametrt = Session::flash('sessurl', 'viewstexblogs/edit/'.$id.'');

 return redirect('superadmin/viewstexblogs/edit/'.$id.'');  
	
	} 
}



public function testpanel(){     
$h = new SuperadminController();
$h->validatesuperadmin();
 
$admins = \DB::table('articles') 
->leftJoin('teacher', 'articles.art_idteacher', '=', 'teacher.id') 
->where('articles.art_active', '=', 1)  ->orderBy('art_id', 'desc')->get(); 

 return view('sup.testpanel'  , [ 'admins' => $admins     ]); 
  
 }
	
public function testpanel2(){    
if (empty(Session::has('signsuperadmin'))){   return redirect('superadmin/sign-in');  }
if (Session::has('signsuperadmin')){ 
$h = new SuperadminController();
$h->validatesuperadmin();
 
$admins = \DB::table('articles') 
->leftJoin('teacher', 'articles.art_idteacher', '=', 'teacher.id') 
->where('articles.art_active', '=', 1)  ->orderBy('art_id', 'desc')->get(); 

 return view('superadmin.testpanel2'  , [ 'admins' => $admins     ]); 
  
 } }
		
    
    
    
    
    

public function viewsnotices($mng){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'viewsnotices'); 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();


$admins = \DB::table('formatnotif') ->orderBy('id', 'asc')->get();

 return view('mng.viewsnotices'  , [ 'mngindexs' => $mngindexs ,  'mng' => $mng  , 'admins' => $admins   ]); 
 }
		 
	

public function editnotic($mng,$id){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'viewsnotices'); 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();


$admins = \DB::table('formatnotif')->where('id', '=', $id)  ->orderBy('id', 'desc')->get();

 return view('mng.editnoti'  , [ 'mngindexs' => $mngindexs ,  'mng' => $mng  , 'admins' => $admins   ]); 
 }
		 
	
	 
	

public function editnoticpost($mng,$id,Request $request){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'editnoti'); 


$updatee = \DB::table('formatnotif')->where('id', '=', $id)  ->update([  'form_desem' => $request->desem  ,   'form_desadmin' => $request->desadmin ]); 
 
$nametr = Session::flash('statust', 'فرمت اطلاع رسانی باموفقیت ویرایش شد.');
$nametrt = Session::flash('sessurl', 'viewsnotices'); 
return redirect('manage/'.$mng.'/viewsnotices'); 

 }
		 
	

    
    

public function viewscurrency($mng){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'viewscurrency'); 
$mngindexs = \DB::table('mngindex') ->where('id', '=', '1')->orderBy('id', 'desc')->first();


$admins = \DB::table('currency') ->orderBy('id', 'asc')->get();

 return view('mng.viewscurrency'  , [ 'mngindexs' => $mngindexs ,  'mng' => $mng  , 'admins' => $admins   ]); 
 }
		 
	

    
    

public function viewscurrencyidpost($mng,$id,Request $request){ 

if($mng=='superadmin'){ 
if (empty(Session::has('signsuperadmin'))){ return redirect('manage/superadmin/sign-in'); }	
 else if (Session::has('signsuperadmin')){  

$h = new SuperadminController();
$h->validatesuperadmin();
}}
 if($mng=='admin'){ 
 if (empty(Session::has('signadmin'))){   return redirect('manage/admin/sign-in'); }	
  else if (Session::has('signadmin')){  
  
$h = new SuperadminController();
$h->validatemanager($mng);
}}
 

 Session::set('nav', 'viewscurrency'); 


$updatee = \DB::table('currency')->where('id', '=', $id)  ->update(['cur_gh' => $request->name         ]); 

 $nametr = Session::flash('statust', 'کارنسی باموفقیت ویرایش شد.');
 $nametrt = Session::flash('sessurl', 'viewscurrency');	
return redirect('manage/'.$mng.'/viewscurrency'); 


 }
		 
	

	
	
	}