

                              <div class="row">
                                <div class="col-md-12 grid-margin">
                                    <div class="card rounded">

                                        <div class="card-body">
                                            <h6 class="card-title">مشاهده اکانتهای کاربر</h6>
                                            <div class="table-responsive">

                                              @if ($admin->contacts)

                                              <table id="dataTableExample" class="table">
                                                  <thead>
                                                      <tr>
                                                          <th>ردیف</th>
                                                          <th>firstname</th>
                                                          <th>تاریخ ایجاد</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
@foreach ($admin->contacts as  $key => $contact)
<tr>
  <td>{{ $key + 1 }}</td>
  <td>{{ $contact->firstname }}</td>
  <td>{{   date_frmat($contact->created_at) }} </td>
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
