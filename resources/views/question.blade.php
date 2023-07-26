
<x-app-layout>
    <div class="container px-3 my-14 mx-auto flex flex-wrap flex-col md:flex-row justify-center">
        
        @isset($questions->first()->test->test_name)
        <div class="w-full text-center mb-4">
            <h1 class="text-xl font-bold">{{$questions->first()->test->test_name}}</h1>
        </div>
        @endisset
        <form action="{{ route('quiz.result') }}" method="POST">
            @csrf
            @foreach($questions as $question)
            <p class="font-bold mt-1">{{ $question->question }}</p>
            <ul>
                @foreach (json_decode($question->answers) as $answer)
                    <li>
                        <input type="radio" name="answers[{{$question->id}}]" value="{{ $answer }}" 
                        >
                        {{ $answer }} 
                    </li>
                    
                @endforeach
                @if($errors->any())
                    <p class="text-red-500 font-bold">{{$errors->first()}}</p>
                @enderror
                
            </ul>
            @endforeach
            <x-primary-button class="m-4">
                Zapisz i sprawdź wynik
            </x-primary-button>
            
        </form>
    </div>   

</x-app-layout>
