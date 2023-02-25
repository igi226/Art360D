@extends('Admin.Master.masterLayout')
@section('title', 'View-Artwork | Art360')
@section('content')
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .slide-tab {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }
    </style>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Artwork details</h4>
                        </div>
                    </div>
                </div>
                {{--  --}}
                <h2 style="text-align:center">Slideshow Gallery</h2>

<div class="slide-tab">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="{{ asset('noimg.png') }}" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="{{ asset('pic1.jpg') }}" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="{{ asset('noimg.png') }}" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="{{ asset('pic1.jpg') }}" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="{{ asset('noimg.png') }} style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="{{ asset('pic1.jpg') }}" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="{{ asset('noimg.png') }}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
    </div>
    <div class="column">
      <img class="demo cursor" src="{{ asset('pic1.jpg') }}" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
    </div>
    <div class="column">
      <img class="demo cursor" src="{{ asset('noimg.png') }}" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
    </div>
    <div class="column">
      <img class="demo cursor" src="{{ asset('pic1.jpg') }}" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
    </div>
    <div class="column">
      <img class="demo cursor" src="{{ asset('pic1.jpg') }}" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
    </div>    
    <div class="column">
      <img class="demo cursor" src="{{ asset('pic1.jpg') }}" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
    </div>
  </div>
</div>
                
{{--  --}}
                <div class="card custom-shadow rounded-lg border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <h2 class="fs-4 mb-1">jj </h2>
                                <p class="mb-2">Email: <span class="fw-bold">jj</span></p>
                                <p class="mb-2">Country: <span class="fw-bold"> $specific_artist->country </span></p>
                                <p class="mb-2">Company name: <span class="fw-bold">lj</span></p>
                                <p class="mb-2">Phone: <span class="fw-bold">lj</span></p>
                                <p class="mb-2">Date of birth : <span class="fw-bold">jl</span></p>
                                <p class="mb-2">Address: <span class="fw-bold">jju</span></p>
                                <p class="mb-2">City: <span class="fw-bold">oji</span></p>
                                <p class="mb-2">State: <span class="fw-bold">iuh</span></p>

                                <p class="mb-2">Artist type: <span
                                        class="badge rounded-pill badge-soft-primary font-size-12">uu</span></p>
                                <p class="mb-2">Artist type: <span
                                        class="badge rounded-pill badge-soft-primary font-size-12">hui</span></p>

                                <h6 class="h5 text-primary">Bio:</h6>
                                <p><?php echo 'jgig'; ?></p>

                                <h6 class="h5 text-primary">Condition Report:</h6>
                                <p><?php echo 'hihi'; ?></p>

                                <h6 class="h5 text-primary">History and Provenance:</h6>
                                <p><?php echo 'j'; ?></p>

                                <h6 class   ="h5 text-primary">Shipping Information:</h6>
                                <p><?php echo 'mij'; ?></p>

                                <h6 class="h5 text-primary">Payment and return Policies:</h6>
                                <p><?php echo 'jxd'; ?></p>


                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="text-white-50 float-left">
                                    {{-- @if (isset($specific_artist->image) && !empty($specific_artist->image) && File::exists(public_path('storage/ArtworkImage/' . $specific_artist->image)))
                                    <img height="200px" width="200px" class="rounded" src="{{ asset('storage/ArtworkImage/' . $specific_artist->image) }}"
                                        alt="">
                                    @else --}}
                                    <img height="80" width="100" src="{{ asset('noimg.png') }}" alt="no-p_image">
                                 

                                </div>
                                <div class="card congo-widget bg-primary text-white-50 custom-shadow rounded-lg border">
                                    <div class="card-body">
                                        
                                        <h3 class="text-white">Plan name:{{ 'No plan taken' }}</h3>
                                        <h5 class="mb-1 text-white">Plan cost: ${{ '' }}</h5>
                                        <h5 class="text-white fs-6 mb-0">End date: {{ '' }}</h5>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    @endsection

    @section('slideImage')
        <script>
            let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
        </script>
    @endsection
