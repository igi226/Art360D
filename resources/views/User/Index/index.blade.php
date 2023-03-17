@extends('User.Main.mainLayout')
@section('title', 'Home | Art360D')

@section('content')
    <div class="slideshow-section position-relative">
        <div class="slideshow-active activate-slider"
            data-slick='{
        "slidesToShow": 1, 
        "slidesToScroll": 1, 
        "dots": true,
        "autoplay":true,
        "arrows": true,
        "responsive": [
            {
            "breakpoint": 768,
            "settings": {
                "arrows": false
            }
            }
        ]
    }'>

            <div class="slide-item slide-item-bag position-relative">
                @if (isset($banner1->image) &&
                        !empty($banner1->image && File::exists(public_path('storage/CmsImage/' . $banner1->image))))
                    <img class="slide-img d-none d-md-block" src="{{ asset('storage/CmsImage/' . $banner1->image) }}"
                        alt="slide-1">
                    <img class="slide-img d-md-none" src="{{ asset('storage/CmsImage/' . $banner1->image) }}" alt="slide-1">
                @else
                    <img class="slide-img d-none d-md-block" src="{{ asset('User/assets/img/slide1.jpg') }}" alt="slide-1">
                    <img class="slide-img d-md-none" src="{{ asset('User/assets/img/slide1.jpg') }}" alt="slide-1">
                @endif

                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center justify-content-center">
                        <div class="content-box slide-content slide-content-1 py-4 text-center">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <a class="text-white" href="{{ $banner1->short_desc }}">{{ $banner1->title }}</a>
                            </h2>
                            <div class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <?php echo html_entity_decode($banner1->description); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item slide-item-bag position-relative">
                @if (isset($banner2->image) &&
                        !empty($banner2->image && File::exists(public_path('storage/CmsImage/' . $banner2->image))))
                    <img class="slide-img d-none d-md-block" src="{{ asset('storage/CmsImage/' . $banner2->image) }}"
                        alt="slide-2">
                    <img class="slide-img d-md-none" src="{{ asset('storage/CmsImage/' . $banner2->image) }}"
                        alt="slide-2">
                @else
                    <img class="slide-img d-none d-md-block" src="{{ asset('User/assets/img/slide2.jpg') }}" alt="slide-2">
                    <img class="slide-img d-md-none" src="{{ asset('User/assets/img/slide2.jpg') }}" alt="slide-2">
                @endif

                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center justify-content-center">
                        <div class="content-box slide-content slide-content-1 py-4 text-center">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <a class="text-white" href="{{ $banner2->short_desc }}">{{ $banner2->title }}</a>
                            </h2>
                            <div class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <?php echo html_entity_decode($banner1->description); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item slide-item-bag position-relative">

                @if (isset($banner3->image) &&
                        !empty($banner3->image && File::exists(public_path('storage/CmsImage/' . $banner3->image))))
                    <img class="slide-img d-none d-md-block" src="{{ asset('storage/CmsImage/' . $banner3->image) }}"
                        alt="slide-2">
                    <img class="slide-img d-md-none" src="{{ asset('storage/CmsImage/' . $banner3->image) }}"
                        alt="slide-2">
                @else
                    <img class="slide-img d-none d-md-block" src="{{ asset('User/assets/img/slide3.jpg') }}"
                        alt="slide-3">
                    <img class="slide-img d-md-none" src="{{ asset('User/assets/img/slide3.jpg') }}" alt="slide-3">
                @endif
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center justify-content-center">
                        <div class="content-box slide-content slide-content-1 py-4 text-center">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <a class="text-white" href="{{ $banner3->short_desc }}">{{ $banner3->title }}</a>

                            </h2>
                            <div class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                <?php echo html_entity_decode($banner3->description); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="activate-arrows"></div>
        <div class="activate-dots dot-tools"></div>
    </div>
    <!-- slideshow end -->

    <div class="py-5">
        <div class="section-header text-center" data-aos="fade-up">
            <h2 class="section-heading primary-color pageheading">Featured Products</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <ul class="collectionbox">
                @foreach ($featuredProducts as $featuredProduct)
                {{-- {{ dd() }} --}}
                <li>
                    <a href="#" class="ht-box-icon">
                        @if (isset($featuredProduct->artwork_images[0]))
                        <img src=" {{ asset('storage/ArtworkImage/'. $featuredProduct->artwork_images[0]->image) }}">
                        @else
                        <img src=" {{ asset('User/assets/img/featured2.jpg') }}">
                        @endif
                        <h3>{{ $featuredProduct->title }}</h3>
                    </a>
                </li>
                @endforeach
                
                {{-- <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured5.jpg') }}">
                        <h3>Urban Scenes</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured4.jpg') }}">
                        <h3>Earthly Delights</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured1.jpg') }}">
                        <h3>Springtime</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured3.jpg') }}">
                        <h3>Street-art</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured3.jpg') }}">
                        <h3>Street-art</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured3.jpg') }}">
                        <h3>Street-art</h3>
                    </a>
                </li>
                <li>
                    <a href="#" class="ht-box-icon">
                        <img src=" {{ asset('User/assets/img/featured3.jpg') }}">
                        <h3>Street-art</h3>
                    </a>
                </li> --}}


            </ul>
        </div>
    </div>
    <div class="pb-5">
        <div class="section-header text-center" data-aos="fade-up">
            <h2 class="section-heading primary-color pageheading">Shop by Category</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="owl-carousel owl-theme blockslide" id="shop-category">
                @foreach ($categories as $category)
                    <div class="item">
                        <a href="#" class="d-block">
                            <div class="category-box ">
                                @if (isset($category->image) &&
                                        !empty($category->image && File::exists(public_path('storage/categoryImage/' . $category->image))))
                                    <img src="{{ asset('storage/categoryImage/' . $category->image) }}" alt="">
                                @else
                                    <img src="{{ asset('noimg.png') }}" alt="">
                                @endif
                                <h4>{{ $category->name }} </h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pb-5" data-aos="fade-up">
        <div class="section-header text-center">
            <h2 class="section-heading primary-color pageheading">Gallery</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row g-2">
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="#" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g1.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g2.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g2.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g3.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g3.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g4.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g4.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g5.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g5.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g6.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g6.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g7.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g7.jpg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class=" gallery-box">
                        <a href="{{ asset('User/assets/img/g3.jpg') }}" data-lightbox="example-set">
                            <img src="{{ asset('User/assets/img/g3.jpg') }}">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="pb-5 latestnews" data-aos="fade-up">
        <div class="section-header text-center">
            <h2 class="section-heading primary-color pageheading">Latest News</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="owl-carousel owl-theme blockslide" id="latestnews">
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news08.jpg') }}">
                            <h4>NADA New York Is No ...</h4>
                            <p class="mb-2">Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum
                                facilisis sed non</p>
                            <small class="text-dark">17 May, 2022</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news07.jpg') }}">
                            <h4>Nothing has shocked ...</h4>
                            <small class="text-dark">13 December, 2018</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news08.jpg') }}">
                            <h4>NADA New York Is No ...</h4>
                            <p class="mb-2">Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum
                                facilisis sed non</p>
                            <small class="text-dark">17 May, 2022</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news07.jpg') }}">
                            <h4>Nothing has shocked ...</h4>
                            <small class="text-dark">13 December, 2018</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-5 latestnews" data-aos="fade-up">
        <div class="section-header text-center">
            <h2 class="section-heading primary-color pageheading">Popular Events</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="owl-carousel owl-theme blockslide" id="eventsslide">
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news08.jpg') }}">
                            <h4>NADA New York Is No ...</h4>
                            <p class="mb-2">Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum
                                facilisis sed non</p>
                            <small class="text-dark">17 May, 2022</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news07.jpg') }}">
                            <h4>Nothing has shocked ...</h4>
                            <small class="text-dark">13 December, 2018</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news08.jpg') }}">
                            <h4>NADA New York Is No ...</h4>
                            <p class="mb-2">Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum
                                facilisis sed non</p>
                            <small class="text-dark">17 May, 2022</small>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="d-block">
                        <div class="category-box ">
                            <img src="{{ asset('User/assets/img/news07.jpg') }}">
                            <h4>Nothing has shocked ...</h4>
                            <small class="text-dark">13 December, 2018</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-5">
        <div class="section-header text-center" data-aos="fade-up">
            <h2 class="section-heading primary-color pageheading">Latest Blog</h2>
        </div>
        <div class="blog-page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="700">
                        <div class="article-card bg-transparent p-0 shadow-none">
                            <a class="article-card-img-wrapper" href="">
                                <img src="{{ asset('User/assets/img/blog-img1.jpg') }}" alt="img"
                                    class="article-card-img rounded">
                                <span class="article-tag article-tag-absolute rounded">Art Gallery</span>
                            </a>
                            <p class="article-card-published text_12 d-flex align-items-center">
                                <span class="article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <span class="ms-2">30 December, 2022</span>
                                </span>
                                <span class="article-author d-flex align-items-center ms-4">
                                    <span class="icon-author">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span class="ms-2">Lara Joe</span>
                                </span>
                            </p>
                            <h2 class="article-card-heading heading_18">
                                <a class="heading_18" href="">
                                    Discovering the Royal Academy Summer Exhibition
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="700">
                        <div class="article-card bg-transparent p-0 shadow-none">
                            <a class="article-card-img-wrapper" href="">
                                <img src="{{ asset('User/assets/img/blog-img2.jpg') }}" alt="img"
                                    class="article-card-img rounded">
                                <span class="article-tag article-tag-absolute rounded">Art Gallery</span>
                            </a>
                            <p class="article-card-published text_12 d-flex align-items-center">
                                <span class="article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <span class="ms-2">30 December, 2022</span>
                                </span>
                                <span class="article-author d-flex align-items-center ms-4">
                                    <span class="icon-author">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span class="ms-2">Lara Joe</span>
                                </span>
                            </p>
                            <h2 class="article-card-heading heading_18">
                                <a class="heading_18" href="">
                                    Discovering the Royal Academy Summer Exhibition
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="700">
                        <div class="article-card bg-transparent p-0 shadow-none">
                            <a class="article-card-img-wrapper" href="">
                                <img src="{{ asset('User/assets/img/blog-img2.jpg') }}" alt="img"
                                    class="article-card-img rounded">
                                <span class="article-tag article-tag-absolute rounded">Art Gallery</span>
                            </a>
                            <p class="article-card-published text_12 d-flex align-items-center">
                                <span class="article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <span class="ms-2">30 December, 2022</span>
                                </span>
                                <span class="article-author d-flex align-items-center ms-4">
                                    <span class="icon-author">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span class="ms-2">Lara Joe</span>
                                </span>
                            </p>
                            <h2 class="article-card-heading heading_18">
                                <a class="heading_18" href="">
                                    Discovering the Royal Academy Summer Exhibition
                                </a>
                            </h2>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="700">
                        <div class="article-card bg-transparent p-0 shadow-none">
                            <a class="article-card-img-wrapper" href="">
                                <img src="{{ asset('User/assets/img/blog-img2.jpg') }}" alt="img"
                                    class="article-card-img rounded">
                                <span class="article-tag article-tag-absolute rounded">Art Gallery</span>
                            </a>
                            <p class="article-card-published text_12 d-flex align-items-center">
                                <span class="article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <span class="ms-2">30 December, 2022</span>
                                </span>
                                <span class="article-author d-flex align-items-center ms-4">
                                    <span class="icon-author">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span class="ms-2">Lara Joe</span>
                                </span>
                            </p>
                            <h2 class="article-card-heading heading_18">
                                <a class="heading_18" href="">
                                    Discovering the Royal Academy Summer Exhibition
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
