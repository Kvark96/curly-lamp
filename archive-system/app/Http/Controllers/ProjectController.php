<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects/Index', [
            'projects' => Project::with('status:id,name')->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'leader_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'status_id' => 'required|integer',
        ]);

        try {
            $project = Project::updateOrCreate($validated);
            $project->users()->attach($validated['leader_id']);
        } catch (Exception $e) {
            // dd($e);
        }
        return $this->index();
    }

    public function add()
    {
        return Inertia::render('Projects/Add', [
            'statuses' => Status::all(),
            'leaders' => User::with('type:id,name')->where('type_id', 2)->get(),
        ]);
    }
}
