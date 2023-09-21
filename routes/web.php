<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\InitialQuizController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
Route::get('/diary/create', [DiaryController::class, 'create'])->name('createDiary');
Route::post('/diary', [DiaryController::class, 'store'])->name('uploadDiary');
Route::get('/diary/{user}', [DiaryController::class, 'show']);
Route::get('/diary/edit/{diary}',[DiaryController::class, 'edit']);
Route::patch('/diary/{diary}',[DiaryController::class, 'update']);
Route::delete('/diary/{diary}', [DiaryController::class, 'destroy']);


Route::get('/library', [LibraryController::class, 'show'])->middleware(['auth', 'verified'])->name('library');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,   'destroy'])->name('profile.destroy');
});

Route::get('/przetestuj-swoj-angielski', [InitialQuizController::class, 'index'])->name('quiz.index');

Route::post('/dashboard', [InitialQuizController::class, 'storeAnswer'])->name('quiz.answer');
Route::post('/dashboard', [InitialQuizController::class, 'storeAnswer'])->name('quiz.answer');
Route::post('/result', [InitialQuizController::class, 'showResult'])->name('quiz.result');
Route::get('/result', function(){ 
    return redirect('/'); // w przypadku gdyby ktoś ręcznie wysłał zapytanie
});
Route::get('/firstregistration', function(){ 
    return redirect('/register'); // w przypadku gdyby ktoś ręcznie wysłał zapytanie
});
Route::post('/firstregistration', [RegisteredUserController::class, 'createafterquiz'])->name('quiz.register');
Route::post('/registerafterquiz', [RegisteredUserController::class, 'storeafterquiz'])->name('quiz.registerafterquiz');
Route::get('/registerafterquiz', function(){ 
    return redirect('/register');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/course/{course:course_slug}', [CourseController::class, 'show']);

Route::get('/lessons', [LessonController::class, 'index'])->name('lessons');
Route::get('/lesson/{lesson:lesson_slug}', [LessonController::class, 'show']);
require __DIR__.'/auth.php';
