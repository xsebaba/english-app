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
                        <h1 class="text-2xl font-bold">Poniżej znajduje się lista dostępnych lekcji</h1>
                        <h2 class="text-xl font-bold">Pamiętaj, że będą one rozbudowywane. Na razie pracujemy nad kolejnymi lekcjami. </h2>
                    </div>
                @foreach($lessons as $lesson)
                        <x-lesson-list-card :lesson="$lesson" :loop="$loop" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
