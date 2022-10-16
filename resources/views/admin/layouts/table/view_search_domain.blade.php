 
                                  <button type="button" class="badge badge-primary" data-toggle="modal"
                                      data-target="#status_{{ $admin->id }}">
                                      مشاهده نتایج جستجو
                                      &nbsp; 
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                      
                                      
                                  </button>

 
                                  <div class="modal fade" id="status_{{ $admin->id }}" tabindex="-1" role="dialog"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel"> {{  $myname }} </h5>
                                                  <button type="button" class="close" data-dismiss="modal"
                                                      aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">

                                                
                                                <div class="row" >
                                                    <div class="col-6 col-xl-6 ">
                                                <ul class="list-group">
                                                    <li class="list-group-item active">  {{  $admin->link }} </li>
                                                            @foreach ($admin->checkdomains as $checkdomain )
                                                            <li class="list-group-item">{{$checkdomain->domain}}</li>
                                                           @endforeach
                                                  </ul>
                                                  
                                                </div>
                                                
                                                <div class="col-3 col-xl-3  ">
                                                    <ul class="list-group">
                                                        <li class="list-group-item  active"> هزینه دلاری</li>
                                                        @foreach ($admin->checkdomains as $checkdomain )
                                                        <li class="list-group-item">{{$checkdomain->price}} $</li>
                                                       @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-3 col-xl-3  ">
                                                    <ul class="list-group">
                                                        <li class="list-group-item  active"> هزینه ریالی</li>
                                                        @foreach ($admin->checkdomains as $checkdomain )
                                                        <li class="list-group-item">{{number_format($checkdomain->riyal)}} ريال</li>
                                                       @endforeach
                                                    </ul>
                                                </div>

                                                </div>



                                                @if ($admin->user)
                                                <div class="row" >
                                                    <div class="col-12 col-xl-12 ">
                                                <ul class="list-group">
                                                    <li class="list-group-item active"> کاربر :  {{  $admin->user->name }} </li>
                                                  </ul>
                                                </div>
                                                </div>
                                                @endif




                                            </div>
                                              <div class="modal-footer">
 
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
 

                                              </div>
                                          </div>
                                      </div>
                                  </div>









