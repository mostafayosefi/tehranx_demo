<?php

namespace App\Http\Controllers\User;

use App\Models\Setting;
use App\Models\Txtdese;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{


    public function login(){

        dd('hhh');

        $txtdese=Txtdese::where('id' , '2')->first();
        $setting=Setting::find(1);
        if (Auth::guard('user')->user()) {
        return redirect()->route('user.dashboard.index');  }

        // return view('user.brand.auth.login' , compact([ 'txtdese' , 'setting']) );
    }




    public function logout(Request $request){
        Auth::guard('user')->logout();
        Alert::success('با موفقیت انجام شد', ' شما باموفقیت از اکانت کاربری خود خارج شدید   ');
        return redirect()->route('user.login');
    }

}
