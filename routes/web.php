<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Livewire')->group(function () {
    Route::get('/', Question::class)->name('index');
    Route::get('/create', fn() => view('quiz.create-question'))->name('create');
});
