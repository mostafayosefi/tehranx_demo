@component('admin.layouts.content',[
    'title'=>'مشاهده صفحات سایت',
    'tabTitle'=>'مشاهده صفحات سایت ',
    'breadcrumb'=>[
            ['title'=>'مشاهده صفحات سایت','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست صفحات سایت</h6>
          <div class="table-responsive">

@if($pages)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>عنوان صفحه</th>
                  <th>تاریخ ایجاد</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($pages as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->title}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>
 <td>


<a href="{{ route('admin.page.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>


</td>
<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.page.destroy', $admin) , 'myname' => $admin->title ])
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
