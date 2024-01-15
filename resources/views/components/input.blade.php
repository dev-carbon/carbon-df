@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $disabled ??= false;
    $name ??= '';
    $value ??= '';
    $multiple ??= false;
@endphp
<div @class([$class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        class="form-control @error($name) is-invalid @enderror" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        id="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $disabled ? 'disabled' : '' }} >
    @error($name)
        <span class="small text-danger">{{ $message }}</span>
    @enderror
</div>