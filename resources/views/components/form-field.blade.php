<div class="mb-3">
    <label for="{{ $fieldName }}" class="form-label">{{ $slot }}</label>

    <x-input type="{{ $inputType }}" name="{{ $fieldName }}" {{ $attributes }}></x-input>

    <div class="form-text">{{ $help }}</div>
    @error($fieldName)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>