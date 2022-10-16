<?php

namespace App\Http\Controllers\Admin;

use Verta;
use App\Models\Faq;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Services\Message\Email\EmailService;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $order['tit']=NUll;
        // $order['linktiket']=NUll;
        // $order['linksef']=NUll;
        // $order['pay']=NUll;
        // $order['despay']=NUll;
        // $notif['email']='active';
        // $notif['sms']='active';
        // $notif['elan']='active';
        // $user = User::find('1');
        // send_notification_all($user,'validation_login',$order , $notif);


        $faqs = Faq::idDescending()->get();
        return view('admin.faq.index' , compact(['faqs'  ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 


        return view('admin.faq.create' );



    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
    Faq::create($request->all());
Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
return redirect()->route('admin.faq.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $faq=Faq::find($id);
       return view('admin.faq.edit' , compact(['faq'  ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq=Faq::find($id);
        $faq->update($request->all());

Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {

        Faq::destroy($request->id);
Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
return back();
    }
}
