@props(['name', 'label' => $name, 'type' => 'text', 'value' => null, 'required' => false])

<div class="form-check">
    <input name="{{ $name }}" class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $name }}FormControlInput"  @required($required) >
    <label class="form-check-label" for="{{ $name }}FormControlInput">
        {{ __($label) }}
    </label>
</div>
