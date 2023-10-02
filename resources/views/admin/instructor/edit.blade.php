<x-dashboard-layout>
    <div class=" mx-5 my-5 text-center">
        Edit {{ $instructor->first_name }}
        <form method="POST" action="{{ route('instructors.update', $instructor->id) }}" class="mt-6 space-y-6">
            @csrf
            @method("PATCH")

            <div>
                <x-input-label for="first_name" :value="__('First name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $instructor->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <div>
                <x-input-label for="surname" :value="__('Surname')" />
                <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $instructor->surname)" required autofocus autocomplete="surname" />
                <x-input-error class="mt-2" :messages="$errors->get('surname')" />
            </div>

            <div>
                <x-input-label for="date_of_birth" :value="__('DATE OF BIRTH')" />
                <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $instructor->date_of_birth)" required autofocus autocomplete="date_of_birth" />
                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>

            <div>
                <x-input-label for="hire_date" :value="__('HIRE DATE')" />
                <x-text-input id="hire_date" name="hire_date" type="date" class="mt-1 block w-full" :value="old('hire_date', $instructor->hire_date)" required autofocus autocomplete="hire_date" />
                <x-input-error class="mt-2" :messages="$errors->get('hire_date')" />
            </div>

            <div>
                <x-input-label for="salary" :value="__('SALARY')" />
                <x-text-input id="salary" name="salary" type="number" class="mt-1 block w-full" :value="old('salary', $instructor->salary)" required autofocus autocomplete="salary" />
                <x-input-error class="mt-2" :messages="$errors->get('salary')" />
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
