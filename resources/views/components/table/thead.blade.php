@props(['columnNames'])

<thead class="text-lg bg-gray-800 text-white">
    <x-table.tr-head>
        <x-table.th>
            #
        </x-table.th>
        @foreach ($columnNames as $columnName)
            <x-table.th>
                {{ $columnName }}
            </x-table.th>
        @endforeach
        <x-table.th>
            Action
        </x-table.th>
    </x-table.tr-head>
</thead>
