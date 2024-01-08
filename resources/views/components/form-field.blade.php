<div class="mb-3">
    <label for="{{ $fieldName }}" class="form-label">{{ $slot }}</label>
    <input 
        class="form-control" 
        type="{{ $inputType }}" 
        name="{{ $fieldName }}" 
        id="{{ $fieldName }}" 
        {{ $attributes }}
        @if ($remember) value="{{ old($fieldName) }}" @endif>
    <div class="form-text">{{ $help }}</div>
    @error($fieldName)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>