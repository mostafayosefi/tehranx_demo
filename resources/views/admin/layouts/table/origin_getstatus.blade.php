
@if($type_name == 'status_wallet' )

@if($admin->status=='active')
<span  class="spanstatus spanstatus_success"> پرداخت شده   </span>
@elseif ($admin->status=='inactive')
<span   class="spanstatus spanstatus_warning"> منتظر پرداخت </span>
@else
<span class="spanstatus spanstatus_primary"> در دست بررسی</span>
@endif


@endif

@if($type_name == 'flag_wallet' )

@if($admin->flag=='inc')
<span  class="spanstatus spanstatus_success"> افزایش شارژ   </span>
@elseif ($admin->status=='dec')
<span   class="spanstatus spanstatus_warning"> خرید (کاهش شارژ) </span>
@else
<span class="badge badge-primary"> در دست بررسی</span>
@endif


@endif

@if($type_name == 'status_order' )

@if($admin->status =='active')
<span  class="spanstatus spanstatus_success">   پرداخت شده </span>
@elseif ($admin->status=='rezerve')
<span   class="spanstatus spanstatus_warning">  منتظر پرداخت</span>
@elseif ($admin->status=='inactive')
<span class="spanstatus spanstatus_primary"> در دست بررسی</span>
@endif


@endif



@if($type_name == 'status_ticket' )

@if($admin->status=='response')
<span  class="spanstatus spanstatus_success"> پاسخ داده شده  </span>
@elseif ($admin->status=='waiting')
<span   class="spanstatus spanstatus_warning">   منتظر پاسخ </span>
@elseif ($admin->status=='close')
<span class="spanstatus spanstatus_primary"> تیکت بسته شده</span>
@endif


@endif


@if($type_name == 'read_ticket_user' )
@if($admin->fromshow=='unread')
<span  class="spanstatus spanstatus_primary" title="{{$number}} پیام خوانده نشده" > {{$number}} </span>
@endif
@endif


@if($type_name == 'read_ticket_admin' )
@if($admin->toshow=='unread')
<span  class="spanstatus spanstatus_primary" title="{{$number}} پیام خوانده نشده" > {{$number}} </span>
@endif
@endif


@if($type_name == 'count_read_ticket' )
@if($number!='0')
<span  class="spanstatus spanstatus_primary" title="{{$number}} پیام خوانده نشده" > {{$number}} </span>
@endif
@endif



@if($type_name == 'status_domain' )

@if($admin->status=='active')
<span  class="spanstatus spanstatus_success"> فعال شده  </span>
@elseif ($admin->status=='inactive')
<span   class="spanstatus spanstatus_warning"> غیرفعال </span>
@elseif ($admin->status=='rezerve')
<span class="spanstatus spanstatus_primary">رزرو شده</span>
@elseif ($admin->status=='waiting')
<span class="spanstatus spanstatus_warning">منتظر تایید</span>
@endif


@endif



@if($type_name == 'status_task_admin' )

@if($admin->showadmin=='read')
<span  class="spanstatus spanstatus_success"> بررسی شده</span>
@elseif ($admin->showadmin=='unread')
<span   class="spanstatus spanstatus_warning">  بررسی نشده</span>
@endif


@endif
