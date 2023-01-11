<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class='text-4xl'>Series</h2>
                    @if (isset($listSeries) && $listSeries->count() > 0)
                        <div style="display:flex; flex-direction: row; justify-content:flex-end">
                            <a href="/serie"><button>Add new serie</button></a>
                        </div>
                        <x-tables.series :series="collect($series->items())" class='table-odd' />
                    @else
                        <p>Series not found! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class='text-4xl'>Users</h2>
                    @if (isset($users) && $users->count() > 0)
                        <ul>
                            @foreach ($users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Users not found! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class='text-4xl'>Categories</h2>
                    @if (isset($listCategories) && $listCategories->count() > 0)
                        <ul>
                            @foreach ($listCategories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Categories not found! </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
