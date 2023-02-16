@extends('Admin.Master.masterLayout')
@section('title', 'edit-Artist-type|Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                   <h4 class="mb-0">Edit artist type</h4>
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                         <li class="breadcrumb-item active">Artist type</li>
                      </ol>
                   </div>
                </div>
             </div>
          </div>
  
          <div class="card custom-shadow rounded-lg border">
              <div class="card-body">
                <form action="{{ route("artisttypes.update", $artisttype->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                   <div class="row">
                      <div class="col-lg-2">
                        
                      </div>
                      <div class="col-lg-10">
                         <div class="mt-3">
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Artist type:</label>
                                  <div class="col-lg-6">
                                     <input type="text" class="form-control font-size-13 custom-shadow" name="artist_type" value="{{ $artisttype->artist_type }}">
                                     @if ($errors->has('artist_type'))
                                        <span class="text-danger">{{ $errors->first('artist_type') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                   <div class="col-lg-6 offset-lg-3">
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
 </div>
@endsection