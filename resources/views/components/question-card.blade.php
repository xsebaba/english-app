@props(['question'])

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