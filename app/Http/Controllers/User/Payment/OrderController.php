<?php

namespace App\Http\Controllers\User\Payment;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Eform\Currency;
use App\Models\Eform\FormData;
use App\Models\Eform\FormColoumn;
use App\Models\Eform\FormDataList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{


    public function index(){
        $user = Auth::guard('user')->user();
        $form_data_lists= FormDataList::where([ ['user_id' , '=' , $user->id  ], ])->orderby('id','desc')->get();
        return view('user.Payment.order.index' , compact(['form_data_lists'  ]));
    }


    public function create(){
        return view('admin.value.create' );
    }

    public function edit($id){
        $user = Auth::guard('user')->user();
        $form_data_list=FormDataList::where([ ['user_id' , '=' , $user->id  ],
        ['id' , '=' , $id  ], ])->get();



        $count=FormData::where([ ['form_data_list_id','=' , $id], ])->count();
        $form_data=FormData::where([ ['form_data_list_id','=' , $id], ])->get();
        $form_data_list=FormDataList::where([ ['id','=' , $id], ])->first();
        $currencies=Currency::all();
        $form_coloumns = FormColoumn::where([  ['form_id' , '=' , $form_data_list->form_id  ], ])->get();



        return view('user.Payment.order.edit' , compact(['form_data' , 'form_data_list' ,
        'form_coloumns' , 'id' , 'currencies']));
    }



    public function store(Request $request , $form)
    {

     $user = Auth::guard('user')->user();
     $data = $request->all();

      $data['form_id']=$form;
      $data['user_id']=$user->id;

      $form_data_list=store_price_form_request($data);
      updata_form_data( $request, $form_data_list->id );

      send_notification_all($user,'request_form', $form_data_list , null );


    //    Alert::success('با موفقیت ثبت شد', 'سفارش شما با موفقیت ثبت شد');
    //     return redirect()->route('user.payment.order.index');
        return redirect()->route('user.zarinpal.request' , ['id'=>$form_data_list->id]);
    }


    public function show($id)
    {

        $count=FormData::where([ ['form_data_list_id','=' , $id], ])->count();
        $form_data=FormData::where([ ['form_data_list_id','=' , $id], ])->get();
        $form_data_list=FormDataList::where([ ['id','=' , $id], ])->first();
        $currencies=Currency::all();
        $form_coloumns = FormColoumn::where([  ['form_id' , '=' , $form_data_list->form_id  ], ])->get();

        $setting = Setting::find(1);

       return view('user.Payment.order.show' , compact(['form_data' , 'form_data_list' ,
       'form_coloumns' , 'id' , 'currencies' , 'setting']));
    }




    public function update(Request $request, $id  ){


        updata_form_data( $request, $id );
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات درخواست کاربر موفقیت ویرایش شد');
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
