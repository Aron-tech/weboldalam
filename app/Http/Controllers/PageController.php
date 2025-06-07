<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\DownloadRequest;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\StaticContent;
use Illuminate\Support\Facades\Storage;


class PageController extends Controller
{
    public function home() {

        $projects = Project::where('visible', true)->latest()->select('title', 'slug', 'cover', 'description')->get();

        $articles = Article::where('visible', true)->latest()->get();

        $content = $this->getStaticContent('home');

        return view('home', compact(['content', 'projects', 'articles']));
    }

    public function displayPage()
    {
        $page_name = request()->route()->getName();

        $whitelist = collect(menu_items())->pluck('route')->toArray();

        if (!in_array($page_name, $whitelist)) {
            abort(404);
        }

        $content = $this->getStaticContent($page_name);

        return view($page_name, compact('content'));
    }
    private function getStaticContent($page_name)
    {
        return cache()->remember($page_name.'_content', 720, function () use ($page_name) {
            return StaticContent::where('page', $page_name)
                ->get()
                ->pluck('value', 'key');
        });
    }

    public function download(DownloadRequest $request)
    {
        $validated = $request->validated();

        $name = $validated['name'] ?? null;
        $headers = $validated['headers'] ?? null;

        if(Storage::disk('public')->missing($validated['file_path']))
            abort(404);

        if ($name === null && $headers === null) {
            return Storage::disk('pulbic')->download($validated['file_path']);
        }

        if ($headers === null) {
            return Storage::disk('public')->download($validated['file_path'], $name);
        }

        return Storage::disk('public')->download($validated['file_path'], $name, $headers);
    }

    public function sendEmail(ContactRequest $request)
    {
        $validated = $request->validated();

        Mail::to('contact@paron.hu')->send(new ContactMail($validated));

        return redirect()->route('contact')->with('success', 'Az üzenetet sikeresen elküldte, hamarosan felveszem Önnel a kapcsolatot.');
    }

}
