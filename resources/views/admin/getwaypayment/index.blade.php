@component('admin.layouts.content',[
    'title'=>' مدیریت درگاههای پرداخت',
    'tabTitle'=>'مدیریت درگاههای پرداخت',
    'breadcrumb'=>[
            ['title'=>'مدیریت درگاههای پرداخت','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot


<span style="color: #db24cd">دقت نمایید شما فقط یک درگاه پرداخت برای سیستم می توانید فعال نمایید  </span>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست درگاههای پرداخت </h6>
          <div class="table-responsive">

@if($getwaypayments)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درگاه پرداخت</th>
                    <th>تاریخ ایجاد</th>
                    <th>مشاهده</th>
                </tr>
              </thead>
              <tbody>


@foreach($getwaypayments as $key => $admin)
                <tr>
 <td>{{ $key + 1 }}</td>
<td>
    <a href="{{ route('admin.setting.getway_payment_edit' , $admin ) }}" >
        {{$admin->name}}
    </a></td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
@include('admin.layouts.table.status', [$admin ,'class'=> ''   , 'route' =>  route('admin.setting.getway_payment_status' , ['id' => $admin->id , 'status'=>$admin->status]) , 'myname' => 'درگاه پرداخت '.$admin->name ])
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
