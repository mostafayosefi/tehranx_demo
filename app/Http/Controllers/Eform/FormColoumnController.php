<?php

namespace App\Http\Controllers\Eform;

use App\Models\Eform\Form;
use Illuminate\Http\Request;
use App\Models\Eform\FormField;
use App\Models\Eform\FormColoumn;
use App\Models\Eform\FormCategory;
use App\Http\Controllers\Controller;
use App\Models\Eform\FormSubcategory;
use RealRashid\SweetAlert\Facades\Alert;

class FormColoumnController extends Controller
{


    public function index($id){

        if($id!='all'){
            $form_coloumns= FormColoumn::where([ ['form_id' , $id] ])->orderBy('priority','asc')->get();
            $count= FormColoumn::where([ ['form_id' , $id] ])->orderBy('priority','asc')->count();
        }else{

            $form_coloumns= FormColoumn::orderBy('priority','asc')->get();
            $count= FormColoumn::orderBy('priority','asc')->count();
        }




        $count--;
        return view('admin.Eform.form_coloumn.index' , compact(['form_coloumns' ,'count'  ]));
    }


    public function create(){
        $forms= Form::all();
        $form_fields= FormField::all();


        $form_categories= FormCategory::all();
        $form_subcategories= FormSubcategory::all();

        return view('admin.Eform.form_coloumn.create' , compact(['forms' , 'form_fields' , 'form_categories' , 'form_subcategories'  ]));
    }

    public function edit($id){
        $form_coloumn=FormColoumn::find($id);
        $form_fields= FormField::all();

        return view('admin.Eform.form_coloumn.edit' , compact(['form_coloumn', 'form_fields'    ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'form_id' => 'required',
            'name' => 'required',
            'form_field_id' => 'required',
        ]);
        $data = $request->all();

        $data['priority']='0';
        $priority['id_link']=$data['form_id'];
        $priority['up_down']='insert';
        $priority['pri_name']='coloumn';
        $priority['my_priority']='0';
        $modal= FormColoumn::create($data);
        $priority['id']= $modal->id;
        $priority['my_priority']='0';
        $m=priority($priority);

       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.form.form_coloumn.index' , $data['form_id'] );
    }

    public function show($id)
    {

        $form_coloumn=FormColoumn::find($id);
        return view('admin.Eform.form_coloumn.show' , compact(['form_coloumn'  ]));
    }

    public function priority($id , $up_down)
    {

        $modal=FormColoumn::find($id);
        $priority['id_link']=$modal->form_id;
        $priority['up_down']=$up_down;
        $priority['pri_name']='coloumn';
        $priority['my_priority']=$modal->priority;
        $priority['id']= $modal->id;
        $m=priority($priority);
        return back();

    }



    public function update(Request $request, $id , FormColoumn $value){
        $request->validate([
            'form_id' => 'required',
            'name' => 'required',
            'form_field_id' => 'required',
        ]);
        $form_coloumn=FormColoumn::find($id);
        $data = $request->all();
        $data['image']= $form_coloumn->image;
        $data['image']  =  uploadFile($request->file('image'),'images/form_columns',$form_coloumn->image);
        $form_coloumn->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        $modal=FormColoumn::find($request->id);
        $priority['id_link']=$modal->form_id;
         FormColoumn::destroy($request->id);

        $data['priority']='0';
        $priority['up_down']='sort';
        $priority['pri_name']='coloumn';
        $priority['my_priority']='0';
        $priority['id']= $request->id;
              priority($priority);


        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'form_coloumns');
        return back();
    }




}
