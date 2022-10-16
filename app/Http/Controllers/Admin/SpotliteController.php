<?php

namespace App\Http\Controllers\Admin;

use App\Models\Spotlite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SpotliteController extends Controller
{
    public function index(){
        $spotlites= Spotlite::all();
        return view('admin.spotlite.index' , compact(['spotlites'  ]));

    }
    public function edit($id){

        $spotlite=Spotlite::find($id);
        return view('admin.spotlite.edit' , compact(['spotlite'  ]));
    }

    public function update(Request $request, $id , Spotlite $spotlite){

        $request->validate([
            'text' => 'required',
            // 'image'  => 'required'

        ]);
        $spotlite=Spotlite::find($id);
        $data = $request->all();
        $data['image']= $spotlite->image;
        $data['image']  =  uploadFile($request->file('image'),'images/setting',$spotlite->image);
 $spotlite->update($data);
Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return back();

    }
}
