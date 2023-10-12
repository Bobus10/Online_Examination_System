@props(['var', 'name', 'type'])

<div>
    <x-input-label for="{{ $var }}" :value="__( $name )" />
    <x-text-input id="{{ $var }}" name="{{ $var }}" type="{{ $type }}" class="mt-1 block w-full" required autofocus autocomplete="{{ $var }}" />
    <x-input-error class="mt-2" :messages="$errors->get('{{ $var }}')" />
</div>
