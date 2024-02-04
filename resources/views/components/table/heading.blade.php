{{-- Access these prop from the `table` component. --}}
@aware(['defaultSortField', 'defaultSortDir'])

@php
    $sortField = request('orderBy', $defaultSortField);
    $sortDir = fn($field) => $sortField === $field ? (request('orderDir', $defaultSortDir) === 'asc' ? 'desc' : 'asc') : 'asc';
    $sortIcon = fn($field) => $sortField === $field ? ($sortDir($field) === 'asc' ? '↑' : '↓') : '↓';
    $hxGetUrl = fn($field) => request()->fullUrlWithQuery([
        'orderBy' => $field,
        'orderDir' => $sortDir($field),
    ]);
    $classes = 'px-3 py-3.5 text-left text-sm font-semibold';
@endphp

@if ($attributes->has(['sortable', 'field']))
    <th
        {{ $attributes->merge([
            'class' => "{$classes} cursor-pointer group select-none",
            'scope' => 'col',
            'hx-get' => $hxGetUrl($field),
            'hx-trigger' => 'click',
            'hx-replace-url' => 'true',
        ]) }}>
        <div class="inline-flex space-x-1 items-center">
            <span>{{ $slot }}</span>
            <span role="img"
                {{ $attributes->class([
                    'text-xs',
                    'opacity-0 transition-opacity duration-300 group-hover:opacity-100' => $sortField !== $field,
                ]) }}>
                {{ $sortIcon($field) }}
            </span>
        </div>
    </th>
@else
    <th {{ $attributes->merge(['class' => $classes, 'scope' => 'col']) }}>{{ $slot }}</th>
@endif
