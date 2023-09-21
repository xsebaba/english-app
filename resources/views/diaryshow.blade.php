<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-6">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-bold">Poniżej znajdują się wpisy w dzienniku ucznia {{$user->name}}</h1>
                        <h2 class="text-xl font-bold">Pamiętaj, że nauczyciel może edytować i usuwać wpisy</h2>
                    </div>
   
            @foreach($user->diaries as $diary)
            <div class="md:flex py-2 {{ $loop->iteration % 2 === 0 ? '' : 'bg-white' }} rounded rounded-xl hover:bg-lime-300 text-center">
                <div class="dark:bg-gray-800 overflow-hidden">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="md:text-4xl text-md font-bold">{{$diary->topic}}</h1>
                        <h2 class="md:text-xl text-md font-bold">{{$diary->created_at->format('Y-m-d')}}</h2>
                        
                        @isset($diary->lesson->lesson_name)
                            <a href="/lesson/{{$diary->lesson->lesson_slug}}" class="block">
                                <h2 class=" md:text-xl text-md font-bold hover:bg-lime-400 rounded rounded-xl">
                                    {{$diary->lesson->lesson_name}}
                                </h2>
                            </a>
                        @endisset
                        @if($diary->file_paths)
                            @foreach(json_decode($diary->file_paths) as $filePath)
                            <div class="block my-1">
                                <x-primary-link >
                                    <a  href="{{ asset('storage/' . $filePath)}}" target="_blank">Sprawdź załącznik</a>
                                </x-primary-link>
                            </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="md:flex md:flex-wrap items-center md:text-xl text-sm mx-auto p-6 md:max-w-4xl max-w-md">
                    {{$diary->description}}
                </div>
                <div class="ml-auto md:flex items-center">
                    <a href="/diary/edit/{{$diary->id}}" class="inline-flex items-center h-12 px-4 py-2 mr-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Edytuj    
                    </a>
                    <form action="/diary/{{$diary->id}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button class="inline-flex items-center h-12 px-4 py-2 mr-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Usuń    
                        </button>
                    </form>
                </div>
            </div>

            
            @endforeach
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
