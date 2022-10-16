@component('admin.layouts.content',[
    'title'=>'مشاهده تیکت های کاربران ',
    'tabTitle'=>'مشاهده تیکت های کاربران',
    'breadcrumb'=>[
            ['title'=>'مشاهده تیکت های کاربران','class' => 'active']
    ]])



@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">

 @endslot







<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">مشاهده تیکت های کاربران</h6>
          <div class="table-responsive">

@if($tickets)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>

                    <th>  ردیف </th>
                    <th>  کاربر</th>
                    <th>  موضوع تیکت</th>
                    <th> تاریخ ثبت </th>
                    <th> وضعیت</th>
                    <th> حذف</th>

                </tr>
              </thead>
              <tbody>


@foreach($tickets as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$admin->user->name}}
                        @include('admin.layouts.table.avatar', [ 'avatarimage' => $admin->user->image , 'class'=>'img-xs rounded-circle' , 'style' => ''  ])

                    </td>

                    <td>{{$admin->title}} 	 @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'read_ticket_admin'   ,'number' => '1'   ]) 	 </td>
                    <td>{{ date_frmat($admin->created_at) }}</td>
                    <td> <a href="{{ route('admin.ticket.show', $admin) }}"> @include('admin.layouts.table.origin_getstatus', [$admin ,'route' => ''  ,'type_name' => 'status_ticket'   ]) </a> </td>




        <td>   @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.ticket.destroy', $admin) , 'myname' => 'حذف تیکت '.$admin->title ]) </td>



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

    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4-ltr.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table-ltr.js') }}"></script>
    @endslot
@endcomponent
