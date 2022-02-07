<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoriesShow() // доступна страница конкретной категории
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', ['id' => $category->id])); // пока мы не передаем id, поэтому берем рандом от 1 до 5

        $response->assertStatus(200);
        $response->assertViewIs('categories.show');
    }

    public function testCategoriesAdminAvailable() // доступна страница категорий в админке
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.index');
    }

    public function testCategoryCreateAdminAvailable() // доступна форма добавления категории в админке
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.create');
    }

    public function testCategoryAdminCreated() // категория создается в админке
    {
        $responseData = Category::factory()->definition();

        $response = $this->post(route('admin.categories.store'), $responseData);
        //$response->assertJson($responseData);
        $response->assertStatus(302);
    }
}