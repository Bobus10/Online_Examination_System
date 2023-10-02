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
            <x-table.th class="flex items-center text-center">
                <a href="{{ route($route . '.show', $contentEl->id) }}"><x-buttons.info/></a>
                <a href="{{ route($route . '.edit', $contentEl->id) }}"><x-buttons.edit/></a>
                <form method="POST" action="{{ route($route . '.destroy', $contentEl->id) }}" >
                    @csrf
                    @method('DELETE')
                    <x-buttons.delete type='submit'/>
                </form>
            </x-table.th>
        </x-table.tr>
    @endforeach
</tbody>
