<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsAvailable() // доступна страница новостей
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertViewIs('news.index');
    }

    public function testNewsShow() // доступна страница конкретной новости
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1, 20)])); // пока мы не передаем id, поэтому берем рандом от 1 до 20

        $response->assertStatus(200);
        $response->assertViewIs('news.show');
    }

    public function testNewsAdminAvailable() // доступна страница новостей в админке
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.news.index');
    }

    public function testNewsCreateAdminAvailable() // доступна форма добавления новости в админке
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.news.create');
    }

    public function testNewsAdminCreated() // новость создается в админке
    {
        $responseData = [
            'category_id' => 1,
            'title' => 'Главная новость политики',
            'description' => 'Краткое описание новости',
            'fulltext' => 'Полный текст главной политической новости',
            'status' => 'Active'
        ];
        $response = $this->post(route('admin.news.store'), $responseData);

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }
}