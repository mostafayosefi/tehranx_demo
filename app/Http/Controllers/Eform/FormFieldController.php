<?php

namespace App\Http\Controllers\Eform;

use App\Http\Controllers\Controller;
use App\Models\Eform\FormField;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FormFieldController extends Controller
{


    public function index(){
        $form_fields= FormField::all();
        return view('admin.Eform.form_field.index' , compact(['form_fields'  ]));
    }


    public function create(){
        return view('admin.Eform.form_field.create' );
    }

    public function edit($id){
        $form_field=FormField::find($id);
        return view('admin.Eform.form_field.edit' , compact(['form_field'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();

       FormField::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_field.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , FormField $form_field){
        $request->validate([
            'name' => 'required',
        ]);
        $form_field=FormField::find($id);
        $data = $request->all(); 
        $form_field->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormField::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_fields');
        return back();
    }




}
