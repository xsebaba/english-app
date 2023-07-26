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
                'question' => 'What is the capital of France?',
                'correct_answer' => 'Paris',
                'test_id'=> 1,
                'answers' => json_encode(['Paris', 'London', 'Berlin', 'Rome']),
            ],
            [
                'question' => 'Who painted the Mona Lisa?',
                'correct_answer' => 'Leonardo da Vinci',
                'test_id'=> 1,
                'answers' => json_encode(['Pablo Picasso', 'Vincent van Gogh', 'Leonardo da Vinci', 'Claude Monet']),
            ],
            [
                'question' => 'What is the largest planet in our solar system?',
                'correct_answer' => 'Jupiter',
                'test_id'=> 1,
                'answers' => json_encode(['Mars', 'Saturn', 'Jupiter', 'Neptune']),
            ],
            [
                'question' => 'Which country is known for its pyramids?',
                'correct_answer' => 'Egypt',
                'test_id'=> 1,
                'answers' => json_encode(['Greece', 'Mexico', 'Egypt', 'India']),
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
