
                                          <div class="form-group">
                                              <label for="name">نام زیرگروه</label>
                                              <input type="text" class="form-control" id="name" autocomplete="off"
                                                  placeholder=" نام زیرگروه  " name="name" value="{{ old('name') }}">
                                          </div>

                                          <div class="form-group">
                                              <label for="link">لینک </label>
                                              <input type="text" class="form-control" id="link" autocomplete="off"
                                                  placeholder=" لینک   " name="link" value="{{ old('link') }}">
                                          </div>

                                          <div class="form-group">
                                            <label for="text"> توضیحات </label>
                                            <textarea class="form-control" id="text" autocomplete="off"
                                                      placeholder="توضیحات " name="text" rows="6"
                                            >{{ old('text') }}</textarea>
                                        </div>

                                          <hr>
                                          <div class="form-group" >
                                          <label for="exampleInputUsername1"> آپلود عکس </label>
                                          <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
                                          </div>



