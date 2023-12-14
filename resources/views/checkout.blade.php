<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section>
        <div class="container px-3 my-14 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
            <div class="wrapper flex flex-col mt-20">
                <div class="w-full mx-auto">
                    <h1 class="text-2xl font-bold">Dokończ zakupy.</h3>
                    <h2 class="text-xl font-bold"> Został już tylko ostatni krok.</h2>
                </div>
                <div class="mx-auto w-full mt-6">
                    <h2 class="text-xl font-bold"> Całkowita wartość twoich zakupów to {{$total}} zł.</h2>
                    <form action="{{route('checkout')}}" method="POST" id="checkout-form">
                        @csrf
                        <div class="w-full max-w-xs">
                            <div class="">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Imię</label>
                                    <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="Imie" type="text" id="name" required>
                                </div>
                        </div>
                        <x-primary-button class="mt-10">
                            Zapłać
                        </x-primary-button>


                    </form>
                    
                </div>
            
            </div>
        </div>
    </section>

    
</x-app-layout>