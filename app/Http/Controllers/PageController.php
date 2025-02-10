<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class PageController extends Controller
{
    public function home() {

        $projects = Project::where('visible', '1')->latest()->take(3)->get();

        $articles = Article::where('visible', '1')->latest()->take(5)->get();

        return view('home', compact(['projects', 'articles']));
    }

    public function about() {

        //$articles = Article::where('visible', '1')->latest()->take(2)->get();

        return view('about');
    }

    public function contact() {

        return view('contact');

    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('recipient@example.com')->send(new ContactMail($data));

        return response()->json(['success' => 'Email elküldve!']);
    }

}
