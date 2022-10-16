<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Setting;
use App\Models\Txtdese;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginuserController extends Controller
{

    public function login(){

        login_active_tell_dashboard();
        return view('user.auth.mylogin'   );
    }



    public function authenticate(Request $request)
    {

        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if(Auth::guard('user')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            $user = Auth::guard('user')->user();
            $authentication=  count_auth($user,$user->authentication);

            if($authentication->tell_verify=='active'){
                Alert::success('با موفقیت انجام شد', 'ورود شما باموفقیت انجام شد');
                return redirect()->route('user.dashboard.index');
            } elseif($authentication->tell_verify!='active'){
                verify_login_tell($user);
                Alert::warning('فعالسازی شماره همراه', 'کد پیامک شده را وارد نمایید');
                return redirect()->route('user.verify');
            }





        }else{
            Session::flash('statust', 'لطفا نام کاربری و رمزعبور را به صورت صحیح وارد نمایید');
            Alert::error('لطفا اطلاعات را به صورت صحیح وارد نمایید   ', 'لطفا نام کاربری و رمزعبور را به صورت صحیح وارد نمایید');
            return redirect()->route('user.login');
        }

    }




    public function register(){
        login_active_tell_dashboard();


        $txtdese=Txtdese::where('id' , '3')->first();
        return view('user.auth.myregister' , compact([ 'txtdese' ]) );
    }



    public function store(Request $request)
    {

        $input = $request->all();
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,$request->username',
            'tell' => 'required|regex:/^09[0-9]{9}$/|unique:users,tell,$request->tell',
            'tells' => 'required|unique:users,tells,$request->tells',
            'email' => 'required|unique:users,email,$request->email',
            'password' => 'required| min:4 |confirmed',
            'password_confirmation' => 'required| min:4',
            'g-recaptcha-response' => 'required|captcha'
        ]);



       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'tell' => $request->tell,
            'tells' => $request->tells,
            'password' => Hash::make($request->password) ,
        ]);

        if(Auth::guard('user')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {


            $authentication=  count_auth($user,$user->authentication);

            verify_login_tell(Auth::guard('user')->user());
            Alert::warning('فعالسازی شماره همراه', 'کد پیامک شده را وارد نمایید');
        return redirect()->route('user.verify');
    }


    }


    public function verify(){

        // if (Auth::guard('user')->user()) {
        // return redirect()->route('user.dashboard.index');  }

        if (Auth::guard('user')->user()) {
            return view('user.auth.verify'  );
        }else{
            return view('user.login'   );
        }

    }



    public function verifypost(Request $request)
    {

        $input = $request->all();


        if(Auth::guard('user')->user()->authentication->tell_code_verify==$request->tell_code_verify){
            activition_auth(Auth::guard('user')->user()->authentication , 'tell' , $request  );
            Alert::success('با موفقیت انجام شد', 'ورود شما باموفقیت انجام شد');
            return redirect()->route('user.dashboard.index');
        }else{

            Auth::guard('user')->logout();
        Alert::error('کد وارد شده معتبر نمی باشد', 'لطفا جهت ورود مجددا اقدام نمایید');
        return redirect()->route('user.login');
        }


    }



    public function logout(Request $request){
        Auth::guard('user')->logout();
        Alert::success('با موفقیت انجام شد', ' شما باموفقیت از اکانت کاربری خود خارج شدید   ');
        return redirect()->route('user.login');
    }


    public function forgetpass(){
        // if (Auth::guard('user')->user()) {
        // return redirect()->route('user.dashboard.index');  }

        // return secret_user($request , $user , 'secret'   , 'users' );


        return view('user.auth.myforgetpass'   );
    }


    public function forgetpasspost(Request $request){

        // dd($request);

        $request->validate([
            'tell' => 'required|regex:/^09[0-9]{9}$/',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $user = User::where([ ['tell' , $request->tell], ])->first();

        if($request->type=='send_verify'){

            if($user){
                verify_login_tell($user);
                Alert::warning('فعالسازی شماره همراه', 'کد پیامک شده را وارد نمایید');
                return view('user.auth.myforgetpass'   , compact([ 'user' ])  );
            }else{
                Alert::error('لطفا نسبت به ثبت نام در سایت اقدام نمایید', ' متاسفانه اکانت کاربری با این مشخصات در سیستم پیدا نشد   ');
                return redirect()->route('user.register');
            }
        } elseif($request->type=='check_verify'){


        if($user->authentication->tell_code_verify==$request->tell_code_verify){
            $result = Auth::guard('user')->loginUsingId($user->id);

            activition_auth($user->authentication , 'tell' , $request  );
            Alert::success('با موفقیت انجام شد', 'ورود شما باموفقیت انجام شد');
            session(['err' => '1']);
            return redirect()->route('user.profile.edit');



        }else{

            Auth::guard('user')->logout();
        Alert::error('کد وارد شده معتبر نمی باشد', 'لطفا جهت ورود مجددا اقدام نمایید');
        return redirect()->route('user.login');
        }


        }

    }




}
