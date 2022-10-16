

<option value="">لطفا فرم مورد نظر را انتخاب نمایید</option>
@foreach ($forms as $form)
    <option value="{{ $form->id }}"
        {{ old('form_id') == $form->id ? 'selected' : '' }}>{{ $form->name }}
    </option>
@endforeach
