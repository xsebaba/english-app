<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Models\User;

use App\Models\Lesson;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $users = User::has('diaries')->get();

        return view('diary', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('diaryshow', compact('user'));
    }
    public function create()
    {   
        $users = User::all();
        $lessons = Lesson::all();

        return view('diarycreate', compact('users', 'lessons'));
    }
    public function store(Request $request)
    {
        //Wróć i przygotuj walidację
        $diary = new Diary;
        $diary->description = $request->description;
        $diary->user_id = $request->user_id;
        $diary->lesson_id = $request->lesson_id;
        $diary->topic = $request->topic;
        $diary->save();

        return redirect('/diary')->with('success', 'Wyniki zostały zapisane.');;
    }
    public function edit(Diary $diary)
    {   
        $users = User::all();
        $lessons = Lesson::all();
        return view('diaryedit', compact('diary', 'users', 'lessons'));
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return redirect('/diary')->with('success', 'Pozycja z dziennika została usunięta');;
    }
}
