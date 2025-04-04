@props(['name', 'label' => $name, 'type' => 'text', 'value' => null, 'required' => false, 'error' => null])

<div class="mb-3">
    <label for="{{ $name }}FormControlInput" class="form-label">{{ __($label) }}</label>
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}FormControlInput" value="{{ $value }}" @required($required) />
    @if($error)
        <ul class="text-danger">
            @foreach($error as $msg)
                <li class="small">{{ $msg }}</li>
            @endforeach
        </ul>
    @endif
</div>
