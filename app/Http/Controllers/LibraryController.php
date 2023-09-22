<?php

namespace App\Http\Controllers;
use App\Models\User;



use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function show(){
        
        $user = auth()->user();
        return view('library', compact('user'));
    }
}
