@extends('User.Dashboard.master')
@section('title', 'Artist-Dashboard')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Create Artwork</h4>
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
                        <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mt-3">
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Artist:</label>
                                                <div class="col-lg-9">

                                                    <select name="artist_id"
                                                        class="form-control font-size-13 custom-shadow select2class">
                                                        <option value="">Select artist</option>
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
                                                        class="text-danger">*</span>Title:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ old('title') }}"
                                                        class="form-control font-size-13 custom-shadow" name="title">
                                                    @if ($errors->has('title'))
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Year created:</label>
                                                <div class="col-lg-9">
                                                    <input type="date"
                                                        value="{{ old('year_created') }} "class="form-control font-size-13 custom-shadow"
                                                        name="year_created">
                                                    @if ($errors->has('year_created'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('year_created') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span> Medium:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ old('medium') }}"
                                                        class="form-control font-size-13 custom-shadow" name="medium">
                                                    @if ($errors->has('medium'))
                                                        <span class="text-danger">{{ $errors->first('medium') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Category:</label>
                                                <div class="col-lg-9">
                                                    <div class="multiselect">
                                                        <select value="{{ old('category_ids[]') }}"
                                                            class="selectpicker form-control" multiple
                                                            aria-label="size 3 select example" name="category_ids[]">

                                                        </select>
                                                    </div>
                                                    @if ($errors->has('category_ids'))
                                                        <span
                                                            class="text-danger">{{ 'Atleast one category must be selected' }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13"><span
                                                        class="text-danger">*</span>Collection Type:</label>
                                                <div class="col-lg-9">
                                                    <select name="collection_id" value="{{ old('collection_id') }}"
                                                        class="form-control font-size-13 custom-shadow">
                                                        <option value="">Select collection</option>


                                                    </select>
                                                    @if ($errors->has('collection_id'))
                                                        <span class="text-danger">{{ 'Collection is required' }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Style:</label>
                                            <div class="col-lg-9">

                                                <select name="style_id"
                                                    value="{{ old('style_id') }} "class="form-control font-size-13 custom-shadow"
                                                    id="style_id">
                                                    <option value="">Select style</option>

                                                    <option value="0">other</option>



                                                </select>
                                                @if ($errors->has('style_id'))
                                                    <span class="text-danger">{{ 'Style name is required' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="other-style">

                                    </div>



                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Subject:</label>
                                            <div class="col-lg-9">

                                                <select name="subject_id" value="{{ old('subject_id') }}"
                                                    class="form-control font-size-13 custom-shadow" id="subject_id">
                                                    <option value="">Select subject</option>

                                                    <option value="0">other</option>

                                                </select>
                                                @if ($errors->has('subject_id'))
                                                    <span class="text-danger">{{ 'subject name is required' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="other-subject">

                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Literature:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="literature">{{ old('literature') }}</textarea>
                                                @if ($errors->has('literature'))
                                                    <span class="text-danger">{{ $errors->first('literature') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> About this work:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="about_the_work">{{ old('about_the_work') }}</textarea>
                                                @if ($errors->has('about_the_work'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('about_the_work') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Artwork type:</label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="">Purchase</label>
                                                        <input type="checkbox"
                                                            class="font-size-13 custom-shadow"name="artwork_type[]"
                                                            value="Purchase">

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="">Bid</label>
                                                        <input type="checkbox"
                                                            class="font-size-13 custom-shadow"name="artwork_type[]"
                                                            value="Bid" onclick="bidFunction()"
                                                            id="bid-type-checkbox">

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="">Rent</label>
                                                        <input type="checkbox"
                                                            class="font-size-13 custom-shadow"name="artwork_type[]"
                                                            value="Rent" onclick="rentFunction()"
                                                            id="rent-type-checkbox">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="bid-form">


                                    </div>

                                    <div id="rent-form">


                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Upload artwork images:</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control font-size-13 custom-shadow"
                                                    name="image[]" id="imageCropFileInput" multiple=""
                                                    accept=".jpg,.jpeg,.png">

                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"></label>
                                            <div class="col-lg-4">
                                                {{-- <img id="preview-image-before-upload" src="{{ asset('noimg.png') }}" alt="preview image" style="max-height: 200px; max-width: 150px;"> --}}
                                                <input type="hidden" id="profile_img_data">
                                                <div class="img-preview"></div>
                                                <div id="galleryImages"></div>
                                                <div id="cropper">
                                                    <canvas id="cropperImg" width="0" height="0"></canvas>
                                                    <button type="button"
                                                        class="cropImageBtn btn btn-success custom-shadow"
                                                        id="cropImageBtn">Crop</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <div class="dashboard-profile-pic">
                                        <img src="{{ asset('User\assets\img\blog\bag-2.jpg') }}" alt="">
                                        <div class="dashboard-file">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" name="" id="" class="file-upload-form">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        
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
