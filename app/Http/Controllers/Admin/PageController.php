<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Page::idDescending()->get();
        return view('admin.page.index' , compact(['pages'  ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image'  => 'required'

        ]);

        $data = $request->all();
        $data['image']  =  uploadFile($request->file('image'),'images/pages','');


    Page::create($data);
Alert::success('با موفقیت ثبت شد', 'اطلاعات جدید با موفقیت ثبت شد');
return redirect()->route('admin.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page=page::find($id);
        return view('admin.page.edit' , compact(['page'  ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id , Page $page)
    {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            // 'image'  => 'required'

        ]);

        $page=page::find($id);
        $data = $request->all();
        $data['image']= $page->image;
        $data['image']  =  uploadFile($request->file('image'),'images/pages',$page->image);


 $page->update($data);
Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');
return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {

        Page::destroy($request->id);
Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
return back();
    }
}
