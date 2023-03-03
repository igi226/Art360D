<?php

use App\Http\Controllers\User\Artist\ArtistController;
use App\Http\Controllers\User\Index\IndexCOntroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexCOntroller::class, 'index'])->name('index');
Route::get('/artists', [ArtistController::class, 'artist'])->name('user.artist');
