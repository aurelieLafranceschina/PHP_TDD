<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStatus200()
    {
        $response = $this->get('http://127.0.0.1:8000/');

        $response->assertStatus(200);
    }

    public function testH1()
    {
        $response = $this->get('http://127.0.0.1:8000/');

        $response->assertSee('<h1>Dons en ligne</h1>');
    }
}
