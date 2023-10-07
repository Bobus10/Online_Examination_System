<x-dashboard-layout>
    <div class=" mx-5 my-5">
        info {{ $degreeCourse->name }}
        roczniki
        @foreach($degreeCourse->yearbooks as $yearbook)
        <li>{{ $yearbook->academic_year }}</li>
    @endforeach
    </div>
</x-dashboard-layout>
