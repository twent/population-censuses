<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Перепись
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="sm:flex justify-between">

                        <div class="flex-col">
                            <h3 class="text-gray-700 text-3xl font-medium">Перепись</h3>

                            <button class="flex mt-8 px-3 py-2 border-2 rounded-lg bg-green-500 border-green-500 hover:border-green-400 text-gray-100 hover:bg-green-400 hover:shadow-xl transition-colors">
                                <svg class="w-6 h-6 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <a href="{{ route("dashboard.persons.create") }}" class="">Добавить человека</a>
                            </button>
                        </div>

                        <div class="my-6 sm:my-auto flex-col">
                            <h2 class="text-blue-700 text-xl font-medium">Всего человек: {{ $personsCount }}</h2>
                            <h2 class="text-yellow-500 text-xl font-medium">Средний возраст: {{ $avgAge }}</h2>
                            <h2 class="text-green-600 text-xl font-medium">Общий возраст: {{ $sumAge }}</h2>
                        </div>
                    </div>

                    <!-- Success Messages -->
                    @if(session('success'))
                        <x-success-alerts class="my-4" :success="session('success')" />
                    @endif

                    <div class="flex flex-col mt-8">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 shadow-lg">
                                <table class="min-w-full">
                                    <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Полное имя
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Дата рождения
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Возраст
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                    </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse($persons as $person)

                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $person->full_name }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $person->birthdayWithFormat }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $person->age }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-md leading-5 font-medium">
                                                    <a href="{{ route("dashboard.persons.edit", $person->id) }}" class="text-indigo-600 hover:text-indigo-900">Редактировать</a>

                                                    <form action="{{ route("dashboard.persons.destroy", $person->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Вы точно хотите удалить этого человека?')" class="text-red-600 hover:text-red-900">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            В переписи ещё нет людей
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $persons->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
