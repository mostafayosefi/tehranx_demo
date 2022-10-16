<?php

namespace App\Http\Controllers\Eform;

use App\Models\Eform\Form;
use Illuminate\Http\Request;
use App\Models\Eform\Currency;
use App\Models\Eform\FormCategory;
use App\Models\Eform\FormTemplate;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormSubcategory;
use App\Models\Eform\Typeserveice;
use RealRashid\SweetAlert\Facades\Alert;

class PlaneController extends Controller
{


    public function index($link_cat){
        $planes=FormCategory::where([ [ 'link','=',$link_cat ],   ])->first();
        return view('admin.Eform.plane.index' , compact(['planes' , 'link_cat'  ]));
    }



    public function index_subcat($link_cat,$link_subcat){
        $planes=FormSubcategory::where([ [ 'link','=',$link_subcat ],   ])->first();
        $currencies=Currency::all();
        return view('admin.Eform.plane.index_subcat' , compact(['planes' , 'link_cat' , 'link_subcat', 'currencies' ]));
    }


    public function create(){
        return view('admin.value.create' );
    }

    public function edit($link_cat,$link_subcat,$link_form){
        $planes=Form::where([ [ 'link','=',$link_form ],   ])->first();
        $form=Form::where([ [ 'link','=',$link_form ],   ])->first();
        $form_categories= FormCategory::all();
        $form_subcategories= FormSubcategory::all();
        $form_templates= FormTemplate::all();
        $currencies = Currency::all();
        $typeservices = Typeserveice::all();

        return view('admin.Eform.plane.edit' , compact(['planes' ,'form' ,'form_categories' ,
         'form_subcategories', 'form_templates'  , 'currencies'  , 'typeservices'   ]));


    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/values','');

       Value::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.value.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , Value $value){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $value=Value::find($id);
        $data = $request->all();
        $data['image']= $value->image;
        $data['image']  =  uploadFile($request->file('image'),'images/values',$value->image);
        $value->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Value::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'values');
        return back();
    }




}
