<!-- resources\views\users\create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full form-input" type="text" name="name" :value="old('name')" required autofocus />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full form-input" type="email" name="email" :value="old('email')" required />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Password') }}</label>
                            <input id="password" class="block mt-1 w-full form-input" type="password" name="password" required autocomplete="new-password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="block mt-1 w-full form-input" type="password" name="password_confirmation" required />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
