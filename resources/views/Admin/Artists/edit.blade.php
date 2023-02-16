@extends('Admin.Master.masterLayout')
@section('title', 'Edit-Artist | Art360')
@section('content')
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <form method="POST" action="{{ route('artists.update', $artist->id) }}" id="tournament" enctype="multipart/form-data">
         @csrf
         @method("PUT")
         <!-- progressbar -->
         <ul id="tournamentprogress">
            <li class="active" id="info">1. Basic Info</li>
            <li id="loaction">2. Subscription plan</li>
            <li id="organizers">3.  Personal info</li>
            <li id="rulebook">4.  Other details</li>
         </ul>
         @if (Session::has('msg'))
         <p class="alert alert-info">{{ Session::get('msg') }}</p>
         @endif
         <div class="rounded-0">
            <fieldset>
               <div class="form-card p-4">
                  <div class="mb-3">
                     <label>First Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control font-size-13 custom-shadow"
                        name="first_name" value="{{ $artist->first_name }}">
                     @if ($errors->has('first_name'))
                     <span class="text-danger">{{ $errors->first('first_name') }}</span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label>Last Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control font-size-13 custom-shadow"
                        name="last_name" value="{{ $artist->last_name }}">
                     @if ($errors->has('last_name'))
                     <span class="text-danger">{{ $errors->first('last_name') }}</span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label>Email <span class="text-danger">*</span></label>
                     <input type="email" class="form-control font-size-13 custom-shadow"
                        name="email" value="{{ $artist->email  }}">
                     @if ($errors->has('email'))
                     <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label>Country <span class="text-danger">*</span></label>
                     <input type="text" class="form-control font-size-13 custom-shadow"
                        name="country" value="{{ $artist->country }}">
                     @if ($errors->has('country'))
                     <span class="text-danger">{{ $errors->first('country') }}</span>
                     @endif
                  </div>
                  <span class="text-danger">Enter only if you want to change password or it will be same</span>
                  <div class="mb-3">
                     <label>Password</label>
                     <input type="password" class="form-control font-size-13 custom-shadow"
                        name="password">
                     @if ($errors->has('password'))
                     <span class="text-danger">{{ $errors->first('password') }}</span>
                     @endif
                  </div>
                  <div class="mb-3">
                     <label>Confirm Password </label>
                     <input type="password" class="form-control font-size-13 custom-shadow"
                        name="confirm_password">
                     @if ($errors->has('confirm_password'))
                     <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                     @endif
                  </div>
               </div>
               <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset>
               <div class="row">
                  @foreach ($subscription_plans as $plan)
                  @php
                      foreach($artist->subscription_taken as $takenPlan){
                        if($takenPlan->subscription_id == $plan->id){
                            if($takenPlan->end_date > now()) $checked = "checked";
                        }else{
                            $checked = "";
                        }
                      }
                  @endphp
                  <div class="columns col-lg-4 col-md-4">
                     <div class="planbox">
                        <input type="radio" name="subscription_id" id="plan{{ $plan->id }}" value="{{ $plan->id }}" {{ $checked ?? "" }}>
                        <label for="plan{{ $plan->id }}">
                           <ul class="price">
                              <li class="header" style="background-color:#df1256">
                                 {{ $plan->plan_name }}
                              </li>
                              <li class="grey">$ {{ $plan->plan_price }} {{ $plan->duration }}
                              </li>
                              @foreach ($plan->artist_plan_features as $plan_feature)
                              <li>No. of video:{{ $plan_feature->num_of_video }}</li>
                              <li>Number of statues: {{ $plan_feature->num_of_statues }}</li>
                              <li> Maximum exhibition: {{ $plan_feature->max_exhibition }}</li>
                              @endforeach
                           </ul>
                        </label>
                     </div>
                  </div>
                  @endforeach
                  @if ($errors->has('subscription_id'))
                  <span class="text-danger">{{ "Subscription plan is required" }}</span>
                  @endif
               </div>
               <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
               <input type="button" name="next" class="next action-button" value="Next" /> 
            </fieldset>
            <fieldset>
               <div class="form-card p-4">
                  <div class="row">
                     <div class="col-lg-12">
                        <h6 class="mb-1 text-maroon">Personal info</h6>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Company name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_name" value="{{ $artist->company_name }}">
                        @if ($errors->has('company_name'))
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone" value="{{ $artist->phone }}">
                        @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                     </div>

                     <div class="col-lg-6 mb-3">
                        <label>Date of birth <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="dob" value="{{$artist->dob }}">
                        @if ($errors->has('dob'))
                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Address </label>
                        <input type="text" class="form-control" name="address" value="{{ $artist->address }}">
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>City </label>
                        <input type="text" class="form-control" name="city" value="{{ $artist->city }}">
                        @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>State </label>
                        <input type="text" class="form-control" name="state" value="{{ $artist->state }}">
                        @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Country</label>
                        <input type="text" class="form-control" name="country" value="{{ $artist->country }}">
                        @if ($errors->has('country'))
                        <span class="text-danger">{{ $errors->first('country') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Artist type </label>
                        <div class="input-group">
                           <select name="artist_type" id="" class="form-control">
                              <option value="">Select artist type</option>
                              @foreach ($artist_types as $artist_type)
                                <option value="{{ $artist_type->id }}" {{ $artist->user_artist->artist_type  == $artist_type->id ? "selected" : "" }}>{{ $artist_type->artist_type }}</option>
                              @endforeach
                           </select>
                        </div>
                        @if ($errors->has('artist_type'))
                        <span class="text-danger">{{ $errors->first('artist_type') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Feature artist </label>
                        <div class="input-group">
                           <select name="feature_artist" id="" class="form-control">
                              <option value="">Select feature</option>
                              <option {{ $artist->user_artist->feature_artist == "X" ? "selected" : "" }} value="X">X</option>
                              <option {{ $artist->user_artist->feature_artist == "V" ? "selected" : "" }} value="V">V</option>
                           </select>
                        </div>
                        @if ($errors->has('feature_artist'))
                        <span class="text-danger">{{ $errors->first('feature_artist') }}</span>
                        @endif
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Image </label>
                        <div class="input-group">
                              <input type="file"  class="form-control text-center"name="image">
                           @if ($errors->has('image'))
                           <span class="text-danger">{{ $errors->first('image') }}</span>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
               <input type="button" name="next" class="next action-button" value="Next" /> 
            </fieldset>
            <fieldset>
               <div class="form-card p-4">
                  <div class="row">
                     <div class="col-lg-12">
                        <h6 class="mb-1 text-maroon">Others details</h6>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Bio </label>
                        <div class="input-group">
                           <textarea class="summernote form-control" placeholder="Enter the Location" name="bio">{{ $artist->bio }}</textarea>
                           @if ($errors->has('bio'))
                           <span class="text-danger">{{ $errors->first('bio') }}</span>
                           @endif
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Condition Report </label>
                        <div class="input-group">
                           <textarea  class="summernote form-control" placeholder="Enter the Location" name="condition_report" >{{ $artist->user_artist->condition_report }}</textarea>
                           @if ($errors->has('condition_report'))
                           <span class="text-danger">{{ $errors->first('condition_report') }}</span>
                           @endif
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3">
                        {{-- {{ dd($artist->user_artist->history_and_Provenance) }} --}}
                        <label>History and Provenance </label>
                        <div class="input-group">
                           <textarea  class="summernote form-control" placeholder="Enter the Location" name="history_and_Provenance" >{{ $artist->user_artist->history_and_Provenance }}</textarea>
                           @if ($errors->has('history_and_Provenance'))
                           <span class="text-danger">{{ $errors->first('history_and_Provenance') }}</span>
                           @endif
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Shipping Information </label>
                        <div class="input-group">
                           <textarea  class="summernote form-control" placeholder="Enter the Location" name="shipping_information" >{{ $artist->user_artist->shipping_information }}</textarea>
                           @if ($errors->has('shipping_information'))
                           <span class="text-danger">{{ $errors->first('shipping_information') }}</span>
                           @endif
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3">
                        <label>Payment and return Policies</label>
                        <div class="input-group">
                           <textarea  class="summernote form-control" placeholder="Enter the Location" name="payment_and_return_policies">{{ $artist->user_artist->payment_and_return_policies }}</textarea>
                           @if ($errors->has('payment_and_return_policies'))
                           <span class="text-danger">{{ $errors->first('payment_and_return_policies') }}</span>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
               <button type="submit" class="action-button"> Update</button>
            </fieldset>
      </form>
      </div>
   </div>
</div>
@endsection