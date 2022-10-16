
                          <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card rounded">

                                    <div class="card-body">
                                        <h6 class="card-title">تاریخچه ورود</h6>
                                        <div class="table-responsive">

                                          @if ($loginhistories)

                                          <table id="dataTableExample" class="table">
                                              <thead>
                                                  <tr>
                                                      <th>ردیف</th>
                                                      <th>آی پی کاربر</th>
                                                      <th>تاریخ ورود</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
@foreach ($loginhistories as  $key => $login)
<tr>
<td>{{ $key + 1 }}</td>
<td>{{ $login->ip }}</td>
<td>{{   date_frmat($login->created_at) }} </td>
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
