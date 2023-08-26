<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('course_id')->get();
         return view('lessons', compact('lessons'));
    }

    public function show(Lesson $lesson){

        //Check if user is logged in and check if the user already view the lesson. If not add the lesson to user's library
        if(auth()->user()){
            $user = auth()->user();
            foreach($user->lessons as $array){
                if($lesson->id === ($array->id)){
                return view('lesson', compact('lesson'));
                }
            }
            $user->lessons()->attach($lesson->id);
        }
        
        
       
        return view('lesson', compact('lesson'));
    }
}
