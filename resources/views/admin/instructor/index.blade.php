<x-dashboard-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
        <div>
            <a href="{{ route('instructors.create') }}"<x-buttons.create/></a>
        </div>
        <x-table.table-layout :content='$instructors' :propsNames='["first_name", "surname", "date_of_birth", "hire_date", "salary"]' :columnNames='["First name", "Surname", "Date of birth", "Hire date", "Salary"]' route='instructors'/>
    </div>
</x-dashboard-layout>
