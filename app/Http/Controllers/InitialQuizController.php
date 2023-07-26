<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Test;

class InitialQuizController extends Controller
{
    public function index()
    {
        // Pobierz pierwsze pytanie i przekieruj użytkownika do strony pytania
        $questions = Question::where('test_id', '=', 1)->get();

       // return redirect()->route('quiz.question', $question->id);
       return view('question', compact('questions'));
    }

    public function show($id)
    {
        // Pobierz pytanie o podanym ID
        $question = Question::findOrFail($id);
        $question->answers = json_decode($question->answers);
        
        // Wyświetl widok z pytaniem i możliwościami odpowiedzi
        return view('question', compact('question'));
    }

    public function saveAnswer(Request $request)
    {
      
        $validate = request()->validate([
            'answers' => 'required|array',
        ]);
        
        $answers= json_encode($validate);
             
        Answer::create(['answers' => $answers]);

        return redirect()->route('quiz.result', compact('answers'));
    }

    public function showResult(Request $request)
    {   
        $questions = Question::where('test_id', '=', 1)->get();
        $test = Test::where('id', '=', '1')->get();
        $request->validate([
            'answers' => 'required|array'
        ]);
        $answers=$request->answers;

        $results = $request->input('answers');
        
        foreach($questions as $question){
            if(!array_key_exists($question->id, $results)){
                $results[$question->id] = null;
            }
        }
        
        $score = 0;
        foreach($questions as $question){
            if($question->correct_answer === $results[$question->id]){
                $score++;
            }
        }
        
       
        return view('result', compact('results', 'questions', 'score'));
    }
}

