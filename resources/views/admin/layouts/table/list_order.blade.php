
@if($orders)
<table id="dataTableExample" class="table">
  <thead>
    <tr>

        <th>  ردیف </th>
        <th>  کاربر</th>
        <th>  اکانت</th>
        <th>  نام دامنه </th>
        <th>  هزینه </th>
        <th> تاریخ ثبت </th>
        <th> وضعیت</th>
        <th> مشاهده</th>
        {{-- <th> حذف</th> --}}
    </tr>
  </thead>
  <tbody>


@foreach($orders as $key => $admin)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{$admin->user->name}}</td>
        <td>{{$admin->contact->full_name}}</td>
        <td>{{$admin->domain}}</td>
        <td>{{number_format($admin->price)}} ريال</td>
        <td>{{ date_frmat($admin->created_at) }}</td>
        <td>{{$admin->status}}</td>
        <td> <a href="{{route('admin.order.show' , $admin )}}" class="">  <i data-feather="eye"></i></a></td>
        {{-- <td>
            @if($admin->status=='rezerve')
            @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.page.destroy', $admin) , 'myname' => ' حذف سفارش '.$admin->domain ])
            @else
    -
    @endif
        </td> --}}


    </tr>
@endforeach

  </tbody>
</table>

@endif
