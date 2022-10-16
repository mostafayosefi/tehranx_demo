<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests;
use App\Models\Setting;
use App\Models\Txtdese;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session ;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {



  if (Auth::guard('admin')->user()) {
return redirect()->route('admin.dashboard');
        }

//     $admin = Admin::create([
//     'name' => 'مصطفی یوسفی' ,
//     'username' => 'admin' ,
//     'email'=> 'admin@gmail.com',
//     'password'=> Hash::make('123456'),
//     'address'=> 'address',
//     'image'=> 'image',
//     'tell'=> 'tell',
// ]);

        // dd('hi');

        $setting=Setting::find(1);

        // return view('auth.admin.login');
        return view('admin.auth.login', compact([ 'setting'  ]) );
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'

        ]);

        // mytest


        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('admin')->user();

            Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.dashboard');

        } else {
            return back()->with('error','اطلاعات ورود متاسفانه اشتباه می باشد!');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success','You are logout successfully');
        return redirect(route('adminLogin'));
    }
}
