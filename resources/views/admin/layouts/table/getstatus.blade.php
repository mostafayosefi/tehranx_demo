
@if($admin->status=='active')
<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; فعال </span>
@elseif ($admin->status=='inactive')
<span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; غیرفعال </span>
@else
<span class="badge badge-primary"> در دست بررسی</span>
@endif

