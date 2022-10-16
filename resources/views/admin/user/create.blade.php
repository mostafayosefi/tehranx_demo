@component('admin.layouts.content', [
    'title' => 'ایجاد کاربر جدید',
    'tabTitle' => 'ایجاد کاربر جدید',
    'breadcrumb' => [['title' => 'لیست کاربران', 'url' => route('admin.dashboard')], ['title' => 'ایجاد کاربر جدید', 'class'
    => 'active']],
    ])





    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">


                <div class="col-md-3 grid-margin stretch-card">
                </div>




                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4> ایجاد کاربر جدید </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')


                            <form class="forms-sample" method="POST" action="{{ route('admin.user.store') }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
@csrf
                                <div class="row">




                                    <div class="col-sm-12">



                                        <input type="hidden" name="idmoaref" value="0">

                                        {{-- <div class="form-group">
<label>کاربر دعوت کننده</label>
<select class="js-example-basic-single w-100" name="idmoaref"  >

@foreach ($admins as $admin)
<option value="{{$admin->id}}">{{$admin->user_username}}</option>
@endforeach

</select>
</div> --}}


                                        <div class="form-group">
                                            <label for="name">نام و نام خانوادگی</label>
                                            <input type="text" class="form-control" id="name" autocomplete="off"
                                                placeholder="نام و نام خانوادگی" name="name" value="{{ old('name') }}"  >
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputUsername1">نام کاربری</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="نام کاربری" name="username"
                                                value="{{ old('username') }}"  >
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputUsername1">ایمیل</label>
                                            <input type="email" class="form-control" id="exampleInputUsername1"
                                                autocomplete="off" placeholder="ایمیل" name="email"
                                                value="{{ old('email') }}"  >
                                        </div>



                                        <div class="form-group">
                                            <label for="password">رمزعبور</label>
                                            <input type="password" class="form-control" autocomplete="off"
                                                name="password" value="{{ old('password') }}"  >
                                        </div>




                                        <div class="form-group">
                                            <label for="password_confirmation">تکرار رمزعبور</label>
                                            <input type="password" class="form-control" autocomplete="off"
                                                name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"  >
                                        </div>





                                        {{-- <div class="form-group">
<label for="exampleInputUsername1"> </label>

<button type="submit" class="btn btn-success btn-block"> ثبت  </button>
</div> --}}

@method('PUT')

                                        <div class="card-footer">
                                            <a href="{{ route('admin.user.index') }}" class="btn btn-danger">بازگشت</a>
                                            <button type="submit" class="btn btn-primary float-right">ثبت</button>
                                        </div>




                                    </div>




                                </div>

                            </form>








                        </div>
                    </div>
                </div>



                <div class="col-md-3 grid-margin stretch-card">
                </div>



            </div>
        </div>
    </div>













    @slot('script')
    @endslot
@endcomponent
