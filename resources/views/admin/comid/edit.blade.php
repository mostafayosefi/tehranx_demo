


@if ($comid->status=='first' )

@component('admin.layouts.content',[
    'title'=>'امکانات اول  ',
    'tabTitle'=>'امکانات اول  ',
      'breadcrumb' => [['title' => 'مدیریت امکانات اول', 'url' => route('admin.manegement.comid_index' , 'first')  ]  ,
       ['title' => 'ویرایش امکانات اول' , 'class' => 'active'] ,
       ['title' => $comid->title , 'class' => 'active'] ,
    ],
    ])


@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">
@endslot

<script>
    function fetch_select2(val){
        var val = document.getElementById("cat").value;$.ajax({type: 'get',url: '{{env("APP_URL")}}/admin/fetch/font/'+val+'',
        data: {get_option:val},success: function (response) {document.getElementById("catamrc").innerHTML=response;}});
        }
    </script>

 @endif

 @if ($comid->status=='second' )


 @component('admin.layouts.content',[
    'title'=>'امکانات دوم  ',
    'tabTitle'=>'امکانات دوم  ',
      'breadcrumb' => [['title' => 'مدیریت امکانات دوم', 'url' => route('admin.manegement.comid_index' , 'second')  ]  ,
       ['title' => 'ویرایش امکانات دوم' , 'class' => 'active'] ,
       ['title' => $comid->title , 'class' => 'active'] ,
    ],
    ])


  @endif
  @if ($comid->status=='coment' )

 @component('admin.layouts.content',[
    'title'=>' کامنت مشتریان   ',
    'tabTitle'=>'کامنت مشتریان   ',
      'breadcrumb' => [['title' => 'مدیریت کامنت مشتریان  ', 'url' => route('admin.manegement.comid_index' , 'coment')  ]  ,
       ['title' => 'ویرایش کامنت مشتریان  ' , 'class' => 'active'] ,
       ['title' => $comid->title , 'class' => 'active'] ,
    ],
    ])

   @endif


  @if ($comid->status=='mnglogos' )

 @component('admin.layouts.content',[
    'title'=>' لوگو مشتریان   ',
    'tabTitle'=>'لوگو مشتریان   ',
      'breadcrumb' => [['title' => 'مدیریت لوگو مشتریان  ', 'url' => route('admin.manegement.comid_index' , 'mnglogos')  ]  ,
       ['title' => 'ویرایش لوگو مشتریان  ' , 'class' => 'active'] ,
       ['title' => $comid->title , 'class' => 'active'] ,
    ],
    ])

   @endif




    <div class="row">
            <div class="col-12  ">
            <div class="row flex-grow">




                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">



@if ($comid->status=='first')


                            <div class="card-header card-header-border-bottom">
                                <h4>امکانات اول </h4>
                            </div>
                            <br>
                            @include('admin.layouts.errors')

                            <form class="forms-sample" method="POST" action="{{ route('admin.manegement.comid_update' ,  ['status'=>$comid->status ,'id' => $comid->id ] ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">




                                        <div class="form-group" >
                                            <label for="title">نام سرویس</label>
                                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام سرویس" name="title"  value="{{$comid->title}}"  required >
                                            </div>

                                            <div class="form-group" >
                                            <label for="text">توضیح</label>
                                            <input type="text" class="form-control" id="text" autocomplete="off" placeholder="توضیح" name="text"  value="{{$comid->text}}"  required >
                                            </div>




 @include('admin.layouts.table.avatarnul', [  'avatarimage' => $comid->image , 'class'=>'' , 'style' => 'height: 160px;width: 160px;'  ])

 <hr>
                                            <div class="form-group" >
                                            <label for="exampleInputUsername1"> آپلود آیکن </label>
                                            <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                            </div>



