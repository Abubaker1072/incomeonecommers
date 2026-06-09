@props([
    'columns' => [],
    'empty' => 'No records found.',
])

<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table align-middle']) }}>
        <thead>
            <tr>
                @foreach ($columns as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if (trim($slot) === '')
                <tr>
                    <td colspan="{{ count($columns) }}" class="text-center text-muted py-4">{{ $empty }}</td>
                </tr>
            @else
                {{ $slot }}
            @endif
        </tbody>
    </table>
</div>
