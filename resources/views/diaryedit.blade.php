<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="container px-3 my-60 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
        
        <div class="container px-3 my-6 mx-auto text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
            Edytuj wybraną pozycję w dzienniku
            </h2>
        </div>
        <div>
        <form method="POST" action="/diary/edit/{{$diary->id}}">
            @csrf
            @method('PATCH')

            <!-- Topic -->
            <div>
                <x-input-label for="topic" :value="__('Topic')" />
                <x-text-input id="topic" class="block mt-1 w-full border-lime-400 focus:ring-lime-400" type="text" name="topic" value="{{$diary->topic}}" required autofocus/>
                <x-input-error :messages="$errors->get('topic')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
  
                <textarea   id="description" 
                            class="block mt-1 w-full border-lime-400 focus:ring-lime-400" 
                            rows="4"
                            type="text"
                            name="description"
                            required>{{$diary->description}}</textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="user_id" :value="__('Student')" />
                <select name="user_id" id="user_id" class="w-full block p-2 border border-lime-400 bg-lime-400 text-white color-white uppercase rounded-md focus:ring-lime-400 dark:focus:ring-lime-600 hover:bg-lime-600">
                    @foreach($users as $user)
                        <option value = "{{$user->id}}"   
                            {{$diary->user->id === $user->id ? 'selected' : ''}}>
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <x-input-label for="lesson_id" :value="__('Lesson')" />
                <select name="lesson_id" id="lesson_id" class="w-full block p-2 border border-lime-400 bg-lime-400 text-white color-white uppercase rounded-md focus:ring-lime-400 dark:focus:ring-lime-600 hover:bg-lime-600">                   
                        <option value=""> </option>
                    @foreach($lessons as $lesson)
                        <option value="{{$lesson->id}}"
                            {{$lesson->id === $diary->lesson_id ? 'selected': ''}}
                        >{{$lesson->lesson_name}}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-3">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>
