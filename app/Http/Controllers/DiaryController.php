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
        $attributes = $request->validate([
            'description' => 'required|min:2',
            'user_id' => 'required',
            'topic' => 'required|min:2|max:255',
            'lesson_id' => 'nullable',
            'files.*' => 'nullable|mimes:jpg,bmp,png,pdf|file|max:60000'
        ]);


        $diary = new Diary;
        $diary->description = $attributes['description'];
        $diary->user_id = $attributes['user_id'];
        $diary->topic = $attributes['topic'];
        $diary->lesson_id = $attributes['lesson_id'];

        $filePaths = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('files');
                $filePaths[] = $path;
            }
        }

        $diary->file_paths = json_encode($filePaths);
        $diary->save();
        return redirect('/diary')->with('success', 'Wyniki zostały zapisane.');
    }


    public function edit(Diary $diary)
    {   
        $users = User::all();
        $lessons = Lesson::all();
        return view('diaryedit', compact('diary', 'users', 'lessons'));
    }

    public function update(Diary $diary)
    {
    
        $attributes = request()->validate([
            'description' => 'required|min:2',
            'user_id' => 'required',
            'topic' => 'required|min:2|max:255',
            'lesson_id' => 'nullable',
            'save_files.*' => 'nullable|max:255',
            'files.*' => 'nullable|mimes:jpg,bmp,png,pdf|file|max:60000'
        ]);

        
        $diary->description = $attributes['description'];
        $diary->user_id = $attributes['user_id'];
        $diary->topic = $attributes['topic'];
        $diary->lesson_id = $attributes['lesson_id'];

        //dd("1 próg");
        $filePaths=[];
        if(request()->hasFile('files')) {
            foreach (request()->file('files') as $file) {
                $path = $file->store('files');
                $filePaths[] = $path;
            }
        }
        
        if(request()->input('save_files')){
            foreach (request()->input('save_files') as $path){
                $filePaths[] = $path;
            }
        }
        unset($attributes['save_files']);
        unset($attributes['files']);
        
        $attributes['file_paths'] = json_encode($filePaths);
        $diary->update($attributes);

        return redirect()->route('diary')->with('success', 'Pozycja z dziennika została zmieniona');
    }

    public function destroy($id)
    {
        $diary = Diary::findOrFail($id);
        $diary->delete();

        return redirect('/diary')->with('success', 'Pozycja z dziennika została usunięta');
    }
}
