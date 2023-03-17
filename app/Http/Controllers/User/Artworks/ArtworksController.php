<?php

namespace App\Http\Controllers\User\Artworks;

use App\Core\Artworks\ArtworkInterface;
use App\Core\Category\CategoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtworksController extends Controller
{

    private $artwork;
    private $artworkCategory;
    public function __construct( ArtworkInterface $artworkInterface, CategoryInterface $categoryInterface ) {
        $this->artwork = $artworkInterface;
        $this->artworkCategory = $categoryInterface;
    }
    public function artworks(){
        $data['artworks'] = $this->artwork->getAllArtworks();
        $data['artworkCategories'] = $this->artworkCategory->getAllCategory();
        return view('User.Artwork.artwork', $data);
    }
}
