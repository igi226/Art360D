<?php

namespace App\Http\Controllers\User\Artist;
use App\Core\Artists\ArtistInterface;

use App\Http\Controllers\Controller;
use App\Models\ArtworkCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private $artist;

    public function __constructor( ArtistInterface $artistInterface ){
        $this->artist = $artistInterface;
    }
    public function artist() {
        $data['artists'] =  User::with('total_artworks')->get();
        $data['categories'] =  ArtworkCategory::get();
    //    dd($data);
        return view('User.Artist.artist', $data);
    }
}

?>
