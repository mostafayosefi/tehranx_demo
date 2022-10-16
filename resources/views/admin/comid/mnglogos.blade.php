@component('admin.layouts.content',[
    'title'=>'لوگو مشتریان  ',
    'tabTitle'=>'لوگو مشتریان  ',
    'breadcrumb'=>[
            ['title'=>'لوگو مشتریان   ','class' => 'active']
    ]])



    <div class="row">
            <div class="col-12  ">
            <div class="row flex-grow">




                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header card-header-border-bottom">
                                <h4>لوگو مشتریان</h4>
                            </div>

                            <br>


                            @include('admin.layouts.errors')









                            <form class="forms-sample" method="POST" action="{{ route('admin.manegement.comid_store' , 'mnglogos' ) }}"
                                enctype="multipart/form-data" onsubmit="return Validate(this);">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">




                                        <div class="form-group" >
                                            <label for="title">نام مشتری</label>
                                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="نام مشتری" name="title"  value="{{old('title')}}"  required >
                                            </div>






                                            <hr>
                                            <div class="form-group" >
                                            <label for="exampleInputUsername1"> آپلود لوگو </label>
                                            <input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
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


    </div>




    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">لوگو مشتریان</h6>
              <div class="table-responsive">

    @if($comids)
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام مشتری</th>
                        <th>لوگو</th>
                      <th>ویرایش</th>
                      <th>حذف</th>
                    </tr>
                  </thead>
                  <tbody>


    @foreach($comids as $key => $admin)
                    <tr>
                        <td>{{ $key + 1 }}</td>
    <td>{{$admin->title}}</td>

    <td>
        @include('admin.layouts.table.avatarnul', [  'avatarimage' => $admin->image , 'class'=>'' , 'style' => 'height: 78px;width: 78px;'  ])

    </td>
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



	<!-- core:js -->
	<script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<script src="{{ asset('template/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('template/assets/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ asset('template/assets/js/form-validation.js') }}"></script>
	<script src="{{ asset('template/assets/js/bootstrap-maxlength.js') }}"></script>
	<script src="{{ asset('template/assets/js/inputmask.js') }}"></script>
	<script src="{{ asset('template/assets/js/select2.js') }}"></script>
	<script src="{{ asset('template/assets/js/typeahead.js') }}"></script>



    <script src="{{ asset('template/assets/vendors/tinymce-rtl/tinymce.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/simplemde/simplemde.min.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/ace.js') }}"></script>
      <script src="{{ asset('template/assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>

      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/tinymce.js') }}"></script>
      <script src="{{ asset('template/assets/js/ace.js') }}"></script>





    @endslot




@endcomponent
