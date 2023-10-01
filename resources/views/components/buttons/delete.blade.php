<button type="button" {{ $attributes->merge([
        'type' => 'button',
        'class' => 'rounded-full bg-red-900 hover:bg-red-600 text-white font-medium  text-sm px-2.5 py-2.5 text-center inline-flex items-center mr-2'
    ]) }}>

    <svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
     </svg>

    <p>
        {{ $slot }}
    </p>
</button>

