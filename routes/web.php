<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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

Route::get('/przetestuj-swoj-angielski', [TestController::class, 'showInitialTest']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,   'destroy'])->name('profile.destroy');
});

Route::get('/quiz', [InitialQuizController::class, 'index'])->name('quiz.index');

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

require __DIR__.'/auth.php';
