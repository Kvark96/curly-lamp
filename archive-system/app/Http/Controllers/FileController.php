<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index(int $project_id, int $folder_id)
    {
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

        ]);

        $request->folder()->files()->create($validated);
        return redirect(route('project/' . $request->folder->project_id));
        }

    public function update()
    {
    }

    public function add()
    {
    }
}
