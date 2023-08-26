<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        $user = auth()->user();
        
         return view('courses', compact('courses', 'user'));
    }

    public function show(Course $course){
        if(auth()->user()){
            $user = auth()->user();
            foreach($user->courses as $array){
                if($course->id === ($array->id)){
                return view('course', compact('course'));
                }
            }
            $user->courses()->attach($course->id);
        }
        return view('course', compact('course'));
    }
}
