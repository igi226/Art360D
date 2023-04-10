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


    public function categoryWiseArtwork(Request $request) {
        $data= $request->all();
        $this->artwork->categoryWiseArtworkList($request->category_id);
    }

    public function artworksDetails($id) {
        $data['artwork'] = $this->artwork->getArtwork($id);
        $data['artworks'] = $this->artwork->getAllArtworks();
        return view('User.Artwork.artworkDetails', $data);
    }

    public function myCart() {
        return view('User.Cart&Checkout.cart');
    }

    public function checkout() {
        return view('User.Cart&Checkout.checkout');
    }

    public function payment() {
        return view('User.Cart&Checkout.payment');
    }

    public function paymentResult() {
        return view('User.Cart&Checkout.paymentResult');
    }
}
