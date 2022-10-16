@component('admin.layouts.content', [
    'title' => 'تنظیمات سایت ',
    'tabTitle' => 'تنظیمات سایت ',
    'breadcrumb' => [['title' => 'تنظیمات سایت ', 'class' => 'active']],
    ])




    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>تنظیمات سایت </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.setting.update_management', $setting) }}" enctype="multipart/form-data"
                                onsubmit="return Validate(this);">
                                @csrf


                                <div class="row">

                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">



                                        <div class="form-group">
                                            <h4 class="card-title">عنوان سایت </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="عنوان سایت" name="title"
                                                value="{{ $setting->title }}" required>
                                        </div>


                                        <div class="form-group">
                                            <h4 class="card-title">متن بالای منو ایندکس</h4>
                                            <input type="text" class="form-control" id="textheader"
                                                autocomplete="off" placeholder="متن بالای منو ایندکس " name="textheader"
                                                value="{{ $setting->textheader }}" required>
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">اینستاگرام </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="اینستاگرام" name="instagram"
                                                value="{{ $setting->instagram }}">
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">فیسبوک </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="فیسبوک" name="facebook"
                                                value="{{ $setting->facebook }}">
                                        </div>


                                        <div class="form-group">
                                            <h4 class="card-title">توییتر </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="توییتر" name="twitter"
                                                value="{{ $setting->twitter }}">
                                        </div>


                                        <div class="form-group">
                                            <h4 class="card-title">یوتیوب </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="یوتیوب" name="youtube"
                                                value="{{ $setting->youtube }}">
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">تلفن </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="تلفن" name="tell"
                                                value="{{ $setting->tell }}">
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">واتساپ </h4>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="واتساپ" name="whatsapp"
                                                value="{{ $setting->whatsapp }}">
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">ایمیل </h4>
                                            <input type="email" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="ایمیل" name="email"
                                                value="{{ $setting->email }}">
                                        </div>





                                        <div class="form-group">
                                            <h4 class="card-title">آدرس شرکت </h4>
                                            <textarea class="form-control" name="address" rows="6"
                                                required>{{ $setting->address }}</textarea>
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title">توضیحات سایت </h4>
                                            <textarea class="form-control" name="description" rows="6"
                                                required>{{ $setting->description }}</textarea>
                                        </div>



                                        <div class="form-group">
                                            <h4 class="card-title"> کلمات کلیدی </h4>
                                            <textarea class="form-control" name="keyword" rows="6"
                                                required>{{ $setting->keyword }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <h4 class="card-title"> فوتر سایت </h4>
                                            <textarea class="form-control" name="fcopy" rows="6"
                                                required>{{ $setting->fcopy }}</textarea>
                                        </div>


                                        <hr>

                                        <div class="form-group">
                                            <h4 class="card-title"> کد آنالتیک </h4>
                                            <textarea class="form-control" name="analatik"
                                                rows="3">{{ $setting->analatik }}</textarea>
                                        </div>
                                        <hr>

                                        <div class="form-group">
                                            <h4 class="card-title"> کد پشتیبانی </h4>
                                            <textarea class="form-control" name="codetiket"
                                                rows="5">{{ $setting->codetiket }}</textarea>
                                        </div>




                                        @method('PUT')

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ویرایش</button>
                                        </div>


                                    </div>


                                    <div class="col-sm-2"></div>
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
