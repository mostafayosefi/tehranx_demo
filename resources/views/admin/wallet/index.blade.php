@component('admin.layouts.content',[
    'title'=>'مشاهده تراکنش های کاربران',
    'tabTitle'=>'مشاهده تراکنش های کاربران ',
    'breadcrumb'=>[
            ['title'=>'مشاهده تراکنش های کاربران','class' => 'active']
    ]])



@slot('style')
<link data-minify="1" rel='stylesheet'   href="{{ asset('telnum_files/mystyle.css') }}"  type='text/css' media='all' />

<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

@endslot






<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست تراکنش های کاربران</h6>
          <div class="table-responsive">


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
                    <td> <a href="{{ route('admin.wallet.show', $admin) }}"> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'flag_wallet'   ]) </a> </td>
                    <td>{{ date_frmat($admin->created_at) }}</td>
                    <td> <a href="{{ route('admin.wallet.show', $admin) }}"> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => '' ,'type_name' => 'status_wallet'   ]) </a> </td>
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
