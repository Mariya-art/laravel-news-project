<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function testNewsAvailable() // доступна страница новостей
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('news.index');
    }

        public function testNewsShow() // доступна страница конкретной новости
    {
        $category = Category::factory()->create();
        $source = Source::factory()->create();
        $news = News::factory()->create([
            'category_id' => $category->id,
            'source_id' => $source->id,
        ]);
        $response = $this->get(route('news.show', ['news' => $news])); // пока мы не передаем id, поэтому берем рандом от 1 до 20

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
        $category = Category::factory()->create();
        $source = Source::factory()->create();
        $responseData = News::factory()->definition();
        $responseData = $responseData + [
            'category_id' => $category->id,
            'source_id' => $source->id,
        ];

        $response = $this->post(route('admin.news.store'), $responseData);
        //$response->assertJson($responseData);
        $response->assertStatus(302);
    }
}