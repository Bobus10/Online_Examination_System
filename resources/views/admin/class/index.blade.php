<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div class="text-lg">
            {{ $classes->first()->yearbook->degreeCourse->name }} {{ $classes->first()->yearbook->academic_year }}
            {{-- <a href="{{ route('class.create') }}"<x-buttons.create/></a> --}}
        </div>
        <table>
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Klasy
                    </th>
                    <th>
                        Studenci
                    </th>
                    <th>
                        akcja
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                    <x-table.tr>
                        <x-table.th class="text-center bg-gray-800 text-white">
                            {{ $loop->iteration }}
                        </x-table.th>

                            <th>{{ $class->label }}</th>
                            <th>{{ $class->students->count() }}</th>

                        <x-table.th class="flex items-center text-center">
                            <a href="{{ route('class.show', $class->id) }}"><x-buttons.info/></a>
                            <a href="{{ route('class.edit', $class->id) }}"><x-buttons.edit/></a>
                            {{-- <form method="POST" action="{{ route('class.destroy', $class->id) }}" >
                                @csrf
                                @method('DELETE')
                                <x-buttons.delete type='submit'/>
                            </form> --}}
                        </x-table.th>
                    </x-table.tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
