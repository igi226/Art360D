<?php

namespace App\Http\Controllers\User\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function artist() {
        return view('User.Artist.artist');
    }
}

?>
