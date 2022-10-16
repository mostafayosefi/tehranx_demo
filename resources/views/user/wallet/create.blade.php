  @component('user.layouts.content', [
    'title'=>'افزایش شارژ حساب',
      'tabTitle' => ' افزایش شارژ حساب',
      'breadcrumb' => [['title' => 'مدیریت کیف پول ', 'url' => route('user.wallet.index')], ['title' => 'افزایش شارژ حساب ',
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
                            <h4> افزایش شارژ حساب </h4>
                        </div>

                        <br>


                        @include('admin.layouts.errors')


                        <form class="forms-sample" method="POST" action="{{ route('user.wallet.store') }}"
                            enctype="multipart/form-data" onsubmit="return Validate(this);">
                            @csrf
                            <div class="row">

                                <div class="col-sm-12">

                                    @include('admin.layouts.table.txtalert', [ 'id' => '1'  , 'class' => 'alert alert-secondary' ])
                                    <br>
                                    @include('admin.layouts.table.java_price')

                                    <div class="form-group">
                                        <label for="price"> هزینه شارژ به ریال</label>
                                        <input type="text" class="form-control" id="price" autocomplete="off"
                                            placeholder="  هزینه شارژ به ریال   " name="price" value="{{ old('price') }}"   onkeyup="separateNum(this.value,this);"    >
                                    </div>

                                    <div class="form-group">
                                        <label for="text">توضیحات      </label>
                                        <textarea class="form-control" name="text" id="text" rows="5" >{{old('text')}}</textarea>
                                        </div>



                                    <div class="card-footer">
                                        <a href="{{ route('user.wallet.index') }}" class="btn btn-danger">بازگشت</a>
                                        <button type="submit" class="btn btn-primary float-right">ثبت و پرداخت</button>
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
