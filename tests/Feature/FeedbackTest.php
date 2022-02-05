<?php

namespace Tests\Feature;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFeedbackCreateAvailable() // доступна форма добавления отзыва
    {
        $response = $this->get(route('feedback.create'));

        $response->assertStatus(200);
        $response->assertViewIs('feedbacks.create');
    }

    public function testFeedbackCreated() // создаем отзыв
    {
        $responseData = Feedback::factory()->definition();

        $response = $this->post(route('feedback.store'), $responseData);
        //$response->assertJson($responseData);
        $response->assertStatus(302);
    }
}