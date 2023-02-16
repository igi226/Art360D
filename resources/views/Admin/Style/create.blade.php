@extends('Admin.Master.masterLayout')
@section('title', 'Create-Style|Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                   <h4 class="mb-0">Create style</h4>
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Create</a></li>
                         <li class="breadcrumb-item active">Style</li>
                      </ol>
                   </div>
                </div>
             </div>
          </div>
  
          <div class="card custom-shadow rounded-lg border">
              <div class="card-body">
                <form action="{{ route("styles.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                      <div class="col-lg-2">
                        
                      </div>
                      <div class="col-lg-10">
                         <div class="mt-3">
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Name:</label>
                                  <div class="col-lg-6">
                                     <input type="text" class="form-control font-size-13 custom-shadow" name="name">
                                     @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            {{-- <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13">Image:</label>
                                   <div class="col-lg-6">
                                      <input type="file" class="form-control font-size-13 custom-shadow" name="image" id="image">
                                      @if ($errors->has('image'))
                                         <span class="text-danger">{{ $errors->first('image') }}</span>
                                      @endif
                                   </div>
                                </div>
                             </div>
                             <div class="form-group mb-3">
                                <div class="row align-items-center">
                                   <label class="col-lg-3 fw-bold font-size-13"></label>
                                   <div class="col-lg-6">
                                    <img id="preview-image-before-upload" src="{{ asset('noimg.png') }}" alt="preview image" style="max-height: 250px;">
                                     
                                   </div>
                                </div>
                             </div> --}}
                             
                             
                            <div class="form-group mb-3">
                                <div class="row">
                                   <div class="col-lg-6 offset-lg-3">
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