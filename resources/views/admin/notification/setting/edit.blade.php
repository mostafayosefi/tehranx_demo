@component('admin.layouts.content', [
    'title' => 'ویرایش اطلاعات درگاه پیامک',
    'tabTitle' => ' ویرایش اطلاعات درگاه پیامک',
    'breadcrumb' => [['title' => 'مدیریت درگاههای پیامک ', 'url' => route('admin.notification.settingsms.index')], ['title' => ' ویرایش اطلاعات درگاه پیامک    ',
    'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4> ویرایش اطلاعات درگاه پیامک</h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.notification.settingsms.update', $setting_sms) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">




                                        <div class="form-group">
                                            <h4 class="card-title">نام درگاه پیامک </h4>
                                           <input type="text" disabled="" class="form-control" id="name" autocomplete="off" placeholder="عنوان سایت" name="name"  value="{{$setting_sms->name}}"  required >
                                            </div>

                                            <hr>
                                            <div class="form-group">
                                                <h4 class="card-title">نام کاربری   </h4>
                                               <input type="text" class="form-control" id="username" autocomplete="off" placeholder="نام کاربری  " name="username"  value="{{$setting_sms->username}}"   required >
                                            </div>

                                            <div class="form-group">
                                                <h4 class="card-title">رمزعبور   </h4>
                                               <input type="password" class="form-control" id="password" autocomplete="off" placeholder="رمزعبور  " name="password"  value="{{$setting_sms->password}}"   required >
                                            </div>

                                            <div class="form-group">
                                                <h4 class="card-title">Url   </h4>
                                               <input type="text" class="form-control" id="url" autocomplete="off" placeholder="Url  " name="url"  value="{{$setting_sms->url}}"     >
                                            </div>

                                            <div class="form-group">
                                                <h4 class="card-title">Api   </h4>
                                               <input type="text" class="form-control" id="api" autocomplete="off" placeholder="Api  " name="api"  value="{{$setting_sms->api}}"   required >
                                            </div>


                                            <div class="form-group">
                                                <h4 class="card-title">Token   </h4>
                                               <input type="text" class="form-control" id="token" autocomplete="off" placeholder="Token  " name="token"  value="{{$setting_sms->token}}"   required >
                                            </div>




                                                <hr>





                                        @method('PUT')

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-block">ویرایش </button>
                                        </div>


                                    </div>


                                    <div class="col-sm-3"></div>
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
