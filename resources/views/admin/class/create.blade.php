<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div class="text-lg">
            Create class in
            {{ $yearbook->degreeCourse->name }}
            {{ $yearbook->academic_year }}
            {{ $nextLetter }}
        </div>
        <form method="POST" action="{{ route('class.store', $yearbook->id) }}">
            @csrf

            <table>
                <caption>
                    Students without class
                </caption>

                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            First name
                        </th>
                        <th>
                            Surname
                        </th>
                        <th>
                            Buttons
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($studentsWithoutClass as $studentWithoutClass)
                        <x-table.tr>

                            <x-table.th class="text-center bg-gray-800 text-white">
                                {{ $loop->iteration }}
                            </x-table.th>

                            <th> {{ $studentWithoutClass->id}} </th>
                            <th> {{ $studentWithoutClass->first_name}} </th>
                            <th> {{ $studentWithoutClass->surname}} </th>
                            <th>
                                <label for="student_{{ $studentWithoutClass->id }}">
                                    <input type="checkbox" name="chosenStudents[{{ $studentWithoutClass->id }}]" id="student_{{ $studentWithoutClass->id }}" value="{{ $studentWithoutClass->id }}" @if ($studentWithoutClass) unchecked @endif>
                                </label>
                            </th>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit">Save</button>
        </form>
    </div>
</x-dashboard-layout>
