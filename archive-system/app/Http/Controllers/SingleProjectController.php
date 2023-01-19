<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Inertia\Response;
use stdClass;

class SingleProjectController extends Controller
{
    private Project $currentProject;

    public function showProject(int $projectid): Response
    {
        $project = Project::where('projects.id', $projectid)->with(['status:id,name', 'leader:id,name', 'folders'])->get()->first();
        $this->currentProject = $project;
        $folders = Folder::where('project_id', $projectid)->with(['files', 'links'])->get();
        $folders = $folders->groupBy('type');

        $allUsers = User::all()->groupBy('type_id');

        $currentUsers = $allUsers[3]
            ->groupBy(function($item) {
            $searchForProject = $item->projects->contains($this->currentProject);
            return $searchForProject;
        });


        $onProject = $currentUsers->count() == 1 ? collect() : $currentUsers[1]->chunk(10);
        $notOnProject = $currentUsers[0]->chunk(10);

        return Inertia::render('SingleProject/Project', [
            'folders' => $folders,
            'project' => $project,
            'users' => $notOnProject,
            'currentUsers' => $onProject,
            'allLeaders' => $allUsers[2],
            'allStatus' => Status::all(),
        ]);
    }

    public function addFile(Folder $folder): Response
    {
        return Inertia::render('SingleProject/AddFile', ['folder' => $folder]);
    }

    public function addUsers(Request $request): RedirectResponse
    {
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|string',
            'status_id' => 'required|numeric',
            'leader_id' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $project = Project::find($request->project_id);

        $project->name = $validated['name'];
        $project->status_id = $validated['status_id'];
        $project->leader_id = $validated['leader_id'];
        $project->description = $validated['description'];
        $project->save();

        return $this->showProject($project->id);
    }
}
