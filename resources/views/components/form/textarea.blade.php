@props([
    'name',
    'label' => null,
    'value' => null,
    'rows' => 4,
    'required' => false,
])

@php
    $id = $attributes->get('id', $name);
    $resolved = old($name, $value);
    $hasError = $errors->has($name);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }} @if ($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'form-control ' . ($hasError ? 'is-invalid' : '')]) }}
    >{{ $resolved }}</textarea>
    @if ($hasError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
