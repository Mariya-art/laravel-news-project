<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoriesShow() // доступна страница конкретной категории
    {
        $response = $this->get(route('categories.show', ['id' => mt_rand(1, 5)])); // пока мы не передаем id, поэтому берем рандом от 1 до 5

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
        $responseData = [
            'name' => 'travels',
            'rus_name' => 'Путешествия'
        ];
        $response = $this->post(route('admin.categories.store'), $responseData);

        $response->assertJson($responseData);
        $response->assertStatus(200);
    }
}