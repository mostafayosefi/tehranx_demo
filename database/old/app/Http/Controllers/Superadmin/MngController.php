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

class MngController extends Controller
{



public function panelblade(){ 
 
$admins =  DB::table('user')->where([['id', '<>',  '0'],])->count(); 
$useractives =  DB::table('user')->where([['id', '<>',  '0'],['user_active', '=',  '1'],])->count(); 
  
return view('superadmin.panel' , ['admins' => $admins , 'useractives' => $useractives  ]); 
  
}





}