<?php


Route::group(['namespace' => 'user'], function () {
	
//Route::get('user/smssendtesty','UserController@smssendtesty');

Route::get('user','UserController@userlogin');
Route::get('user/sign-in','UserController@userlogin');
Route::post('user/sign-in','UserController@userloginpost');
Route::get('user/register','UserController@registeruser');
Route::post('user/register','UserController@registeruserpost');
Route::get('user/panel','UserController@paneluser');
Route::get('user/panel/{id}','UserController@paneluserid');

Route::get('user/sign-out','UserController@usersignout');	

Route::get('user/myprofile/edit','UserController@editprofileuser');	
Route::post('user/myprofile/edit','UserController@editprofileuserPost');


Route::get('user/settingprofile','UserController@settingprofile');
 
Route::get('user/verificationdoc','UserController@verificationdoc');
Route::post('user/verificationdoc','UserController@verificationdocpost');
Route::post('user/verificationdoc/dropzone/storeusercardmel', ['as'=>'dropzone.storeusercardmel','uses'=>'UserController@dropzoneStoreusercardmel']);
Route::post('user/verificationdoc/post','UserController@verificationdocimgpost');	

Route::get('user/activition','UserController@activitionuser');
Route::post('user/activition/emailuseractivitionverfy','UserController@emailuseractivitionverfy');
Route::post('user/activition/emailuseractivition','UserController@emailuseractivition');
Route::post('user/activition/telluseractivitionverfy','UserController@telluseractivitionverfy');
Route::post('user/activition/telluseractivition','UserController@telluseractivition');


Route::get('user/verificationdoc/verf/{id}','UserController@verificationverfid');

Route::get('user/plane/{plan}','UserController@planeordercat');
Route::get('user/plane/{plan}/{link}','UserController@planeorder');

Route::get('user/order/{plan}/{linkform}','UserController@planeorderid');
Route::get('user/servicei1/order/{plan}/{linkform}','UserController@planeorderservicei1id');

Route::get('user/servicei2/order/{plan}/{linkform}','UserController@planeorderservicei2id');

Route::get('user/servicei3/order/{plan}/{linkform}','UserController@planeorderservicei3id');

Route::get('user/fechcity/{id}','UserController@fechcityid');


Route::post('user/addreq/{plan}/{linkform}','UserController@addreqpost');

Route::get('user/viewsonlineshops','UserController@viewsonlineshopsuser');
Route::get('user/viewsonlineshops/{req_linkname}/{req_id}/{plan}','UserController@viewsonlineshopsuseridplan');
Route::get('user/viewsonlineshops/{req_linkname}/{req_id}/{plan}/delete','UserController@viewsonlineshopsuseridplandelet');

Route::get('user/addticket','UserController@addticketuser'); 
Route::post('user/addticket','UserController@addticketuserPost');
Route::get('user/viewstickets','UserController@viewsticketsuser'); 
Route::get('user/viewstickets/ticket/{id}','UserController@ticketuser');  
Route::post('user/viewstickets/ticket/{id}','UserController@ticketuserPost');  

Route::get('user/viewplan/{nameplan}','UserController@viewplannameplan');



Route::post('user/addcardbank','UserController@addcardbankpost');

});
	




