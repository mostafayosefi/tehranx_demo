




@if($admin->status=='active')
<button class="badge badge-success"  data-toggle="modal" data-target="#exampleModal{{$admin->id}}"><i data-feather="check-circle"></i> &nbsp; فعال </button>
@elseif($admin->status=='inactive')
<button class="badge badge-warning"  data-toggle="modal" data-target="#exampleModal{{$admin->id}}"><i data-feather="x-circle"></i> &nbsp; غیرفعال </button>
 <div class="modal fade" id="exampleModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">فعال کردن درگاه پرداخت {{$myname}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>     {{$myname}}  </p>
        <hr>
      آیا شما مایل به فعال کردن     {{$myname}}  هستید؟
      </div>
      <div class="modal-footer">

        <form class="forms-sample" method="POST" action="{{$route}}" >
            @csrf
            @method('PUT')
            <button  type="submit"   class="btn btn-success"  >فعال کردن </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
            </form>

      </div>
    </div>
  </div>
</div>

@endif

