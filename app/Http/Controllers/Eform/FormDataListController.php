<?php

namespace App\Http\Controllers\Eform;

use App\Models\User;
use App\Models\Eform\Form;
use App\Models\Eform\Price;
use Illuminate\Http\Request;
use App\Models\Eform\Currency;
use App\Models\Eform\FormCategory;
use App\Models\Eform\FormDataList;
use App\Models\Eform\PriceFinical;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormSubcategory;
use RealRashid\SweetAlert\Facades\Alert;

class FormDataListController extends Controller
{


    public function index(){
        $form_data_lists= FormDataList::orderby('id','desc')->get();
        return view('admin.Eform.form_data_list.index' , compact(['form_data_lists'  ]));
    }


    public function create(){
        $form_categories= FormCategory::all();
        $form_subcategories= FormSubcategory::all();
        $users= User::all();

        $form=Form::find(6);
        $currencies=Currency::all();

        return view('admin.Eform.form_data_list.create' , compact(['form_categories' ,
        'form_subcategories'  , 'users' , 'form' , 'currencies' ] ));
    }

    public function edit($id){
        $form_data_list=FormDataList::find($id);
        return view('admin.Eform.form_data_list.edit' , compact(['form_data_list'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'form_id' => 'required',
            'user_id' => 'required',
        ]);
        $data = $request->all();
        store_price_form_request($data);

       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_data_list.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , FormDataList $form_data_list){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
        $form_data_list=FormDataList::find($id);
        $data = $request->all();
        $data['image']= $form_data_list->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_data_lists',$form_data_list->image);
        $form_data_list->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        FormDataList::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_data_lists');
        return back();
    }




}
