<!-- resources\views\users\index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div class="py-2 px-4 bg-green-200 text-green-800">{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Redirect button to user create page -->
                    <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Create User') }}</a>
                    <a href="{{ route('users.deleted') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Soft Deleted Users') }}</a>
                    <a href="{{ route('user.address.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ __('Add User Address') }}</a>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold mb-4">{{ __('User List') }}</h3>
                    <table class="min-w-full border border-gray-200 dark:border-gray-700">
                        <thead>
                            <tr class="dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium uppercase tracking-wider">{{ __('Name') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium uppercase tracking-wider">{{ __('Email') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium uppercase tracking-wider">{{ __('Addresses') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium uppercase tracking-wider">{{ __('Actions') }}</th>
                                <th class="px-6 py-3 border-b border-gray-200 dark:border-gray-700 text-left text-xs font-medium uppercase tracking-wider">{{ __('View') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ $user->name }}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ $user->email }}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                        <ul>
                                            @foreach($user->addresses as $address)
                                                <li>{{ $address->address }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex">
                                            <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-700 mr-2">{{ __('Edit') }}</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                        <a href="{{ route('users.show', $user) }}" class="text-blue-500 hover:text-blue-700">{{ __('View') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
