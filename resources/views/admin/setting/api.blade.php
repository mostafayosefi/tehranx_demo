@component('admin.layouts.content', [
    'title' => 'تنظیمات api ',
    'tabTitle' => 'تنظیمات api ',
    'breadcrumb' => [['title' => 'تنظیمات api ', 'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>تنظیمات api </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.setting.update_api', $setting) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">



                                        <div class="form-group">
                                            <h4 class="card-title">  Api  </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="api" name="api"
                                                value="{{ $setting->api }}" required>
                                        </div>






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
