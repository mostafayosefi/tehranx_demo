<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Rules\Uniqemail;
use Illuminate\Http\Request;
use App\Models\Loginhistorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile.index');
    }
    public function show(){
        $user = Auth::guard('user')->user();
        return view('user.profile.show', compact(['user'  ]));
    }
    public function edit(){
        $admin = Auth::guard('user')->user();

        $subreferal = User::where('referal' , $admin->id )->get();
        $inviteds = User::find($admin->referal);
        $loginhistories=Loginhistorie::where('user_id',$admin->id)->get();

        return view('user.profile.edit', compact(['admin' , 'subreferal', 'inviteds' , 'loginhistories'  ]));
    }
    public function update(Request $request ){

        $user = Auth::guard('user')->user();
        change_contact( $user->authentication , 'tell'  , $request  );
        change_contact( $user->authentication , 'email'  , $request  );
        return secret_user($request , $user , 'update'  , 'users'  );


    }
    public function secret(){
        return view('user.profile.index');
    }


    public function secret_update(Request $request ){
        $user = Auth::guard('user')->user();
        return secret_user($request , $user , 'secret'   , 'users' );

    }


}
