

  <form method="post" class="forms-sample"   enctype="multipart/form-data"  onsubmit="return Validate(this);"   action="{{route('user.authentication.bankaccount')}}">
    @csrf

    @method('POST')
    <div class="row">


    <div class="col-sm-6">




    <div class="form-group row">
     <label for="exampleInputUsername2" class="col-sm-3 col-form-label">شماره کارت بانکی</label>
     <div class="col-sm-8">
    <input class="form-control" id="card" data-inputmask-alias="9999-9999-9999-9999" inputmode="text"   placeholder="شماره کارت بانکی"  name="card" >
     </div>
     </div>


    <div class="form-group row">
     <label for="exampleInputUsername2" class="col-sm-3 col-form-label">شماره شبا</label>
     <div class="col-sm-8">
    <input type="text" class="form-control"  id="shaba"  dir="ltr"  autocomplete="off"      placeholder="شماره شبا" name="shaba"  value="IR"    >
     </div>
     </div>








    </div>


    <div class="col-sm-6">


        @include('admin.layouts.table.selectbox', [ 'allforeachs' => $bank ,  'input_name' => 'name'  ,  'name_select' => ' بانک   ' ,  'value' =>   old('bank_id') , 'required'=>'required'  , 'index_id'=>'bank_id' ])

<hr>


    <div class="form-group" >
     <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> </label>
    <label for="file"> برای اپلود کارت بانکی کلیک کنید
       </label>
    <input type="file" name="file"    id="file" autocomplete="off"  name="file" required >
    </div>



     <input type="hidden" name="nameuser" value="{{$authentication->user->name}}">




        <hr>


    <div class="form-group row">
     <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> </label>
     <div class="col-sm-8">
     <div class="input-group-btn">
    <button type="submit" class="btn btn-success btn-lg btn-icon-text">
     <i class="btn-icon-prepend" data-feather="save"></i>
      ذخیره
    </button>
     </div>
     </div>
     </div>






    </div>


    <div class="col-sm-12">
     <hr>

    </div>


    </div>
    </form>

    <div class="row">


                    <div class="table-responsive">

    @if($bank_accounts)
                      <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                  <th>ردیف</th>
                                  <th>نام بانک </th>
                                  <th>شماره کارت بانکی </th>
                                  <th>شماره شبا </th>
                                  <th>تاریخ ایجاد</th>
                                  <th>وضعیت  </th>
                            </tr>
                        </thead>
                        <tbody>

    @foreach($bank_accounts as $key => $bank_account)



     <tr>
     <td>{{ $key + 1 }}</td>
     <td>{{$bank_account->bank->name}} </td>
     <td>{{$bank_account->card}} </td>
     <td>{{$bank_account->shaba}} </td>
     <td>{{ date_frmat($bank_account->created_at) }}</td>

<td>

    @if($guard=='admin')


    @include('user.authentication.statusbank', ['admin' => $bank_account ,'route' =>
    route('admin.user.status.bank_account', $bank_account->id ) , 'myname' => ' اطلاعات بانکی '.$bank_account->bank->name.' ' ])
        @else

        @if ($bank_account->status == 'active')
        <button type="button" class="badge badge-success"  >
            <i data-feather="check-circle"></i> &nbsp; فعال
        </button>
        @elseif($bank_account->status=='inactive')
        <button type="button" class="badge badge-warning"  >
            <i data-feather="x-circle"></i> &nbsp; غیرفعال
        </button>


        @endif

        @endif

</td>
     </tr>




    @endforeach



                        </tbody>
                      </table>

    @endif

                    </div>

    </div>




    @if($bank_accounts)
    @if($authentication->user->timelines)
    @include('admin.timeline.index', [  'timelines' => $authentication->user->timelines , 'my_activition'=> 'bank_account' ])
    @endif
    @endif

