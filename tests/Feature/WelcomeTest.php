<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_available_welcome_url()
    {
        $response = $this->get('/welcome');

        $response->assertStatus(200);
    }
    
    public function test_available_welcome_name_url()
    {
        $name = "Test";
        $response = $this->get('/welcome/'.$name);

        $response->assertStatus(200);
    }
}
