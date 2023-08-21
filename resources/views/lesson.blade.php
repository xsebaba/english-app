<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="md:text-4xl text-2xl font-bold">{{$lesson->lesson_name}}</h1>
                    <h2 class="text-xl font-bold">{!!$lesson->lesson_description!!}</h2>
                </div>
            </div>
            <div class="flex flex-wrap items-center text-xl p-6">
                {!!$lesson->lesson_body!!}
            </div>
        </div>
    </div>
</x-app-layout>