{{--
<div class="form-group" >
    <label for="link">آیکن</label>

        <select  class="js-example-basic-single w-100" id="cat" name="icon"  onchange="fetch_select2(this.value);"  style="font-size: 18px;"      required >
        <option value="">لطفا آیکن مورد نظر را انتخاب نمایید</option>

        @foreach($iconfonts as $font)

        <option value="{{$font->font}}" @if ($font->font==$comid->icon)
            selected
        @endif   >{{$font->font}}</option>
        @endforeach

    </select>

    </div>

     <div  id="catamrc">



         </div>

 --}}



         @method('PUT')
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                        </div>


                                    </div>


                                </div>

                            </form>

                            @endif



                            @if ($comid->status=='second')

                            <div class="card-header card-header-border-bottom">
                                <h4>امکانات دوم </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')









                            <form class="forms-sample" method="POST"  action="{{ route('admin.manegement.comid_update' ,  ['status'=>$comid->status ,'id' => $comid->id ] ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">




                                        <div class="form-group" >
                                            <label for="title">نام سرویس</label>
                                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام سرویس" name="title"  value="{{$comid->title}}"  required >
                                            </div>


                                            <hr>
                                            <div class="form-group">
                                                <label for="text"> متن</label>
                                                <textarea class="form-control"  autocomplete="off"
                                                    placeholder="متن" name="text"  id="tinymceExample" rows="8"
                                                     >{{$comid->text}}</textarea>
                                            </div>



 @include('admin.layouts.table.avatarnul', [  'avatarimage' => $comid->image , 'class'=>'' , 'style' => 'height: 160px;width: 160px;'  ])

 <hr>
                                            <div class="form-group" >
                                            <label for="exampleInputUsername1"> آپلود آیکن </label>
                                            <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                            </div>





         @method('PUT')
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                        </div>


                                    </div>


                                </div>

                            </form>


                            @endif

                            @if ($comid->status=='coment')



                            <div class="card-header card-header-border-bottom">
                                <h4>کامنت مشتریان </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')









                            <form class="forms-sample" method="POST" action="{{ route('admin.manegement.comid_update' ,  ['status'=>$comid->status ,'id' => $comid->id ] ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">





<div class="form-group" >
    <label for="title">نام مشتری</label>
    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام مشتری" name="title"  value="{{$comid->title}}"  required >
    </div>


    <div class="form-group" >
    <label for="tit">نقش مشتری</label>
    <input type="text" class="form-control" id="role" autocomplete="off" placeholder="نقش مشتری" name="role"  value="{{$comid->role}}"  required >
    </div>


    <div class="form-group" >
    <label for="text">کامنت مشتری</label>
    <textarea class="form-control" name="text" rows="12" >{{$comid->text}}</textarea>
    </div>




         @method('PUT')
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                        </div>


                                    </div>


                                </div>

                            </form>





                            @endif




                            @if ($comid->status=='mnglogos')

                            <div class="card-header card-header-border-bottom">
                                <h4>لوگو مشتری </h4>
                            </div>

                            <br>
                            @include('admin.layouts.errors')

                            <form class="forms-sample" method="POST"  action="{{ route('admin.manegement.comid_update' ,  ['status'=>$comid->status ,'id' => $comid->id ] ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">




                                        <div class="form-group" >
                                            <label for="title">نام مشتری</label>
                                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام مشتری" name="title"  value="{{$comid->title}}"  required >
                                            </div>


                                            <hr>



 @include('admin.layouts.table.avatarnul', [  'avatarimage' => $comid->image , 'class'=>'' , 'style' => 'height: 160px;width: 160px;'  ])

 <hr>
                                            <div class="form-group" >
                                            <label for="exampleInputUsername1"> آپلود لوگو </label>
                                            <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                            </div>





         @method('PUT')
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            @endif








                        </div>
                    </div>
                </div>





            </div>
        </div>


    </div>







    @slot('script')



	<!-- core:js -->
	<script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{ asset('template/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ asset('template/assets/js/form-validation.js') }}"></script>
	<script src="{{ asset('template/assets/js/bootstrap-maxlength.js') }}"></script>
	<script src="{{ asset('template/assets/js/inputmask.js') }}"></script>
	<script src="{{ asset('template/assets/js/select2.js') }}"></script>
	<script src="{{ asset('template/assets/js/typeahead.js') }}"></script>

    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/tinymce-rtl/tinymce.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/simplemde/simplemde.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/ace.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>

      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/ace.js') }}"></script>



    @endslot




@endcomponent
