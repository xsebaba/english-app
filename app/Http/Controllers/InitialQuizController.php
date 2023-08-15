<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Test;

class InitialQuizController extends Controller
{
    public function index()
    {
        // Pobierz pierwsze pytanie i przekieruj użytkownika do strony pytania
        $questions = Question::where('test_id', '=', 1)->get();

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

    public function storeAnswer(Result $result, Request $request)
    {
        $existingResult = Result::where('user_id', $request->user()->id)
            ->where('test_id', $request->test_id)
            ->first();
        
        if ($existingResult) {
            if ($request->score > $existingResult->score) {
                    $existingResult->score = $request->score;
                    $existingResult->save();
                    return redirect('/')->with('success', 'Wyniki zostały zapisane.');
            }else {
            return redirect('/')->with('success', 'Niestety wcześniej udało ci się lepiej napisać ten test. Twój wynik nie został zapisany.');
            }
        }
        else{
            $result->create([
                'user_id'=> $request->user()->id,
                'max_score' => $request->max_score,
                'score' => $request->score,
                'test_id' => $request->test_id
            ]);
            
        return redirect('/')->with('success', 'Wyniki zostały zapisane.');
        }
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

