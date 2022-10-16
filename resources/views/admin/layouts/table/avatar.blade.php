@if ($avatarimage)
<img class="{{$class}}"  src="{{ asset($avatarimage . '') }}" style="{{$style}}"  alt="profile" >
@else
<img class="{{$class}}"  src="{{ asset('template/assets/images/user.png') }}"   style="{{$style}}" alt="profile">
@endif
