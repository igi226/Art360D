<!doctype html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title>@yield('title')</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="{{ asset('User/assets/img/favicon.png') }}" type="image/x-icon">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('User/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('User/assets/css/responsive.css') }}">
</head>

<body>
    <div class="body-wrapper">
        <div class="announcement-bar bg-1 py-1 py-lg-1">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 d-lg-block d-none">
                        <div class="announcement-call-wrapper">
                            <div class="announcement-call">
                                <a class="announcement-text text-white" href="#"><i class="fas fa-phone-alt"></i>
                                    Call: 646-757-9885</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">
                            <div class="announcement-meta d-flex align-items-center">
                                @guest
                                    @if (Route::has('login'))
                                        <a class="announcement-login announcement-text text-white"
                                            href="{{ route('login') }}">
                                            <i class="far fa-user"></i>
                                            <span>Login</span>
                                        </a>
                                    @endif
                                @else
                                    <a class="announcement-login announcement-text text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                                <span class="separator-login d-flex px-3">
                                    <svg width="2" height="9" viewBox="0 0 2 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M1 0.5V8.5" stroke="#FEFEFE" stroke-linecap="round" />
                                    </svg>
                                </span>

                                <div class="currency-wrapper">
                                    <select>
                                        <option>Select</option>
                                        <option selected>USD</option>
                                        <option>EUR</option>
                                        <option>INR</option>
                                        <option>GBP</option>
                                        <option>SGD</option>
                                    </select>
                                </div>
                                <span class="separator-login d-flex px-3">
                                    <svg width="2" height="9" viewBox="0 0 2 9" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M1 0.5V8.5" stroke="#FEFEFE" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <div class="language-wrapper">
                                    <div id="google_translate_element"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- announcement bar end -->

        <!-- header start -->
        <header class="sticky-header border-btm-black header-1">
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-4">
                            <div class="header-logo">
                                <a href="{{ route('index') }}" class="logo-main">
                                    <img src="{{ asset('User/assets/img/logo.png') }}" loading="lazy" alt="bisum">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none">
                            <nav class="site-navigation">
                                <ul class="main-menu list-unstyled justify-content-center">
                                    <li class="menu-list-item nav-item has-dropdown active">
                                        <div class="mega-menu-header">
                                            <a class="nav-link" href="{{ route('user.artist') }}">
                                                Artist
                                            </a>
                                        </div>
                                    </li>
                                    <li class="menu-list-item nav-item has-dropdown active">
                                        <div class="mega-menu-header">
                                            <a class="nav-link" href="{{ route('user.artworks') }}">
                                                Artworks
                                            </a>
                                        </div>
                                    </li>
                                    <li class="menu-list-item nav-item has-dropdown active">
                                        <div class="mega-menu-header">
                                            <a class="nav-link" href="#">
                                                Gallery
                                            </a>
                                        </div>
                                    </li>
                                    <li class="menu-list-item nav-item has-dropdown active">
                                        <div class="mega-menu-header">
                                            <a class="nav-link" href="#">
                                                Auctions
                                            </a>
                                        </div>
                                    </li>
                                    <li class="menu-list-item nav-item has-megamenu">
                                        <div class="mega-menu-header">
                                            <a class="nav-link" href="collection-left-sidebar.html">
                                                Sell
                                            </a>
                                        </div>
                                        <div class="submenu-transform submenu-transform-desktop">
                                            <div class="container">
                                                <ul class="submenu megamenu-container list-unstyled">
                                                    <li class="menu-list-item nav-item-sub">
                                                        <div class="mega-menu-header">
                                                            <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                                href="collection-left-sidebar.html">
                                                                Categories
                                                            </a>
                                                        </div>
                                                        <div class="submenu-transform megamenu-transform">
                                                            <ul class="megamenu list-unstyled">
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Oil Painting </a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Ink Painting </a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Calligraphy </a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Photography </a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Pop Art </a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">All Art works</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="menu-list-item nav-item-sub">
                                                        <div
                                                            class="mega-menu-header d-flex align-items-center justify-content-between">
                                                            <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                                href="collection-right-sidebar.html">
                                                                Featured artists
                                                            </a>
                                                        </div>
                                                        <div class="submenu-transform megamenu-transform">
                                                            <ul class="megamenu list-unstyled">
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">All Featured Artists</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="menu-list-item nav-item-sub">
                                                        <div
                                                            class="mega-menu-header d-flex align-items-center justify-content-between">
                                                            <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                                href="index.html">
                                                                Price
                                                            </a>
                                                        </div>
                                                        <div class="submenu-transform megamenu-transform">
                                                            <ul class="megamenu list-unstyled">
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Under $1,000</a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">$1,000 - $2,500</a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">$2,500 - $5,000</a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">$5,000 - $10,000</a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">$10,000 - $25,000</a>
                                                                </li>
                                                                <li class="menu-list-item nav-item-sub">
                                                                    <a class="nav-link-sub nav-text-sub"
                                                                        href="#">Over $25,000</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="menu-list-item nav-item-sub">
                                                        <div
                                                            class="mega-menu-header d-flex align-items-center justify-content-between">
                                                            <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                                href="index.html">
                                                                Featured artwork
                                                            </a>
                                                        </div>
                                                        <div
                                                            class="mega-menu-header d-flex align-items-center justify-content-between">
                                                            <a class="mega-menu-img nav-link-sub nav-text-sub"
                                                                href="#">
                                                                <img class="menu-img"
                                                                    src="{{ asset('User/assets/img/menu_image.png') }}"
                                                                    alt="img">
                                                                <div
                                                                    class="img-menu-action text_12 bg-transparent p-0 mt-2">
                                                                    <p class="mb-0">YZ (Yzeult)</p>
                                                                    <p class="mb-0">Amazone - Moudjibath <br> $5,003
                                                                    </p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a class="nav-link" href="#">News</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a class="nav-link" href="#">Event</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a class="nav-link" href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 col-md-8 col-8">
                            <div class="header-action d-flex align-items-center justify-content-end">
                                <a class="header-action-item header-search" href="javascript:void(0)">
                                    <i class="fas fa-search icon icon-search"></i>
                                </a>
                                <a class="header-action-item header-wishlist ms-4 d-none d-lg-block" href="#">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a class="header-action-item header-cart ms-4" href="#drawer-cart"
                                    data-bs-toggle="offcanvas">
                                    <i class="fas fa-shopping-bag"></i>
                                </a>
                                <a class="header-action-item header-hamburger ms-4 d-lg-none" href="#drawer-menu"
                                    data-bs-toggle="offcanvas">
                                    <svg class="icon icon-hamburger" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="#000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-wrapper">
                    <div class="container">
                        <form action="#" class="search-form d-flex align-items-center">

                            <div class="search-input mr-4 d-flex">
                                <select class="border-0 me-3">
                                    <option>Select</option>
                                    <option>Artist</option>
                                    <option>Art Type</option>
                                    <option>Gallery</option>
                                    <option>Location</option>
                                </select>
                                <input type="text" placeholder="Search your products..." autocomplete="off">
                            </div>

                            <!-- <div class="search-close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-close">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div> -->
                            <button type="submit" class="search-submit bg-transparent pl-0 text-start">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <main id="MainContent" class="content-for-layout">
            <!-- slideshow start -->
            @yield('content')
        </main>


        <!-- footer start -->
        <footer class="overflow-hidden footer-style-2">
            <div class="footer-top ">
                <div class="container">
                    <div class="footer-widget-wrapper">
                        <div class="row justify-content-between">
                            <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                                <div class="footer-widget-inner">
                                    <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                        <span>Buyer</span>
                                    </h4>
                                    <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                        <li class="footer-menu-item"><a href="#">Blog</a></li>
                                        <li class="footer-menu-item"><a href="#">Buyer FAQ</a></li>
                                        <li class="footer-menu-item"><a href="#">Returns</a></li>
                                        <li class="footer-menu-item"><a href="#">Gift Cards</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                                <div class="footer-widget-inner">
                                    <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                        <span>Artist</span>
                                    </h4>
                                    <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                        <li class="footer-menu-item"><a href="#">Apply to be a Art360d
                                                Artist</a></li>
                                        <li class="footer-menu-item"><a href="#">Artist FAQ</a></li>
                                        <li class="footer-menu-item"><a href="#">Payment FAQ</a></li>
                                        <li class="footer-menu-item"><a href="#">Shipping FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-12 footer-widget">
                                <div class="footer-widget-inner">
                                    <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                        <span>Art Based Marketplace</span>
                                    </h4>
                                    <ul class="footer-menu list-unstyled mb-0 d-md-block">
                                        <li class="footer-menu-item"><a href="#">About Us</a></li>
                                        <li class="footer-menu-item"><a href="#">Affiliate</a></li>
                                        <li class="footer-menu-item"><a href="#">Press</a></li>
                                        <li class="footer-menu-item"><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-12 footer-widget">
                                <div class="footer-widget-inner">
                                    <div class="footer-newsletter">
                                        <h4 class="footer-heading d-flex align-items-center justify-content-between">
                                            <span>Subscribe Newsletter</span>
                                        </h4>
                                        <div class="newsletter-wrapper">
                                            <form action="#"
                                                class="footer-newsletter-form d-flex align-items-center">
                                                <input class="footer-newsletter-input bg-transparent" type="email"
                                                    autocomplete="off" placeholder="Enter your Email">
                                                <button class="footer-newsletter-btn"
                                                    type="submit">Subscribe</button>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="footer-social-wrapper">
                                                    <ul
                                                        class="footer-social list-unstyled d-flex align-items-center flex-wrap mb-0">
                                                        <li class="footer-social-item">
                                                            <a href="#">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li class="footer-social-item">
                                                            <a href="#">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="footer-social-item">
                                                            <a href="#">
                                                                <i class="fab fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                        <li class="footer-social-item">
                                                            <a href="#">
                                                                <i class="fab fa-youtube"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="paymenticons">
                                                    <li><img src="{{ asset('User/assets/img/payment-1.png') }}"></li>
                                                    <li><img src="{{ asset('User/assets/img/payment-2.png') }}"></li>
                                                    <li><img src="{{ asset('User/assets/img/payment-3.png') }}"></li>
                                                    <li><img src="{{ asset('User/assets/img/payment-4.png') }}"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div
                        class="footer-bottom-inner d-flex flex-wrap justify-content-md-between justify-content-center align-items-center">
                        <ul class="footer-bottom-menu list-unstyled d-flex flex-wrap align-items-center mb-0">
                            <li class="footer-menu-item"><a href="#">Privacy policy</a></li>
                            <li class="footer-menu-item"><a href="#">Terms & Conditions</a></li>
                        </ul>
                        <p class="copyright footer-text">© 2023 <span class="current-year"></span> Art 360d. All
                            Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        </button>
        <!-- scrollup end -->

        <!-- drawer menu start -->
        <div class="offcanvas offcanvas-start d-flex d-lg-none" tabindex="-1" id="drawer-menu">
            <div class="offcanvas-wrapper">
                <div class="offcanvas-header border-btm-black">
                    <h5 class="drawer-heading">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0 d-flex flex-column justify-content-between">
                    <nav class="site-navigation">
                        <ul class="main-menu list-unstyled">
                            <li class="menu-list-item nav-item has-dropdown active">
                                <div class="mega-menu-header">
                                    <a class="nav-link active" href="index.html">
                                        Artist
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item has-dropdown active">
                                <div class="mega-menu-header">
                                    <a class="nav-link " href="index.html">
                                        Artworks
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item has-dropdown active">
                                <div class="mega-menu-header">
                                    <a class="nav-link " href="index.html">
                                        Gallery
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item has-dropdown active">
                                <div class="mega-menu-header">
                                    <a class="nav-link " href="index.html">
                                        Auctions
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item has-megamenu">
                                <div class="mega-menu-header">
                                    <a class="nav-link" href="collection-left-sidebar.html">
                                        Sell
                                    </a>
                                    <span class="open-submenu">
                                        <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <div class="submenu-transform submenu-transform-desktop">
                                    <div class="container">
                                        <div class="offcanvas-header border-btm-black">
                                            <h5 class="drawer-heading btn-menu-back d-flex align-items-center">
                                                <svg class="icon icon-menu-back" xmlns="http://www.w3.org/2000/svg"
                                                    width="40" height="40" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                </svg>
                                                <span class="menu-back-text">Shop</span>
                                            </h5>
                                        </div>
                                        <ul class="submenu megamenu-container list-unstyled">
                                            <li class="menu-list-item nav-item-sub">
                                                <div class="mega-menu-header">
                                                    <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                        href="collection-left-sidebar.html">
                                                        Categories
                                                    </a>
                                                    <span class="open-submenu">
                                                        <svg class="icon icon-dropdown"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="submenu-transform">
                                                    <div class="offcanvas-header border-btm-black">
                                                        <h5
                                                            class="drawer-heading btn-menu-back d-flex align-items-center">
                                                            <svg class="icon icon-menu-back"
                                                                xmlns="http://www.w3.org/2000/svg" width="40"
                                                                height="40" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="15 18 9 12 15 6"></polyline>
                                                            </svg>
                                                            <span class="menu-back-text">Categories</span>
                                                        </h5>
                                                    </div>
                                                    <ul class="megamenu list-unstyled megamenu-container">
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">Oil
                                                                Painting </a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">Ink
                                                                Painting </a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub"
                                                                href="#">Calligraphy </a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub"
                                                                href="#">Photography </a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">Pop
                                                                Art </a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">All
                                                                Art works</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu-list-item nav-item-sub">
                                                <div class="mega-menu-header">
                                                    <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                        href="index.html">
                                                        Featured artists
                                                    </a>
                                                    <span class="open-submenu">
                                                        <svg class="icon icon-dropdown"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="submenu-transform">
                                                    <div class="offcanvas-header border-btm-black">
                                                        <h5
                                                            class="drawer-heading btn-menu-back d-flex align-items-center">
                                                            <svg class="icon icon-menu-back"
                                                                xmlns="http://www.w3.org/2000/svg" width="40"
                                                                height="40" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="15 18 9 12 15 6"></polyline>
                                                            </svg>
                                                            <span class="menu-back-text">Featured artists</span>
                                                        </h5>
                                                    </div>
                                                    <ul class="megamenu list-unstyled">
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">All
                                                                Featured artists</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="menu-list-item nav-item-sub">
                                                <div class="mega-menu-header">
                                                    <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                        href="index.html">
                                                        Price
                                                    </a>
                                                    <span class="open-submenu">
                                                        <svg class="icon icon-dropdown"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="submenu-transform">
                                                    <div class="offcanvas-header border-btm-black">
                                                        <h5
                                                            class="drawer-heading btn-menu-back d-flex align-items-center">
                                                            <svg class="icon icon-menu-back"
                                                                xmlns="http://www.w3.org/2000/svg" width="40"
                                                                height="40" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <polyline points="15 18 9 12 15 6"></polyline>
                                                            </svg>
                                                            <span class="menu-back-text">Price</span>
                                                        </h5>
                                                    </div>
                                                    <ul class="megamenu list-unstyled">
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">Under
                                                                $1,000</a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">$1,000
                                                                - $2,500</a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">$2,500
                                                                - $5,000</a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">$5,000
                                                                - $10,000</a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub"
                                                                href="#">$10,000 - $25,000</a>
                                                        </li>
                                                        <li class="menu-list-item nav-item-sub">
                                                            <a class="nav-link-sub nav-text-sub" href="#">Over
                                                                $25,000</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="#">News</a>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="#">Events</a>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
        <!-- drawer menu end -->





        <!-- all js -->

        <script src="{{ asset('User/assets/js/vendor.js') }}"></script>
        <script src="{{ asset('User/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('User/assets/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('User/assets/js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('User/assets/js/glanguage.js') }}"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
        </script>
    </div>

    @yield('artistPageScript')
</body>

</html>
