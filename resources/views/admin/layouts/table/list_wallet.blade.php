
@if($wallets)
<table id="dataTableExample" class="table">
  <thead>
    <tr>
      <th>ردیف</th>
      <th> نام کاربر</th>
      <th> مبلغ</th>
      <th> نوع تراکنش</th>
      <th>تاریخ تراکنش</th>
      <th>وضعیت</th>
    </tr>
  </thead>
  <tbody>


@foreach($wallets as $key => $admin)
    <tr>
        <td>{{$key +1}}</td>
        <td> {{$admin->user->name}} </td>
        <td>{{number_format($admin->price)}} ريال</td>
        <td> <a href=""> @include('index.layouts.table.getstatus', [$admin ,'route' => ''  ,'type_name' => 'flag_wallet'   ]) </a> </td>
        <td>{{ date_frmat($admin->created_at) }}</td>
        <td> <a href=""> @include('index.layouts.table.getstatus', [$admin ,'route' => '' ,'type_name' => 'status_wallet'   ]) </a> </td>
    </tr>
@endforeach

  </tbody>
</table>

@endif
