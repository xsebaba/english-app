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
                    <h1 class="text-2xl font-bold">Witaj na stronie kursu <span style="text-shadow: 0px 0px 16px #3EF714""> {{$course->course_name}}</span></h1>
                    @isset($course->course_description)
                    <h2 class="text-xl font-bold mt-3">{{$course->course_description}} </h2>
                    @endisset
                </div>
            
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="bg-lime-300 border-b rounded rounded-xl">
                            <div class="flex py-4 text-lg font-medium text-gray-900">
                                
                                <div class="w-full px-6 py-2 text-center font-bold">Sprawdź dostępne lekcje</div>
                               
                            </div>
                        </div>
                        
                        <div class="my-10">
                            @foreach($course->lesson as $lesson)
                                <x-lesson-list-card :lesson="$lesson" :loop="$loop" />
                            @endforeach
                        </div>
                        
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>
