<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
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

    public function testSubscriptionCreated() // получаем подписку в json-формате
    {
        $responseData = [
            'name' => 'Alisa',
            'phone' => '+79001234567',
            'mail' => 'alisa@alisa.ru',
            'type' => 'Культура'
        ];
        $response = $this->post(route('subscription.store'), $responseData);

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }
}