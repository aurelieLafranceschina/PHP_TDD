<?php
/**
 * Created by PhpStorm.
 * User: a.lafranceschina
 * Date: 17/05/2018
 * Time: 16:43
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Project;
use Illuminate\Http\Request;



class ProjectDetailsController extends Controller
{
    public function edit($id)
    {
        //$project = factory(\App\Project::class)->create();
        $projects = Project::find($id);
        $data = [
            "projects" => $projects,
        ];

        return view('projectDetails', $data);


    }

    public function getDetails($id){

        $details = Project::find($id);

        return view ('projectDetails', ["project"=>$details]);
    }

    public function store(Request $request , $id)
    {
        $project = Project::find($id);

        if($project->user->id == Auth::id()){

            $project->project_name = $request->newProject;
            $project->project_description = $request->newDescription;
            $project->save();


            return redirect(route('projectDetails', ['id' => $id]));

        }
        else {
            return abort('404');
        }


    }

}