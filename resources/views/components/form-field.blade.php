<div class="mb-3">
    <label for="{{ $fieldName }}" class="form-label">{{ $slot }}</label>
    <input 
        type="{{ $inputType }}" 
        name="{{ $fieldName }}" 
        id="{{ $fieldName }}" 
        class="form-control" 
        @if ($remember) value="{{ old($fieldName) }}" @endif>
    @error($fieldName)
        <div class="alert alert-danger"> {{ $message }}</div>
    @enderror
</div>