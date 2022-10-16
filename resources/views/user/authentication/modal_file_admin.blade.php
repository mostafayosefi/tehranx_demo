@if($activition=='active')
<button type="button"  class="btn btn-primary btn-block btn-icon-text" data-toggle="modal" data-target="#file_{{$activition.'_'.$type}}" > <i class="btn-icon-prepend" data-feather="check-square"></i>
    {{name_type($activition)}} {{name_type($type)}}
 &nbsp; </button>
 @endif

 @if($activition=='reject')
 <button type="button"   class="btn btn-danger  btn-block btn-icon-text"  data-toggle="modal" data-target="#file_{{$activition.'_'.$type}}" >
     {{name_type($activition)}} {{name_type($type)}}
  &nbsp; </button>
  @endif

 <div class="modal fade bd-example-modal-lg" id="file_{{$activition.'_'.$type}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">  {{name_type($activition)}} {{name_type($type)}} </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{route('admin.user.authentication.file_activition' , [ $authentication , $type , $activition ] )}}" >
                    @csrf
                    @method('PUT')


                        <div class="form-group row">
                            <div class="col-md-2">
                              </div>

                             <div class="col-md-8">




 <div class="form-group">
    <label for="text"> توضیحات {{name_type($activition)}} {{name_type($type)}}  </label>
    <textarea class="form-control" id="tinymceExample" autocomplete="off"
              name="text" rows="6"
    >{{ old('text') }}</textarea>
</div>



 @if($activition=='active')
<button type="submit" class="btn btn-primary btn-block"> {{name_type($activition)}} {{name_type($type)}} <i data-feather="check-square"></i></button>
@endif
 @if($activition=='reject')
<button type="submit" class="btn btn-danger btn-block"> {{name_type($activition)}} {{name_type($type)}}  </button>
@endif
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
