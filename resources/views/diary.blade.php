<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">Poniżej znajduje się lista uczniów</h1>
                    <h2 class="text-xl font-bold">Wybierz jednego z nich, aby przejść do dziennika </h2>
                </div>
                <div class="w-1/2 mx-auto">
                    @isset($users)    
                        @foreach($users as $user)
                            <a href="/diary/{{$user->id}}" class="">
                                <div class="flex py-2 {{ $loop->iteration % 2 === 0 ? '' : 'bg-white' }} rounded rounded-xl hover:bg-lime-300 text-center">
                                    <div class="w-30 px-2 py-2">
                                        <img class="w-16 h-16 object-cover rounded-full border-2 border-lime-500" src="{{ asset('/images/stat.jpg')}}">
                                    </div>
                                    <div class="flex items-center justify-center mx-auto py-2 md:text-lg text-sm text-gray-900 font-bold">{{ $user->name }}</div>
                                </div>
                            </a>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
    


    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden">
             
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="/diary/create" class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                            Dodaj wpis
                        </a>
                    </div>
                        
            </div>
        </div>
    </div>
</x-app-layout>
