@props(['active'])

@php
$classes = $active
            ? 'text-blue-600 font-bold'
            : 'text-gray-700 hover:text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
