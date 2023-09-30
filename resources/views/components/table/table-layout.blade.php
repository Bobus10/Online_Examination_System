@props(['columnNames', 'content', 'propsNames'])

<table {{ $attributes->merge(['class' => 'rounded-lg border border-colapse-1 border-black border-1 w-full']) }}>
    <x-table.thead :columnNames='$columnNames'/>
    <x-table.tbody :content='$content' :propsNames='$propsNames'/>
</table>
