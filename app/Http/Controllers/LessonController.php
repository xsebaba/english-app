<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(){
         
    }

    public function show(Lesson $lesson){
        return view('lesson', compact('lesson'));
    }
}
