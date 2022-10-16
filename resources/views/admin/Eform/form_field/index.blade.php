@component('admin.layouts.content',[
    'title'=>'مشاهده انواع فیلد',
    'tabTitle'=>'مشاهده انواع فیلد ',
    'breadcrumb'=>[
            ['title'=>'مشاهده انواع فیلد','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست انواع فیلد</h6>
          <div class="table-responsive">

@if($form_fields)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>  نوع فیلد</th>
                  <th>تاریخ ایجاد</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($form_fields as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>
 <td>


<a href="{{ route('admin.form.form_field.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>


</td>
<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_field.destroy', $admin) , 'myname' => $admin->title ])
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
