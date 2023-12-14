<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Lesson;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LessonTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @test
     */
    public function a_user_can_browse_lessons()
    {
        $response = $this->get('/lessons');
        $lesson = Lesson::factory()->create();
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function a_user_can_participate_in_lesson()
    {
        $this->withoutExceptionHandling();
        $lesson = Lesson::factory()->create();
        $response = $this->get('/lessons/' . $lesson->slug);
        $response->assertSee($lesson->lesson_name);
    }
}
