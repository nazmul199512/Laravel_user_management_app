<!-- resources\views\users\edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                            <input id="name" class="block mt-1 w-full form-input" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                            <input id="email" class="block mt-1 w-full form-input" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('New Password') }}</label>
                            <input id="password" class="block mt-1 w-full form-input" type="password" name="password" autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Confirm New Password') }}</label>
                            <input id="password_confirmation" class="block mt-1 w-full form-input" type="password" name="password_confirmation" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
