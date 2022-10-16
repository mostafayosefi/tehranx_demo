
                                  <div class="row">
                                    <div class="col-xl-12">

                                      @if (empty(Session::get('err')))
                                      @include('admin.layouts.errors')
                                      @endif

                                        <form class="forms-sample" method="POST"
                                            action="{{ $route }}"
                                            enctype="multipart/form-data" onsubmit="return Validate(this);">
                                            @csrf
                                            <div class="row">




                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">نام و نام خانوادگی</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputUsername1" autocomplete="off"
                                                            placeholder="نام و نام خانوادگی" name="name"
                                                            @if ($admin->name) value="{{ $admin->name }}"@else value="{{ old('name') }}" @endif>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">ایمیل</label>
                                                        <input type="email" class="form-control"
                                                            id="exampleInputUsername1" autocomplete="off"
                                                            placeholder="ایمیل" name="email" @if ($admin->email) value="{{ $admin->email }}"@else value="{{ old('email') }}" @endif>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">تلفن</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputUsername1" autocomplete="off"
                                                            placeholder="تلفن" name="tell" @if ($admin->tell) value="{{ $admin->tell }}"@else value="{{ old('tell') }}" @endif>
                                                    </div>

                                                </div>


                                                <div class="col-sm-6">


                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">نام کاربری</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputUsername1" autocomplete="off"
                                                            placeholder="نام کاربری" name="username"
                                                            @if ($admin->username) value="{{ $admin->username }}"@else value="{{ old('username') }}" @endif  >
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="adres">آدرس</label>

                                                        <textarea class="form-control" placeholder="آدرس" id="address"
                                                            name="address" rows="3">@if ($admin->address) {{ $admin->address }} @else {{ old('address') }} @endif</textarea>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1"> تصویر پروفایل</label>
                                                        <input type="file" id="exampleInputUsername1" autocomplete="off"
                                                            name="image">

@include('admin.layouts.table.avatar', [$admin , 'avatarimage' => $admin->image , 'class'=>'profile-pic' , 'style' => 'height: 160px;width: 160px;'  ])
                                                    </div>



                                                    @method('PUT')


                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1"> </label>

                                                        <button type="submit"
                                                            class="btn btn-primary btn-block">ویرایش</button>
                                                    </div>
                                                </div>


                                            </div>

                                        </form>

                                    </div>
                                </div>
