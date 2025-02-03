<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function home() {

        $projects = Project::latest()->take(3)->get();

        $articles = Article::latest()->take(5)->get();

        return view('home', compact(['projects', 'articles']));
    }
}
