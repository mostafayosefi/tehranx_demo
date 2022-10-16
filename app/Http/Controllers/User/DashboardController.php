<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Authentication;
use App\Models\Eform\FormCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{


    public function dashboard(){
        $user = Auth::guard('user')->user();
        $authentication= Authentication::where([ ['user_id' , '=' , $user->id  ], ])->orderby('id','desc')->first();

        $authentication=  count_auth($user,$authentication);

        $dash_id  = Auth::guard('user')->user()->id;


        $link_cat = 'Money';
        $planes=FormCategory::where([ [ 'link','=',$link_cat ],   ])->first();

        $tickets = auth()->guard('user')->user()->tickets()->orderBy('id', 'DESC')->get();
        return view('user.dashboard.index' , compact(['dash_id' , 'planes' , 'link_cat', 'tickets', 'authentication' ]));
    }


}
