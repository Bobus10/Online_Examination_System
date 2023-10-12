<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div>
            {{-- <a href="{{ route('yearbooks.create', $yearbooks->first()->degreeCourse->id) }}"<x-buttons.create/></a> --}}
            <a href="{{ route('yearbooks.create', $yearbooks->first()->degreeCourse->id) }}"<x-buttons.create/></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Kierunek
                    </th>
                    <th>
                        Klasy
                    </th>
                    <th>
                        Rocznik
                    </th>
                    <th>
                        Akcja
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($yearbooks as $yearbook)
                    <x-table.tr>
                        <x-table.th class="text-center bg-gray-800 text-white">
                            {{ $loop->iteration }}
                        </x-table.th>

                            <th>{{ $yearbook->degreeCourse->name }}</th>
                                <th>{{ $yearbook->classes_count }}</th>
                            <th>{{ $yearbook->academic_year }}</th>

                        <x-table.th class="flex items-center text-center">
                            <a href="{{ route('class.index', $yearbook->id) }}"><x-buttons.info/></a>
                            <a href="{{ route('yearbooks.edit', $yearbook->id) }}"><x-buttons.edit/></a>
                            <form method="POST" action="{{ route('yearbooks.destroy', $yearbook->id) }}" >
                                @csrf
                                @method('DELETE')
                                <x-buttons.delete type='submit'/>
                            </form>
                        </x-table.th>
                    </x-table.tr>
                @endforeach
        </table>
    </div>
</x-dashboard-layout>
