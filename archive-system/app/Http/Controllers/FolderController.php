<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'nullable|numeric',
            'type' => 'required',
            'project_id' => 'required|numeric',
        ]);

        $project = Project::find($validated['project_id']);
        $project->folders()->create($validated);

        return redirect('/project/' . $project->id)
            ->with('success','The CPE was created succesfully!');
    }
}
