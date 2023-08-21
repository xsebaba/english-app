<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function test()
    {
        return $this->hasMany(Test::class);
    }
}
