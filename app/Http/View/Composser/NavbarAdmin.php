<?php

namespace App\Http\View\Composser;

use App\Models\Ticket;
use App\Models\Timeline;
use Illuminate\Contracts\View\View;

class NavbarAdmin{
    public function compose(View $view){

$count_ticket_unread_user=0;
$list_ticket_unread_user=null;

if(auth()->guard('user')->user()){

$query=Ticket::query()->where([
    ['fromshow' , '=' ,'unread'],
    ['user_id' , '=' ,auth()->guard('user')->user()->id], ]);

$count_ticket_unread_user=$query->count();
$list_ticket_unread_user=$query->get();
}



$query=Ticket::query()->where([ ['id' , '<>' ,'0'],
['toshow' , '=' ,'unread'],  ]);
$count_ticket_unread_admin=$query->count();
$list_ticket_unread_admin=$query->get();





$t_query=Timeline::where([ ['id' , '<>' ,'0'], ]);
$t_query=$t_query->where([ ['guard' , '=' ,'user'], ['showadmin' , '=' ,'unread'], ]);
$count_task_unread_admin = $t_query->count();
$list_task_unread_admin  = $t_query->orderBy('id','desc')->get();



$view->with([  'count_ticket_unread_user' => $count_ticket_unread_user , 'list_ticket_unread_user' => $list_ticket_unread_user ,
'count_ticket_unread_admin' => $count_ticket_unread_admin ,  'list_ticket_unread_admin' => $list_ticket_unread_admin ,
'count_task_unread_admin' => $count_task_unread_admin ,  'list_task_unread_admin' => $list_task_unread_admin ]);


    }
}
