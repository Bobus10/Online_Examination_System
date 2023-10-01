<tr {{ $attributes->merge([
        'class' => 'bg-gray-300 hover:bg-gray-200 transition delay-300 duration-700 ease-in-out border border-slate-700'
    ]) }}>
    {{ $slot }}
</tr>
