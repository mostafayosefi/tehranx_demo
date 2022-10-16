<?php

namespace App\Http\Controllers\Admin;

use App\Models\Law;
use App\Models\User;
use App\Models\Address;
use App\Models\Setting;

use App\Models\Mngfinical;
use App\Rules\ValidateLink;
use Illuminate\Http\Request;
use App\Models\Loginhistorie;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class SettingController extends Controller
{

    public function logo_management(){

        // $mngfinical=Mngfinical::find(1);
        // dd($setting);
        // dd($mngfinical);
        // dd($mngfinical->setting);
        // dd($setting->mngfinical);
        // $address = Address::find(1);
        // $user = User::find(1);
        // dd($address->user);
        // dd($address->user);
        // dd($user->loginhistories()->get());
        $setting=Setting::find(1);
        return view('admin.setting.logo_management' , compact(['setting'  ]));
    }


public function update_logo(Request $request){
    $setting=Setting::find(1);

    $request->validate([
        'favicon' => 'required',
        'logo'  => 'required',
    ]);

    $data = $request->all();
    $data['favicon']  =  uploadFile($request->file('favicon'),'images/setting',$setting->favicon);
    $data['logo']  =  uploadFile($request->file('logo'),'images/setting',$setting->logo);


Setting::where('id', 1)
->update(['logo' => $data['logo']  , 'favicon' => $data['favicon']    ]);

Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return redirect()->route('admin.setting.logo_management');


}


public function all_management(){
    $setting=Setting::find(1);
    return view('admin.setting.all_management' , compact(['setting'  ]));
}





public function update_management(Request $request , Setting $setting){

    $request->validate([
        'tell' => 'required',
        'email' => 'required|email',

    ]);


$setting  = Setting::where('id', 1)->first();
$data = $request->all();
$data['instagram']=urllink($request->instagram);
$data['facebook']=urllink($request->facebook);
$data['youtube']=urllink($request->youtube);
$data['twitter']=urllink($request->twitter);
// $data = $request->except(['_token', '_method', 'favicon', 'logo' , '1' ]);
$setting->update($data);

 Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
 return redirect()->route('admin.setting.all_management');


}



public function finical(){
    $setting=Setting::find(1);
    return view('admin.setting.finical' , compact(['setting'  ]));
}


public function update_finical(Request $request , Setting $setting){


    $request->validate([
        'rateusd' => [new ValidateLink('price','regec_pers')] ,
    ]);
    $data = $request->all();
    $data['rateusd'] = str_rep_price($data['rateusd']);


Mngfinical::where('id', 1)
->update(['rateusd' => $data['rateusd']     ]);

    Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
    return redirect()->back();
}



public function api(){
    $setting=Setting::find(1);
    return view('admin.setting.api' , compact(['setting'  ]));
}


public function update_api(Request $request , Setting $setting){

    $request->validate([
        'api' => 'required',
    ]);

    $setting=Setting::find(1);
    $setting->update(['api' => $request->api     ]);

        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return redirect()->back();
    }





public function laws(){

    $setting=Setting::find(1);
    return view('admin.setting.law' , compact(['setting'  ]));
}


public function update_laws(Request $request , Setting $setting){

    Law::where('id', 1)
    ->update(['text' => $request->text     ]);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return redirect()->back();
}


}
