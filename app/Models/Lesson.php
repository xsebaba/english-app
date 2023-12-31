<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded =[];
    
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
}
