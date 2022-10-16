
@foreach($textdeses as $key => $textdese)
@if($textdese->id==$id)


<div class="{{$class}}" >
    @php echo $textdese->text; @endphp
</div>


@endif
@endforeach
