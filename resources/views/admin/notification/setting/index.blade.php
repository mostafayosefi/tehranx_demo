@component('admin.layouts.content',[
    'title'=>' مدیریت درگاههای پیامک',
    'tabTitle'=>'مدیریت درگاههای پیامک',
    'breadcrumb'=>[
            ['title'=>'مدیریت درگاههای پیامک','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot


<span style="color: #db24cd">دقت نمایید شما فقط یک درگاه پیامک برای سیستم می توانید فعال نمایید  </span>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست درگاههای پیامک </h6>
          <div class="table-responsive">

@if($setting_sms)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام درگاه پیامک</th>
                    <th>تاریخ ایجاد</th>
                    <th>مشاهده</th>
                </tr>
              </thead>
              <tbody>


@foreach($setting_sms as $key => $admin)
                <tr>
 <td>{{ $key + 1 }}</td>
<td>
    <a href="{{ route('admin.notification.settingsms.edit' , $admin ) }}" >
        {{$admin->name}}
    </a></td>
<td>{{ date_frmat($admin->created_at) }}</td>

<td>
@include('admin.layouts.table.status', [$admin ,'class'=> ''   , 'route' =>  route('admin.notification.settingsms.status' , ['id' => $admin->id , 'status'=>$admin->status]) , 'myname' => 'درگاه پیامک '.$admin->name ])
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
