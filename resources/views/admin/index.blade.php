
@component('admin.layouts.content',[
    'title'=>'داشبورد',
    'tabTitle'=>'داشبورد',
    'breadcrumb'=>[
            ['title'=>'داشبورد', 'url' => route('admin.dashboard')]
    ]])



<div class="row">
  <div class="col-12 col-xl-12 stretch-card"   >
    <div class="row flex-grow">

      {{-- @include('admin.java.loading_sample2', [ 'guard' =>  'admin'   ]) --}}



{{--

<div class="row">
    <div class="col-12 col-xl-12 stretch-card"   >
      <div class="row flex-grow">

        <div class="col-md-4 grid-margin stretch-card">
@include('custome.dashboard.card', [  'icon_card' => 'user'    , 'count_card' => count_dashboard('all','user') , 'title_card' => 'کاربران' , 'desc_card' => 'کاربر' ,
'route_create' => route('admin.user.create') ,  'route_index' => route('admin.user.index') , 'new_card' => '' ])
        </div>


        <div class="col-md-4 grid-margin stretch-card">
            @include('custome.dashboard.card', [  'icon_card' => 'check-square'    , 'count_card' => count_dashboard('all','requestbrand')  , 'title_card' => 'برندهای من' , 'desc_card' => 'سفارش برند ' ,
'route_create' => route('admin.requestbrand.create')  ,  'route_index' => route('admin.requestbrand.index') , 'new_card' =>  count_dashboard('all','new_requestbrand_admin')." سفارش برند" ])
        </div>

        <div class="col-md-4 grid-margin stretch-card">
            @include('custome.dashboard.card', [  'icon_card' => 'check-square'    , 'count_card' => count_dashboard('all','company_request')  , 'title_card' => 'شرکت های من' , 'desc_card' => 'سفارش شرکت ' ,
'route_create' => route('admin.company.request.create')  ,  'route_index' => route('admin.company.request.index') , 'new_card' =>  count_dashboard('all','new_company_request_admin')." سفارش شرکت" ])
        </div>



      </div>
    </div>
  </div>


 <div class="row">
    <div class="col-12 col-xl-12 stretch-card"   >
      <div class="row flex-grow">


        <div class="col-md-4 grid-margin stretch-card">
            @include('custome.dashboard.card', [  'icon_card' => 'mail'    , 'count_card' => count_dashboard('all','ticket') , 'title_card' => 'تیکت های کاربران' , 'desc_card' => 'تیکت' ,
            'route_create' => '' ,  'route_index' => route('admin.ticket.index') , 'new_card' =>    count_dashboard('all','new_ticket_admin')." تیکت جدید"    ])
        </div>


 --}}


</div>
</div>
</div>


    @slot('script')
    <script src="{{ asset('template/assets/js/dashboard.js') }}"></script>
    @endslot
@endcomponent
