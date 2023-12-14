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
                    <h1 class="text-2xl font-bold">Wybierz interesujący cię produkt!</h1>
                </div>
                <div class="flex flex-wrap items-center">
                    @foreach($products as $product)
                            <x-product-list-card :product="$product" :loop="$loop" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
