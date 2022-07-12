<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-gray-700 text-3xl font-medium">{{ isset($person) ? "Редактирование записи" : "Добавление" }}</h3>

                    <div class="mt-8">
                        <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST"
                              action="@auth('web')
                                        {{ isset($person) ? route("dashboard.persons.update", $person) : route("dashboard.persons.store") }}
                                     @else
                                        {{ route("add-person") }}
                                     @endauth
                              " autocomplete="off">
                            @csrf
                            @if(isset($person))
                                @method('PUT')
                            @endif

                            <!-- Success Messages -->
                            @if(session('success'))
                                <x-success-alerts class="my-4" :success="session('success')" />
                            @endif

                            <!-- Validation Errors -->
                            <x-errors class="mb-4" :errors="$errors" />

                            <div class="mb-6">
                                <label for="full_name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">ФИО</label>
                                <input id="full_name" name="full_name" type="text" class="w-full h-12 rounded px-3 border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('full_name') border-red-500 @enderror dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ФИО" value="{{ $person->full_name ?? old('full_name') }}" spellcheck="false" autocomplete="false" autocorrect="false" autocapitalize="false" required />
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-medium">Минимальная длина:</span> 8 символов</p>
                            </div>

                            <div class="mb-6">
                                <label for="birthday" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Дата рождения</label>
                                <input id="birthday" name="birthday" type="text" class="w-full h-12 rounded px-3 border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('birthday') border-red-500 @enderror dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20.01.1982" value="@isset($person) {{ $person->birthdayWithFormat }}@endisset" spellcheck="false" autocomplete="false" autocorrect="false" autocapitalize="false" />
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-medium">В формате:</span> дд.мм.ГГГГ</p>
                            </div>

                            <button type="submit" class="text-center w-full {{ isset($person) ? 'bg-blue-600 hover:bg-blue-500' : 'bg-green-500 hover:bg-green-400' }} rounded-md text-white py-3 font-medium transition-colors">
                                @if(isset($person)) Сохранить @else Добавить @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
