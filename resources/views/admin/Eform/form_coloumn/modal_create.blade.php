
                                   <button type="button" class="badge badge-success" data-toggle="modal"
                                      data-target="#create">
                                      <i data-feather="file-plus"></i> &nbsp; ثبت فیلد جدید
                                  </button>



                                  <div class="modal fade" id="create" tabindex="-1" role="dialog"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">



                              @include('admin.layouts.errors')

                              <form class="forms-sample" method="POST" action="{{ route('admin.form.form_coloumn.store') }}"
                              enctype="multipart/form-data" onsubmit="return Validate(this);">
                                                              @csrf
                                                              <div class="row">

                                                                  <div class="col-sm-12">


                            @include('admin.layouts.table.selectbox', [ 'allforeachs' => $forms ,  'input_name' => 'name'  ,  'name_select' => '  فرم   ' ,  'value' =>   old('form_id') , 'required'=>'required'  , 'index_id'=>'form_id' ])
                            @include('admin.Eform.form_coloumn.create_table', [ 'guard' =>   'admin' ])
                            @include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_fields ,  'input_name' => 'name'  ,  'name_select' => '  نوع فیلد   ' ,  'value' =>   old('form_field_id') , 'required'=>'required'  , 'index_id'=>'form_field_id' ])



                                                                      <div class="card-footer">
                                                                          <a href="{{ route('admin.form.form_coloumn.index') }}" class="btn btn-danger">بازگشت</a>
                                                                          <button type="submit" class="btn btn-primary float-right">ثبت</button>
                                                                      </div>


                                                                  </div>


                                                              </div>

                                                          </form>




                                          </div>
                                      </div>
                                  </div>









