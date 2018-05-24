<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        if(Auth::check()){

        $project = new Project;
        $project->project_name = $request->newProject;
        $project->project_description = $request->newDescription;

        $project->user_id = Auth::id();
        $project->save();
            return redirect(route('allProjects'));

        }
        else {
            return abort('404');
        }



    }


}