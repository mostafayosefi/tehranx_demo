
@if ($multi)
@php $flgmult=$multi; @endphp
@else
@php $flgmult=0; @endphp
@endif


@foreach ($form_coloumns as $form_coloumn)
@if($form_coloumn->form_field->multi==$flgmult)

    <option value="{{ $form_coloumn->id }}"
        {{ old('form_coloumns_id') == $form_coloumn->id ? 'selected' : '' }}>{{ $form_coloumn->name }}
    </option>
    @endif
@endforeach
