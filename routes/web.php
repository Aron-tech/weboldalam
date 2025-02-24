<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::view('/rolam', 'about')->name('about');

Route::view('/kapcsolat', 'contact')->name('contact');

Route::post('/mail-send',[PageController::class, 'mailSend'])->name('contact.send');

Route::get('/projektek', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/projektek/{project}', [ProjectController::class, 'show'])->name('projects.show');
