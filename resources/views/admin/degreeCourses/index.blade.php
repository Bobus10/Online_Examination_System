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
                akcja
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($degreeCourses as $degreeCourse)
            <x-table.tr>
                <x-table.th class="text-center bg-gray-800 text-white">
                    {{ $loop->iteration }}
                </x-table.th>

                    <th>{{ $degreeCourse->name }}</th>

                <x-table.th class="flex items-center text-center">
                    <a href="{{ route('yearbooks.index', $degreeCourse->id) }}"><x-buttons.info/></a>
                    <a href="{{ route('degree_courses.edit', $degreeCourse->id) }}"><x-buttons.edit/></a>
                    <form method="POST" action="{{ route('degree_courses.destroy', $degreeCourse->id) }}" >
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
