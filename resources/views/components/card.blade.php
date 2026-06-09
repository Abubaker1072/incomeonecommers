@props([
    'title' => null,
    'actions' => null, // pass a slot named 'actions' for header buttons
])

<div {{ $attributes->merge(['class' => 'card h-100']) }}>
    @if ($title || isset($actions))
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">{{ $title }}</h5>
            @isset($actions)
                <div>{{ $actions }}</div>
            @endisset
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
