

                                        @if ($coloumn->form_field->name=='input')
                                        <div class="form-group">
                                            <label for="{{$coloumn->form_field->name}}{{$coloumn->id}}"> {{$coloumn->name}} </label>
                                            <input type="text" class="form-control" id="{{$coloumn->form_field->name}}{{$coloumn->id}}" autocomplete="off"
                                                   placeholder=" {{$coloumn->place}} " name="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                    value="{{$mydata}}">
                                        </div>


                                        @endif


                                        @if ($coloumn->form_field->name=='select')
                                        @include('admin.layouts.table.selectbox', [ 'allforeachs' => $coloumn->form_coloumn_mults ,  'input_name' => 'name'  ,  'name_select' => $coloumn->name ,
                                         'value' =>  $mydata, 'required'=>'required'  , 'index_id'=> $coloumn->form_field->name.$coloumn->id ])
                                        @endif




                                        @if ($coloumn->form_field->name=='password')
                                        <div class="form-group">
                                            <label for="name"> {{$coloumn->name}} </label>
                                            <input type="password" class="form-control" id="{{$coloumn->form_field->name}}{{$coloumn->id}}" autocomplete="off"
                                                   placeholder=" {{$coloumn->name}} " name="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                    value="{{$mydata}}">
                                        </div>
                                        @endif

                                        @if ($coloumn->form_field->name=='checkbox')
<hr>
                                        <div class="form-group">
                                            <label for="name"> {{$coloumn->name}} </label>
                                        </div>
									<div class="form-group">
                                        @foreach ($coloumn->form_coloumn_mults as $mult )
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input"  id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                name="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                value="{{$mult->id}}"  {{($mult->id == $mydata ? 'checked' : '')}}   >
												 {{$mult->name}}
											</label>
										</div>
                                        @endforeach
                                        </div>
                                        @endif


                                        @if ($coloumn->form_field->name=='radiobox')
<hr>
                                        <div class="form-group">
                                            <label for="name"> {{$coloumn->name}} </label>
                                        </div>
									<div class="form-group">
                                        @foreach ($coloumn->form_coloumn_mults as $mult )
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input"  id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                name="{{$coloumn->form_field->name}}{{$coloumn->id}}"   value="{{$mult->id}}"  {{($mult->id == $mydata   ? 'checked' : '')}}   >
												 {{$mult->name}}
											</label>
										</div>
                                        @endforeach
                                        </div>
                                        @endif



                                        @if ($coloumn->form_field->name=='textaria')
									<div class="form-group">
										<label for="{{$coloumn->form_field->name}}{{$coloumn->id}}">{{$coloumn->name}}   </label>
										<textarea class="form-control" id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                             name="{{$coloumn->form_field->name}}{{$coloumn->id}}" placeholder=" {{$coloumn->place}} "
											rows="10">{{$mydata}}</textarea>
									</div>
                                        @endif



                                        @if ($coloumn->form_field->name=='datepersian')


                                     <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$coloumn->name}}  </h6>
                                        <div class="input-group date datepicker">

                                            <input type="text" class="form-control tarikh" id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                            name="{{$coloumn->form_field->name}}{{$coloumn->id}}"  value="{{$mydata}}">
                                            <span class="input-group-addon " ><i data-feather="calendar"></i></span>
                                        </div>
                                        </div>
                                        </div>



                                        @endif



                                        @if ($coloumn->form_field->name=='dateenglish')

                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$coloumn->name}}</h6>

                                                <div class="input-group flatpickr" id="flatpickr-date">
                                  <input type="text" class="form-control"  id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                  name="{{$coloumn->form_field->name}}{{$coloumn->id}}"  value="{{$mydata}}" data-input>
                                  <span class="input-group-addon"  data-toggle><i data-feather="calendar"></i></span>

                                 </div>
                                            </div>
                                        </div>
                                        @endif




