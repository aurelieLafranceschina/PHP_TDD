<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Project;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    public function index()
    {
        //$project = factory(\App\Project::class)->create();
        $projects = Project::all();
        $data = [
            "projects" => $projects,
        ];

        return view('project', $data);


    }


}