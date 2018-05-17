<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;


class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStatus200()
    {
        $response = $this->get('http://127.0.0.1:8000/project');

        $response->assertStatus(200);
    }

    public function testH1()
    {
        $response = $this->get('http://127.0.0.1:8000/project');

        $response->assertSee('<h1>Liste de projets</h1>');
    }

    public function testProjectName()
    {
        $response = $this->get('http://127.0.0.1:8000/project');
        $projectName = DB::select('select * FROM projects');

        $response->assertSee($projectName);
    }




}
