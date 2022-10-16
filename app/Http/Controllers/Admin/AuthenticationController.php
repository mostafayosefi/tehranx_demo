<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Authentication;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{



    public function file_activition(Request $request, Authentication $authentication , $file , $activition){


        $myname = name_type($file);
        $operation = name_type($activition);
         if($file=='document'){
        $authentication->update([ 'document_verify' => $activition   ]); }
         if($file=='cardmelli'){
        $authentication->update([ 'cardmelli_verify' => $activition   ]); }
         if($file=='passport'){
        $authentication->update([ 'passport_verify' => $activition   ]); }
         if($file=='selfi'){
        $authentication->update([ 'selfi_verify' => $activition   ]); }
        session(['errus' => $file]);
        Alert::success('      با موفقیت '.$operation.' شد   ', $myname.' کاربر با موفقیت '.$operation.' شد  ');



        $array_timeline['user_id']=$authentication->user_id;
        $array_timeline['form_data_list_id']='';
        $text=$request->text;
        store_timeline( 'user', $file , $text , $activition , $array_timeline  );


        return redirect()->route('admin.user.edit',[ $authentication->user_id , $file ]);
 
    }



}
