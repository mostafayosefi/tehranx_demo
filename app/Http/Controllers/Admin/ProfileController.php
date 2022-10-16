<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{


    public function index(){
        return view('user.profile.index');
    }
    public function show(){
        $user = Auth::guard('admin')->user();
        return view('user.profile.show', compact(['user'  ]));
    }
    public function edit(){

        $admin = Auth::guard('admin')->user();

        return view('admin.profile.edit', compact(['admin'  ]));
    }
    public function update(Request $request ){

        $user = Auth::guard('admin')->user();
        return secret_user($request , $user , 'update' , 'admins' );


    }
    public function secret(){
        return view('user.profile.index');
    }


    public function secret_update(Request $request ){

        $user = Auth::guard('admin')->user();
        return secret_user($request , $user , 'secret' , 'admins'  );

    }


}
