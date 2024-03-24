<!-- resources\views\users\show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <div class="mb-6">
                        <p class="text-lg font-semibold">{{ __('Name') }}</p>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-lg font-semibold">{{ __('Email') }}</p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <!-- Add more user details here if needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
