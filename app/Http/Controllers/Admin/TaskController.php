<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{


    public function index($type=Null){

        $query=Timeline::where([ ['id' , '<>' ,'0'], ]); 
        if($type==null){  $query=$query->where([ ['guard' , '=' ,'user'],['id' , '<>' ,'0'], ]); }
        if($type=='unread'){  $query=$query->where([ ['guard' , '=' ,'user'], ['showadmin' , '=' ,'unread'], ]); }
        if($type=='read'){  $query=$query->where([ ['guard' , '=' ,'user'], ['showadmin' , '=' ,'read'], ]); }
        $tasks= $query->orderBy('id','desc')->get();
        return view('admin.task.index' , compact(['tasks'  ]));
    }




    public function show($id)
    {
        $task=Timeline::find($id);
        return view('admin.task.show' , compact(['task'  ]));
    }




}
