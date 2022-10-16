@component('admin.layouts.content',[
    'title'=>'مشاهده ارزها',
    'tabTitle'=>'مشاهده ارزها ',
    'breadcrumb'=>[
            ['title'=>'مشاهده ارزها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست ارزها</h6>
          <div class="table-responsive">

@if($currencies)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام ارز</th>
                  <th>تاریخ ایجاد</th>
                  <th>وضعیت</th>
                  <th>ویرایش</th>
                </tr>
              </thead>
              <tbody>


@foreach($currencies as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.form.currency.status', $admin->id ) , 'myname' => ' ارز '.$admin->name.' ' ])
</td>
 <td>


<a href="{{ route('admin.form.currency.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a> 

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
