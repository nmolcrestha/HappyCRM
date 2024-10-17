<x-guest-layout>
    <form action="{{ route('message.submit', $user->id) }}" method="POST">
        @csrf
        <div>
            <h1 class="text-xl text-center mb-4">Send to user message</h1>
        </div>

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="message" :value="__('Message')" />
            <x-textarea-input id="message" class="block mt-1 w-full" type="message" name="message"
                :value="old('message')" />
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button class="w-full text-center justify-center">
                {{ __('Send Message') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
