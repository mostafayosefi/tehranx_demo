

 @if ($coloumn->form_field->name=='input')

    <div class="email-list-item email-list-item">
        <div class="col-xl-4  col-lg-4  col-md-6  col-sm-6  ">
            <span class="from">  {{$coloumn->name}}</span>
        </div>
        <div class="col-xl-8  col-lg-8  col-md-6  col-sm-6  ">
            <p class="msg">{{$mydata}}</p>
        </div>
    </div>

 @endif



 @if ($coloumn->form_field->name=='textaria')
 <div class="email-list-item email-list-item">
    <div class="col-xl-4  col-lg-4  col-md-6  col-sm-6  ">
        <span class="from">  {{$coloumn->name}}</span>
    </div>
    <div class="col-xl-8  col-lg-8  col-md-6  col-sm-6  ">
        <p class="msg">{{$mydata}}</p>
    </div>
</div>
     @endif



     @if ($coloumn->form_field->name=='radiobox')

                                             <div class="email-list-item email-list-item">
                                                <div class="col-xl-4  col-lg-4  col-md-6  col-sm-6  ">
                                                    <span class="from">   {{$coloumn->name}}  </span>
                                                </div>
                                                <div class="col-xl-8  col-lg-8  col-md-6  col-sm-6  ">
                                                    <p class="msg">
                                                        @foreach ($coloumn->form_coloumn_mults as $mult )
                                                        <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                                            name="{{$coloumn->form_field->name}}{{$coloumn->id}}"  disabled   value="{{$mult->id}}"  {{($mult->id == $mydata   ? 'checked' : '')}}    >
                                                            {{$mult->name}}
                                                        </label>
                                                    </div>

                                                    @endforeach
                                </p>
                                                </div>
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





                                        @if ($coloumn->form_field->name=='datepersian')

                                        @slot('style')
                                        <link rel="stylesheet" href="{{ asset('template/assets/css/persian-datepicker-0.4.5.min.css') }}">
                                        <link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
                                        @endslot


                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">{{$coloumn->name}}  </h6>
                                        <div class="input-group date datepicker">

                                            <input type="text" class="form-control tarikh" id="{{$coloumn->form_field->name}}{{$coloumn->id}}"
                                            name="{{$coloumn->form_field->name}}{{$coloumn->id}}"  value="{{$mydata}}"><span class="input-group-addon"><i
                                                    data-feather="calendar"></i></span>
                                        </div>
                                        </div>
                                        </div>
                                        @endif

