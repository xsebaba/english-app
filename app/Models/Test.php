<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Test extends Model
{
    use HasFactory;

    public function question()
    {
       return $this->hasMany(Question::class);
    }
    

    public function course()
    {
       return $this->belongsTo(Course::class, 'course_id');
    }
}
