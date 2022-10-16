@component('admin.layouts.content',[
    'title'=>'مدیریت متن های پیش فرض',
    'tabTitle'=>'مدیریت متن های پیش فرض ',
    'breadcrumb'=>[
            ['title'=>'مدیریت متن های پیش فرض','class' => 'active']
    ]])





<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">لیست متن های پیش فرض </h6>
          <div class="table-responsive">

@if($txtdeses)
            <table id="dataTableExample" class="table">
              <thead>
                <tr>
                  <th>ردیف</th>
                  <th>نام صفحه  </th>
                  <th>مشاهده</th>
                </tr>
              </thead>
              <tbody>


@foreach($txtdeses as $key => $admin)
                <tr>
                    <td>{{ $key + 1 }}</td>
<td>{{$admin->title}}</td>
 <td>
<a href="{{ route('admin.setting.txtdes_management_edit', $admin) }}">
<span class="btn btn-primary" >  مشاهده</span>
</a>


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






@endcomponent
