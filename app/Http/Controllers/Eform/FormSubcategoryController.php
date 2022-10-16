<?php

namespace App\Http\Controllers\Eform;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormCategory;
use App\Models\Eform\FormSubcategory;
use RealRashid\SweetAlert\Facades\Alert;

class FormSubcategoryController extends Controller
{


    public function index(){
        $form_categories= FormCategory::orderby('id' , 'desc')->get();
        $form_subcategories= FormSubcategory::orderby('id' , 'desc')->get();
        return view('admin.Eform.form_subcategory.index' , compact(['form_subcategories'  ,'form_categories'    ]));
    }


    public function create(){
        $form_categories= FormCategory::all();
        return view('admin.Eform.form_subcategory.create'  , compact([ 'form_categories'])  );
    }

    public function edit($id){
        $form_subcategory=FormSubcategory::find($id);
        return view('admin.Eform.form_subcategory.edit' , compact(['form_subcategory'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/form_subcategories','');

       FormSubcategory::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_subcategory.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , FormSubcategory $form_subcategory){
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $form_subcategory=FormSubcategory::find($id);
        $data = $request->all();

        $data['image']= $form_subcategory->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_subcategories',$form_subcategory->image);

        $form_subcategory->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormSubcategory::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        // dd('hi');
        $status=Change_status($id,'form_subcategories');
        return back();
    }




}
