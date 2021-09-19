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
    public function test_available_admin_news_url()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }
    
    public function test_available_admin_news_create()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200);
    }
    public function test_available_admin_categories_url()
    {
        $response = $this->get('/admin/categories');

        $response->assertStatus(200);
    }
    public function test_available_admin_categories_create()
    {
        $response = $this->get('/admin/categories/create');

        $response->assertStatus(200);
    }
	public function test_available_only_one_news()
	{
		$id = mt_rand(5,15);
		$idCategory = mt_rand(3,5);
		$response = $this->get('category_'.$idCategory.'/news/' . $id);

		$response->assertStatus(200);
	}
	
	public function test_available_all_news()
	{
		$idCategory = mt_rand(3,5);
		$response = $this->get('category_'.$idCategory.'/news/');

		$response->assertStatus(200);
	}

	public function test_is_json_data()
	{
		$response = $this->get('/api/data');
		$response->assertJson([
			'name' => 'Test',
			'type' => 'User',
			'status' => 'draft'
		])->assertStatus(200);
	}
}
