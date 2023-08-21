<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Result;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME)
            ->with('success', 'Utworzono nowe konto użytkownika');;
    }

    /**
     * Display the registration view after the initial quiz
     */
    public function createafterquiz(Request $request): View
    {
       $score = $request->score;
       $max_score = $request->max_score;
       $test_id = $request->test_id;
        
        return view('auth.registerafterquiz', compact('score', 'test_id', 'max_score'));
    }

    public function storeafterquiz(Request $request): RedirectResponse
    {

        $request->validate([
            'score' => ['required', 'integer'],
            'test_id' => ['required', 'integer'],
            'max_score' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $result = Result::create([
            'user_id'=> $request->user()->id,
            'max_score' => $request->max_score,
            'score' => $request->score,
            'test_id' => $request->test_id
        ]);
        
       
    

        return redirect(RouteServiceProvider::HOME)
            ->with('success', 'Utworzono nowe konto użytkownika');;
    }
}
