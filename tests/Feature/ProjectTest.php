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

    public function testProjectDetails()
    {
        $project = factory(\App\Project::class)->create();
        //dd ($project);

        $response = $this->get('/projectDetails/'.$project->id);
        $response->assertSee($project->project_name);
    }

    public function testRelationUserProject()
    {
        $project = factory(\App\Project::class)->create();

        $this->assertInstanceOf('App\User' , $project->user);
    }

    public function testUserName()
    {
        $project = factory(\App\Project::class)->create();


        $response = $this->get('/projectDetails/'.$project->id);
        $response->assertSee($project->user->first_name);
    }

    public function testIfConnected()
    {
        // Creer un User avec une factory (enregistre les données en base)
        $user = factory(\App\User::class)->create();

        // Make un Project avec une factory
        $project = factory(\App\Project::class)->make();

        // Acting As a User, POST the Project to the Create Project URL
        $response = $this->actingAs($user)->post('/project', [
            "newProject" => $project->project_name,
            "newDescription"=>$project->project_description,
            "newAuthorName"=>$project->user_id,

        ]);

        // Check that in my projects list I can see the project name
        $response2 = $this->get('/project');


        $response2->assertSee($project->project_name);

    }

    public function testIfNotConnected()
    {
        $this->expectException(\Exception::class);

        // Make un Project avec une factory
        $project = factory(\App\Project::class)->make();
        $response = $this->post('/project', [
            "newProject" => $project->project_name,
            "newDescription"=>$project->project_description,
            "newAuthorName"=>$project->user_id,

        ]);

    }

    public function testSeeForm(){


        $response = $this->get('/project');
        $response->assertDontSee('<div class = "form50"></div>');


    }

    public function testSeeModifForm(){

        $this->expectException(\Exception::class);
        // Etant donnée un project créé par un utilisateur
        // Facker -> Create project
        $project = factory(\App\Project::class)->create();

        // Etant un second utilisateur
        // Facker -> Create user
        $user = factory(\App\User::class)->create();

        //  Quand le second uyytilisateur POST le formulaire de MAJ du projet avec les données
        $response = $this->actingAs($user)->post('/projectDetails'.$project->id, [
            "newProject" => $project->project_name,
            "newDescription"=>$project->project_description,

        ]);
        // Alors d'attend une erreur 404




    }

}






