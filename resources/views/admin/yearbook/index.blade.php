<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div>
            {{-- <a href="{{ route('instructors.create') }}"<x-buttons.create/></a> <th>{{ $yearbook->classes->instructor }}</th>--}}
        </div>
<table>
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                kierunek
            </th>
            <th>
                studenci
            </th>
            <th>
                rok
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($yearbooks as $yearbook)
            <x-table.tr>
                <x-table.th class="text-center bg-gray-800 text-white">
                    {{ $loop->iteration }}
                </x-table.th>

                    <th>{{ $yearbook->fieldOfStudy->name }}</th>
                    <th>{{ $yearbook->students_count }}</th>
                    <th>{{ $yearbook->academic_year }}</th>

                <x-table.th class="flex items-center text-center">
                    <a href="{{ route('yearbooks.show', $yearbook->id_field_of_study) }}"><x-buttons.info/></a>
                    <a href="{{ route('yearbooks.edit', $yearbook->id_field_of_study) }}"><x-buttons.edit/></a>
                    <form method="POST" action="{{ route('yearbooks.destroy', $yearbook->id_field_of_study) }}" >
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
