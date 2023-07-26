<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;


class TestController extends Controller
{
    public function show()
    {
        $questions = Question::where('test_id', '=', 1)->get();
        // $question = Question::first();
        // foreach($test->question as $question){
        //     $answer = 
        // }
        // dd($test->question->answer);    
       
        return view('initialtest')->with('questions', $questions);

    }
}
