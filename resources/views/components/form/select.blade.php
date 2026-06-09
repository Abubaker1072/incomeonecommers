@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'placeholder' => null,
    'required' => false,
])

@php
    $id = $attributes->get('id', $name);
    $current = old($name, $selected);
    $hasError = $errors->has($name);
@endphp

<div class="mb-3">
    @if ($label)
        <label for="{{ $id }}" class="form-label">{{ $label }} @if ($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <select
        id="{{ $id }}"
        name="{{ $name }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'form-select ' . ($hasError ? 'is-invalid' : '')]) }}
    >
        @if ($placeholder)
            <option value="" disabled @if (! $current) selected @endif>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected((string) $current === (string) $value)>{{ $text }}</option>
        @endforeach
    </select>
    @if ($hasError)
        <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