Route::group(['namespace' => 'Superadmin'], function () { 
 
Route::get('/','SuperadminController@signin'); 
Route::get('manage/{mng}','SuperadminController@login'); 
Route::get('superadmin/sign-in','SuperadminController@signin');
Route::get('manage/{mng}/sign-in','SuperadminController@login');  
Route::get('manage/{mng}/sign-in','SuperadminController@login');  
Route::post('manage/{mng}/sign-in','SuperadminController@loginpost');  
Route::get('manage/{mng}/sign-out','SuperadminController@superadminsignout'); 

Route::get('manage/{mng}/dashboard','SuperadminController@dashboard'); 
Route::get('manage/{mng}/profile','SuperadminController@profile');  
Route::post('manage/{mng}/profile','SuperadminController@profilepost'); 
Route::post('manage/{mng}/profile/secret','SuperadminController@profilesecretipost'); 

Route::get('manage/{mng}/plane/{plan}','SuperadminController@mnggiftcart'); 
Route::get('manage/{mng}/plane/{plan}/{id}','SuperadminController@mnggiftcartid'); 
Route::get('manage/{mng}/plane/{plan}/{id}/edit','SuperadminController@mnggiftcartidedit'); 
Route::post('manage/{mng}/plane/{plan}/{id}/edit','SuperadminController@mnggiftcartideditpost'); 

Route::get('manage/{mng}/viewsonlineshops/{plan}','SuperadminController@viewsonlineshopssup'); 
Route::get('manage/{mng}/viewsonlineshops/{req_linkname}/{req_id}/{plan}','SuperadminController@viewsonlineshopsuseridplansup');
Route::get('manage/{mng}/viewsonlineshops/{req_linkname}/{req_id}/{plan}/delete','SuperadminController@viewsonlineshopsuseridplansupdelett');

Route::get('manage/superadmin/numberword/{number}','SuperadminController@convert_number');

Route::get('manage/superadmin/test','SuperadminController@test_number');

Route::get('manage/{mng}/viewsnotices','SuperadminController@viewsnotices'); 
Route::get('manage/{mng}/viewsnotices/editnoti/{id}','SuperadminController@editnotic');
Route::post('manage/{mng}/viewsnotices/editnoti/{id}','SuperadminController@editnoticpost'); 

Route::get('manage/{mng}/viewscurrency','SuperadminController@viewscurrency'); 
Route::post('manage/{mng}/viewscurrency/{id}','SuperadminController@viewscurrencyidpost'); 

 
  
Route::get('manage/{mng}/addadmin','SuperadminController@addadmin'); 
Route::post('manage/{mng}/addadmin','SuperadminController@addadminPost');
Route::get('manage/{mng}/viewsadmins','SuperadminController@viewsadmins');
Route::get('manage/{mng}/viewsadmins/edit/{id}','SuperadminController@viewsadminedit');
Route::post('manage/{mng}/viewsadmins/edit/{id}','SuperadminController@viewsadmineditpost');
Route::get('manage/{mng}/viewsadmins/delet/{id}','SuperadminController@viewsadmindelet');
Route::post('manage/{mng}/viewsadmins/secret/{id}','SuperadminController@viewsadminsecret');
Route::post('manage/{mng}/viewsadmins/access/{id}','SuperadminController@viewsadminaccess');
Route::get('manage/{mng}/viewsadmins/login/{id}','SuperadminController@viewsadminlogin');
  
Route::get('manage/{mng}/docuser/{id}','SuperadminController@docuser'); 

Route::get('manage/{mng}/adduser','SuperadminController@addusersup'); 
Route::post('manage/{mng}/adduser','SuperadminController@addusertPost');
Route::get('manage/{mng}/viewsusers','SuperadminController@viewsuserssup');
Route::get('manage/{mng}/viewsusers/edituser/{id}','SuperadminController@editusersup');
Route::post('manage/{mng}/viewsusers/edituser/{id}','SuperadminController@editusersupPost');
Route::post('manage/{mng}/viewsusers/secret/{id}','SuperadminController@securityystud');
Route::post('manage/{mng}/viewsusers/edituser/{id}/inccharge','SuperadminController@editusersupincchargePost'); 
Route::post('manage/{mng}/viewsusers/edituser/{id}/odat','SuperadminController@chargeuserincpostodat');
Route::post('manage/{mng}/viewsusers/dropzone/store', ['as'=>'dropzone.storeuser','uses'=>'SuperadminController@dropzoneStoreuser']);
 
Route::get('manage/{mng}/viewsusers/delet/{id}','SuperadminController@deletusersup');
Route::get('manage/{mng}/viewsusers/edituser/acc/{id}','SuperadminController@accusersup');
Route::get('manage/{mng}/viewsusers/edituser/rej/{id}','SuperadminController@rejusersup');
Route::get('manage/{mng}/viewsusers/loginuser/{id}','SuperadminController@loginusersup'); 
Route::get('manage/{mng}/viewsusers/edituser/accdoc/{id}','SuperadminController@accdocusersup');
Route::post('manage/{mng}/viewsusers/edituser/rejdoc/{id}','SuperadminController@rejdocpost');
Route::post('manage/{mng}/viewsusers/edituser/acctell/{id}','SuperadminController@acctellpost');
Route::post('manage/{mng}/viewsusers/edituser/accemail/{id}','SuperadminController@accemailpost');
 
 
Route::get('manage/{mng}/viewsusers/requser/{id}','SuperadminController@requsersup');
 
Route::get('manage/{mng}/viewstickets','SuperadminController@viewsticketssup');
Route::get('manage/{mng}/viewstickets/ticket/{id}','SuperadminController@viewsticketssupid');
Route::post('manage/{mng}/viewstickets/ticket/{id}','SuperadminController@viewsticketssupidpost');


Route::get('superadmin/createcatsform','SuperadminController@createcatsform'); 
Route::post('superadmin/createcatsform','SuperadminController@createcatsformPost');
Route::get('superadmin/viewscatsform','SuperadminController@viewscatsform'); 
Route::get('superadmin/viewscatsform/edit/{id}','SuperadminController@viewscatsformeditid'); 
Route::post('superadmin/viewscatsform/edit/{id}','SuperadminController@viewscatsformeditpostid'); 
Route::get('superadmin/viewscatsform/delet/{id}','SuperadminController@deletcatsformeditid'); 

Route::get('superadmin/addsubcatform','SuperadminController@addsubcatform'); 
Route::post('superadmin/addsubcatform','SuperadminController@addsubcatformpost'); 
Route::get('superadmin/subcatform/delet/{id}','SuperadminController@subcatformdelet'); 
Route::get('superadmin/subcatform/edit/{id}','SuperadminController@subcatformeditid');
Route::post('superadmin/subcatform/edit/{id}','SuperadminController@subcatformeditidpost');

Route::get('superadmin/fechcatform/{id}','SuperadminController@fechcatform'); 
Route::get('superadmin/fechtablecatform/{id}','SuperadminController@fechtablecatform'); 
Route::get('superadmin/fechtselectboxsubcatf/{id}','SuperadminController@fechtselectboxsubcatf'); 

Route::get('superadmin/createform','SuperadminController@createform'); 
Route::post('superadmin/createform','SuperadminController@createformpost'); 
Route::get('superadmin/formtype/{id}','SuperadminController@formtypeid'); 
Route::post('superadmin/formtype/{id}','SuperadminController@formtypeidpost');
Route::get('superadmin/selectpriceform/{id}','SuperadminController@selectpriceformid'); 
Route::post('superadmin/selectpriceform/{id}','SuperadminController@selectpriceformidpost');  
Route::get('superadmin/viewsforms','SuperadminController@viewsforms');
Route::get('superadmin/viewsforms/edit/{id}','SuperadminController@viewsformseditid');
Route::post('superadmin/viewsforms/edit/{id}','SuperadminController@viewsformseditidpost');
Route::post('superadmin/viewsforms/edit/{id}/addfeild','SuperadminController@addfeild');
Route::post('superadmin/viewsforms/edit/{id}/sortfeild','SuperadminController@sortfeild');
Route::post('superadmin/viewsforms/edit/{id}/addselectfeild','SuperadminController@addselectfeild');
Route::get('superadmin/viewsforms/delet/{id}/feild/{idfeild}','SuperadminController@deletidfeild');
Route::post('superadmin/viewsforms/edit/{id}/feild','SuperadminController@editfeldformid'); 
Route::get('superadmin/viewsforms/edit/{stat}/{id}','SuperadminController@viewsformseditidstat');

Route::get('superadmin/viewsforms/editselectbox/{id}','SuperadminController@editselectbox');
Route::post('superadmin/viewsforms/editselectbox/{id}','SuperadminController@editselectboxpost');
Route::get('superadmin/viewsforms/editselectboxdelet/{id}','SuperadminController@deletselectbox');

Route::get('superadmin/viewsforms/editcheckbox/{id}','SuperadminController@editcheckbox');
Route::post('superadmin/viewsforms/editcheckbox/{id}','SuperadminController@editcheckboxpost');
Route::get('superadmin/viewsforms/editcheckboxdelet/{id}','SuperadminController@deletcheckbox');
Route::post('superadmin/viewsforms/addcur/{id}/feild','SuperadminController@addcurinformid');


});
	
	 



Route::group(['namespace' => 'Index'], function () {
/*
Route::get('/','IndexController@indexnews'); 
Route::get('category/{id}','IndexController@categoryid'); 
Route::get('new/{newid}','IndexController@newid'); 
Route::get('page/{newid}','IndexController@pageid'); 
*/
	
});


 
 