@component('admin.layouts.content',[
    'title'=>'مشاهده فرمها',
    'tabTitle'=>'مشاهده فرمها ',
    'breadcrumb'=>[
            ['title'=>'مشاهده فرمها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست فرمها</h6>
          <div class="table-responsive">

@if($forms)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام فرم</th>
                  <th>لینک</th>
                  <th>گروه</th>
                  <th>زیرگروه</th>
                  <th>تاریخ ایجاد</th>
                  <th>وضعیت</th>
                  <th>ویرایش</th>
                  <th>مشاهده فرم</th>
                  <th>  فیلدها</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($forms as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}}</td>
<td>{{$admin->link}}</td>
<td>{{$admin->form_subcategory->form_category->name}}</td>
<td>{{$admin->form_subcategory->name}}</td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.form.form.status', $admin->id ) , 'myname' => ' فرم '.$admin->name.' ' ])
</td>

 <td>
<a href="{{ route('admin.form.form.edit', $admin) }}">
<span class="btn btn-success" >  <i data-feather="edit"></i></span>
</a>
</td>


 <td>
<a href="{{ route('admin.form.form.show', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="eye"></i></span>
</a>
</td>
 <td>
<a href="{{ route('admin.form.form_coloumn.index', $admin->id) }}">
<span class="btn btn-primary" >  <i data-feather="align-justify"></i></span>
</a>
</td>

<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form.destroy', $admin) , 'myname' => $admin->name ])
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
