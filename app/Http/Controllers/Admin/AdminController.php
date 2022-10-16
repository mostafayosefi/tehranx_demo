<?php


namespace App\Http\Controllers\Admin;
use SweetAlert;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Eform\FormDataList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
       // return view('admin.dashboard');+
 

       return view('admin.index');
    }
    public function admindemo()
    {
       // return view('admin.dashboard');
    //    return view('admin.index');
    }
    public function demoindex()
    {



       return view('admin.index');
       // return view('admin.dashboard');
    //    return view('admin.index');
    }
}
