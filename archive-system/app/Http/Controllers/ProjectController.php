<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Status;
use App\Models\User;
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

    public function add()
    {
        return Inertia::render('Projects/Add', [
            'statuses' => Status::all(),
            'leaders' => User::with('type:id,name')->where('type_id', 2)->get(),
        ]);
    }
}
