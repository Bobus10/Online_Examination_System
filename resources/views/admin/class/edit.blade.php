<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div class="text-lg">
            Edit class in
            {{ $class->yearbook->degreeCourse->name }}
            {{ $class->yearbook->academic_year }}
            {{ $class->label }}
        </div>
        <form action="" method="POST">
            @csrf
            @method("PATCH")
            <table>
                <caption>
                    Students in class
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
                    @foreach ($studentsInClass as $studentInClass)
                        <x-table.tr>

                            <x-table.th class="text-center bg-gray-800 text-white">
                                {{ $loop->iteration }}
                            </x-table.th>

                            <th> {{ $studentInClass->id}} </th>
                            <th> {{ $studentInClass->first_name}} </th>
                            <th> {{ $studentInClass->surname}} </th>
                            <th>
                                <label>
                                    <input type="checkbox" @if ($studentInClass) checked @endif>
                                </label>
                            </th>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>

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
                                <input type="checkbox"/>
                            </th>
                        </x-table.tr>
                    @endforeach
                </tbody>
            </table>


            <button type="submit">Save</button>
        </form>
    </div>
</x-dashboard-layout>
