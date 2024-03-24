<!-- resources\views\users\deleted.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Soft Deleted Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('Name') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('Email') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($softDeletedUsers as $user)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('users.restore', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-blue-500 hover:text-blue-700 mr-2">{{ __('Restore') }}</button>
                                        </form>
                                        <form action="{{ route('users.forceDelete', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Permanently Delete') }}</button>
                                        </form>
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
