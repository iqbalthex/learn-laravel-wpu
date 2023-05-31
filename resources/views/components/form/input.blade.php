<div class="form-floating">
  <input class="form-control
    @error($name) is-invalid @enderror"
    @error($name) autofocus @enderror
    type="{{ $type }}" value="{{ old($name) }}"
    name="{{ $name }}" placeholder="{{ $label }}" />
  <label for="floatingInput">{{ $label }}</label>
  @error($name)
    <div class="invalid-feedback mb-1">{{ $message }}</div>
  @enderror
</div>
