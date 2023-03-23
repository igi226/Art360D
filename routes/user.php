<?php

use App\Http\Controllers\User\Artist\ArtistController;
use App\Http\Controllers\User\Artworks\ArtworksController;
use App\Http\Controllers\User\Index\IndexCOntroller;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [IndexCOntroller::class, 'index'])->name('index');
Route::post('/artists/like', [ArtistController::class, 'artistLike'])->name('user.artistlike');
Route::get('/artist-details/{slug}', [ArtistController::class, 'artistDetails'])->name('user.artistDetails');
Route::get('/artworks', [ArtworksController::class, 'artworks'])->name('user.artworks');
});
Route::get('/artists', [ArtistController::class, 'artist'])->name('user.artist');



Route::fallback(function () {
    return view('backToHome');
});
