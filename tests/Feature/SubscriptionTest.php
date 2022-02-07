<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSubscriptionCreateAvailable() // доступна форма подписки на новости
    {
        $response = $this->get(route('subscription.create'));

        $response->assertStatus(200);
        $response->assertViewIs('subscriptions.create');
    }

    public function testSubscriptionCreated() // создаем подписку
    {
        $category = Category::factory()->create();
        $responseData = Subscription::factory()->definition();
        $responseData = $responseData + [
            'category_id' => $category->id,
        ];
        /*$responseData = [
            'name' => 'Alisa',
            'phone' => '+79001234567',
            'mail' => 'alisa@alisa.ru',
            'category_id' => 3
        ];*/
        $response = $this->post(route('subscription.store'), $responseData);

        //$response->assertJson($responseData);
        $response->assertStatus(302);
    }
}