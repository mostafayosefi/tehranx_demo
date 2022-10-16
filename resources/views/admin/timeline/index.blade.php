
@if($timelines)

<div class="col-md-12">
<div class="card">
<div class="card-body">
<h6 class="card-title">تایم لاین</h6>
<div id="content">
  <ul class="timeline">
    @foreach ($timelines as $timeline )
    @if($timeline->activition==$my_activition)

    <li class="event" data-date=" @if ($timeline->guard=='admin') پشتیبانی @else {{$timeline->user->name}}   @endif"  >



        @if (($timeline->activition=='document')||($timeline->activition=='selfi')||($timeline->activition=='passport')||($timeline->activition=='cardmelli')||($timeline->activition=='bank_account'))

        @if ($timeline->flag=='waiting')
        <span class="badge badge-warning"> {{name_type($my_activition)}} کاربر آپلود شد </span>
        @endif

        @if ($timeline->flag=='reject')
        <span class="badge badge-danger"> {{name_type($my_activition)}} کاربر به تایید مدیریت نرسید  </span>
        @endif


        @if ($timeline->flag=='active')
        <span class="badge badge-success">  {{name_type($my_activition)}} کاربر به تایید مدیریت رسید </span>
        @endif

        @endif


        {{-- @if ($timeline->flag=='active')
        <span class="badge badge-success"><h5> فعال شد</h5></span>
        @endif
        @if ($timeline->flag=='reactive')
        <span class="badge badge-success"><h5> سفارش مجددا تایید شد</h5></span>
        @endif
        @if ($timeline->flag=='inactive')
        <span class="badge badge-danger"><h5> غیرفعال شد</h5></span>
        @endif
        @if ($timeline->flag=='register')
        <span class="badge badge-primary"><h5> سفارش براورد هزینه شد  </h5></span>
        @endif
        @if ($timeline->flag=='waiting')
        <span class="badge badge-primary"><h5> سفارش فعال شد  </h5></span>
        @endif
        @if ($timeline->flag=='offline')
        <span class="badge badge-primary"><h5> پرداخت آفلاین</h5></span>
        @endif
        @if ($timeline->flag=='online')
        <span class="badge badge-primary"><h5> پرداخت آنلاین</h5></span>
        @endif
        @if ($timeline->flag=='depo')
        <span class="badge badge-primary"><h5> پرداخت از شارژ حساب</h5></span>
        @endif
        @if ($timeline->flag=='waitpay')
        <span class="badge badge-success"><h5> پرداخت تایید شد</h5></span>
        @endif --}}

      <p>{{$timeline->text}}</p>
      <span class="badge">{{ date_frmat($timeline->created_at) }}</span>
    </li>
    @endif
    @endforeach
  </ul>
</div>
</div>
</div>
</div>

@endif
