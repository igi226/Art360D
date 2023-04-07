@extends('User.Main.mainLayout')
@section('title', 'Artworks | Art360D')
@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-lg-9 mb-3 order-lg-2">
                <div class="categoryboxlist mb-4">
                    <div class="owl-carousel owl-theme" id="categorybox">
                        @foreach ($artworkCategories as $category)
                            @if (isset($category->image) &&
                                    !empty($category->image && File::exists(public_path('storage/categoryImage/' . $category->image))))
                                <div class="item"
                                    style="background-image: url({{ asset('storage/categoryImage/' . $category->image) }});">
                                @else
                                    <div class="item"
                                        style="background-image: url({{ asset('User/assets/img/cat1.jpg') }});">
                            @endif
                            <a href="javascript:void(0)" onclick="categoryWiseArtwork({{ $category->id }})"
                                class="categoryboxtitle">
                                <h2>{{ $category->name }} </h2>
                            </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="filter-pnl">
                <div class="row">
                    <div class="col-lg-6 mb-4">
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
                    <div class="col-lg-6 text-lg-end mb-3">
                        Showing 1-3 of 3
                    </div>
                </div>
            </div>
            <div class="row" id="main-section">
                @foreach ($artworks as $artwork)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card artlist">
                            <div class="card-image">
                                <a href="{{ route('user.artworksDetails', $artwork->id) }}"><img
                                        src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}"></a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <a href="#" class="likebtn"><i class="far fa-thumbs-up"></i> Like</a>
                                    <a href="#" class="likebtn"><i class="fas fa-plus-circle"></i> Save(0)</a>
                                </div>
                                <h2><a href="#">{{ $artwork->title }}</a></h2>
                                <p>By {{ $artwork->artistUsers->first_name . ' ' . $artwork->artistUsers->last_name }}
                                </p>
                                @foreach (explode(',', $artwork->category_ids) as $category_id)
                                    @php
                                        $C_name = DB::table('artwork_categories')
                                            ->where('id', $category_id)
                                            ->select('name')
                                            ->first();
                                        // dd($C_name);
                                    @endphp
                                    <h4 class="artworkbadge">{{ @$C_name->name }}</h4>
                                @endforeach

                                <ul class="optionlist">
                                    <li>{{ $artwork->height }} "(H) x {{ $artwork->width }} "(W) x
                                        {{ $artwork->depth }} "(D)</li>
                                </ul>
                                <div class="d-flex justify-content-between fw-semibold">
                                    <p>Price : ${{ $artwork->price }}</p>
                                    <p>${{ $artwork->rent_price_per_one_month }}/month</p>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <a href="#" class="btn btn-theme btn-sm">Buy Now</a>
                                    <a href="#" class="btn btn-theme btn-sm">Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div id="category-wise">

                </div>
            </div>
        </div>
        <div class="col-lg-3 order-lg-1 sidefilter">
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-1">Price Slider</h3>
                    <div class="range-slider" id="rangeslide1">
                        <div class="chooserange d-flex pb-3 justify-content-between">
                            <div>
                                $ <input type="number" value="0" min="0" max="10000" />
                            </div>
                            <div>
                                $ <input type="number" value="10000" min="0" max="10000" />
                            </div>
                        </div>
                        <div>
                            <input value="0" min="0" max="1000" step="50" type="range" />
                            <input value="1000" min="0" max="1000" step="50" type="range" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Categories</h3>
                    <div class="checklist-cat">
                        <div class="listchk"><label><input type="checkbox"> All</label></div>
                        @foreach ($artworkCategories as $categoryFilter)
                            <div class="listchk"><label><input type="checkbox"> {{ $categoryFilter->name }}</label></div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-1">Height Range:</h3>
                    <div class="range-slider" id="rangeslide2">
                        <div class="chooserange d-flex pb-3 justify-content-between">
                            <div>
                                In" <input type="number" value="0" min="0" max="30" />
                            </div>
                            <div>
                                In" <input type="number" value="30" min="0" max="30" />
                            </div>
                        </div>
                        <div>
                            <input value="0" min="0" max="30" step="1" type="range" />
                            <input value="30" min="0" max="30" step="1" type="range" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-1">Width Range:</h3>
                    <div class="range-slider" id="rangeslide3">
                        <div class="chooserange d-flex pb-3 justify-content-between">
                            <div>
                                In" <input type="number" value="0" min="0" max="30" />
                            </div>
                            <div>
                                In" <input type="number" value="30" min="0" max="30" />
                            </div>
                        </div>
                        <div>
                            <input value="0" min="0" max="30" step="1" type="range" />
                            <input value="30" min="0" max="30" step="1" type="range" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Year </h3>
                    <div class="checklist-cat">
                        <div class="listchk"><label><input type="checkbox"> All</label></div>
                        @foreach ($artworks as $artwork_year)
                            <div class="listchk"><label><input type="checkbox">
                                    {{ date('Y', strtotime($artwork_year->year_created)) }}</label></div>
                        @endforeach
                     
                    </div>
                </div>
            </div>
            <div class="card mb-2 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-3">Gallery Location </h3>
                    <div class="checklist-cat">
                        <div class="listchk"><label><input type="checkbox"> All</label></div>
                        <div class="listchk"><label><input type="checkbox"> New York</label></div>
                        <div class="listchk"><label><input type="checkbox"> London</label></div>
                        <div class="listchk"><label><input type="checkbox"> Los Angeles</label></div>
                        <div class="listchk"><label><input type="checkbox"> Paris</label></div>
                        <div class="listchk"><label><input type="checkbox"> San Francisco</label></div>
                        <div class="listchk"><label><input type="checkbox"> Hong Kong</label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('artworkScript')
    <script type="text/javascript">
        function categoryWiseArtwork(category_id) {
            $.ajax({
            type: "GET",
            url: "{{ route('user.categoryWiseArtwork') }}",
            data: {
                'category_id': category_id,
                '_token': '{{ csrf_token() }}'
            },
            dataType: "html",
            success: function(response) {
                
            }
           
        });
        }

        (function() {

            var parent = document.querySelector("#rangeslide1");
            if (!parent) return;

            var
                rangeS = parent.querySelectorAll("input[type=range]"),
                numberS = parent.querySelectorAll("input[type=number]");

            rangeS.forEach(function(el) {
                el.oninput = function() {
                    var slide1 = parseFloat(rangeS[0].value),
                        slide2 = parseFloat(rangeS[1].value);

                    if (slide1 > slide2) {
                        [slide1, slide2] = [slide2, slide1];
                    }

                    numberS[0].value = slide1;
                    numberS[1].value = slide2;
                }
            });

            numberS.forEach(function(el) {
                el.oninput = function() {
                    var number1 = parseFloat(numberS[0].value),
                        number2 = parseFloat(numberS[1].value);

                    if (number1 > number2) {
                        var tmp = number1;
                        numberS[0].value = number2;
                        numberS[1].value = tmp;
                    }

                    rangeS[0].value = number1;
                    rangeS[1].value = number2;

                }
            });

        })();

        (function() {

            var parent = document.querySelector("#rangeslide2");
            if (!parent) return;

            var
                rangeS = parent.querySelectorAll("input[type=range]"),
                numberS = parent.querySelectorAll("input[type=number]");

            rangeS.forEach(function(el) {
                el.oninput = function() {
                    var slide1 = parseFloat(rangeS[0].value),
                        slide2 = parseFloat(rangeS[1].value);

                    if (slide1 > slide2) {
                        [slide1, slide2] = [slide2, slide1];
                    }

                    numberS[0].value = slide1;
                    numberS[1].value = slide2;
                }
            });

            numberS.forEach(function(el) {
                el.oninput = function() {
                    var number1 = parseFloat(numberS[0].value),
                        number2 = parseFloat(numberS[1].value);

                    if (number1 > number2) {
                        var tmp = number1;
                        numberS[0].value = number2;
                        numberS[1].value = tmp;
                    }

                    rangeS[0].value = number1;
                    rangeS[1].value = number2;

                }
            });

        })();

        (function() {

            var parent = document.querySelector("#rangeslide3");
            if (!parent) return;

            var
                rangeS = parent.querySelectorAll("input[type=range]"),
                numberS = parent.querySelectorAll("input[type=number]");

            rangeS.forEach(function(el) {
                el.oninput = function() {
                    var slide1 = parseFloat(rangeS[0].value),
                        slide2 = parseFloat(rangeS[1].value);

                    if (slide1 > slide2) {
                        [slide1, slide2] = [slide2, slide1];
                    }

                    numberS[0].value = slide1;
                    numberS[1].value = slide2;
                }
            });

            numberS.forEach(function(el) {
                el.oninput = function() {
                    var number1 = parseFloat(numberS[0].value),
                        number2 = parseFloat(numberS[1].value);

                    if (number1 > number2) {
                        var tmp = number1;
                        numberS[0].value = number2;
                        numberS[1].value = tmp;
                    }

                    rangeS[0].value = number1;
                    rangeS[1].value = number2;

                }
            });

        })();
    </script>
@endsection
