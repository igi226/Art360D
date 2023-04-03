<?php

use App\Http\Controllers\User\Artist\ArtistController;
use App\Http\Controllers\User\Artworks\ArtworksController;
use App\Http\Controllers\User\Index\IndexCOntroller;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [IndexCOntroller::class, 'index'])->name('index');
Route::get('/artists', [ArtistController::class, 'artist'])->name('user.artist');
Route::get('/getFeaturedArtist', [ArtistController::class, 'getFeaturedArtist'])->name('user.getFeaturedArtist');
Route::get('/artist-categoryWiseArtist', [ArtistController::class, 'categoryWiseArtist'])->name('user.categoryWiseArtist');

Route::get('/artworks', [ArtworksController::class, 'artworks'])->name('user.artworks');
Route::get('/categoryWiseArtwork', [ArtworksController::class, 'categoryWiseArtwork'])->name('user.categoryWiseArtwork');

Route::group(['middleware'=>'auth'],function(){
Route::post('/artists/like', [ArtistController::class, 'artistLike'])->name('user.artistlike');
Route::post('/artists/follow', [ArtistController::class, 'artistFollow'])->name('user.artistFollow');
Route::get('/artist-details/{slug}', [ArtistController::class, 'artistDetails'])->name('user.artistDetails');
Route::get('/dashboard-artist', [ArtistController::class, 'artistProfile'])->name('user.artist.Profile');

});



Route::fallback(function () {
    return view('backToHome');
});
