@extends('Admin.Master.masterLayout')
@section('title', 'Create-Artist | Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                   <h4 class="mb-0">Edit artist</h4>
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="{{ route("artists.index") }}">Artists</a></li>
                         <li class="breadcrumb-item active">Edit</li>
                      </ol>
                   </div>
                </div>
             </div>
          </div>
  
          <div class="card custom-shadow rounded-lg border">
            @if (Session::has('msg'))
                <p class="alert alert-info">{{ Session::get('msg') }}</p>
            @endif
              <div class="card-body">
                <form method="POST" action="{{ route("artists.update", $artist->id) }}">
                    @csrf
                    @method("PUT")
                   <div class="row">
                      <div class="col-lg-2">
                      </div>
                      <div class="col-lg-10">
                         <div class="mt-3">
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">First Name:</label>
                                  <div class="col-lg-6">
                                     <input type="text" class="form-control font-size-13 custom-shadow" name="first_name" value="{{ $artist->first_name }}">
                                     @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Last Name:</label>
                                  <div class="col-lg-6">
                                     <input value="{{ $artist->last_name }}" type="text"  class="form-control font-size-13 custom-shadow" name="last_name">
                                     @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Email ID:</label>
                                  <div class="col-lg-6">
                                     <input value="{{ $artist->email }}" type="email" class="form-control font-size-13 custom-shadow" name="email">
                                     @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Password:</label>
                                   <div class="col-lg-6">
                                      <input type="password" class="form-control font-size-13 custom-shadow" name="password">
                                      @if ($errors->has('password'))
                                         <span class="text-danger">{{ $errors->first('password') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Contact Number:</label>
                                  <div class="col-lg-6">
                                     <input value="{{ $artist->phone }}" type="number" class="form-control font-size-13 custom-shadow" name="phone">
                                     @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Company name:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->company_name }}" type="text" class="form-control font-size-13 custom-shadow" name="company_name">
                                      @if ($errors->has('company_name'))
                                         <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Join date:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->join_date }}" type="date" class="form-control font-size-13 custom-shadow" name="join_date">
                                      @if ($errors->has('join_date'))
                                         <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Address:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->address }}" type="text" class="form-control font-size-13 custom-shadow" name="address">
                                      @if ($errors->has('address'))
                                         <span class="text-danger">{{ $errors->first('address') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">City:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->city }}" type="text" class="form-control font-size-13 custom-shadow" name="city">
                                      @if ($errors->has('city'))
                                         <span class="text-danger">{{ $errors->first('city') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">State:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->state }}" type="text" class="form-control font-size-13 custom-shadow" name="state">
                                      @if ($errors->has('state'))
                                         <span class="text-danger">{{ $errors->first('state') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Country:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->country }}" type="text" class="form-control font-size-13 custom-shadow" name="country">
                                      @if ($errors->has('country'))
                                         <span class="text-danger">{{ $errors->first('country') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Artist type:</label>
                                   <div class="col-lg-6">
                                      <input value="{{ $artist->user_artist->artist_type }}" type="text" class="form-control font-size-13 custom-shadow" name="artist_type">
                                      @if ($errors->has('artist_type'))
                                         <span class="text-danger">{{ $errors->first('artist_type') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>

                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Feature artist:</label>
                                   <div class="col-lg-6">
                                     {{-- {{ dd($artist->user_artist->feature_artist); }} --}}
                                      <select name="feature_artist" class="form-control font-size-13 custom-shadow">
                                        <option class="{{ $artist->user_artist->feature_artist == "V" ? "selected" : "" }}" value="V">V</option>
                                        <option class="{{ $artist->user_artist->feature_artist == "X" ? "selected" : "" }}" value="X">X</option>
                                      </select>
                                        @if ($errors->has('feature_artist'))
                                            <span class="text-danger">{{ $errors->first('feature_artist') }}</span>
                                        @endif
                                   </div>
                                </div>
                             </div>

                            
                            
                            <div class="form-group mb-3">
                               <div class="row">
                                  <div class="col-lg-6 offset-lg-3">
                                     <button type="submit" class="btn btn-primary custom-shadow">Update </button>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </form>
               
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection