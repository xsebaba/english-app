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
                    <h1 class="text-2xl font-bold">Witaj w naszym serwisie</h1>
                    <h2 class="text-xl font-bold">Wybierz interesujący cię dział</h2>
                </div>
            
            </div>
            <div class="flex flex-wrap items-center">
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Lekcje </h2>
                    <p class="mt-2 text-gray-600">Przeglądaj lekcje i wybierz temat, który najbardziej Cię interesuje</p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="{{route('lessons')}}" class="text-xl font-medium text-lime-600">Wchodzę</a>
                    </div>
                </div>
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Kursy</h2>
                    <p class="mt-2 text-gray-600">Kurs grupuje lekcje o wybranej tematyce. Dlatego jeśli chcesz nauczyć się nowych umiejętności to warto rozpocząć naukę od początku do końca.</p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="{{route('courses')}}" class="text-xl font-medium text-lime-600">Wchodzę</a>
                    </div>
                </div>
                <div class="max-w-md py-4 px-6 mx-2 bg-white shadow-md shadow-green-700 rounded-lg my-20">
                    <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-lime-500" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                    </div>
                    <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Twój profil</h2>
                    <p class="mt-2 text-gray-600">Tutaj możesz administrować swoim kontem, edytować swoje dane, usuwać je. Tu możesz usunąć swoje konto. </p>
                    </div>
                    <div class="flex justify-end mt-4">
                    <a href="/lessons" class="text-xl font-medium text-lime-600">Wchodzę</a>
                    </div>
                </div>
            </div>
            @if($user->lessons->count() > 0)
                <div class="dark:bg-gray-800 overflow-hidden">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-bold">Twoje lekcje</h1>
                    </div>
                </div>
                <div class="flex flex-wrap items-center">
                    @foreach($user->lessons as $lesson)
                    <x-lesson-list-card :lesson="$lesson" :loop="$loop"/>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
