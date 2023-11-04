<x-dashboard-layout>
    <a href="{{ route('subject.create') }}"><x-buttons.create/></a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <x-table.th class="text-center bg-gray-800 text-white">
                        {{ $loop->iteration }}
                    </x-table.th>

                    <th> {{ $subject->name }}</th>

                    <x-table.th class="flex items-center text-center">
                        <a href="#"><x-buttons.info/></a>
                        <a href="{{ route('subject.edit', $subject->id) }}"><x-buttons.edit/></a>
                        <form method="POST" action="{{ route('subject.destroy', $subject->id) }}" >
                            @csrf
                            @method('DELETE')
                            <x-buttons.delete type='submit'/>
                        </form>
                    </x-table.th>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-dashboard-layout>
