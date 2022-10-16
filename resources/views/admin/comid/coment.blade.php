@component('admin.layouts.content',[
    'title'=>'کامنت مشتریان  ',
    'tabTitle'=>'کامنت مشتریان  ',
    'breadcrumb'=>[
            ['title'=>'کامنت مشتریان  ','class' => 'active']
    ]])


@slot('style')
<link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">

@endslot


    <div class="row">
        <div class="col-3 ab-item"></div>
            <div class="col-6  ">
            <div class="row flex-grow">




                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>کامنت مشتریان </h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')









                            <form class="forms-sample" method="POST" action="{{ route('admin.manegement.comid_store' , 'coment' ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">





<div class="form-group" >
    <label for="title">نام مشتری</label>
    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام مشتری" name="title"  value="{{old('title')}}"  required >
    </div>


    <div class="form-group" >
    <label for="tit">نقش مشتری</label>
    <input type="text" class="form-control" id="role" autocomplete="off" placeholder="نقش مشتری" name="role"  value="{{old('role')}}"  required >
    </div>


    <div class="form-group" >
    <label for="text">کامنت مشتری</label>
    <textarea class="form-control" name="text" rows="12" ></textarea>
    </div>




         @method('PUT')
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">ثبت</button>
                                        </div>


                                    </div>


                                </div>

                            </form>



                        </div>
                    </div>
                </div>





            </div>
        </div>

        <div class="col-3 "></div>

    </div>




    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">کامنت مشتریان</h6>
              <div class="table-responsive">

    @if($comids)
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام مشتری</th>
                        <th>نقش مشتری</th>
                      <th>ویرایش</th>
                      <th>حذف</th>
                    </tr>
                  </thead>
                  <tbody>


    @foreach($comids as $key => $admin)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{$admin->title}}</td>
                        <td>{{$admin->role}}</td>

<td>
    <a href="{{ route('admin.manegement.comid_edit', ['status'=>$admin->status ,'id' => $admin->id ]  ) }}">
    <span class="btn btn-primary" >  <i data-feather="edit"></i></span>
    </a>


    </td>
    <td>
    @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.manegement.comid_destroy', ['status'=>$admin->status ,'id' => $admin->id ] ) , 'myname' => $admin->title ])
    </td>

                    </tr>
    @endforeach



                  </tbody>
                </table>

    @endif

              </div>
            </div>
          </div>
        </div>
      </div>






    @slot('script')



    @endslot




@endcomponent
