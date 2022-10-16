  @component('admin.layouts.content', [
      'title' => 'ویرایش سوال',
      'tabTitle' => ' ویرایش سوال',
      'breadcrumb' => [['title' => 'لیست سوالات متداول', 'url' => route('admin.faq.index')], ['title' => 'ویرایش سوال  ',
      'class' => 'active']],
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
                                  <h4>ویرایش سوال </h4>
                              </div>

                              <br>


                              @include('admin.layouts.errors')


                              <form class="forms-sample" method="POST" action="{{ route('admin.faq.update', $faq) }}"
                                  enctype="multipart/form-data" onsubmit="return Validate(this);">
                                  @csrf
                                  <div class="row">

                                      <div class="col-sm-12">


                                          <div class="form-group">
                                              <label for="question">سوال</label>
                                              <input type="text" class="form-control" id="question" autocomplete="off"
                                                  placeholder=" سوال  " name="question" value="{{$faq->question}}">
                                          </div>


                                          <div class="form-group">
                                              <label for="answer"> پاسخ</label>
                                              <textarea class="form-control" id="answer" autocomplete="off"
                                                  placeholder="پاسخ" name="answer" rows="8"
                                                   >{{$faq->answer}}</textarea>
                                          </div>

                                          @method('PUT')

                                          <div class="card-footer">
                                              <a href="{{ route('admin.faq.index') }}" class="btn btn-danger">بازگشت</a>
                                              <button type="submit" class="btn btn-primary float-right">ویرایش</button>
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
