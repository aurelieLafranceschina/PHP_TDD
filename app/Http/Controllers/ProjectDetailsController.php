<?php
/**
 * Created by PhpStorm.
 * User: a.lafranceschina
 * Date: 17/05/2018
 * Time: 16:43
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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


}