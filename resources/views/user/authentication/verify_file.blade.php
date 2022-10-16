
 @if($guard=='user')



 <div class="row">
    <div class="col-md-12 grid-margin">
     <div class="card rounded">
     <div class="card-body">
     <h6 class="card-title">تایید {{$myname}}</h6>

    <script>
      var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png", ".ico"];
    function Validate(oForm) {
        var arrInputs = oForm.getElementsByTagName("input");
        for (var i = 0; i < arrInputs.length; i++) {
            var oInput = arrInputs[i];
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }

                    if (!blnValid) {
                        alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                        return false;
                    }

                }
            }
        }

        return true;
    }
    </script>


       <script type="text/javascript">
        $(document).ready(function(){
            $('#file').change(function(){
                   var fp = $("#file");
                   var lg = fp[0].files.length; // get length
                   var items = fp[0].files;
                   var fileSize = 0;

               if (lg > 0) {
                   for (var i = 0; i < lg; i++) {
                       fileSize = fileSize+items[i].size; // get file size
                   }
                   if(fileSize > 10447152) {
                        alert('حجم فایل آپلود شده نمی تواند بیشتر از 10 مگابایت باشد!');
                        $('#file').val('');
                   }
               }
            });
        });
        </script>






     @if (empty($file))
    <form class="form-horizontal" method="POST" action="{{route('user.authentication.upload_file', $type)}}"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >
      @include('admin.layouts.errors')
     <div class="d-flex align-items-center hover-pointer">
     <div class="mr-2">

    <div class="form-group" >
    <label for="file"> آپلود {{$myname}}   </label>
    <input type="file" name="file"    id="file" autocomplete="off"  name="file" required >
    </div>

     </div>
     </div>

    <div class="input-group">
     <div class="input-group-btn">
    <button type="submit" class="btn btn-primary  btn-icon-text">
     <i class="btn-icon-prepend" data-feather="send"></i>
    ارسال {{$myname}}
    </button>
     </div>
     </div>
      @method('PUT')
      @csrf
    </form>


    @endif

    @if($file)
    @if ($file_verify=='waiting')

     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong><b> <i data-feather="alert-circle"></i> &nbsp; {{$myname}} شما در انتظار تایید مدیریت می باشد   </b>  </strong> <br>
    </div>
    </div>
    </div>

<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
    <div class="d-flex align-items-center hover-pointer">
   <div class="col-md-12">
       @include('admin.layouts.table.avatarnul', [  'avatarimage' => $file , 'class'=>'' , 'style' => 'height: 160px;width: 240px;'  ])
   </div>
   </div>
 </div>
     @endif

     @if ($file_verify=='active')


     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
     <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong><b> <i data-feather="check-circle"></i> &nbsp; {{$myname}} شما به تایید مدیریت رسید   </b>  </strong> <br>
    </div>
    </div>
    </div>

<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
    <div class="d-flex align-items-center hover-pointer">
   <div class="col-md-12">
       @include('admin.layouts.table.avatarnul', [  'avatarimage' => $file , 'class'=>'' , 'style' => 'height: 160px;width: 240px;'  ])
   </div>
   </div>
 </div>

     @endif





@if ($file_verify=='reject')


<div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
<div class="d-flex align-items-center hover-pointer">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong><b> <i data-feather="x-circle"></i> &nbsp; متاسفانه {{$myname}} شما توسط مدیریت رد شد    </b>  </strong> <br>
</div>
</div>
</div>

<form class="form-horizontal" method="POST"  action="{{route('user.authentication.upload_file', $type)}}"   enctype="multipart/form-data"  onsubmit="return Validate(this);" >


 @include('admin.layouts.errors')

<div class="d-flex align-items-center hover-pointer">
<div class="mr-2">


<div class="form-group" >
<label for="file"> آپلود {{$myname}}   </label>
<input type="file" name="file"    id="file" autocomplete="off"  name="file" required >
</div>
</div>
</div>

<div class="input-group">
<div class="input-group-btn">
<button type="submit" class="btn btn-primary  btn-icon-text">
<i class="btn-icon-prepend" data-feather="send"></i>
 ارسال {{$myname}}
</button>
</div>
</div>
 @method('PUT')
 @csrf
</form>

@endif




@if($authentication->user->timelines)
@include('admin.timeline.index', [  'timelines' => $authentication->user->timelines , 'my_activition'=> $type ])
@endif

     @endif





     </div>
     </div>
     </div>
     </div>





 @endif





@if($guard=='admin')



<div class="row">
    <div class="col-md-12 grid-margin">
     <div class="card rounded">
     <div class="card-body">
     <h6 class="card-title">تایید {{$myname}} </h6>




     @if (empty($file))


     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong><b> <i data-feather="alert-circle"></i> &nbsp; {{$myname}} توسط کاربر هنوز آپلود نشده است   </b>  </strong> <br>
    </div>
    </div>
    </div>

    @endif

    @if($file)
    @if ($file_verify=='waiting')

     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
     <div class="alert alert-primary alert-dismissible fade show" role="alert">
     <strong><b> <i data-feather="alert-circle"></i> &nbsp; {{$myname}} توسط کاربر آپلود شده است و منتظر تایید مدیریت می باشد.  </b>  </strong> <br>
    </div>
    </div>
    </div>
    @include('admin.layouts.table.avatarnul', [  'avatarimage' => $file , 'class'=>'' , 'style' => 'height: 160px;width: 240px;'  ])


    @include('user.authentication.modal_file_admin', [
    $authentication    , $type , 'activition' => 'active' ])

    @include('user.authentication.modal_file_admin', [
    $authentication    , $type , 'activition' => 'reject' ])


    @endif




    @if ($file_verify=='active')

    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
        <div class="d-flex align-items-center hover-pointer">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><b> <i data-feather="check-circle"></i> &nbsp;   {{$myname}} کاربر به تایید مدیریت رسیده است </b>  </strong> <br>
       </div>
       </div>
       </div>

       @include('admin.layouts.table.avatarnul', [  'avatarimage' => $file , 'class'=>'' , 'style' => 'height: 160px;width: 240px;'  ])


       @include('user.authentication.modal_file_admin', [
        $authentication    , $type , 'activition' => 'reject' ])

       @endif


       @if ($file_verify=='reject')

       <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
       <div class="d-flex align-items-center hover-pointer">
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong><b> <i data-feather="x-circle"></i> &nbsp;{{$myname}} کاربر توسط مدیریت رد شده است  </b>  </strong> <br>
      </div>
      </div>
      </div>

    @include('admin.layouts.table.avatarnul', [  'avatarimage' => $file , 'class'=>'' , 'style' => 'height: 160px;width: 240px;'  ])

       @endif




       @if($authentication->user->timelines)
       @include('admin.timeline.index', [  'timelines' => $authentication->user->timelines , 'my_activition'=> $type ])
       @endif




     @endif




     </div>


     </div>


    </div>

    </div>


@endif


