<?php

namespace App\Http\Controllers\User;

use pishran\zarinpal\Zarinpal;
use Illuminate\Http\Request;
use App\Models\Eform\FormDataList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ZarinpalController extends Controller
{


    public function request($id){

        $url = 'https://payment.tehranxe.com';
        // $url = 'http://127.0.0.1:8000';

        $user = Auth::guard('user')->user();
        $form_data_list=FormDataList::where([ ['id','=' , $id], ['user_id','=' , $user->id],
         ])->first();
        $amount=$form_data_list->price_finical->sum;

        $response = zarinpal()
        ->merchantId('f8a95131-2fce-4038-b91c-922de44b9627') // تعیین مرچنت کد در حین اجرا - اختیاری
        ->amount($amount) // مبلغ تراکنش
        ->request()
        ->description('transaction info') // توضیحات تراکنش
        ->callbackUrl($url.'/user/zarinpal/verify/'.$id) // آدرس برگشت پس از پرداخت
        ->mobile($user->tell) // شماره موبایل مشتری - اختیاری
        ->email($user->email) // ایمیل مشتری - اختیاری
        ->send();

    if (!$response->success()) {
        return $response->error()->message();
    }

    // ذخیره اطلاعات در دیتابیس
    // $response->authority();

    // هدایت مشتری به درگاه پرداخت
    return $response->redirect();

    }


    public function verify($id){


        $user = Auth::guard('user')->user();
        $form_data_list=FormDataList::where([ ['id','=' , $id], ['user_id','=' , $user->id],
         ])->first();
        $amount=$form_data_list->price_finical->sum;

 $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
$status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال

$response = zarinpal()
    ->merchantId('f8a95131-2fce-4038-b91c-922de44b9627') // تعیین مرچنت کد در حین اجرا - اختیاری
    ->amount($amount)
    ->verification()
    ->authority($authority)
    ->send();

if (!$response->success()) {
    // return $response->error()->message();

    // $form_data_list->update([ 'status' => 'inactive' ]);

    Alert::error('پرداخت انجام نشد      ', '  متاسفانه مشکلی در پرداخت سفارش پیش آمده است        ');
    return redirect()->route('user.payment.order.show',[$id]);
}

// دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
// $response->cardHash();

// دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
// $response->cardPan();

// پرداخت موفقیت آمیز بود
// دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس

$form_data_list->update([ 'status' => 'active' ]);

// return $response->referenceId();

    }


}
