

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست زیرگروهها </h6>
          <div class="table-responsive">

@if($form_category->form_subcategories)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th> نام زیرگروه</th>
                  <th>لینک زیرگروه</th>
                  <th>ویرایش  </th>
                  <th>حذف  </th>
                </tr>
              </thead>
              <tbody>


@foreach($form_category->form_subcategories as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->name}} </td>

<td>{{$admin->link}} </td>


<td>
    <a href="{{ route('admin.form.form_subcategory.edit', $admin) }}">
    <span class="btn btn-primary" >  <i data-feather="edit"></i></span>
    </a>
    </td>


<td>
    @include('admin.layouts.table.modal', [$admin ,'route' => route('admin.form.form_subcategory.destroy', $admin) , 'myname' => $admin->name ])
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




