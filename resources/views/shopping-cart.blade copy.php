<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section>
        @if(Session::has('cart'))
        <div class="container px-3 my-14 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
            <div class="wrapper flex flex-col mt-20">
                <div class="w-full mx-auto">
                    <h1 class="text-2xl font-bold">Produkty zostały dodane do koszyka.</h3>
                    <p class="text-xl font-bold"> Jeszcze tylko kilka kroków do sfinalizowania transakcji.</p>
                </div>
                <div class="mx-auto w-full mt-6">
                    <form action="{{route('checkout')}}" method="POST" id="checkout-form">
                        @csrf
                        <div class="w-full max-w-xs">
                            @foreach($products as $product)
                            <div class="flex">
                                <div class="flex-row mr-4">
                                    <p class="block text-gray-700 text-sm font-bold mb-2" for="qty">Ilość</p>
                                    <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled type="number" id="qty" value="{{$product['qty']}}" required>
                                </div>
                                <div class="flex-row mr-4">
                                    <p class="block text-gray-700 text-sm font-bold mb-2" for="name"> Nazwa</p>
                                    <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" class="form-control" value="{{$product['item']['name']}}" disabled required>
                                </div>
                                <div class="flex-row mr-4">
                                    <p class="block text-gray-700 text-sm font-bold mb-2" for="price">Cena</p>
                                    <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="price" disabled value="{{$product['price']}}" required>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <x-primary-button class="mt-10">
                            Przejdź do płatności kartą
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        @else  
        <div class="container px-3 my-14 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
            <div class="wrapper flex flex-col mt-20">
                <div class="w-full mx-auto">
                    <h1 class="text-2xl font-bold">Twój koszyk jest pusty.</h3>
                </div>
            </div>
        </div>
        @endif
    </section>
</x-app-layout>
