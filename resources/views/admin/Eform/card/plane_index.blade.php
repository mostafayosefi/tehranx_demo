
@if($guard=='admin')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center mb-3 mt-4">
                    مدیریت  {{$planes->name}}</h4>
                <p class="text-muted text-center mb-4 pb-2">  جهت
                    مدیریت  {{$planes->name}}
                    و همچنین مشاهده و ویرایش آن لطفا اقدام نمایید  </p>
                <div class="container">
                    <div class="row">


                        @foreach($planes->form_subcategories as $admin)
                            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>

                                        @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])

                                        <hr>

                                        <p>
                                            <!--
<?php echo mb_substr($admin->short, 0, 125, mb_detect_encoding($admin->short)).'...'; ?>
                                                -->
                                            <?php echo $admin->short; ?>
                                        </p>
                                        <hr>

                                        <a href="{{route('admin.form.plane.index_subcat' , [ $link_cat , $admin->link ] )}}" class="btn btn-primary d-block mx-auto mt-4"><h5 class="text-center font-weight-light">
                                                مدیریت {{$admin->name}}

                                            </h5></a>


                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($guard=='user')
{{--
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3 mt-4"> {{$planes->name}}</h4>
                    <div class="container">
                        <div class="row">

                            @foreach($planes->form_subcategories as $admin)
                                <div class="col-md-3 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>

                                            <a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}" >
                                                @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])

                                            <hr>

                                            <a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}" class="btn btn-success d-block btn-lg   rounded-pill mx-auto mt-4">مشاهده سرویس ها  </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 --}}


 <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">



          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">{{$planes->name}}  </h6>
          </div>


  <div class="owl-carousel owl-theme owl-auto-play">

     @foreach($planes->form_subcategories as $admin)

  <div class="item">

              <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                <div class="card">
  {{-- <a href="{{route('user.payment.plane.index_subcat' , [ $link_cat , $admin->link ] )}}"  > --}}
  <a   href="#" id="example" onclick="myFunction({{$admin->id}})" style="margin:0;">
                  <div class="card-body">
                    <h5 class="text-center text-uppercase mt-3 mb-4">{{$admin->name}}</h5>

    @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'img-fluid' , 'style' => ''  ])

                  </div>

                  {{-- <a href="#"  onclick="myFunction({{$admin->id}})" style="margin:0;"
                    class="btn btn-primary d-block btn-sm   rounded-pill mx-auto mt-4">
                    <i data-feather="plus-circle"></i>
                    ثبت سفارش
                      </a>     --}}


                    </a>
                </div>
              </div>
            </div>
            @endforeach
            </div>


        </div>
      </div>


    </div>
  </div>


 <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">

            <div id="loader"  ></div>

            <div style="display:none;" id="myDiv" class="animate-bottom">

<div id="view_js"></div>

            </div>

            {{-- url: '../../../admin/fetch/form_currency/'+e+'', --}}
            <script>
            var myVar;

              document.getElementById("loader").style.display = "none";
            function myFunction(e) {
              document.getElementById("loader").style.display = "block";
              document.getElementById("myDiv").style.display = "none";

        var vall = document.getElementById("example").value;$.ajax({
            type: 'get',
            url: '../../../../fetch/view_js_form/'+e+'/user',
        data: {get_option:vall},
        success: function (response) {document.getElementById("view_js").innerHTML=response;}
    });


              myVar = setTimeout(showPage, 3000 , e);
            }

            function showPage(e) {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";


            }




            </script>


        </div>
    </div>
</div>
</div>




@endif



