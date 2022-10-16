<?php

namespace App\Http\Controllers\Admin;

use App\Rules\ValidateLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eform\Currency;
use App\Models\Eform\PriceFee;
use RealRashid\SweetAlert\Facades\Alert;

class PriceFinicalController extends Controller
{


public function fee(){
    $price_fee=PriceFee::find(1);
    $currencies=Currency::all();
    return view('admin.Eform.price.fee' , compact(['price_fee' , 'currencies'  ]));
}


public function update_fee(Request $request , PriceFee $price_fee){

    $data = $request->all();
    $currency=Currency::where([ ['rate' , '=',$data['currency']] ])->first();
    $price = $data['money']*$currency->rate;

    update_fee_refresh($currency->id,$data['money'],$price);

    Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
    return redirect()->back();
}




}
