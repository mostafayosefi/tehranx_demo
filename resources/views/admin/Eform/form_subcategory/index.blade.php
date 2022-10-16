@component('admin.layouts.content',[
    'title'=>'مشاهده زیرگروهها',
    'tabTitle'=>'مشاهده زیرگروهها ',
    'breadcrumb'=>[
            ['title'=>'مشاهده زیرگروهها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست زیرگروهها</h6>
          <div class="table-responsive">

@if($form_subcategories)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th> گروه</th>
                  <th> زیرگروه</th>
                  <th>تاریخ ایجاد</th>
                  <th>  وضعیت</th>
                  <th>مشاهده جلسات</th>
                </tr>
              </thead>
              <tbody>


@foreach($form_subcategories as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$admin->form_category->name}}</td>
<td>{{$admin->name}}</td>

<td>{{ date_frmat($admin->created_at) }}</td>


<td>
    @include('admin.layouts.table.statusacount', [$admin ,'route' =>
    route('admin.form.form_subcategory.status', $admin->id ) , 'myname' => ' زیرگروه '.$admin->name.' ' ])
</td>

 <td>
<a href="{{ route('admin.form.form_subcategory.show', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="eye"></i></span>
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
