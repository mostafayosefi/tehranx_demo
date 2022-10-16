<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Rules\Uniqemail;
use Illuminate\Http\Request;
use App\Models\Loginhistorie;
use App\Models\Authentication;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  /*       User::create([
            'name' => 'Name34',
            'email' => 'nnn33@gmail.com',
            'password' => Hash::make('123456') ,
        ]); */

        $users=User::orderBy('id','desc')->get();;



return view('admin.user.index' , compact(['users'  ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,$request->username',
            'email' => 'required|unique:users,email,$request->email',
            'password' => 'required| min:4 |confirmed',
            'password_confirmation' => 'required| min:4'
        ]);


        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) ,
        ]);

        Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user , $tab_active=Null  )
    {



        // dd($user->id);
        $authentication= Authentication::where([ ['user_id' , '=' , $user->id  ], ])->orderby('id','desc')->first();
        $authentication=  count_auth($user,$authentication);
        $admin = $user;
        $subreferal = User::where('referal' , $user->id )->get();
        $inviteds = User::find($admin->referal);
        $loginhistories=Loginhistorie::where('user_id',$user->id)->get();
        $bank = Bank::all();
        $bank_accounts = BankAccount::where([ ['user_id' , '=' , $user->id  ], ])->get();

        if($tab_active){
            update_show_timeline('admin' , $tab_active , $user->id);
        }

        return view('admin.user.edit' , compact([ 'admin' , 'subreferal', 'inviteds' ,
        'loginhistories' , 'tab_active', 'bank' , 'bank_accounts' ]) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

/*
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'emails' => [new Uniqemail],
            'tell' => 'required',
        ]); */
/*
        $request->validate([
            'username' => Rule::unique('users')->where(function ($query) {
                return $query->where('id', 3) ;
            }),
        ]); */

        return secret_user($request , $user , 'update'  , 'users' );


    }




    public function secret(Request $request, User $user)
    {
        return secret_user($request , $user , 'secret'  , 'users'  );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {

        User::destroy($request->id);
Alert::info('با موفقیت حذف شد', 'کاربر با موفقیت حذف شد');
return back();    }




public function status(Request $request , $id  , $tab_active=Null ){
$status=Change_status($id,'users');
return redirect()->route('admin.user.edit',[ $id , $tab_active ]);
}



public function status_bank_account(Request $request , $id  , $tab_active=Null ){

$status=Change_status($id,'bank_accounts');
$bank_account=BankAccount::find($id);
$array_timeline['user_id']=$bank_account->user_id;
$array_timeline['form_data_list_id']='';
if($bank_account->status=='active'){ $flag = 'active'; $text = 'اطلاعات حساب بانکی '.$bank_account->bank->name.' با موفقیت تایید شد';   }
else{$flag = 'reject';  $text = 'اطلاعات حساب بانکی '.$bank_account->bank->name.' توسط مدیریت رد شد';  }


store_timeline( 'admin', 'bank_account' , $text , $flag , $array_timeline  );


return redirect()->route('admin.user.edit',[ $id , 'bank_account' ]);
}




    public function status_api(Request $request , $id){
$status=Change_status($id,'apiwebservice');
return back();
    }



    public function login($id)
    {


        $result = Auth::guard('user')->loginUsingId($id);

        Alert::success('با موفقیت انجام شد', 'ورود شما باموفقیت انجام شد');

        return redirect()->route('user.dashboard.index');


    }





}
