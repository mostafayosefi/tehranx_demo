@component('admin.layouts.content', [
    'title' => 'تنظیمات مالی ',
    'tabTitle' => 'تنظیمات مالی ',
    'breadcrumb' => [['title' => 'تنظیمات مالی ', 'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>تنظیمات مالی </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.setting.update_finical', $setting) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">


                                        @include('admin.layouts.table.java_price')

                                        <div class="form-group">
                                            <h4 class="card-title"> قیمت روز دلار (به ریال)  </h4>
                                            <input type="text" class="form-control" id="price"
                                                autocomplete="off" placeholder="   " name="rateusd"
                                                value="{{ $setting->mngfinical->rateusd }}"   onkeyup="separateNum(this.value,this);"  required>
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
