<?php

namespace App\Http\Controllers\Admin;

use App\Models\Txtdese;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TextdesController extends Controller
{

    public function index()
    {
        $txtdeses = Txtdese::all();
        return view('admin.txtdes.index' , compact(['txtdeses'  ]));
    }

    public function edit($id)
    {
       $txtdese=Txtdese::find($id);
       return view('admin.txtdes.edit' , compact(['txtdese'  ]));
    }

      public function update(Request $request, $id )
    {

        $request->validate([
            'text' => 'required',
            'image'  => 'max:2000'

        ]);

        $txtdese=Txtdese::find($id);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/setting',$txtdese->image) ?? $txtdese->image ;

        $txtdese->update(['text' => $data['text'] , 'image' => $data['image'] ,   ]);
    Alert::success('با موفقیت ویرایش شد', 'اطلاعات جدید با موفقیت ویرایش شد');
    return redirect()->back();
    }

}
