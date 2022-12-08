<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index(int $project_id, int $folder_id)
    {
    }

    public function store(Request $request)
    {
    }

    public function update()
    {
    }

    public function add()
    {
        return Inertia::render('SingleProject/AddFile');
    }
}
