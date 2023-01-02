<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProjectController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Projects/Index', [
            'projects' => Project::with('status:id,name')->latest()->get(),
        ]);
    }

    public function store(Request $request): Response
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
            throw new HttpException('Failed to create a new project: ' . $e->getMessage(), code: 500);
        }
        return $this->index();
    }

    public function add(): Response
    {
        return Inertia::render('Projects/Add', [
            'statuses' => Status::all(),
            'leaders' => User::with('type:id,name')->where('type_id', 2)->get(),
        ]);
    }
}
