<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{


    public function index(){
        $banks= Bank::all();
        return view('admin.bank.index' , compact(['banks'  ]));
    }


    public function create(){
        return view('admin.bank.create' );
    }

    public function edit($id){
        $bank=Bank::find($id);
        return view('admin.bank.edit' , compact(['bank'  ]));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
        ]);
        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/banks','');

       Bank::create($data);
       Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.bank.index');
    }

    public function show($id)
    {
        //
    }



    public function update(Request $request, $id , Bank $bank){
        $request->validate([
            'name' => 'required',
        ]);
        $bank=Bank::find($id);
        $data = $request->all();
        $data['image']= $bank->image;
        $data['image']  =  uploadFile($request->file('image'),'images/banks',$bank->image);
        $bank->update($data);
        Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
        return back();
    }


    public function destroy($id , Request $request){
        Bank::destroy($request->id);
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , $id){
        $status=Change_status($id,'banks');
        return back();
    }




}
