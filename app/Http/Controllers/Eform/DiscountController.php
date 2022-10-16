<?php

namespace App\Http\Controllers\Eform;

use Illuminate\Http\Request;
use App\Models\Eform\PriceDiscount;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
{


    public function index(){
        $price_discounts= PriceDiscount::all();
        return view('admin.Eform.discount.index' , compact(['price_discounts'  ]));
    }


    public function create(){
        return view('admin.Eform.discount.create' );
    }

    public function edit($id){
        $price_discount=PriceDiscount::find($id);
        return view('admin.Eform.discount.edit' , compact(['price_discount'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
        ]);
        $data = $request->all();
        $data['price'] = str_rep_price($data['price']);


       PriceDiscount::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.discount.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , PriceDiscount $price_discount){

        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
        ]);
        $price_discount=PriceDiscount::find($id);
        $data = $request->all();
        $data['price'] = str_rep_price($data['price']);

        $price_discount->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        PriceDiscount::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'price_discounts');
        return back();
    }




}
