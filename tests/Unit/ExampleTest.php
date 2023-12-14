<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * *test
     */
    public function test_a_user_can_browse_lessons()
    {
        $response = $this->get('/lessons');
        $response->assertStatus(200);
    }
}
