<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => ['required', 'max:255'],
            'description' => ['required'],
        ]);

        $folderArr = $request->folder;
        $validated['folder_id'] = $folderArr['id'];

        $folder = Folder::find($folderArr['id']);
        $folder->links()->create($validated);

        return redirect('/project/' . $folder->project_id)
            ->with('success', 'The CPE was created succesfully!');
    }
}
