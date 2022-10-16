<?php

namespace App\Http\Controllers\Eform;

use Illuminate\Http\Request;
use App\Models\Eform\FormCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FormCategoryController extends Controller
{


    public function index(){
        $form_categories= FormCategory::orderby('id' , 'desc')->get();
        return view('admin.Eform.form_category.index' , compact(['form_categories'  ]));
    }


    public function create(){
        return view('admin.Eform.form_category.create' );
    }

    public function edit($id){
        $form_category=FormCategory::find($id);
        return view('admin.Eform.form_category.edit' , compact(['form_category'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/form_categories','');

       FormCategory::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_category.index');
    }

    public function show($id)
    {

        $form_category=FormCategory::find($id);

        $form_categories= FormCategory::all();

        return view('admin.Eform.form_category.show' , compact(['form_category' , 'form_categories']));
    }



    public function update(Request $request, $id , FormCategory $form_category){
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $form_category=FormCategory::find($id);
        $data = $request->all();

        $data['image']= $form_category->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_categories',$form_category->image);

        $form_category->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormCategory::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_categories');
        return back();
    }




}
