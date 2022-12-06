<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\User;
use Exception;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Inertia\Response;
use stdClass;

class SingleProjectController extends Controller
{
    public function index(int $projectid)//: Response
    {
    }

    public function showProject(int $projectid): Response
    {
        $project = Project::where('projects.id', $projectid)->with(['status:id,name', 'leader:id,name', 'folders'])->get()->first();
        $folders = Folder::where('project_id', $projectid)->with(['files', 'links'])->get();

        return Inertia::render('Projects/Project', [
            'folders' => $folders,
            'project' => $project,
            'user' => $project->leader,
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
