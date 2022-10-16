@component('admin.layouts.content',[
    'title'=> ' مدیریت متنهای پیش فرض / '.$notification_type->name,
    'tabTitle'=>' مدیریت متنهای پیش فرض / '.$notification_type->name,
      'breadcrumb' => [['title' => ' مدیریت متنهای پیش فرض', 'url' => route('admin.notification.list.index')],
       ['title' => $notification_type->name,
      'class' => 'active']],
      ])


@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">مدیریت متنهای پیش فرض  </h6>
          <div class="table-responsive">

@if($notification_lists)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                    <th>ردیف</th>
                    <th>اطلاع رسانی</th>
                    <th>  مشاهده </th>
                    <th>  وضعیت </th>
                </tr>
              </thead>
              <tbody>


@foreach($notification_lists as $key => $admin)
<tr>
<td>{{ $key + 1 }}</td>
<td>
{{$admin->name}}
 </td>

<td>
    <a href="{{ route('admin.notification.list.edit', $admin) }}">
    <span class="btn btn-success" >  <i data-feather="edit"></i></span>
    </a>
</td>


<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.notification.list.status', $admin->id ) , 'myname' => ' ارسال '.$admin->name.' ' ])
</td>


</tr>
@endforeach




              </tbody>
            </table>

@endif

          </div>
        </div>
      </div>
    </div>
  </div>







    @slot('script')
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
