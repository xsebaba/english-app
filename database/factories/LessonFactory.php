<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lesson_name' => "Present Continuous Podstawowe informacje",
                'lesson_slug' => "present-continuous-podstawowe-informacje",
                'lesson_body' => 
                    '<article>
                    <p>Czas Present Continuous składa się z następujących elementów:</p>
                    <p> podmiot + <span> to be w odpowiedniej odmianie </span> + czasownik z końcówką <span> ing </span> </p>
                    <p>Poznajmy przykład <b>Tom is writting a letter</b></p>
                    <p>Najpierw mamy osobę, która wykonuje czynność: Tom; następnie dajemy odpowiednią dla tej osoby formę czasownika być, czyli is. Do czasownika głównego pisać, czyliwrite, dokładamy końcówkę -ing i na końcu wstawiamy dopełnienie — w tym wypadku słowo list, czyli a letter. 
                    </article>',
                'course_id' => 2,
                'lesson_description' => "Z tej lekcji dowiesz się jak stworzyć proste zdanie w czasie Present Continuous"
        ];
    }
}
