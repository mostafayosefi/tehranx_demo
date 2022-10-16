<?php

namespace App\Http\Controllers\Eform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Eform\FormTemplate;



class FormTemplateController extends Controller
{


    public function index(){
        $form_templates= FormTemplate::all();
        return view('admin.Eform.form_template.index' , compact(['form_templates'  ]));
    }


    public function create(){
        return view('admin.Eform.form_template.create' );
    }

    public function edit($id){
        $form_template=FormTemplate::find($id);
        return view('admin.Eform.form_template.edit' , compact(['form_template'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/form_templates','');

       FormTemplate::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_template.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , FormTemplate $form_template){
        $request->validate([
            'name' => 'required',
        ]);
        $form_template=FormTemplate::find($id);
        $data = $request->all();
        $data['image']= $form_template->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_templates',$form_template->image);
        $form_template->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormTemplate::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_templates');
        return back();
    }




}
