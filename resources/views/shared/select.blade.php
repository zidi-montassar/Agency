@php
$options ??= [];
$class ??= null;
$label ??= ucfirst($name);
$name ??= '';
$value ??= '';
$multiple ??= true;
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    
    <select name="{{ $name }}[]" id="{{ $name }}" class="@error($name) is-invalid @enderror" multiple>
        @foreach ($options as $k => $option)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>