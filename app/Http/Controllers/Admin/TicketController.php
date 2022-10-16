<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{




    public function index(){
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('admin.ticket.index' , compact(['tickets'  ]));
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

    public function show(Ticket $ticket)
    {
        $ticket->update([ 'toshow' => 'read' ]);
        return view('admin.ticket.show' , compact(['ticket'  ]));

    }



    public function update(Request $request  , Ticket $ticket){
        
        $request->validate([
            'text' => 'required',
        ]);
        $data = $request->all();
        $data['arou']='admin';
        $data['ticket_id']=$ticket->id;
        Message::create($data);
        $ticket->update(['fromshow' => 'unread' , 'status' => 'response' ]);
        Alert::success('با موفقیت ارسال شد', 'پیام شما با موفقیت ارسال شد');
        return back();
    }


    public function destroy( Request $request , Ticket $ticket){
        $ticket->delete();
        Alert::info('با موفقیت حذف شد', 'اطلاعات با موفقیت حذف شد');
        return back();
    }

    public function status(Request $request , Ticket $ticket ){
         $ticket->update([ 'status' => 'close' ]);
        Alert::success('با موفقیت انجام شد', 'تیکت با موفقیت بسته شد');
        return back();
    }



}
