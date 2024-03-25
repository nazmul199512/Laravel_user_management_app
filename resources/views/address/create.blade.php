<!-- resources\views\user_addresses\create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('user.address.store') }}">
                        @csrf

                        <div>
                            <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('User') }}</label>
                            <select id="user_id" name="user_id" class="block mt-1 w-full form-select" required autofocus>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Address') }}</label>
                            <input id="address" class="block mt-1 w-full form-input" type="text" name="address" :value="old('address')" required />
                            @error('address')
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
