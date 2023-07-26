<x-app-layout>
    <div class="container px-3 my-14 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
            
        <div class="wrapper flex flex-col mt-20">
            <div class="w-full ml-10">
                <h1 class="text-2xl font-bold">Gratulacje! Udało się poprawnie zakończyć test!</h3>
                <p class="text-xl font-bold"> Sprawdźmy Twój wynik. </p>
                <p class="text-xl mt-4">
                    W teście odpowiedziałeś na {{count($questions)}} pytań. Ilość poprawnych odpowiedzi to: {{$score}}. 
                </p>
            </div>
            <div class="ml-10">
                @foreach($questions as $question)
                <p class="mt-6">{{$loop->iteration}}. {{ $question->question }}</p>
                <ul class="ml-10">
                    @foreach (json_decode($question->answers) as $answer)
                        <li id="result" class="{{ $answer === $question->correct_answer ? 'text-green-600 font-semibold' : ''}}">
                            {{ $answer }}
                        </li>
                        
                    @endforeach
                </ul>
                    @if($question->correct_answer === $results[$question->id])
                        <p class="text-green-600 font-semibold">Brawo! Twoja odpowiedź jest poprawna!</p>
                    @elseif($results[$question->id]===null)
                        <p>Nie udzielono żadnej odpowiedzi</p>
                    @else
                        <p>Twoja odpowiedź to: <span class="font-semibold">{{$results[$question->id]}}</span></p>
                    @endif
                @endforeach
            </div>
        
            @auth
            <form action="{{ route('quiz.answer') }}" method="POST">
                @csrf
                <input type="hidden" name="score" value="{{$score}}">
                <input type="hidden" name="max_score" value="{{count($questions)}}">
                <input type="hidden" name="test_id" value="{{$questions->first()->test_id}}">
                
                    @if($errors->any())
                        <p class="text-red-500 font-bold">{{$errors->first()}}</p>
                    @enderror
                    
            </ul>
                <x-primary-button class="m-4">
                    Zapisz wynik swojego testu
                </x-primary-button>
            @else
                <a href="/register" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Zarejestruj się aby utworzyć konto
                </a>
            @endauth

            
        </div>
    </div>  
</x-app-layout>
