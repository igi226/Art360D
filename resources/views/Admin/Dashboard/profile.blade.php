@extends('Admin.Master.masterLayout')
@section('title', 'Profile|Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                   <h4 class="mb-0">Profile</h4>
                  
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                         <li class="breadcrumb-item active">Profile</li>
                      </ol>
                   </div>
                </div>
             </div>
          </div>
  
          <div class="card custom-shadow rounded-lg border">
              <div class="card-body">
                <form action="{{ route("admin.profile") }}" method="POST">
                  @csrf
           
                   <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="col-lg-10">
                         <div class="mt-3">
                           <h3 class="h5 mb-3 text-uppercase fw-bold">Profile update</h3>
                              @if (Session::has('msg'))
                                 <p class="alert alert-info">{{ Session::get('msg') }}</p>
                              @endif
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Name:</label>
                                  <div class="col-lg-6">
                                     <input type="text" value="{{ auth()->guard('admin')->user()->name }}" class="form-control font-size-13 custom-shadow" name="name">
                                     @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Email ID:</label>
                                  <div class="col-lg-6">
                                     <input type="email" value="{{ auth()->guard('admin')->user()->email }}" class="form-control font-size-13 custom-shadow" name="email">
                                     @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            
                            <div class="form-group mb-3">
                               <div class="row">
                                  <div class="col-lg-6 offset-lg-3">
                                     <button type="submit" class="btn btn-primary custom-shadow">Update Profile</button>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </form>
                <form action="{{ route("admin.changePassword") }}" method="POST">
                  @csrf
                   <div class="row">
                      <div class="col-lg-10 offset-lg-2">
                         <div class="mt-4">
                            <h3 class="h5 mb-3 text-uppercase fw-bold">Change Password</h3>
                            @if (Session::has('msgPassword'))
                              <p class="alert alert-info">{{ Session::get('msgPassword') }}</p>
                           @endif
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Current Password:</label>
                                  <div class="col-lg-6">
                                     <input type="password" class="form-control font-size-13 custom-shadow" name="current_password">
                                     @if ($errors->has('current_password'))
                                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">New Password:</label>
                                  <div class="col-lg-6">
                                     <input type="password" value="" class="form-control font-size-13 custom-shadow" name="new_password">
                                     @if ($errors->has('new_password'))
                                       <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                    @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Confirm Password:</label>
                                  <div class="col-lg-6">
                                     <input type="password" value="" class="form-control font-size-13 custom-shadow" name="">
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row">
                                  <div class="col-lg-6 offset-lg-3">
                                     <button type="submit" class="btn btn-primary custom-shadow">Change Password</button>
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