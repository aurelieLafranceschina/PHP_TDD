<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

use Faker\Generator as Faker;



class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testStatus200()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);
    }

    public function testH1()
    {
        $response = $this->get('/project');

        $response->assertSee('<h1>Liste de projets</h1>');
    }

    public function testProjectName()
    {


        $project = factory(\App\Project::class)->create();
        //dd ($exampleProject);

        $response = $this->get('/project');
        $response->assertSee($project->project_name);
    }


}






