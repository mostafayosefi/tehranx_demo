
 @if($guard=='user')


 <div class="row">

    <div class="col-md-12 grid-margin">
     <div class="card rounded">
     <div class="card-body">
     <h6 class="card-title">وریفای {{$myname}}</h6>

    @if ($contact_verify == 'inactive')


     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
@if($type=='tell')
<i data-feather="smartphone"></i>
@elseif($type=='tells')
<i data-feather="phone"></i>
@elseif($type=='email')
<i data-feather="mail"></i>
@endif

     <div class="mr-2">
     <p>{{$contact}}</p>
     </div>

     &nbsp;   &nbsp; 
     
     @include('user.authentication.modal_change_contact', [ 'route' =>  route('user.authentication.change_contact' , $type ) ,
     $authentication  , $myname  , $contact , $type ])
 
    

     </div>


     <form class="forms-sample" method="POST" action="{{$route_verify}}">
      @include('admin.layouts.errors')
      <button class="btn btn-success btn-block"><i data-feather="send"></i>ارسال کد وریفای به
        {{$myname}}</button>
      @method('PUT')
      @csrf
  </form>


    </div>



     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">
    <i data-feather="alert-circle"></i>
     <div class="mr-2">
     <p>جهت فعالسازی {{$myname}} لطفا اقدام نمایید</p>
     </div>
     </div>


    <form class="forms-sample"  method="POST"  action="{{$route_activition}}"   >
      @include('admin.layouts.errors')
    <div class="input-group">
                        <div class="input-group-btn">
     <button   class="btn btn-primary btn-block btn-flat">فعالسازی {{$myname}} </button>
                        </div><!-- /btn-group -->
     <input  type="text"  name="{{$code_verify}}"  class="form-control" placeholder="کدفعالسازی">
                      </div>



      @method('PUT')
      @csrf
    </form>


    </div>


    @elseif ($contact_verify == 'active')



     <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
     <div class="d-flex align-items-center hover-pointer">

     <div class="alert alert-success alert-dismissible fade show" role="alert">

     <strong><b> <i data-feather="check-circle"></i> &nbsp; {{$contact}}  </b>  </strong> <br>
     <span>      {{$myname}} من قبلا فعال شده است   <i data-feather="phone"></i> </span><br>

    </div>
     </div>
    </div>

    @endif

     </div>
     </div>
    </div>
  </div>

  @endif
