
                                  <div class="row">
                                    <div class="col-xl-12">


                                  <form method="post" action="{{ $route }}">
                                    @csrf
                                    <div class="row">





                                        <div class="col-sm-8">



                                            @if (Session::get('err') == '1')

                                                @include('admin.layouts.errors')

                                            @endif




                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">رمزعبور
                                                    جدید</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" autocomplete="off"
                                                        value="{{ old('password') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">تکرار
                                                    رمزعبور</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control"
                                                        id="password_confirmation" name="password_confirmation"
                                                        autocomplete="off" value="{{ old('password_confirmation') }}"
                                                        required>
                                                </div>
                                            </div>

                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="exampleInputUsername1"> </label>

                                                <button type="submit" class="btn btn-primary btn-block">ویرایش
                                                    رمزعبور</button>
                                            </div>

                                        </div>
                                        <div class="col-sm-4">
                                        </div>



                                    </div>

                                </form>
                                    </div>
                                </div>
