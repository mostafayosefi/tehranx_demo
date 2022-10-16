<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{


    public function __construct()
    {

     }


    public function index(){


          $tickets = auth()->guard('user')->user()->tickets()->orderBy('id', 'DESC')->get();
        return view('user.ticket.index' , compact(['tickets'  ]));
    }


    public function create(){
        return view('user.ticket.create' );
    }

    public function edit($id){

        return view('user.ticket.edit' , compact(['value'  ]));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id']=Auth::guard('user')->user()->id;
        $data['arou']='user';
        $ticket = Ticket::create($data);
        $data['ticket_id']=$ticket->id;
        Message::create($data);
        Alert::success('با موفقیت ثبت شد', 'تیکت جدید با موفقیت ثبت شد');
        return redirect()->route('user.ticket.index');
    }

    public function show($id)
    {

        // return view('admin.errors.404' , compact(['tickets'  ]));


$ticket = auth()->guard('user')->user()->tickets()->where('id' , $id)->first();
if($ticket != Null){
    $ticket->update([ 'fromshow' => 'read' ]);
}
    return view('user.ticket.show' , compact(['ticket'  ]));


}



        public function update(Request $request  , Ticket $ticket){

 

            $request->validate([
                'text' => 'required',
            ]);
            $data = $request->all();
            $data['arou']='user';
            $data['ticket_id']=$ticket->id;
            Message::create($data);
            $ticket->update(['toshow' => 'unread' , 'status' => 'waiting' ]);
            Alert::success('با موفقیت ارسال شد', 'پیام شما با موفقیت ارسال شد');
            return back();
        }

        public function destroy( Request $request , Ticket $ticket){
            $ticket->delete();
            Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
            return back();
        }





}
