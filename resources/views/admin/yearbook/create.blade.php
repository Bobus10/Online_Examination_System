<x-dashboard-layout>
    <div class=" mx-5 my-5 text-center">
        CREATE yearbook for {{ $degreeCourse->name }}
        <form method="POST" action="{{ route('yearbooks.store', $degreeCourse->id) }}" class="mt-6 space-y-6">
            @csrf

            <div>
                <input type="hidden" name="degree_course_id" value="{{ $degreeCourse->id }}">
            </div>

            <div>
                <x-input-label for="academic_year" :value="__( 'Academic year' )" />
                <x-text-input id="academic_year" name="academic_year" type="number" class="mt-1 block w-full" required autofocus autocomplete="academic_year" />
                <x-input-error class="mt-2" :messages="$errors->get('academic_year')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</x-dashboard-layout>
