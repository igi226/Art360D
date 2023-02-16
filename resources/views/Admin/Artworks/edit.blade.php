@extends('Admin.Master.masterLayout')
@section('title', 'Edit-artwork|Art360')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Update Artwork</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Update</a></li>
                                    <li class="breadcrumb-item active">Artwork</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card custom-shadow rounded-lg border">
                    <div class="card-body">
                        <form action="{{ route('artworks.update', $artwork->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                        <option value="{{ $artwork->artist_id }}">
                                                            {{ $artwork->artistUsers->first_name . ' ' . $artwork->artistUsers->last_name }}
                                                        </option>
                                                        @foreach ($artists as $artist)
                                                            <option value="{{ $artist->id }}">
                                                                {{ $artist->first_name . ' ' . $artist->last_name }}
                                                            </option>
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
                                                        class="text-danger">*</span>Title:</label>
                                                <div class="col-lg-9">
                                                    <input type="text" value="{{ $artwork->title }}"
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
                                                        value="{{ $artwork->year_created }}"class="form-control font-size-13 custom-shadow"
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
                                                    <input type="text" value="{{ $artwork->medium }}"
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
                                                        <select class="selectpicker form-control" multiple
                                                            aria-label="size 3 select example" name="category_ids[]">
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    {{ in_array($category->id, explode(',', $artwork->category_ids)) ? 'selected' : '' }}
                                                                    value="{{ $category->id }}">{{ $category->name }}
                                                                </option>
                                                            @endforeach
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
                                                        @foreach ($collections as $collection)
                                                            <option
                                                                {{ $artwork->collection_id == $collection->id ? 'selected' : '' }}
                                                                value="{{ $collection->id }}">{{ $collection->name }}
                                                            </option>
                                                        @endforeach
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

                                                    @foreach ($styles as $style)
                                                        <option {{ $artwork->style_id == $style->id ? 'selected' : '' }}
                                                            value="{{ $style->id }}">{{ $style->name }}</option>
                                                    @endforeach
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

                                                    @foreach ($subjects as $subject)
                                                        <option
                                                            {{ $artwork->subject_id == $subject->id ? 'selected' : '' }}
                                                            value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
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
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="literature">{{ $artwork->literature }}</textarea>
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
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="about_the_work">{{ $artwork->about_the_work }}</textarea>
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
                                                            value="Purchase"
                                                            {{ in_array('Purchase', explode(',', $artwork->artwork_type)) ? 'checked' : '' }}>

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="">Bid</label>
                                                        <input type="checkbox"
                                                            class="font-size-13 custom-shadow"name="artwork_type[]"
                                                            value="Bid" onclick="bidFunction()" id="bid-type-checkbox"
                                                            {{ in_array('Bid', explode(',', $artwork->artwork_type)) ? 'checked' : '' }}>

                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label for="">Rent</label>
                                                        <input type="checkbox" class="font-size-13 custom-shadow"
                                                            name="artwork_type[]" value="Rent" onclick="rentFunction()"
                                                            id="rent-type-checkbox"
                                                            {{ in_array('Rent', explode(',', $artwork->artwork_type)) ? 'checked' : '' }}>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="bid-form">
                                        @if (in_array('Bid', explode(',', $artwork->artwork_type)))
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13"> Auction Starting
                                                        price:</label>
                                                    <div class="col-lg-9">
                                                        <input type="text"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="auction_starting_price"
                                                            value="{{ @$artwork->auction_starting_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center">
                                                    <label class="col-lg-3 fw-bold font-size-13"> Auction End
                                                        price:</label>
                                                    <div class="col-lg-9">
                                                        <input type="text"
                                                            class="form-control font-size-13 custom-shadow"name="auction_end_price"
                                                            value="{{ @$artwork->auction_end_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13">Auction Reserve
                                                        price:</label>
                                                    <div class="col-lg-9">
                                                        <input type="text"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="auction_reserve_price"
                                                            value="{{ @$artwork->auction_reserve_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center">
                                                    <label class="col-lg-3 fw-bold font-size-13">Auction Starting
                                                        Date:</label>
                                                    <div class="col-lg-9">
                                                        <input type="date"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="auction_start_date"
                                                            value="{{ @$artwork->auction_start_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13">Auction Ending Date:</label>
                                                    <div class="col-lg-9"><input type="date"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="auction_end_date"
                                                            value="{{ @$artwork->auction_end_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                    <div id="rent-form">
                                        @if (in_array('Rent', explode(',', $artwork->artwork_type)))
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13"> Price for
                                                        rent/month:</label>
                                                    <div class="col-lg-9"><input type="text"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="rent_price_per_one_month"
                                                            value="{{ $artwork->rent_price_per_one_month }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13"> Price for rent/3
                                                        month:</label>
                                                    <div class="col-lg-9"><input type="text"
                                                            class="form-control font-size-13 custom-shadow"name="rent_price_per_three_month"
                                                            value="{{ $artwork->rent_price_per_three_month }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13">Price for rent/6
                                                        month:</label>
                                                    <div class="col-lg-9"><input type="text"
                                                            class="form-control font-size-13 custom-shadow"name="rent_price_per_six_month"
                                                            value="{{ $artwork->rent_price_per_six_month }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13">Price for rent/Year:</label>
                                                    <div class="col-lg-9"><input type="text"
                                                            class="form-control font-size-13 custom-shadow"name="rent_price_per_year"
                                                            value="{{ $artwork->rent_price_per_year }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="row align-items-center"><label
                                                        class="col-lg-3 fw-bold font-size-13">Rent Discount Percentage
                                                        (%):</label>
                                                    <div class="col-lg-9"><input type="text"
                                                            class="form-control font-size-13 custom-shadow"name="rent_discount_percentage"
                                                            value="{{ $artwork->rent_discount_percentage }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    {{-- {{ dd(count($artwork->artwork_images)) }} --}}
                                    @if (count($artwork->artwork_images) > 0)

                                        <div class="form-group mb-3">
                                            <div class="row align-items-center">
                                                <label class="col-lg-3 fw-bold font-size-13">Artwork images:</label>

                                                <div class="col-lg-9">
                                                    <div id="contentDiv">
                                                        @foreach ($artwork->artwork_images as $image)
                                                        <div class="artworkimg">
                                                            <img class="m-2"
                                                                src="{{ asset('storage/ArtworkImage/' . $image->image) }}"
                                                                alt="">
                                                            <button type="button"
                                                                onclick="deleteSingleArtworkImg({{ $image->id }})"
                                                                class="btn btn-sm"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    @endforeach
                                                    </div>

                                                    


                                                </div>

                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Upload new images:</label>
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
                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Material:</label>
                                            <div class="col-lg-9">

                                                <select name="material_id" class="form-control font-size-13 custom-shadow"
                                                    id="material_id">
                                                    <option value="">Select artist</option>
                                                    @foreach ($materials as $material)
                                                   <option {{ $artwork->material_id == $material->id ? 'selected' : '' }} value="{{ $material->id }}">{{ $material->name }}
                                                   </option>
                                               @endforeach
                                                    <option value="0">other</option>


                                                </select>
                                                @if ($errors->has('material_id'))
                                                    <span class="text-danger">{{ 'material name is required' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="other-material">

                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span> Edition:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ $artwork->edition }}"
                                                    class="form-control font-size-13 custom-shadow" name="edition">
                                                @if ($errors->has('edition'))
                                                    <span class="text-danger">{{ $errors->first('edition') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">

                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span> Size:</label>
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ $artwork->width }}"
                                                            placeholder="Width"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="width">
                                                        @if ($errors->has('width'))
                                                            <span class="text-danger">{{ $errors->first('width') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ $artwork->height }}"
                                                            placeholder="Height"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="height">
                                                        @if ($errors->has('height'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('height') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ $artwork->depth }}"
                                                            placeholder="Depth"
                                                            class="form-control font-size-13 custom-shadow"
                                                            name="depth">
                                                        @if ($errors->has('depth'))
                                                            <span class="text-danger">{{ $errors->first('depth') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Does it has frame?</label>
                                            <div class="col-lg-9">
                                                <select id="has-frame" class="form-control font-size-13 custom-shadow">
                                                    <option value="">select</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="frame-no">


                                    </div>

                                    <div id="frame-details-field">


                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span> Art Price:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('price') }}"
                                                    class="form-control font-size-13 custom-shadow" name="price">
                                                @if ($errors->has('price'))
                                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Movement:</label>
                                            <div class="col-lg-9">

                                                <select name="movement_id"
                                                    class="form-control font-size-13 custom-shadow">
                                                    <option value="">Select artist</option>
                                                    {{-- @foreach ($movements as $movement)
                                                   <option value="{{ $movement->id }}">{{ $movement->name }}
                                                   </option>
                                               @endforeach --}}

                                                </select>
                                                @if ($errors->has('movement_id'))
                                                    <span class="text-danger">{{ 'material name is required' }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Markings:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('markings') }}"
                                                    class="form-control font-size-13 custom-shadow"name="markings">
                                                @if ($errors->has('markings'))
                                                    <span class="text-danger">{{ $errors->first('markings') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Exhibitions:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('exhibitions') }}"
                                                    class="form-control font-size-13 custom-shadow"name="exhibitions">
                                                @if ($errors->has('exhibitions'))
                                                    <span class="text-danger">{{ $errors->first('exhibitions') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Prints Available:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="prints_available">{{ old('prints_available') }}</textarea>
                                                @if ($errors->has('prints_available'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('prints_available') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Also Available:
                                                Conditions:</label>
                                            <div class="col-lg-9">
                                                {{-- <input type="text" value={{ old('') }} class="form-control font-size-13 custom-shadow"name="edition"> --}}
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="also_available_condition">{{ old('also_available_condition') }}</textarea>
                                                @if ($errors->has('also_available_condition'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('also_available_condition') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Direct Sale Discount Percentage
                                                (%):</label>
                                            <div class="col-lg-9">
                                                <input type="text"
                                                    value="{{ old('direct_sale_discount_percentage') }}"
                                                    class="form-control font-size-13 custom-shadow"name="direct_sale_discount_percentage">
                                                @if ($errors->has('direct_sale_discount_percentage'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('direct_sale_discount_percentage') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Discount Start Date:</label>
                                            <div class="col-lg-9">
                                                <input type="date"
                                                    class="form-control font-size-13 custom-shadow"name="discount_start_dt"
                                                    value="{{ old('discount_start_dt') }}">
                                                @if ($errors->has('discount_start_dt'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('discount_start_dt') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Discount End Date:</label>
                                            <div class="col-lg-9">
                                                <input type="date"
                                                    class="form-control font-size-13 custom-shadow"name="discount_end_dt"
                                                    value="{{ old('discount_end_dt') }}">
                                                @if ($errors->has('discount_end_dt'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('discount_end_dt') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Copyright:</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{ old('copyright') }}"
                                                    class="form-control font-size-13 custom-shadow"name="copyright">
                                                @if ($errors->has('copyright'))
                                                    <span class="text-danger">{{ $errors->first('copyright') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Ready to hang:</label>
                                            <div class="col-lg-9">
                                                <label for="">Yes</label>
                                                <input type="radio" class="font-size-13 custom-shadow"
                                                    name="ready_to_hang" value="yes" checked>
                                                <label for="">No</label>
                                                <input type="radio" class="font-size-13 custom-shadow"
                                                    name="ready_to_hang" value="no">
                                                @if ($errors->has('ready_to_hang'))
                                                    <span class="text-danger">{{ $errors->first('ready_to_hang') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"><span
                                                    class="text-danger">*</span>Signed by:</label>
                                            <div class="col-lg-9">
                                                <label for="">Yes</label>
                                                <input type="radio" class="font-size-13 custom-shadow" name="signed_by"
                                                    value="yes">
                                                <label for="">No</label>
                                                <input type="radio" class="font-size-13 custom-shadow" name="signed_by"
                                                    value="no">
                                                @if ($errors->has('signed_by'))
                                                    <span class="text-danger">{{ $errors->first('signed_by') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Certification:</label>
                                            <div class="col-lg-9">
                                                <input type="file" class=" form-control font-size-13 custom-shadow"
                                                    name="certification" value="{{ old('certification') }}">
                                                @if ($errors->has('certification'))
                                                    <span class="text-danger">{{ $errors->first('certification') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button class="btn btn-primary custom-shadow">Update</button>
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

@endsection
@section('frame_details')
    <script>
        $(document).ready(function() {
            $('#has-frame').on('change', function() {
                var demovalue = $(this).val();

                if (demovalue == "yes") {
                    frame_no_form =
                        '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Number of Frame:</label><div class="col-lg-9"><select name="number_of_frame" class="form-control font-size-13 custom-shadow" id="frame-Details" onchange="frameDetails(this.value)"><option value="">Select number</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><select></div></div></div>';
                } else if (demovalue == "no") {
                    frame_no_form = '';
                } else {
                    frame_no_form = "";
                }
                $('#frame-no').html(frame_no_form);
            });
        });

        function frameDetails(newV) {

            if (newV == "1") {
                frame_details_form =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame1 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[1][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[1][frame_color]" placeholder="frame color" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[1][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div>';
            } else if (newV == "2") {
                frame_details_form =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame1 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[1][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[1][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[1][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame2 details:</label><div class="col-lg-9"><div class="row"> <div class="col-md-4"><input name="frameDetails[2][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"> <input type="color" name="frameDetails[2][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[2][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div>';
            } else if (newV == "3") {
                frame_details_form =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame1 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"> <input name="frameDetails[1][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[1][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[1][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame2 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[2][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[2][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[2][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame3 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[3][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[3][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[3][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div>';
            } else if (newV == "4") {
                frame_details_form =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame1 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[1][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[1][frame_color]" placeholder="frame_color" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[1][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame2 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[2][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[2][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[2][frame_price]" placeholder="frame price"  class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame3 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[3][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[3][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[3][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Frame4 details:</label><div class="col-lg-9"><div class="row"><div class="col-md-4"><input name="frameDetails[4][frame_type]" placeholder="frame type" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input type="color" name="frameDetails[4][frame_color]" class="form-control font-size-13 custom-shadow"></div><div class="col-md-4"><input name="frameDetails[4][frame_price]" placeholder="frame price" class="form-control font-size-13 custom-shadow"></div></div></div></div></div>';
            } else {
                frame_details_form = "";
            }
            $('#frame-details-field').html(frame_details_form);
        }

        function bidFunction() {
            var checkBox = document.getElementById("bid-type-checkbox");
            if (checkBox.checked == true) {
                bidForm =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"> Auction Starting price:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow" name="auction_starting_price" value="{{ $artwork->auction_starting_price }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"> Auction End price:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="auction_end_price" value="{{ $artwork->auction_end_price }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Auction Reserve price:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="auction_reserve_price" value="{{ $artwork->auction_reserve_price }}"></div></div></div><div class="form-group mb-3"> <div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Auction Starting Date:</label><div class="col-lg-9"><input type="date" class="form-control font-size-13 custom-shadow"name="auction_start_date" value="{{ $artwork->auction_start_date }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Auction Ending Date:</label><div class="col-lg-9"><input type="date" class="form-control font-size-13 custom-shadow" name="auction_end_date" value="{{ $artwork->auction_end_date }}"></div></div></div>';

            } else {
                bidForm = "";
            }

            $('#bid-form').html(bidForm);


        }

        function rentFunction() {

            var checkBox = document.getElementById("rent-type-checkbox");
            if (checkBox.checked == true) {
                rentForm =
                    '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"> Price for rent/month:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow" name="rent_price_per_one_month" value="{{ $artwork->rent_price_per_one_month }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"> Price for rent/3 month:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="rent_price_per_three_month" value="{{ $artwork->rent_price_per_three_month }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Price for rent/6 month:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="rent_price_per_six_month" value="{{ $artwork->rent_price_per_six_month }}"></div></div></div><div class="form-group mb-3"> <div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Price for rent/Year:</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="rent_price_per_year" value="{{ $artwork->rent_price_per_year }}"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Rent Discount Percentage (%):</label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow"name="rent_discount_percentage" value="{{ $artwork->rent_discount_percentage }}"></div></div></div>';

            } else {
                rentForm = "";
            }

            $('#rent-form').html(rentForm);


        }

        $(document).ready(function() {
            $('#subject_id').on('change', function() {
                var demovalue = $(this).val();
                // alert(demovalue);
                if (demovalue == "0") {
                    var otherSubject =
                        '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"></label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow" placeholder="Please enter subject" name="other_subject"></div></div></div>';
                } else {
                    var otherSubject = '';
                }
                $('#other-subject').html(otherSubject);

            });
        });

        $(document).ready(function() {
            $('#material_id').on('change', function() {
                var demovalue = $(this).val();
                // alert(demovalue);
                if (demovalue == "0") {
                    var otherSubject =
                        '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"></label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow" placeholder="Please enter material" name="material_other"></div></div></div>';
                } else {
                    var otherSubject = '';
                }
                $('#other-material').html(otherSubject);

            });
        });

        $(document).ready(function() {
            $('#style_id').on('change', function() {
                var demovalue = $(this).val();
                // alert(demovalue);
                if (demovalue == "0") {
                    var otherSubject =
                        '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13"></label><div class="col-lg-9"><input type="text" class="form-control font-size-13 custom-shadow" placeholder="Please enter style" name="style_other"></div></div></div>';
                } else {
                    var otherSubject = '';
                }
                $('#other-style').html(otherSubject);

            });
        });


        function deleteSingleArtworkImg(artwork_image_id) {
            swal({
                    title: `Are you sure  to delete this image?`,
                    text: "You are deleting the image for permanent",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin/delete-artwork-image') }}",
                        data: {
                            'id': artwork_image_id,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "JSON",
                        success: function(response) {
                            swal(response.msg);
                            
                            $('#contentDiv').load(' #contentDiv')
                        }

                    });
                    } else {
                        swal("Your data file is safe!");
                    }

                });
        }
    </script>

@endsection
