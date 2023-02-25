<?php

use App\Http\Controllers\User\Index\IndexCOntroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexCOntroller::class, 'index'])->name('index');
