@component('admin.layouts.content',[
    'title'=>'مدیریت اسپوتلایتها',
    'tabTitle'=>'مدیریت اسپوتلایتها ',
    'breadcrumb'=>[
            ['title'=>'مدیریت اسپوتلایتها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست اسپوتلایتها</h6>
          <div class="table-responsive">

@if($spotlites)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>اسپوتلایت </th>
                  <th>ویرایش</th>
                </tr>
              </thead>
              <tbody>


@foreach($spotlites as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->title}}</td>
 <td>
<a href="{{ route('admin.manegement.spotlites_edit', $admin) }}">
<span class="sm btn btn-primary" >  <i data-feather="edit"></i></span>
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
