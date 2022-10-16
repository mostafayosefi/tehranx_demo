@component('admin.layouts.content', [
    'title' => 'ویرایش اطلاعات درگاه پرداخت',
    'tabTitle' => ' ویرایش اطلاعات درگاه پرداخت',
    'breadcrumb' => [['title' => 'مدیریت درگاههای پرداخت ', 'url' => route('admin.setting.getway_payment')], ['title' => ' ویرایش اطلاعات درگاه پرداخت    ',
    'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4> ویرایش اطلاعات درگاه پرداخت</h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.setting.getway_payment_update', $getwaypayments) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">




                                        <div class="form-group">
                                            <h4 class="card-title">نام درگاه پرداخت </h4>
                                           <input type="text" disabled="" class="form-control" id="name" autocomplete="off" placeholder="عنوان سایت" name="name"  value="{{$getwaypayments->name}}"  required >
                                            </div>

                                            <hr>

                                            <div class="form-group">
                                                <h4 class="card-title">کد درگاه </h4>
                                               <input type="text" class="form-control" id="token" autocomplete="off" placeholder="کد درگاه" name="token"  value="{{$getwaypayments->token}}"   required >
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
