@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $disabled ??= false;
    $name ??= '';
    $value ??= '';
    $multiple ??= false;
    $hidden??= false;
@endphp
<div @class([$class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="rating has-text-success is-size-2" data-rate-value=0></div>
    <script type="text/javascript">
        $(".rating").rate({
            cursor: 'pointer',
        });
        $(".rating").on("change", function(ev, data){
            const input = document.getElementById("rating");
            input.value = data.to;
        });
    </script>

    <input 
        type="{{ $type }}" 
        class="form-control @error($name) is-invalid @enderror" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}" 
        id="rating"
        {{ $multiple ? 'multiple' : '' }}
        {{ $disabled ? 'disabled' : '' }} 
        {{ $hidden ? 'hidden' : '' }} >
    @error($name)
        <span class="small text-danger">{{ $message }}</span>
    @enderror
</div>