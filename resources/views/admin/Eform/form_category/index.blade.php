@component('admin.layouts.content',[
    'title'=>'مشاهده کتوگری های فرم',
    'tabTitle'=>'مشاهده کتوگری های فرم ',
    'breadcrumb'=>[
            ['title'=>'مشاهده کتوگری های فرم','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست کتوگری های فرم</h6>
          <div class="table-responsive">

@if($form_categories)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام کتوگری</th>
                  <th>لینک</th>
                  <th>تاریخ ایجاد</th>
                  <th>وضعیت</th>
                  <th>ویرایش</th>
                  <th>مشاهده زیرگروه</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($form_categories as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}}</td>
<td>{{$admin->link}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.form.form_category.status', $admin->id ) , 'myname' => ' گروه '.$admin->name.' ' ])
</td>

 <td>
<a href="{{ route('admin.form.form_category.edit', $admin) }}">
<span class="btn btn-success" >  <i data-feather="edit"></i></span>
</a>
</td>


 <td>
<a href="{{ route('admin.form.form_category.show', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="eye"></i></span>
</a>
</td>

<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_category.destroy', $admin) , 'myname' => $admin->name ])
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
