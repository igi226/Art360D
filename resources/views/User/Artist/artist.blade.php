@extends('User.Main.mainLayout') @section('title', 'Artist | Art360D') @section('content') <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
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
        <div class="col-lg-6 text-lg-end mb-3"> Sort By Artwork Category: <select>
            <option>Select</option> @foreach ($categories as $category) <option>{{ $category->name }}</option> @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
  <h3 class="text-center h4 fw-semibold mb-4">Artist Listing</h3>
  <div class="container">
    <div class="row"> @foreach ($artists as $artist) <div class="col-lg-3 col-md-6 mb-4">
        <div class="card artlist">
          <div class="card-image">
            <a href="{{ route('user.artistDetails', $artist->id) }}">
              <img src="{{ asset('User/assets/img/the-japanese-bridge-claude-monet.jpg') }}">
            </a>
          </div>
          <div class="card-body">
            <h2>
              <a href="{{ route('user.artistDetails', $artist->slug) }}">{{ $artist->first_name . ' ' . $artist->last_name }}</a>
            </h2>
            <p>
              <i class="fas fa-map-marker-alt"></i>{{ $artist->address }}
            </p>
            <h4 class="artworkbadge">Artworks ({{ $artist->total_artworks->count() }})</h4>
            <ul class="optionlist">
              <li>Buy Now (0)</li>
              <li> Auction (0) </li>
              <li>Rent (0)</li>
            </ul>
            <div class="card-footer d-flex justify-content-between"> @php $check = DB::table('artist_likes') ->where('artist_id', $artist->id) ->where('user_id', auth()->id()) ->first(); if ($check) { $active = 'active'; $liked = 'Liked'; } else { $active = ''; $liked = 'Like'; } @endphp <a id="likeBtnArtist{{ $artist->id }}" onclick="likeBtnArtist({{ $artist->id }}, {{ auth()->id() }})" class="btn likebtn {{ $active }}">
                <i class="far fa-thumbs-up"></i>
                {{ $liked }}
              </a>
              <a href="#" class="likebtn">
                <i class="fas fa-plus-circle"></i> Follow </a>
            </div>
          </div>
        </div>
      </div> @endforeach </div>
  </div> @endsection @section('artistPageScript') <script>
    function likeBtnArtist(artist_id, user_id) {
      if (user_id == null) {
        alert('Please Login first!');
      } else {
        $.ajax({
          type: "POST",
          url: "{{ route('user.artistlike') }}",
          data: {
            'artist_id': artist_id,
            '_token': '{{ csrf_token() }}'
          },
          dataType: "JSON",
          success: function(response) {
            // alert(response.msg);
            // $("#likeBtnArtist" + artist_id).load(window.location.href + "#likeBtnArtist" + artist_id);
            var element = document.getElementById("likeBtnArtist" + artist_id);
            if (response.msg == 'Like') {
              element.classList.add("active");
              element.innerHTML = "Liked";
            } else {
              element.classList.remove("active");
              element.innerHTML = "Like";
            }
          }
        });
      }
    }
  </script> @endsection