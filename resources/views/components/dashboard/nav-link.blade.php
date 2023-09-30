@props(['route'])

<a href="{{ route($route) }}"
    {{ $attributes->merge(['class' => 'flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25']) }}>
        <span class="mx-3">{{ $slot }}</span>
</a>
