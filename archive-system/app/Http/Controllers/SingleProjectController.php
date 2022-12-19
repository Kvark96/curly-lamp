<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
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

        $allUsers = User::all()->groupBy('type_id');
        $users = $allUsers[3];

        return Inertia::render('SingleProject/Project', [
            'folders' => $folders,
            'project' => $project,
            'leader' => $project->leader,
            'users' => $users,
        ]);
    }

    public function addFile(Folder $folder): Response
    {
        return Inertia::render('SingleProject/AddFile', ['folder' => $folder]);
    }

    public function addUsers(Request $request): RedirectResponse
    {
        dd($request);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        dd($request);
        return redirect()->back();
    }
}
