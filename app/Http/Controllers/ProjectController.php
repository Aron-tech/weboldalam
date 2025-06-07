<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index');
    }

    public function indexTagFilter(Tag $tag) {
        return view('projects.index', ['tag' => $tag]);
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
