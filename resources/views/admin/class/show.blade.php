<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div class="text-lg">
            Students list in
            {{ $class->yearbook->degreeCourse->name }}
            {{ $class->yearbook->academic_year }}
            {{ $class->label }}
        </div>
        <table>
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        First name
                    </th>
                    <th>
                        Surname
                    </th>
                    <th>
                        akcja
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($class->students as $student)
                    <x-table.tr>
                        <x-table.th class="text-center bg-gray-800 text-white">
                            {{ $loop->iteration }}
                        </x-table.th>

                        <th>{{ $student->first_name }}</th>
                        <th>{{ $student->surname }}</th>

                        <x-table.th class="flex items-center text-center">
                            {{-- todo podglad studenta, usunięcie go z klasy (ustawienie jako null) --}}
                            {{-- <a href="{{ route('student.show', $student->id) }}"><x-buttons.info/></a> --}}
                            {{-- <a href="{{ route('class.edit', $student->id) }}"><x-buttons.edit/></a> --}}
                           {{-- <a href="{{ $student->id }}"  --}}
                            {{-- ! w edycji| tu dodać usuwanie całej klasy --}}
                            {{-- <form method="POST" action="{{ route('class.extrusionStudent', $student->id) }}" >
                                @csrf
                                @method('PATCH')
                                <x-buttons.delete type='submit'/>
                            </form> --}}
                           {{-- </a> --}}
                        </x-table.th>
                    </x-table.tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-dashboard-layout>
