<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Exception;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Inertia\Response;

class SingleProjectController extends Controller
{


    public function index(int $projectid): Response
    {
        $project = Project::find($projectid)->with('status:id,name')->first();
        $leaderid = $project->leader_id;

        return Inertia::render('Projects/Project', [
            'project' => $project,
            'user' => User::find($leaderid),
        ]);
    }


    //Change project from Active to Archived

    // public function store(Request $request): Response
    // {

    //     //Validate usertype

    //     /* $validated = $request->validate([

    //     ]); */

    //     try {
    //         $project = Project::updateOrCreate($validated);
    //         $project->users()->attach($validated['leader_id']);
    //     } catch (Exception $e) {
    //         // dd($e);
    //     }
    //     return $this->index();
    // }
}
