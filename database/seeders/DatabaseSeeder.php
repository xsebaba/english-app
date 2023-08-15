<?php

namespace Database\Seeders;
use \App\Models\User;
use \App\Models\Answer;
use \App\Models\Course;
use \App\Models\Level;
use \App\Models\Question;
use \App\Models\Subject;
use \App\Models\Test;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Level::create([
            'grade'=> 'A1'
        ]);

        Subject::create([
            'subject_name' => 'Initial',
            'level_id' => 1
        ]);

        Course::create([
            'course_name' =>"Initial test",
            'subject_id' => 1

        ]);

        Test::create([
            'test_name' => "Initial test",
            'course_id' => 1
        ]);

        $questions = [
            [
                'question' => 'How ____ sisters do you have?',
                'correct_answer' => 'many',
                'test_id'=> 1,
                'answers' => json_encode(['much', 'many', 'older', 'younger', 'old']),
            ],
            [
                'question' => 'What time is it?',
                'correct_answer' => 'It is half past ten.',
                'test_id'=> 1,
                'answers' => json_encode(['It is eleven quater.', 'It is quater.', 'It is time.', 'It is half past ten.']),
            ],
            [
                'question' => 'What do you do?',
                'correct_answer' => 'I am a doctor.',
                'test_id'=> 1,
                'answers' => json_encode(['I am doctor.', 'I am studying.', 'I am a doctor.', 'I am driving a car.']),
            ],
            [
                'question' => 'Where ___ you ___ this t-shirt.',
                'correct_answer' => 'did/buy',
                'test_id'=> 1,
                'answers' => json_encode(['did/bought', 'do/buy', 'did/buy','have/buy', 'did not/bought']),
            ],
            [
                'question' => 'Who wrote the play "Romeo and Juliet"?',
                'correct_answer' => 'William Shakespeare',
                'test_id'=> 1,
                'answers' => json_encode(['Arthur Miller', 'Tennessee Williams', 'William Shakespeare', 'Samuel Beckett']),
            ],
            [
                'question' => 'Who wrote the play "Romeo and Juliet"?',
                'correct_answer' => 'William Shakespeare',
                'test_id'=> 1,
                'answers' => json_encode(['Arthur Miller', 'Tennessee Williams', 'William Shakespeare', 'Samuel Beckett']),
            ],
        ];
        foreach ($questions as $questionData) {
            Question::create($questionData);
        }

    
    }
}
