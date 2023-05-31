<div class="form-floating">
  <input
    type="{{ $type }}" placeholder="{{ $label }}"
    class="form-control {{ $isInvalid() }}"
    name="{{ $name }}" value="{{ old($name) }}"
    />
  <label for="floatingInput">{{ $label }}</label>
  @error($name)
    <div class="invalid-feedback mb-1">{{ $message }}</div>
  @enderror
</div>

{{--
<div class="form-floating">
  <input
    type="{{ $type }}" class="form-control"
    name="{{ $name }}" placeholder="{{ $label }}" />
  <label for="floatingInput">{{ $label }}</label>
</div>
--}}