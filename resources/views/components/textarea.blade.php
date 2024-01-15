@php
$label ??= null;
$type ??= 'text';
$class ??= null;
$disabled ??= false;
$name ??= '';
$value ??= '';
@endphp
<div @class([$class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" {{ $disabled }} id="{{ $name }}">{{ old($name, $value) }}</textarea>
    @error($name)
        <span class="small text-danger">{{  $message }}</span>
    @enderror
</div>