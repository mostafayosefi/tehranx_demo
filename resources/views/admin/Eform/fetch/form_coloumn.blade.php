

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"> پارامترهای ورودی </h6>
                    <div class="table-responsive">

                        @if($form_coloumn_mults)
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>فرم/فیلد  </th>
                                    <th>نام پارامتر</th>
                                    <th>وضعیت</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($form_coloumn_mults as $key => $admin)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$admin->form_coloumn->form->name}}/
                                            {{$admin->form_coloumn->name}}
                                        </td>
                                        <td>{{$admin->name}}</td>

                                        <td>
                                            @include('admin.layouts.table.statusacount', [$admin ,'route' =>
                                            route('admin.form.form_coloumn_mult.status', $admin->id ) , 'myname' => ' پارامتر '.$admin->name.' ' ])
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.form.form_coloumn_mult.edit', $admin) }}">
                                                <span class="btn btn-success" >  <i data-feather="edit"></i></span>
                                            </a>
                                        </td>



                                        <td>
                                            @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_coloumn_mult.destroy', $admin) , 'myname' => $admin->name ])
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



