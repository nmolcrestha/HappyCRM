<x-guest-layout>
    <form action="" method="POST">
        <div>
            <h1 class="text-2xl font-bold mb-4">Make an Appointment</h1>
        </div>

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="service_id" :value="__('Desired Service')" />
            <select name="service_id" id="service_id" class="block mt-1 w-full">
                @foreach ($user->services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('service_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="start_at" :value="__('Time')" />
            <x-text-input id="start_at" class="block mt-1 w-full" type="datetime-local" name="start_at"
                min="{{ now()->format('Y-m-d H:i:s') }}" :value="old('start_at')" />
            <x-input-error :messages="$errors->get('start_at')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="additional_notes" :value="__('Additional Notes')" />
            <x-textarea-input id="additional_notes" class="block mt-1 w-full" type="text" name="additional_notes"
                :value="old('additional_notes')" />
            <x-input-error :messages="$errors->get('additional_notes')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full text-center justify-center">
                {{ __('Make Appointment') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
