<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index(int $project_id, int $folder_id)
    {
    }

    /**
     * The $folderArr and $folder are confusing, but the object is transformed into an array when sent through request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required'],
            'description' => ['required', 'max:255'],
        ]);
        $validated['folder_id'] = $request->folder['id'];

        $folderArr = $request->folder;
        $file = $request->file;
        $hashedName = $file->hashName();

        $validated['name'] = $file->getClientOriginalName();
        $validated['path'] = $hashedName;

        $storagePath = './project_' . $folderArr['project_id'] . '/folder_' . $folderArr['id'] . '/';
        $file->storeAs($storagePath, $hashedName);

        $folder = Folder::find($folderArr['id']);
        $folder->files()->create($validated);

        return redirect('/project/'.$folder->project_id)
            ->with('success','The CPE was created succesfully!');
        }

    public function update()
    {
    }

    public function add()
    {
    }
}
