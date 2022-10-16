  @component('admin.layouts.content', [
      'title' => 'شارژ حساب کاربر',
      'tabTitle' => 'شارژ حساب کاربر',
      'breadcrumb' => [['title' => 'مشاهده تراکنش های کاربران ', 'url' => route('admin.wallet.index')], ['title' => 'شارژ حساب کاربر',
      'class' => 'active']],
      ])


@slot('style')
 <link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">
   @endslot

      <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
              <div class="row flex-grow">


                  <div class="col-md-2 grid-margin stretch-card">
                  </div>


                  <div class="col-md-8 grid-margin stretch-card">
                      <div class="card">
                          <div class="card-body">

                              <div class="card-header card-header-border-bottom">
                                  <h5>جزییات شارژ حساب کاربر </h5>
                              </div>

                              <br>






                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                @include('admin.layouts.errors')

                            </th>
                        </tr>
                    </thead>

                    <tbody>

            <tr>
               <td>کاربر</td>
               <td> {{ $wallet->user->name }}</td>
           </tr>


            <tr>
                <td>    مبلغ تراکنش </td>
                <td>{{number_format($wallet->price)}} ريال</td>
            </tr>

            <tr>
                <td>    توضیحات </td>
                <td> {{ $wallet->text }}</td>
            </tr>

            <tr>
                <td>    نوع تراکنش </td>
                <td>        @include('admin.layouts.table.origin_getstatus', ['admin' => $wallet ,'route' => ''  ,'type_name' => 'flag_wallet'   ])  </td>
            </tr>
            <tr>
                <td>    وضعیت تراکنش </td>
                <td>        @include('admin.layouts.table.origin_getstatus', ['admin' => $wallet ,'route' => ''  ,'type_name' => 'status_wallet'   ])  </td>
            </tr>

@if($wallet->status!='waiting')
            <tr>
                <td>    توضیحات مدیر </td>
                <td> {{ $wallet->textadmin }}</td>
            </tr>
@endif



@if ($wallet->status == 'waiting')

<tr>
    <td>عملیات تراکنش</td>
    <td>

        @include('admin.wallet.modal_operation', [ 'route' => route('admin.wallet.status' , [ 'id'=>$wallet->id , 'status'=>'active' ]  ) ,
         'operat' => 'accept' , 'order'=>$wallet     ])

        @include('admin.wallet.modal_operation', [ 'route' => route('admin.wallet.status' , [ 'id'=>$wallet->id , 'status'=>'inactive' ]  ) ,
        'operat' => 'cancel'  , 'order'=>$wallet  ])

    </td>
</tr>
@endif


                    </tbody>
                </table>











                          </div>
                      </div>
                  </div>



                  <div class="col-md-2 grid-margin stretch-card">
                  </div>



              </div>
          </div>
      </div>













      @slot('script')
       <script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>
       <script src="{{ asset('template/assets/js/select2.js') }}"></script>
      @endslot
  @endcomponent
