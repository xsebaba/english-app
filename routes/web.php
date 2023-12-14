<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\InitialQuizController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmailsController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;

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


Route::get('/diary', [DiaryController::class, 'index'])->middleware('teacher')->name('diary');
Route::get('/diary/create', [DiaryController::class, 'create'])->middleware('teacher')->name('createDiary');
Route::post('/diary', [DiaryController::class, 'store'])->middleware('teacher')->name('uploadDiary');
Route::get('/diary/{user}', [DiaryController::class, 'show'])->middleware('teacher');
Route::get('/diary/edit/{diary}',[DiaryController::class, 'edit'])->middleware('teacher');
Route::patch('/diary/{diary}',[DiaryController::class, 'update'])->middleware('teacher');
Route::delete('/diary/{diary}', [DiaryController::class, 'destroy'])->middleware('teacher');


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
// w przypadku gdyby ktoś ręcznie wysłał zapytanie
Route::get('/result', function(){ 
    return redirect('/'); 
});
Route::get('/dashboard', function(){ 
    return redirect('/'); 
});
Route::get('/firstregistration', function(){ 
    return redirect('/register');
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

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/add-to-cart/{id}/{continue?}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/shopping-cart', [ProductController::class, 'getCart'])->name('shoppingCart');
Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout');
Route::post('/checkout', [StripeController::class, 'postCheckout']);
Route::get('/success', [StripeController::class, 'success'])->name('checkout.success');
Route::post('/cancel', [StripeController::class,'cancel'])->name('checkout.cancel');
Route::post('/webhook', [StripeController::class,'webhook'])->name('checkout.webhook');

//Route for mailing
/*Route::get('/email', function(){
    Mail::to('kolec@wp.pl')->send(new WelcomeMail());
    return new App\Mail\WelcomeMail();
});*/
Route::get('/email', [EmailsController::class, 'email']);

require __DIR__.'/auth.php';
