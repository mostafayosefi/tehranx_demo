<?php

namespace App\Http\Controllers\Admin;

use Pishran\Zarinpal\Zarinpal;
use App\Models\Eform\Form;
use Illuminate\Http\Request;
use App\Models\Eform\Currency;
use App\Models\Eform\FormColoumn;
use App\Models\Eform\FormCategory;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormColoumnMult;
use App\Models\Eform\FormSubcategory;
use RealRashid\SweetAlert\Facades\Alert;

class FetchController extends Controller
{

    public function form_subcategory(  $value){

        $form_categories= FormCategory::find($value);
        $form_subcategories= FormSubcategory::where([ ['form_category_id' ,$value], ])->get();
        return view('admin.Eform.fetch.form_subcategory' , compact(['value' , 'form_categories' , 'form_subcategories'  ]));

    }



    public function form(  $value  , $multi ){

        $forms= Form::find($value);
        $form_coloumns= FormColoumn::where([ ['form_id' ,$value], ])->get();
        return view('admin.Eform.fetch.form' , compact(['value' , 'forms' , 'form_coloumns'  , 'multi' ]));


    }

    public function form_coloumn(  $value ){

        $form_coloumns= FormColoumn::find($value);
        $form_coloumn_mults= FormColoumnMult::where([ ['form_coloumn_id' ,$value], ])->get();
        return view('admin.Eform.fetch.form_coloumn' , compact(['value' , 'form_coloumn_mults' , 'form_coloumns' ]));


    }



    public function form_fetch(  $value ){
        $forms= Form::where([ ['form_subcategory_id' ,$value], ])->get();
        return view('admin.Eform.fetch.form_fetch' , compact(['value' , 'forms'   ]));
    }


    public function form_currency(  $value ){
        $currency= Currency::where([ ['id' ,$value], ])->first();
        return view('admin.Eform.fetch.form_currency' , compact(['value' , 'currency'   ]));
    }


    public function form_fetch_price(  $value ){

        $form=Form::find($value);
        $currencies=Currency::all();
        $currency= Currency::where([ ['id' ,$value], ])->first();
        return view('admin.Eform.fetch.form_fetch_price' , compact(['value' , 'form'  , 'currencies'   ]));
    }



    public function view_js_form(  $value , $guard ){


        $currencies=Currency::all();
        $planes=FormSubcategory::find($value);
        // return view('admin.Eform.fetch.view_js_form' , compact(['value' , 'guard'  , 'planes'   ]));
        return view('admin.Eform.card.plane_index_subcat' , compact(['value' , 'guard'  , 'planes'  , 'currencies'   ]));
    }


    public function zarinpaltest(   ){
        $response = zarinpal()
        ->merchantId('f8a95131-2fce-4038-b91c-922de44b9627') // تعیین مرچنت کد در حین اجرا - اختیاری
        ->amount(100) // مبلغ تراکنش
        ->request()
        ->description('transaction info') // توضیحات تراکنش
        ->callbackUrl('https://payment.tehranxe.com/getway/zarinpalverify') // آدرس برگشت پس از پرداخت
        ->mobile('09123456789') // شماره موبایل مشتری - اختیاری
        ->email('name@domain.com') // ایمیل مشتری - اختیاری
        ->send();

    if (!$response->success()) {
        return $response->error()->message();
    }

    // ذخیره اطلاعات در دیتابیس
    // $response->authority();

    // هدایت مشتری به درگاه پرداخت
    return $response->redirect();

      }


      public function zarinpalverify(){
        $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        $status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال

        $response = zarinpal()
            ->merchantId('f8a95131-2fce-4038-b91c-922de44b9627') // تعیین مرچنت کد در حین اجرا - اختیاری
            ->amount(100)
            ->verification()
            ->authority($authority)
            ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }

        // دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
        // $response->cardHash();

        // دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
        // $response->cardPan();

        // پرداخت موفقیت آمیز بود
        // دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس
        return $response->referenceId();

      }


}
