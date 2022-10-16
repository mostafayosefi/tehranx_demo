@component('admin.layouts.content',[
    'title'=> ' مدیریت متنهای پیش فرض / '.$notification_type->name,
    'tabTitle'=>' مدیریت متنهای پیش فرض / '.$notification_type->name,
      'breadcrumb' => [
        ['title' => ' مدیریت متنهای پیش فرض', 'url' => route('admin.notification.list.index')],
        ['title' => $notification_type->name , 'url' => route('admin.notification.list.type',$notification_type->id)],
       ['title' => $notification_list->name,
      'class' => 'active']],
      ])

@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">
@endslot


      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h4>ویرایش {{$notification_list->name}}   </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.notification.list.update', $notification_list) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">



                                        <script>
                                            function show1(){
                                          document.getElementById('div1').style.display ='none';
                                        }
                                        function show2(){
                                          document.getElementById('div1').style.display = 'block';
                                        }
                                        </script>


<hr>

  <div class="form-group" >
    <label for="extr">    وضعیت ارسال {{$notification_list->notification_service->name}}  </label>
</div>



<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status"
            id="status" value="active"  onclick="show2();" @if($notification_list->status=='active') checked @endif >
        فعال
    </label>
</div>

<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status"
            id="status" value="inactive"  onclick="show1();"   @if($notification_list->status=='inactive') checked @endif >
        غیرفعال
    </label>
</div>



<div  id="div1"    @if($notification_list->status=='inactive')  style="display: none;" @endif  >


    <div class="form-group">
        <label for="text_default"> متن {{$notification_list->notification_service->name}}  </label>
        <textarea class="form-control"
       @if($notification_list->notification_service->link=='email')   id="tinymceExample" @endif
          name="text_default"
            rows="5">{{$notification_list->text_default}}</textarea>
    </div>


<hr />
<span style="color: blue;">*دقت نمایید برای نام و نام خانوادگی کاربر از #user استفاده نمایید.</span>
<br>
<span style="color: blue;">*دقت نمایید برای عنوان سفارش از #tit استفاده نمایید.</span>
<br>
<span style="color: blue;">*دقت نمایید برای لینک سفارش از #linktiket استفاده نمایید.</span>
<br>
<span style="color: blue;">*دقت نمایید برای لینک فاکتور از #linksef استفاده نمایید.</span>
<br>
<span style="color: blue;">*دقت نمایید برای مبلغ فاکتور از #pay استفاده نمایید.</span>
<br>
<span style="color: blue;">* دقت نمایید برای توضیحات فاکتور از #despay استفاده نمایید.</span>
<br>
<span style="color: blue;">* دقت نمایید برای نام کاربری از #usname استفاده نمایید. </span>
<br>
<span style="color: blue;">* دقت نمایید برای رمزعبور از #pass استفاده نمایید. </span>
<br>
<span style="color: blue;">* دقت نمایید برای کدوریفای تلفن از #verfytell استفاده نمایید. </span>
<br>
<span style="color: blue;">* دقت نمایید برای کدوریفای ایمیل از #verfyemail استفاده نمایید. </span>
<br>


</div>




                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.notification.list.type',$notification_type->id) }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                          </div>


                                      </div>


                                  </div>

                              </form>



                          </div>
                      </div>
                  </div>




              </div>
          </div>
      </div>













      @slot('script')


    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/tinymce-rtl/tinymce.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/simplemde/simplemde.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/ace.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>

      <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('template/assets/js/template.js') }}"></script>
      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/ace.js') }}"></script>




      @endslot
  @endcomponent
