<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="mt-10 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$product->name}}</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">{{$product->description}}</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button id="addproduct" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Kupuję
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                </div>
                <h1 class="my-6 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Cena: {{$product->price}} zł</h1>
            </div>
            <div>
                <img class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl" src="{{ asset('/images/stat.jpg')}}" title="{{$product->name}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen />
            </div>
            <div class="fixed inset-0 bg-black opacity-60 z-40 pointer-disabled" id="purchase_black"></div>
            <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-8 bg-white shadow-lg" id="purchase">
                <h1 class=" text-2xl text-center"> Produkt zostanie dodany do koszyka. </h1>
                <h1 class=" text-xl text-center">
                    Czy chcesz kontyuować zakupy? 
                </h1>
                <h1 class="mb-8 text-xl text-center">
                     Jeśli nie, wówczas od razu zapłać za kurs.
                </h1>
                <a href="{{ route('addToCart', $id=$product->id )}}" id="addproduct" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-900">
                    Przejdź do koszyka aby zapłacić
                </a>
                <a href="{{ route('addToCart', $id=$product->id.'/'. $continue=0 )}}" id="addproduct" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-900">
                    Kontynuuj zakupy
                </a>
            </div>

        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Pobierz referencje do divów
            var purchaseDiv = document.getElementById("purchase");
            var purchaseBlackDiv = document.getElementById("purchase_black");

            // Ukryj divy po załadowaniu strony
            purchaseDiv.style.display = "none";
            purchaseBlackDiv.style.display = "none";

            // Po kliknięciu w przycisk o id "addproduct"
            document.getElementById("addproduct").addEventListener("click", function (e) {
                e.preventDefault(); // Zatrzymaj domyślne działanie linku
                
                // Wyświetl divy
                purchaseDiv.style.display = "block";
                purchaseBlackDiv.style.display = "block";
            });
        });
    </script>
</x-app-layout>
