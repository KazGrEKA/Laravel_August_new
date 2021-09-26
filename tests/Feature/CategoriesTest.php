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
    public function test_categories_list_status()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_categories_filter_status()
    {
        $id = mt_rand(1, 6);

        $response = $this->get("/categories/$id");
        
        $response->assertStatus(200);
    }

    public function test_redirect_after_create()
    {
        $response = $this->post(
            route('admin.categories.store'), 
            [
                'title' => 'Футбол',
                'description' => 'some description'
            ]
        );

        $response->assertRedirect('/admin/categories/create');
    }

    public function test_category_created()
    {
        $response = $this->post(
            route('admin.categories.store'), 
            [
                'title' => 'Футбол',
                'description' => 'some description'
            ]
        );

        $response->assertCreated();
    }
}
