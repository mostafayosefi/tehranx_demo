 
<button type="button" class="btn btn-success  "  data-toggle="modal" data-target="#change{{$type}}" > <p> تغییر {{$myname}} <i data-feather="refresh-ccw"></i> </p> &nbsp; </button>
 
<div class="modal fade bd-example-modal-lg" id="change{{$type}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel"> تغییر {{$myname}} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{$route}}" >
                    @csrf
                    @method('PUT')


                        <div class="form-group row">
                            <div class="col-md-2">
                              </div>

                             <div class="col-md-8">

 
 <div class="form-group">
 <label for="{{$type}}"> {{$myname}}  </label>
 <input type="text" class="form-control" id="{{$type}}" autocomplete="off"   
 placeholder="{{$myname}}" name="{{$type}}" value="{{$contact}}" required>
 </div>
 
<button type="submit" class="btn btn-primary btn-block">  تغییر {{$myname}} <i data-feather="check-square"></i></button>

</div>


                            <div class="col-md-2">
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن صفحه</button>

</div>
</div>
</div>
</div>
 