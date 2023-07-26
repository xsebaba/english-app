<x-app-layout>
   
  @if($questions->count())
    <section>
      <div class="wrapper w-full mt-20 flex items-container justify-center">
          
        @foreach($questions as $question)
           
        <div>
          <h4 id = "correct-score">{{$loop->iteration}}/</h4><h4 id="total-question">{{$loop->count}}</h4> 

          <div class="quiz-container max-w-full">
            <div class="quiz-head">            
                <div class="quiz-score flex">
                    <h1>{{$question->test->test_name}} </h1>
                    
                </div>
            </div>
            
            <div class="quiz-body">
                <h2 class="quiz-question" id="question"> {{$question->body}}</h2>
                <ul class="quiz-options">
                    @foreach($question->answer as $answer)
                        <li>{{$answer->option}}</li>
                    @endforeach 
                </ul>
                <div id = "result"></div>
            </div>
        
            <div class="quiz-foot">
            <button type="button" id="check-answer">Potwierdź wybór</button> 
            </div>

        </div>
        @endforeach  

      </div>
  </section>
    
  @else
    <h1> Test w przygotowaniu </h1>
  @endif    
<script>
window.questions = @json($questions)
let questions = window.questions;  

</script>  

    
</x-app-layout>