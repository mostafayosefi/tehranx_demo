<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Getwaypayment;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class GetwaypaymentController extends Controller
{

    public function index()
    {
        $setting=Setting::find(1);
        // $getwaypayments=Setting::all();
        $getwaypayments=$setting->getwaypayments()->get();
        return view('admin.getwaypayment.index' , compact(['getwaypayments'  ]));


    }



    public function edit($id)
    {
        $getwaypayments=Getwaypayment::find($id);
        return view('admin.getwaypayment.edit' , compact(['getwaypayments'  ]));
    }

    public function update(Request $request, $id )
    {

Getwaypayment::where('id', $id)
->update(['token' => $request->token   ]);

Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return redirect()->back();

    }
    public function status(Request $request, $status , $id )
  {
    Getwaypayment::where('id', '<>' , '11')
    ->update(['status' => 'inactive'   ]);

Getwaypayment::where('id', $id)
->update(['status' => 'active'    ]);

    Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
    return redirect()->back();

  }

}
