<x-dashboard-layout>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5 my-5">
    <div>
        <a href="{{ route('fos.create') }}"<x-buttons.create/></a>
    </div>
    <x-table.table-layout :content='$fieldOfStudies' :propsNames='["name"]' :columnNames='["Name"]' route='fos'/>
</div>
</x-dashboard-layout>
