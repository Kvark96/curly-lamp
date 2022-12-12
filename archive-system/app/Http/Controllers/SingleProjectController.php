<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\User;
use Exception;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Response;
use stdClass;

class SingleProjectController extends Controller
{
    public function showProject(int $projectid): Response
    {
        $project = Project::where('projects.id', $projectid)->with(['status:id,name', 'leader:id,name', 'folders'])->get()->first();
        $folders = Folder::where('project_id', $projectid)->with(['files', 'links'])->get();
        $folders = $folders->groupBy('type');

        return Inertia::render('SingleProject/Project', [
            'folders' => $folders,
            'project' => $project,
            'user' => $project->leader,
        ]);
    }

    public function addFile(Folder $folder)
    {
        return Inertia::render('SingleProject/AddFile', ['folder' => $folder]);
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
