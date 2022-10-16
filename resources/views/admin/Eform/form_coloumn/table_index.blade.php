

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست فیلدها </h6>
          <div class="table-responsive">

@if($form_coloumns)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th> فرم</th>
                  <th> ورودی</th>
                  <th> نوع ورودی</th>
                  <th> اولویت</th>
                  <th>تاریخ ایجاد</th>
                  <th>  وضعیت</th>
                  <th>  بالا</th>
                  <th> فیلدها</th>
                  <th> ویرایش</th>
                  <th> حذف</th>
                </tr>
              </thead>
              <tbody>


  @foreach($form_coloumns as $key => $admin)
                <tr>
    <td>{{ $key + 1 }}</td>
    <td>{{$admin->form->name}}</td>
<td>{{$admin->name}}</td>
<td>{{$admin->form_field->name}}</td>
<td>{{$admin->priority}}  </td>

<td>{{ date_frmat($admin->created_at) }}</td>


<td>
@include('admin.layouts.table.statusacount', [$admin ,'route' =>
route('admin.form.form_coloumn.status', $admin->id ) , 'myname' => ' فیلد '.$admin->name.' ' ])
</td>

<td>
@if ($key!='0')
<a href="{{route('admin.form.form_coloumn.priority',[$admin->id , 'up'])}}" >
@endif
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
class="feather feather-arrow-up-circle"><circle cx="12" cy="12" r="10"></circle>
<polyline points="16 12 12 8 8 12"></polyline><line x1="12" y1="16" x2="12" y2="8"></line></svg> بالا

@if ($key!='0')</a> @endif
@if ($key!=$count)
<a href="{{route('admin.form.form_coloumn.priority',[$admin->id , 'down'])}}" >@endif
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
class="feather feather-arrow-down-circle"><circle cx="12" cy="12" r="10"></circle>
<polyline points="8 12 12 16 16 12"></polyline><line x1="12" y1="8" x2="12" y2="16"></line></svg>  پایین
@if ($key!=$count) </a> @endif
</td>



<td>
<a href="{{ route('admin.form.form_coloumn.show', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="eye"></i></span>
</a>
</td>
<td>
<a href="{{ route('admin.form.form_coloumn.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>
</td>

<td>
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_coloumn.destroy', $admin) , 'myname' => $admin->name ])
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




