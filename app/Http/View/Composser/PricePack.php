<?php

namespace App\Http\View\Composser;

use App\Models\Eform\PriceFee;
use Illuminate\Contracts\View\View;

class PricePack{
    public function compose(View $view){

        $fee_price_fee=PriceFee::find('1')->price;


$view->with([ 'fee_price_fee ' => $fee_price_fee ]);


    }
}
