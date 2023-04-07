@extends('User.Dashboard.master')
@section('title', 'Artist-Dashboard')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                                    <li class="breadcrumb-item active">Artwork</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card custom-shadow rounded-lg border">
                    <div class="card-body">
                        <form action="{{ route('user.updateArtist.Profile') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6">
                                    <h3 for="">Profile Information</h3>
                                    <hr>
                                    <div class="mt-3">
                                        <div class="dashboard-profile-pic mb-3">
                                            @if (isset(auth()->user()->image) && !empty(auth()->user()->image && File::exists(public_path('storage/UserImage/' . auth()->user()->image))))
                                                <img src="{{ asset('storage/UserImage/' . auth()->user()->image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('User\assets\img\blog\bag-2.jpg') }}" alt="">
                                            @endif
                                            <div class="dashboard-file">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" name="image" id=""
                                                        class="file-upload-form">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>First name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->first_name }}"
                                                        class="form-control font-size-13 custom-shadow" name="first_name">
                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Last name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->last_name }}"
                                                        class="form-control font-size-13 custom-shadow" name="last_name">
                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Artist type:</label>
                                                <div class="col-lg-9">

                                                    <select name="artist_type"
                                                        class="form-control font-size-13 custom-shadow select2class">
                                                        <option value="">Select artist</option>
                                                        @foreach ($artist_types as $artistType)
                                                            <option
                                                                {{ auth()->user()->user_artist->artist_type == $artistType->id ? 'selected' : '' }}
                                                                value="{{ $artistType->id }}">
                                                                {{ $artistType->artist_type }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('artist_id'))
                                                        <span class="text-danger">{{ 'Artist name is required' }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Company Name:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->company_name }}"
                                                        class="form-control font-size-13 custom-shadow" name="company_name">
                                                    @if ($errors->has('company_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('company_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> Address:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->address }}"
                                                        class="form-control font-size-13 custom-shadow" name="address">
                                                    @if ($errors->has('address'))
                                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> City:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->city }}"
                                                        class="form-control font-size-13 custom-shadow" name="city">
                                                    @if ($errors->has('city'))
                                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> State:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->state }}"
                                                        class="form-control font-size-13 custom-shadow" name="state">
                                                    @if ($errors->has('state'))
                                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> Country:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->country }}"
                                                        class="form-control font-size-13 custom-shadow" name="country">
                                                    @if ($errors->has('country'))
                                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> DOB:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->dob }}"
                                                        class="form-control font-size-13 custom-shadow" name="dob">
                                                    @if ($errors->has('dob'))
                                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> Phone:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->phone }}"
                                                        class="form-control font-size-13 custom-shadow" name="phone">
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> Email:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ auth()->user()->email }}"
                                                        class="form-control font-size-13 custom-shadow" name="email">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Biography:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="bio">{{ auth()->user()->bio }}</textarea>
                                                @if ($errors->has('bio'))
                                                    <span class="text-danger">{{ $errors->first('bio') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Condition Report:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="condition_report">{{ auth()->user()->user_artist->condition_report }}</textarea>
                                                @if ($errors->has('condition_report'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('condition_report') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> History and Provenance:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="history_and_Provenance">{{ auth()->user()->user_artist->history_and_Provenance }}</textarea>
                                                @if ($errors->has('history_and_Provenance'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('history_and_Provenance') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Shipping Information:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="shipping_information">{{ auth()->user()->user_artist->shipping_information }}</textarea>
                                                @if ($errors->has('shipping_information'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('shipping_information') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Payment and return
                                                Policies:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="payment_and_return_policies">{{ auth()->user()->user_artist->payment_and_return_policies }}</textarea>
                                                @if ($errors->has('payment_and_return_policies'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('payment_and_return_policies') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <h3 for="">Password Setting</h3>
                                    <hr>
                                    {{-- <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Current Password:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('current_password') }}"
                                                    class="form-control font-size-13 custom-shadow" name="current_password">
                                                @if ($errors->has('current_password'))
                                                    <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Enter New Password:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('password') }}"
                                                    class="form-control font-size-13 custom-shadow" name="password">
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button class="btn btn-primary custom-shadow">Create</button>


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
