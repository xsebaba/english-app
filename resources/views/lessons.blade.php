<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl bold">Witaj w naszym serwisie</h1>
                    <h2 class="text-xl">Poniżej znajduje się lista dostępnych lekcji</h2>
                </div>
                @foreach($lessons as $lesson)
                        {{$lesson->lesson_name}}
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
