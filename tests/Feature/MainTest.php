<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMainAvailable()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('news.index');

        $response->assertSeeText('О проекте');
        $response->assertSeeText('Информационное агентство');
        $response->assertSeeText('Контакты');
        $response->assertSeeText('Все новости');
    }

    public function testMainRouteAvailable()
    {
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function testAdminAvailable() // доступна страница новостей в админке
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.index');
    }
}