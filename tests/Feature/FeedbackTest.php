<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_feedback_status()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function test_feedback_published()
    {
        $message = 'Отзыв успешно отправлен!';

        $response = $this->post(
            route('feedback.store'), 
            [
                'name' => 'Bill Smith', 
                'email' => '123@mail.ru', 
                'message' => 'Great site you made'
            ]
        );

        $response->assertSee($message);
    }
}
