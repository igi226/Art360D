<?php

namespace App\Http\Controllers\User\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery() {
        return view('User.Gallery.gallery');
    }

    public function galleryDetails() {
        return view('User.Gallery.galleryDetails');
    }
}
