<tbody class="text-left">
    @foreach ($content as $contentEl)
        <x-table.tr>
            <x-table.th class="text-center bg-gray-800 text-white">
                {{ $loop->iteration }}
            </x-table.th>
            @foreach ($propsNames as $propsName)
                <x-table.th>
                    {{ $contentEl->{$propsName} }}
                </x-table.th>
            @endforeach
            <x-table.th class="text-center">
                <button>E</button>
                <button>D</button>
            </x-table.th>
        </x-table.tr>
    @endforeach
</tbody>
