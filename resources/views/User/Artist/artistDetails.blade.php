@extends('User.Main.mainLayout')
@section('title', 'Artist-Details | Art360D')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artist Details</li>
            </ol>
        </nav>
    </div>
    <div class="py-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-4 ">
                    <h3>{{ $artist->first_name . ' ' . $artist->last_name }}</h3>
                    <div>
                        <h4 class="artworkbadge">{{ $artist->country }}</h4>
                    </div>
                    <div class="full-with-pic-smallthumb mt-2 mb-3">
                        @if (isset($artist->image) && !empty($artist->image && File::exists(public_path('storage/UserImage/' . $artist->image))))
                            <img src="{{ asset('storage/UserImage/' . $artist->image) }}">
                        @else
                            <img src="{{ asset('User/assets/img/featured3.jpg') }}">
                        @endif
                    </div>
                    <ul class="optionlist">
                        <li>$30700 Auctions</li>
                        <li>$43000 Sales Record</li>
                        <li>Online Auctions (1)</li>
                        <li>Sales (0)</li>
                    </ul>
                    <div class="biocontent">
                        <p class="fw-bold">Biography:</p>
                        <p><?php echo html_entity_decode($artist->bio); ?></p>
                    </div>
                    <p class="fw-semibold">Artworks({{ $artist->total_artworks->count() }})</p>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="exhibition-pnl border shadow">
                        <h2>Best 3D Exhibition space</h2>
                        {{-- <img src="{{ asset('User/assets/img/p4.jpg') }}" class="w-100"> --}}
                        <iframe src="image.png" frameborder="0"></iframe>
                    </div>
                    <div class="mt-3 text-center">
                        Share:
                        <a href="#" class="socialshare"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-weixin"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-weibo"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="socialshare"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <h4 class="text-center fw-normal mb-4">Artwork</h4>
                <div class="row">
                    <div class="col-lg-9 order-lg-2 mb-3">
                        <div class="row">
                            @foreach ($artist->total_artworks as $artist_artworks)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card artlist">
                                        <div class="card-image">
                                            <a href="#">
                                                <img
                                                    src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                                                <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i>
                                                    Save(0)</a>
                                            </div>
                                            <h2><a
                                                    href="#">{{ $artist_artworks->first_name . ' ' . $artist_artworks->last_name }}</a>
                                            </h2>
                                            <p>By {{ $artist->name }}</p>
                                            @foreach (explode(',', $artist_artworks->category_ids) as $category_id)
                                                @php
                                                    $C_name = DB::table('artwork_categories')
                                                        ->where('id', $category_id)
                                                        ->select('name')
                                                        ->first();
                                                    // dd($C_name);
                                                @endphp
                                                <h4 class="artworkbadge">{{ @$C_name->name  }}</h4>
                                            @endforeach
                                            
                                            <ul class="optionlist">
                                                <li>{{ $artist_artworks->height }} "(H) x {{ $artist_artworks->width }} "(W) x {{ $artist_artworks->depth }} "(D)</li>
                                            </ul>
                                            <div class="d-flex justify-content-between fw-semibold">
                                                <p>Price : ${{ $artist_artworks->price }}</p>
                                                <p>${{ $artist_artworks->rent_price_per_one_month }}/month</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <a href="{{ route('user.myCart') }}" class="btn btn-theme btn-sm">Buy Now</a>
                                                <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card artlist">
                                    <div class="card-image">
                                        <a href="#"><img src="{{ asset('User/assets/img/cat3.jpg') }}"></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                                            <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Save(0)</a>
                                        </div>
                                        <h2><a href="#">Claude Monet</a></h2>
                                        <p>By Baochun Huang</p>
                                        <h4 class="artworkbadge">Calligraphy</h4>
                                        <ul class="optionlist">
                                            <li>27 "(H) x 17.5 "(W) x 0.5 "(D)</li>
                                        </ul>
                                        <div class="d-flex justify-content-between fw-semibold">
                                            <p>Price : $5000</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-1">
                                            <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card artlist">
                                    <div class="card-image">
                                        <a href="#"><img src="{{ asset('User/assets/img/392775917.jpg') }}"></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                                            <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i>
                                                Save(0)</a>
                                        </div>
                                        <h2><a href="#">Claude Monet</a></h2>
                                        <p>By Baochun Huang</p>
                                        <h4 class="artworkbadge">Calligraphy</h4>
                                        <ul class="optionlist">
                                            <li>27 "(H) x 17.5 "(W) x 0.5 "(D)</li>
                                        </ul>
                                        <div class="d-flex justify-content-between fw-semibold">
                                            <p>Price : $5000</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-1">
                                            <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 mb-3 order-lg-1">
                        <div class="card mb-2 shadow">
                            <div class="card-body">
                                <h6 class="fw-semibold">Artworks for sale & Auction Result</h6>
                                <hr />
                                <h3 class="card-title mb-3 h6">Availability</h3>
                                <div class="checklist-cat">
                                    <div class="listchk"><label><input type="checkbox"> Buy Now(6)</label></div>
                                    <div class="listchk"><label><input type="checkbox"> Bid Now</label></div>
                                    <div class="listchk"><label><input type="checkbox"> Rent Now</label></div>
                                    <div class="listchk"><label><input type="checkbox"> Rent Out</label></div>
                                    <div class="listchk"><label><input type="checkbox"> Sold Out</label></div>
                                </div>
                                <hr />
                                <h3 class="card-title mb-3 h6">Object Type</h3>
                                <div class="checklist-cat">
                                    <div class="listchk"><label><input type="checkbox"> Abstract Art(6)</label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
