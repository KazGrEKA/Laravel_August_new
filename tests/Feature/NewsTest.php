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
    public function test_news_list_status()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_news_show_status()
    {
        $id = mt_rand(1, 24);

        $response = $this->get("/news/$id");

        $response->assertStatus(200);
    }

    public function test_redirect_after_create()
    {
        $response = $this->post(
            route('admin.news.store'), 
            [
                'title' => 'News 31',
                'status' => 'Draft',
                'description' => 'some description'
            ]
        );

        $response->assertRedirect('/admin/news/create');
    }

    public function test_news_created()
    {
        $response = $this->post(
            route('admin.news.store'), 
            [
                'title' => 'News 31',
                'status' => 'Draft',
                'description' => 'some description'
            ]
        );

        $response->assertCreated();
    }
}
