<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class RandomController extends Controller
{


    public function index(int $projectid): Response
    {
        return Inertia::render('Projects/Project', [
            'project' =>Project::find($projectid)->with('status:id,name')->first()
        ]);
    }
}
