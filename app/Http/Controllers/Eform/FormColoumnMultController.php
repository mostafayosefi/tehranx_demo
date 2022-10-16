<?php

namespace App\Http\Controllers\Eform;

use App\Models\Eform\Form;
use Illuminate\Http\Request;
use App\Models\Eform\FormColoumn;
use App\Models\Eform\FormCategory;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormColoumnMult;
use App\Models\Eform\FormSubcategory;
use RealRashid\SweetAlert\Facades\Alert;

class FormColoumnMultController extends Controller
{


    public function index($id){
        $form_coloumn_mults= FormColoumnMult::orderBy('priority','asc')->get();
        $form_coloumns= FormColoumn::orderBy('priority','asc')->get();
        if($id!='all'){
        $form_coloumn_mults= FormColoumnMult::where( [ ['form_coloumn_id','=',$id], ] )->orderBy('priority','asc')->get();
        $form_coloumns= FormColoumn::find($id);

        }

        return view('admin.Eform.form_coloumn_mult.index' , compact(['form_coloumn_mults' , 'id' , 'form_coloumns'  ]));
    }


    public function create(){

        $forms= Form::all();
        $form_coloumns= FormColoumn::all();


        $form_categories= FormCategory::all();
        $form_subcategories= FormSubcategory::all();

        return view('admin.Eform.form_coloumn_mult.create', compact(['forms' , 'form_coloumns' , 'form_categories' , 'form_subcategories'  ] ));
    }

    public function edit($id){
        $form_coloumn_mult=FormColoumnMult::find($id);
        return view('admin.Eform.form_coloumn_mult.edit' , compact(['form_coloumn_mult'  ]));
    }


    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/form_coloumn_mults','');

        $data['priority']=1;
       FormColoumnMult::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_coloumn_mult.index' , $request->form_coloumn_id);
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , FormColoumnMult $form_coloumn_mult){
        $request->validate([
            'name' => 'required',
         ]);
        $form_coloumn_mult=FormColoumnMult::find($id);
        $data = $request->all();
        $data['image']= $form_coloumn_mult->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_coloumn_mults',$form_coloumn_mult->image);
        $form_coloumn_mult->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormColoumnMult::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_coloumn_mults');
        return back();
    }




}
