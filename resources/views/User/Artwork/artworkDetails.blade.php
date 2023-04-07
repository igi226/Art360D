@extends('User.Main.mainLayout')
@section('title', 'Artworks-Details | Art360D')
@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artworks</li>
            </ol>
        </nav>
    </div>
    <div class="product-page mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-gallery product-gallery-vertical d-flex">
                        <div class="product-img-large">
                            <div class="img-large-slider common-slider"
                                data-slick='{
                            "slidesToShow": 1, 
                            "slidesToScroll": 1,
                            "dots": false,
                            "arrows": false,
                            "asNavFor": ".img-thumb-slider"
                        }'>
                                <div class="img-large-wrapper">
                                    @if (isset($artwork->image) &&
                                            !empty($artwork->image && File::exists(public_path('storage/ArtworkImage/' . $artwork->image))))
                                        <a href="{{ asset('storage/ArtworkImage/' . $artwork->image) }}"
                                            data-fancybox="gallery">
                                            <img src="{{ asset('storage/ArtworkImage/' . $artwork->image) }}"
                                                alt="img">
                                        </a>
                                    @else
                                        <a href="{{ asset('User/assets/img/392775917.jpg') }}" data-fancybox="gallery">
                                            <img src="{{ asset('User/assets/img/392775917.jpg') }}" alt="img">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-details">
                        <h2 class="h5 fw-bold mb-2">{{ $artwork->title }} <span
                                class="ms-3">{{ date('Y', strtotime($artwork->year_created)) }}</span></h2>
                        @foreach (explode(',', $artwork->category_ids) as $category_id)
                            @php
                                $C_name = DB::table('artwork_categories')
                                    ->where('id', $category_id)
                                    ->select('name')
                                    ->first();
                                // dd($C_name);
                            @endphp
                            <h6 class="fw-normal mb-3">{{ @$C_name->name }}</h6>
                        @endforeach
                        <h6 class="fw-normal mb-3">by
                            {{ $artwork->artistUsers->first_name . ' ' . $artwork->artistUsers->last_name }}</h6>

                        <div class="product-price-wrapper mb-4">
                            <span class="product-price regular-price fw-bold">${{ $artwork->price }}</span>
                            {{-- <del class="product-price compare-price ms-2">$32.00</del> --}}
                        </div>
                        <ul class="proinfotext">
                            <li>Medium - {{ $artwork->medium }}</li>
                            <li>Size: {{ $artwork->height }}"(H) X {{ $artwork->width }}"(W) X {{ $artwork->depth }}"(D)
                            </li>
                            {{-- <li>Size in cm:68.58cm(H) X 44.45cm(W) X 1.27cm(D) <br> with frame 73.66cm(H) X
                                48.26cm(W) X 1.524cm(D)</li> --}}
                            <li>Style: {{ $artwork->style->name }}</li>
                            {{-- <li>Hurry only 1 left in stock</li> --}}
                        </ul>

                        <div class="product-variant-wrapper">
                            <div class="product-variant product-variant-color">
                                <strong class="label mb-1 d-block"> Frame Color:</strong>

                                <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                    <li class="variant-item">
                                        <input type="radio" value="cyan" checked name="bordercolor" id="color1">
                                        <label class="variant-label swatch-cyan" for="color1"></label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" value="black" name="bordercolor" id="color2">
                                        <label class="variant-label swatch-black" for="color2"></label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" value="purple" name="bordercolor" id="color3">
                                        <label class="variant-label swatch-purple" for="color3"></label>
                                    </li>
                                    <li class="variant-item">
                                        <input type="radio" value="blue" name="bordercolor" id="color4">
                                        <label class="variant-label swatch-blue" for="color4"></label>
                                    </li>

                                </ul>
                            </div>

                        </div>



                        <form class="product-form" action="#">

                            <div class="buy-it-now-btn mt-2">
                                <button type="submit" class="position-relative btn-atc btn-buyit-now w-auto">BUY
                                    IT NOW</button>
                            </div>
                        </form>

                        <div class="share-area mt-4 align-items-center">
                            <strong class="label mb-1 d-block">Share:</strong>
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
            </div>
        </div>
    </div>


    <!-- you may also like start -->
    <div class="featured-collection-section mt-100 home-section overflow-hidden mb-5">
        <div class="container">
            <div class="section-header">
                <h2 class="h3 text-center">MORE ARTWORKS</h2>
            </div>

            <div class="product-container position-relative">
                <div class="common-slider"
                    data-slick='{
                                    "slidesToShow": 4, 
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": true,
                                    "responsive": [
                                    {
                                        "breakpoint": 1281,
                                        "settings": {
                                        "slidesToShow": 3
                                        }
                                    },
                                    {
                                        "breakpoint": 768,
                                        "settings": {
                                        "slidesToShow": 2
                                        }
                                    }
                                    ]
                                }'>
                    @foreach ($artworks as $the_artwork)
                        <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                            <div class="product-card">
                                <div class="card artlist">
                                    <div class="card-image">
                                        <a href="#"><img
                                                src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                                            <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i>
                                                Save(0)</a>
                                        </div>
                                        <h2><a href="#">{{ $the_artwork->title }}</a></h2>
                                        <p>By {{ $the_artwork->artistUsers->first_name }}</p>
                                        @foreach (explode(',', $the_artwork->category_ids) as $category_id)
                                            @php
                                                $C_name = DB::table('artwork_categories')
                                                    ->where('id', $category_id)
                                                    ->select('name')
                                                    ->first();
                                            @endphp
                                            <h6 class="artworkbadge">{{ @$C_name->name }}</h6>
                                        @endforeach

                                        <ul class="optionlist">
                                            <li>27 "(H) x 17.5 "(W) x 0.5 "(D)</li>
                                        </ul>
                                        <div class="d-flex justify-content-between fw-semibold">
                                            <p>Price : $5000</p>
                                            <p>$200/month</p>
                                        </div>
                                        <div class="d-flex justify-content-between mt-1">
                                            <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                            <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                        <div class="product-card">
                            <div class="card artlist">
                                <div class="card-image">
                                    <a href="#"><img src="{{ asset('User/assets/img/featured3.jpg') }}"></a>
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
                                        <p>$200/month</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                        <div class="product-card">
                            <div class="card artlist">
                                <div class="card-image">
                                    <a href="#"><img src="{{ asset('User/assets/img/featured4.jpg') }}"></a>
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
                                        <p>$200/month</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                        <div class="product-card">
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
                                        <p>$200/month</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                        <div class="product-card">
                            <div class="card artlist">
                                <div class="card-image">
                                    <a href="#"><img
                                            src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
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
                                        <p>$200/month</p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                        <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
            </div>
        </div>
    </div>
    <!-- you may also lik end -->

@endsection
