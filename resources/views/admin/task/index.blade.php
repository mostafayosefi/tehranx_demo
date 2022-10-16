@component('admin.layouts.content',[
    'title'=>'مشاهده رویدادها',
    'tabTitle'=>'مشاهده رویدادها ',
    'breadcrumb'=>[
            ['title'=>'مشاهده رویدادها','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endslot







<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست رویدادها  </h6>
          <div class="table-responsive">

@if($tasks)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>

                    <th>  ردیف </th>
                    <th>  کاربر</th>
                    <th>  موضوع رویداد</th>
                    <th> تاریخ ثبت </th>
                    <th> وضعیت</th>
                 </tr>
              </thead>
              <tbody>


@foreach($tasks as $key => $admin)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{$admin->user->name}}
        @include('admin.layouts.table.avatar', [ 'avatarimage' => $admin->user->image , 'class'=>'img-xs rounded-circle' , 'style' => ''  ])

    </td>

    <td>{{ name_type($admin->activition)}} 	 @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'read_ticket_admin'   ,'number' => '1'   ]) 	 </td>
    <td>{{ date_frmat($admin->created_at) }}</td>
    <td> <a href="{{ route('admin.user.edit',[ $admin->user_id , $admin->activition ]) }}"> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'status_task_admin'   ]) </a> </td>







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
