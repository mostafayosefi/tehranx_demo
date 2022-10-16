<?php

namespace App\Http\Controllers\Eform;

use App\Http\Controllers\Controller;
use App\Models\Eform\Currency;
use App\Models\Eform\PriceFee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{


    public function index(){
        $currencies= Currency::all();
        return view('admin.Eform.currency.index' , compact(['currencies'  ]));
    }


    public function create(){
        return view('admin.Eform.currency.create' );
    }

    public function edit($id){
        $currency=Currency::find($id);
        return view('admin.Eform.currency.edit' , compact(['currency'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'price' => 'required',
        ]);
        $data = $request->all();
        $data['rate'] = str_rep_price($data['price']);
        $data['image']  =  uploadFile($request->file('image'),'images/currencies','');

       Currency::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.currency.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , Currency $currency){
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'price' => 'required',
        ]);
        $currency=Currency::find($id);
        $data = $request->all();
        $data['rate'] = str_rep_price($data['price']);
        $data['image']= $currency->image;
        $data['image']  =  uploadFile($request->file('image'),'images/currencies',$currency->image);
        $currency->update($data);

        $price_fee=PriceFee::where([ ['currency_id' ,'=',$id ] ])->first();

        if($price_fee){ update_fee_refresh($currency->id,'0',$data['rate'] );}

        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Currency::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'currencies');
        return back();
    }




}
