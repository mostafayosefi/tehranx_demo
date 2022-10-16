@component('admin.layouts.content',[
    'title'=>'مشاهده سوالات متداول',
    'tabTitle'=>'مشاهده سوالات متداول ',
    'breadcrumb'=>[
            ['title'=>'مشاهده سوالات متداول','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot







<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست پرسش پاسخ</h6>
          <div class="table-responsive">

@if($faqs)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>متن سوال</th>
                  <th>تاریخ ایجاد</th>
                  <th>ویرایش</th>
                  <th>حذف</th>
                </tr>
              </thead>
              <tbody>


@foreach($faqs as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$admin->question}}</td>
                    {{-- <td>{{ getStatusEmployerPackage($admin->id) }}</td> --}}
                    <td>{{ date_frmat($admin->created_at) }}</td>
{{-- <td> {{Verta($admin->created_at)->format('Y/m/d ساعت H:i a')}}</td> --}}
                  <td>


<a href="{{ route('admin.faq.edit', $admin) }}">
<span class="btn btn-primary" >  <i data-feather="edit"></i></span>
</a>


</td>
<td>

@php $admin['title'] = $admin->question;  @endphp
@include('admin.layouts.table.modal', [$admin ,'route' => route('admin.faq.destroy', $admin) , 'myname' => $admin->title ])




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
