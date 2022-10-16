@component('admin.layouts.content',[
    'title'=>'مدیریت لوگو و هدر  ',
    'tabTitle'=>'مدیریت لوگو و هدر ',
    'breadcrumb'=>[
            ['title'=>'مدیریت لوگو و هدر','class' => 'active']
    ]])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>تنظیمات هدر و لوگو</h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST" action="{{ route('admin.setting.update_logo', $setting) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">




                                        <hr>
 @include('admin.layouts.table.avatar', [  'avatarimage' => $setting->favicon , 'class'=>'' , 'style' => 'height: 150px;width: 150px;'  ])

                                                                                <div class="form-group" >
                                                                                <label for="exampleInputUsername1"> فاو آیکن سایت   </label>
                                                                                <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="favicon" >
                                                                                </div>

<hr>
 @include('admin.layouts.table.avatar', [  'avatarimage' => $setting->logo , 'class'=>'' , 'style' => 'height: 400px;width: 400px;'  ])


                                        <div class="form-group" >
                                        <label for="exampleInputUsername1">  لوگو سایت   </label>
                                        <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="logo" >
                                        </div>


                                        @method('PUT')

                                        <div class="card-footer">
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




    @endslot
@endcomponent
