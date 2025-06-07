<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/rolam', [PageController::class, 'displayPage'])->name('about');

Route::get('/kapcsolat', [PageController::class, 'displayPage'])->name('contact');

Route::post('/mail-send',[PageController::class, 'sendEmail'])->name('contact.send');

Route::get('/projektek', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projektek/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/letoltes', [PageController::class, 'download'])->name('download');

Route::redirect('/hirek', '/');
Route::get('/hirek/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/cache-clear', function () {
    \Artisan::call('cache:clear');
    return 'Cache cleared successfully!';
})->name('cache.clear');
