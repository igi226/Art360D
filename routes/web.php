<?php

use App\Http\Controllers\Admin\Artist\ArtistController;
use App\Http\Controllers\Admin\Artwork\ArtworkController;
use App\Http\Controllers\Admin\ArtworkSubjectController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Collections\CollectionController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Material\MaterialController;
use App\Http\Controllers\Admin\Movement\MovementController;
use App\Http\Controllers\Admin\Style\StyleController;
use App\Http\Controllers\Admin\Subscriptions\SubscriptionsController;
use App\Http\Controllers\ArtistTypeController;
use App\Http\Controllers\ArtworkCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//admin
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('admin.showlogin');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login');
// , 
Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function(){
    Route::get('admin-profile', [DashboardController::class, 'adminProfile'])->name('admin.adminProfile');
    Route::post('admin-profile', [DashboardController::class, 'adminProfileUpdate'])->name('admin.profile');
    Route::post('admin-password', [DashboardController::class, 'changePassword'])->name('admin.changePassword');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name("admin.dashboard");


    Route::resource('artists', ArtistController::class);
    Route::resource('artisttypes', ArtistTypeController::class);
    
    Route::resource('subscriptions', SubscriptionsController::class);
    Route::resource('collections', CollectionController::class);
    Route::post('collections/changeS', [CollectionController::class, 'collectionsChangeS']);
    Route::resource('styles', StyleController::class);
    Route::resource('artworks-subjects', ArtworkSubjectController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('movements', MovementController::class);
    Route::resource('artwork-category', ArtworkCategoryController::class);
    Route::resource('artworks', ArtworkController::class);
    Route::post('artworks/put-on-off-market', [ArtworkController::class, 'putOnOffMarket'])->name('artworks.putOnOffMarket');
    Route::delete('delete-artwork-image', [ArtworkController::class, 'deleteArtworkImage']);

    
    Route::get('log-out', [AuthController::class, 'adminLogout'])->name('admin.logout');

});
