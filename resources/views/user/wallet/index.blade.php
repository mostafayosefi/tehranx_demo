@component('user.layouts.content', [
    'title' => 'مدیریت کیف پول',
    'tabTitle' => 'مدیریت کیف پول ',
    'breadcrumb' => [['title' => 'مدیریت کیف پول', 'class' => 'active']],
    ])




@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">

 @endslot







<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">مشاهده تراکنشها </h6>
          <div class="table-responsive">


            <table class="table table-bordered "   >
                <thead>
                    <tr>
                        <th> افزایش اعتبار  </th>
                        <th> هزینه خرید </th>
                        <th> موجودی حساب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{number_format(Mywallet($user_id,'inc'))}} ريال</td>
                        <td> {{number_format(Mywallet($user_id,'dec'))}}  ريال</td>
                        <td> <span class="spanstatus spanstatus_primary">  {{number_format(Mywallet($user_id,'mycharge'))}}  ريال</span></td>
                    </tr>
                </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          </div>






<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">مشاهده تراکنشها </h6>
          <div class="table-responsive">

@if($wallets)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>

                    <th>ردیف</th>
                    <th>مبلغ</th>
                    <th>نوع تراکنش</th>
                    <th>تاریخ تراکنش</th>
                    <th>وضعیت</th>

                </tr>
              </thead>
              <tbody>


@foreach($wallets as $key => $admin)
                <tr>


    <td>{{$key +1}}</td>
    <td>{{number_format($admin->price)}} ريال</td>
    <td> <a href=""> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'flag_wallet'   ]) </a> </td>
    <td>{{ date_frmat($admin->created_at) }}</td>
    <td> <a href=""> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => '' ,'type_name' => 'status_wallet'   ]) </a> </td>




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

    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
