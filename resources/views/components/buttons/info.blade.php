<button type="button" {{ $attributes->merge([
    'type' => 'button',
    'class' => 'rounded-full bg-blue-900 hover:bg-blue-600 text-white font-medium  text-sm px-2.5 py-2.5 text-center inline-flex items-center mr-2'
]) }}>

<svg class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h2v5m-2 0h4M9.408 5.5h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
  </svg>

<p>
    {{ $slot }}
</p>
</button>

