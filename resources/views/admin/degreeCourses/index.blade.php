<x-dashboard-layout>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
    <div>
        <a href="{{ route('degree_courses.create') }}"<x-buttons.create/></a>
    </div>
    <x-table.table-layout :content='$degreeCourses' :propsNames='["name"]' :columnNames='["Name"]' route='degree_courses'/>
</div>
</x-dashboard-layout>
