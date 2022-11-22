<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RandomController extends Controller
{
    public function index()
    {
        return Inertia::render('Projects/Project', [

        ]);
    }
}
