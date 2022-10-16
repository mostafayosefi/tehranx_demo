<?php

namespace App\Http\Controllers\User;

use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Authentication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{


    public function index($tab_active=Null){
        $user = Auth::guard('user')->user();
        $authentication= Authentication::where([ ['user_id' , '=' , $user->id  ], ])->orderby('id','desc')->first();

        $bank = Bank::all();
        $authentication=  count_auth($user,$authentication);
        $bank_accounts= BankAccount::where([ ['user_id' , '=' , $user->id  ], ])->orderby('id','desc')->get();
        return view('user.authentication.index' , compact(['authentication' , 'bank_accounts' , 'bank', 'tab_active' ]));
    }



    public function verify_email(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        validate_empty($authentication , 'email');
        $notif=notif_array( 'active','inactive','inactive' );
        send_notification_all($authentication->user,'validation_login', null , $notif );
        return redirect()->route('user.authentication.index' , [ 'email' ] );

    }


    public function activition_email(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        activition_auth($authentication , 'email' , $request  );
        return redirect()->route('user.authentication.index' , [ 'email' ] );
    }



    public function verify_tell(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        validate_empty($authentication , 'tell');
        verify_login_tell(Auth::guard('user')->user());

        return redirect()->route('user.authentication.index' , [ 'tell' ] );
    }


    public function activition_tell(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        activition_auth($authentication , 'tell' , $request  );

        return redirect()->route('user.authentication.index' , [ 'tell' ] );
    }



    public function verify_tells(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        validate_empty($authentication , 'tells');
        return redirect()->route('user.authentication.index' , [ 'tells' ] );
    }


    public function activition_tells(Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        activition_auth($authentication , 'tells' , $request  );
        return redirect()->route('user.authentication.index' , [ 'tells' ] );
    }




    public function change_contact( $contact , Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        change_contact($authentication , $contact , $request  );
        return redirect()->route('user.authentication.index' , [ $contact ] );
    }



    public function upload_file( $file , Request $request  ){
        $authentication= Authentication::where([ ['user_id' , '=' , Auth::guard('user')->user()->id  ], ])->orderby('id','desc')->first();
        upload_file_auth($authentication , $file , $request  );
        return redirect()->route('user.authentication.index' , [ $file ] );
    }




    public function bankaccount(Request $request)
    {
        $request->validate([
            'card' => 'required',
            'shaba' => 'required',
            'bank_id' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/bankaccounts','');
        $data['user_id']  =  Auth::guard('user')->user()->id ;

       BankAccount::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید بانکی با موفقیت ثبت شد');
        return redirect()->route('user.authentication.index',[ 'bank' ]);
    }



    public function create(){
        return view('admin.value.create' );
    }

    public function edit($id){
        $value=Value::find($id);
        return view('admin.value.edit' , compact(['value'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/values','');

       Value::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.value.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , Value $value){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $value=Value::find($id);
        $data = $request->all();
        $data['image']= $value->image;
        $data['image']  =  uploadFile($request->file('image'),'images/values',$value->image);
        $value->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Value::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'values');
        return back();
    }




}
