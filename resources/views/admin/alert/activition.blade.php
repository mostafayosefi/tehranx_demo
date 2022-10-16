@if ($oper=='email_verify')

@if($authentication->email_verify!='active')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong><b>فعالسازی ایمیل </b> !</strong>  <br>
      <span> جهت فعال کردن ایمیل  <a href="{{route('user.authentication.index' , [ 'email' ] )}}">لطفا کلیک نمایید</a></span><br>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif

@endif

@if ($oper=='tell_verify')
@if($authentication->tell_verify!='active')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong><b>فعالسازی تلفن</b> !</strong> <br>
    <span> جهت فعال کردن تلفن همراه  <a href="{{route('user.authentication.index' , [ 'tell' ] )}}">لطفا کلیک نمایید</a></span><br>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif
@endif

@if ($oper=='document_verify')
@if($authentication->document_verify!='active')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong><b>احرازهویت و تایید مدارک</b>!</strong> <br>
    <span><b>جهت احرازهویت و ارسال و تایید مدارک </b><a href="{{route('user.authentication.index' , [ 'document' ] )}}">لطفا کلیک نمایید</a></span><br>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif
@endif
