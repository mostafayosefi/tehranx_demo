@component('admin.layouts.content',[
    'title'=>'مشاهده تخفیف ها',
    'tabTitle'=>'مشاهده تخفیف ها ',
    'breadcrumb'=>[
            ['title'=>'مشاهده تخفیف ها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست تخفیف ها</h6>
          <div class="table-responsive">

@if($price_discounts)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام تخفیف</th>
                  <th> هزینه تخفیف</th>
                  <th>تاریخ ایجاد</th>
                  <th>وضعیت</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($price_discounts as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}}</td>
<td>{{flage_price($admin->price)}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.form.discount.status', $admin->id ) , 'myname' => ' تخفیف '.$admin->name.' ' ])
</td>
 <td>


<a href="{{ route('admin.form.discount.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>

</td>
<td>
    @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.discount.destroy', $admin) , 'myname' => $admin->name ])
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
