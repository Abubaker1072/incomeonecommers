@props([
    'name',
    'label' => null,
    'accept' => 'image/*',
    'required' => false,
])

@php
    $id = $attributes->get('id', $name);
    $hasError = $errors->has($name);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }} @if ($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <input
        type="file"
        id="{{ $id }}"
        name="{{ $name }}"
        accept="{{ $accept }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'form-control ' . ($hasError ? 'is-invalid' : '')]) }}
    >
    @if ($hasError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
