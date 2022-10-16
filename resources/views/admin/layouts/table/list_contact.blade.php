
@if($contacts)
<table id="dataTableExample" class="table">
  <thead>
    <tr>

        <th>  ردیف </th>
        <th>   کاربر </th>
        <th>  NikName </th>
        <th>  FullName </th>
        <th>  Email </th>
         <th> مشاهده</th>
        {{-- <th> ویرایش</th> --}}
    </tr>
  </thead>
  <tbody>


@foreach($contacts as $key => $admin)
    <tr>
        <td>{{$key +1}}</td>
        <td> {{$admin->user->name}} </td>
        <td>{{$admin->nikname}}</td>
        <td>{{$admin->full_name}}</td>
        <td>{{$admin->email}}</td>
        <td><a href="{{route('admin.contact.show' , $admin )}}" class=""><i data-feather="eye"></i></a></td>
            {{-- <td> <a  href="{{route('user.contact.edit' , $admin )}}"  class=""> <i data-feather="edit"></i>  </a></td> --}}







    </tr>
@endforeach

  </tbody>
</table>

@endif
