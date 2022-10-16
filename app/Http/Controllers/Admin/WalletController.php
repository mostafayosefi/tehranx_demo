<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Wallet;
use App\Rules\ValidateLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WalletController extends Controller
{



    public function index(){
         $wallets= Wallet::all();
        return view('admin.wallet.index' , compact(['wallets'  ]));
    }


    public function create(){
        $users= User::all();
        return view('admin.wallet.create' , compact(['users'  ]));
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
        $data['status']  =  'active';

        $data['price'] = str_rep_price($data['price']);

       Wallet::create($data);
       Alert::success('افزایش اعتبار حساب کاربر با موفقیت انجام شد ', 'افزایش اعتبار حساب کاربر با موفقیت انجام شد');
        return redirect()->route('admin.wallet.index');
    }

    public function show($id)
    {
        $wallet=Wallet::find($id);
        return view('admin.wallet.show' , compact(['wallet'  ]));    }



    public function update(Request $request, $id , Wallet $wallet){

        $request->validate([
            'price' => [new ValidateLink('price','regec_pers')] ,
        ]);
        $data = $request->all();

        $data['price'] = str_rep_price($data['price']);
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

    public function status( $id , $status ,Request $request  ){

        $data = $request->all();
        $wallet=Wallet::find($id);

        $data['textadmin'] =$request->textadmin;

        if($status=='active'){
            Alert::success('تراکنش با موفقیت فعال شد', 'تراکنش با موفقیت فعال شد');
            $wallet->update(['status' => 'active' , 'textadmin' => $data['textadmin']    ]);
        }

        if($status=='inactive'){
            Alert::success('تراکنش با موفقیت لغو شد', 'تراکنش با موفقیت لغو شد');
            $wallet->update(['status' => 'inactive' , 'textadmin' => $data['textadmin']    ]);
        }

        return back();
    }



}
