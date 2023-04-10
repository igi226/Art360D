@extends('User.Main.mainLayout')
@section('title', 'Gallery | Art360D')
@section('content')
    <div class="pb-5" data-aos="fade-up">
        <div class="section-header text-center gallery_spacer">
            <h2 class="section-heading primary-color pageheading">Gallery</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="gallery_form">
                <form>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Location">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="mb-3">
                                <select id="disabledSelect" class="form-select">
                                    <option value="">Speciality</option>
                                    <option value="1">East Asian Art</option>
                                    <option value="2">Contemporary Art</option>
                                    <option value="3">Drawing</option>
                                    <option value="4">Chinese Landscape</option>
                                    <option value="5">Emerging Art</option>
                                    <option value="6">New Member Galleries</option>
                                    <option value="7">dummy data category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Gallery">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 become-member">
                            <a href="javascript:void(0);">Become a Member</a>
                        </div>
                    </div>
                </form>
            </div>
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


            <section class="galleryfrontSlider" data-aos="fade-up">
                <ul class="owl-carousel gallerytop">
                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>Musée Picasso Paris</h2>
                                    <h3>Contemporary Art</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>Versailles, France</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/g1.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}"> <img src="http://placehold.it/1300x780"
                                        alt=""></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>Abstract With Teal</h2>
                                    <h3>New Member Galleries</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>Los Angeles, CA, USA</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/g5.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}">  <img src="http://placehold.it/1300x780" alt=""></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>Galerie Mickael Marciano</h2>
                                    <h3>Drawing</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>Low Gardens, Stone Lane, Winterbourne Down, Winterbourne, Bristol, UK</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/622edab11def5.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}"> <img src="http://placehold.it/1300x780" alt=""></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>walls Sketch Painting Art</h2>
                                    <h3>Drawing</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>New York, NY, USA</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/sketch-painting-art-4k-bd.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}"> <img src="http://placehold.it/1300x780" alt=""></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>cold-morning-qx</h2>
                                    <h3>Contemporary Art</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>New York, NY, USA</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/dunedin-new-zealand-4k-lj.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}"> <img src="http://placehold.it/1300x780" alt=""></a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="gpc-overlays">
                                    <h2>Empire State Building Skycrapper In New York</h2>
                                    <h3>New Member Galleries</h3>
                                    <h4>David Gerstein Works</h4>
                                    <h5>New Orleans, LA, USA</h5>
                                    <p><a href="#" class="btn btn-black">Follow</a></p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <!-- <img src="https://www.art360d.com/img/gallery/empire-state-building-skycrapper-in-new-york-8m-1280x800.jpg" width="1300px" height="780px" alt="" > -->
                                <a href="{{ route('user.galleryDetails') }}">  <img src="http://placehold.it/1300x780" alt=""></a>
                            </div>
                        </div>
                    </li>

                </ul>
            </section>

            <section class="art_section" data-aos="fade-up">
                <div class="titlegallery">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>East Asian Art</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="galall">View All</a>
                        </div>
                    </div>
                </div>

                <div class="gallery_slider1 owl-carousel">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-girl-with-rabbit-in-hands-4k-12-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-girl-standing-along-with-flowers-iz-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-mermaid-girl-3c-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="art_section" data-aos="fade-up">
                <div class="titlegallery">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Contemporary Art</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="galall">View All</a>
                        </div>
                    </div>
                </div>

                <div class="gallery_slider2 owl-carousel">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-girl-with-rabbit-in-hands-4k-12-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-girl-standing-along-with-flowers-iz-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-mermaid-girl-3c-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="art_section" data-aos="fade-up">
                <div class="titlegallery">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Drawing</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="galall">View All</a>
                        </div>
                    </div>
                </div>

                <div class="gallery_slider3 owl-carousel">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/3083814-bloom_blossom_early_flora_garden_lilies_lily-family_lily-flower_nature_onion-flower_orange_ornamental-flower_ornamental-plant_plant_schnittblume_summer_summer-flower.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/622edab11def5.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/sketch-painting-art-4k-bd.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/little-mermaid-girl-3c-1280x800.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="art_section" data-aos="fade-up">
                <div class="titlegallery">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Chinese Landscape</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="#" class="galall">View All</a>
                        </div>
                    </div>
                </div>

                <div class="gallery_slider4 owl-carousel">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/k0EKSYXD_400x400.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/depositphotos_70700739-stock-photo-china-landscape.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/huang-gongwang_fuchun-mountains_part.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img
                                            src="https://www.art360d.com/img/gallery/chinese-painting-05.jpg"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                        class="product-image"><img src="https://www.art360d.com/img/gallery/flower.JPG"
                                            alt="Musée Picasso Paris"></a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner galleryInfo">
                                    <div class="item-title">
                                        <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                    </div>
                                    <div class="item-content">
                                        <p>Yucatan, Mexico</p>
                                        <div class="icon-gallery">

                                            <span><a href="javascript:void(0);" class="btn btn-like"><i
                                                        class="fa fa-thumbs-up" aria-hidden="true"></i> like</a></span>
                                        </div>
                                        <div class="icon-gallery">
                                            <a href="javascript:void(0);" class="btn btn-black">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="art_section" data-aos="fade-up">
                <div class="titlegallery">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>New Member Galleries</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="filter-options gallryfilter">
                                <div class="filter-counter">
                                    <span class="counter-detail">Showing 1-20 of 842</span>
                                </div>
                                <div class="filter-sort">
                                    <label class="left">Sort By: </label>
                                    <select name="" id="" onchange="filterGallery(this);">
                                        <option value="" selected="selected">Select</option>
                                        <option value="new">New</option>
                                        <option value="old">Old</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery_slider gallery_no_slider">
                    <div class="row">
                        <div class="item col-lg-3 col-md-3 col-xs-12">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                            class="product-image"><img src="https://www.art360d.com/img\gallery/g5.jpg"
                                                alt="Musée Picasso Paris"></a>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner galleryInfo">
                                        <div class="item-title">
                                            <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                        </div>
                                        <div class="item-content">
                                            <p>Yucatan, Mexico</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item col-lg-3 col-md-3 col-xs-12">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                            class="product-image"><img src="https://www.art360d.com/img\gallery/g7.jpg"
                                                alt="Musée Picasso Paris"></a>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner galleryInfo">
                                        <div class="item-title">
                                            <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                        </div>
                                        <div class="item-content">
                                            <p>Yucatan, Mexico</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item col-lg-3 col-md-3 col-xs-12">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                            class="product-image"><img
                                                src="https://www.art360d.com/img/gallery/huang-gongwang_fuchun-mountains_part.jpg"
                                                alt="Musée Picasso Paris"></a>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner galleryInfo">
                                        <div class="item-title">
                                            <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                        </div>
                                        <div class="item-content">
                                            <p>Yucatan, Mexico</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item col-lg-3 col-md-3 col-xs-12">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="" title="Musée Picasso Paris"
                                            class="product-image"><img
                                                src="https://www.art360d.com/img\gallery/empire-state-building-5k-t0-1280x800.jpg"
                                                alt="Musée Picasso Paris"></a>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner galleryInfo">
                                        <div class="item-title">
                                            <a href="javascript:void(0);" title="Retis lapen casen">The Garden</a>
                                        </div>
                                        <div class="item-content">
                                            <p>Yucatan, Mexico</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
