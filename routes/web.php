<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('/posts', 'pages::post.index')->name('posts');
    Route::livewire('/post/create', 'pages::post.create')->name('post.create');
    Route::livewire('/people', 'pages::person.index')->name('people');
    Route::livewire('/person/create', 'pages::person.create')->name('person.create');
});

require __DIR__.'/settings.php';
