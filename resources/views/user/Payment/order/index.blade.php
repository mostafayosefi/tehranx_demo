@component('user.layouts.content',[
    'title'=>'مشاهده درخواستهای من',
    'tabTitle'=>'مشاهده درخواستهای من ',
    'breadcrumb'=>[
            ['title'=>'مشاهده درخواستهای من','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست درخواستهای من</h6>
          <div class="table-responsive">

@if($form_data_lists)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام سفارش</th>
                  <th>نام کاربر</th>
                  <th>تاریخ ایجاد</th>
                   <th>ویرایش درخواست</th>
                   <th>مشاهده درخواست</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($form_data_lists as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->form->name}}</td>
<td>{{$admin->user->name}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>

 <td>
<a href="{{ route('user.payment.order.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>
</td>
 <td>
<a href="{{ route('user.payment.order.show', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="eye"></i></span>
</a>
</td>

<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_data_list.destroy', $admin) , 'myname' => $admin->name ])
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
