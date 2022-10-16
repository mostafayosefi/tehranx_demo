<?php

namespace App\Http\Controllers\User;

use App\Models\Wallet;
use App\Rules\ValidateLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WalletController extends Controller
{


    public function index(){
        $user_id  = Auth::guard('user')->user()->id;
        $wallets= Wallet::where([ ['user_id',$user_id], ])->orderBy('id','desc')->get();
        return view('user.wallet.index' , compact(['wallets' , 'user_id'  ]));
    }


    public function create(){
        return view('user.wallet.create' );
    }

    public function edit($id){
        $value=Wallet::find($id);
        return view('user.wallet.edit' , compact(['value'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'price' => [new ValidateLink('price','regec_pers')] ,
        ]);
        $data = $request->all();
        $data['flag']  =  'inc';
        $data['status']  =  'waiting';
        $data['user_id']  = Auth::guard('user')->user()->id;

        $data['price'] = str_rep_price($data['price']);
       Wallet::create($data);
       Alert::error('              متاسفانه درگاه پرداخت فعالی وجود ندارد ', '        پرداخت شارژ حساب انجام نگرفت      ');
        return redirect()->route('user.wallet.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , Wallet $wallet){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $value=Wallet::find($id);
        $data = $request->all();
        $data['image']= $value->image;
        $data['image']  =  uploadFile($request->file('image'),'images/wallets',$value->image);
        $value->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Wallet::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'wallets');
        return back();
    }




}
