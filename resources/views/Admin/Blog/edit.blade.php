@extends('Admin.Master.masterLayout')
@section('title', 'Edit-Blog|Art360')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Blog</h4>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card custom-shadow rounded-lg border">
                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog->slug) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="mt-3">
                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Title: <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control font-size-13 custom-shadow"
                                                    name="title" value="{{ $blog->title }}">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13"> Description:</label>
                                            <div class="col-lg-9">
                                                <textarea class="summernote form-control font-size-13 custom-shadow" name="description">{{ $blog->description }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if (isset($blog->image) && !empty($blog->image && File::exists(public_path('storage/BlogImage/' . $blog->image))))
                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Current Image:</label>
                                            <div class="col-lg-9">
                                               <img src="{{ asset('storage/BlogImage/'. $blog->image) }}" alt="">
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group mb-3">
                                        <div class="row align-items-center">
                                            <label class="col-lg-3 fw-bold font-size-13">Update Image:</label>
                                            <div class="col-lg-9">
                                                <input type="file" class="form-control font-size-13 custom-shadow"
                                                    name="image">
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-lg-6 offset-lg-3">
                                                <button type="submit"
                                                    class="btn btn-primary custom-shadow">Create</button>
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