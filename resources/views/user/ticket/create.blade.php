  @component('user.layouts.content', [
    'title'=>'ایجاد تیکت جدید ',
      'tabTitle' => ' ایجاد تیکت جدید ',
      'breadcrumb' => [['title' => 'مشاهده تیکت های من  ', 'url' => route('user.ticket.index')], ['title' => 'ایجاد تیکت جدید  ',
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
                            <h4> ایجاد تیکت جدید  </h4>
                        </div>

                        <br>


                        @include('admin.layouts.errors')


                        <form class="forms-sample" method="POST" action="{{ route('user.ticket.store') }}"
                            enctype="multipart/form-data" onsubmit="return Validate(this);">
                            @csrf
                            <div class="row">

                                <div class="col-sm-12">


                                    <div class="form-group">
                                        <label for="title"> موضوع تیکت</label>
                                        <input type="text" class="form-control" id="title" autocomplete="off"
                                            placeholder=" موضوع تیکت  " name="title" value="{{ old('title') }}"  required>
                                    </div>


                                    <div class="form-group">
                                        <label for="text"> متن پیام</label>
                                        <textarea class="form-control" id="text" autocomplete="off"
                                            placeholder="متن پیام" name="text" rows="8"
                                            required >{{ old('text') }}</textarea>
                                    </div>



                                    <div class="card-footer">
                                        <a href="{{ route('user.ticket.index') }}" class="btn btn-danger">بازگشت</a>
                                        <button type="submit" class="btn btn-primary float-right">  ارسال تیکت  </button>
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
