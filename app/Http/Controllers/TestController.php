<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;


class TestController extends Controller
{
    public function showInitialTest()
    {
        return view('test');
    }
}
