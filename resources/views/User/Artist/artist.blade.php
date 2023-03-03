
@extends('User.Main.mainLayout')
@section('title', 'Artist | Art360D')
@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artist List</li>
        </ol>
    </nav>
</div>
<div class="filter-pnl">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="d-flex align-items-center">
                    <div class="me-3">Show: </div>
                    <div class="filterchoose">
                        <input type="radio" name="showartist" id="allartist" checked>
                        <label for="allartist">All Artist</label>
                    </div>
                    <div class="filterchoose">
                        <input type="radio" name="showartist" id="featuredartist">
                        <label for="featuredartist">Featured Artists</label>
                    </div>
                    <div class="filterchoose">
                        <input type="radio" name="showartist" id="bestseller">
                        <label for="bestseller">Best Seller</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end mb-3">
                Sort By Artwork Category:
                <select>
                    <option>Select</option>
                    <option>Oil Painting </option>
                    <option>Ink Painting </option>
                    <option>Calligraphy </option>
                    <option>Photography </option>
                    <option>Pop Art </option>
                    <option>Design </option>
                    <option>Contemporary Art</option>
                    <option>Post-War European Art</option>
                    <option>Post-War American Art</option>
                    <option>Street Art</option>
                    <option>Prints & Multiples</option>
                    <option>Abstract Art</option>
                    <option>Sculpture</option>
                    <option>Minimalism</option>
                    <option>Geometric</option>
                    <option>Drawing</option>
                    <option>Works on Paper</option>
                </select>
            </div>
        </div>
    </div>
</div>
<h3 class="text-center h4 fw-semibold mb-4">Artist Listing</h3>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Claude Monet</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> French 1840</p>
                    <h4 class="artworkbadge">Artworks (0)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/392775917.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Baochun Huang</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> China</p>
                    <h4 class="artworkbadge">Artworks (0)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/WeChat_Image_20210606082222.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Michael Chen</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> China</p>
                    <h4 class="artworkbadge">Artworks (6)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Claude Monet</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> French 1840</p>
                    <h4 class="artworkbadge">Artworks (0)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Claude Monet</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> French 1840</p>
                    <h4 class="artworkbadge">Artworks (0)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card artlist">
                <div class="card-image">
                    <a href="#"><img src="{{ asset('User/assets/img/WeChat_Image_20210606082222.jpg') }}"></a>
                </div>
                <div class="card-body">
                    <h2><a href="#">Michael Chen</a></h2>
                    <p><i class="fas fa-map-marker-alt"></i> China</p>
                    <h4 class="artworkbadge">Artworks (6)</h4>
                    <ul class="optionlist">
                        <li>Buy Now (0)</li>
                        <li> Auction (0) </li>
                        <li>Rent (0)</li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection