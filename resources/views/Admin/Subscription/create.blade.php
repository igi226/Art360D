@extends('Admin.Master.masterLayout')
@section('title', 'Subscriptions-create | Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                   <h4 class="mb-0">Subscription</h4>
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">create</a></li>
                         <li class="breadcrumb-item active">Subscription</li>
                      </ol>
                   </div>
                </div>
             </div>
          </div>
  
          <div class="card custom-shadow rounded-lg border">
              <div class="card-body">
                <form action="{{ route("subscriptions.store") }}" method="POST">
                  @csrf
                   <div class="row justify-content-center">
                      <div class="col-lg-9">
                        @if (Session::has('msg'))
                           <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                      </div>
                      <div class="col-lg-10">
                         <div class="mt-3">
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Plan name:<span class="text-danger">*</span></label>
                                  <div class="col-lg-6">
                                     <input type="text" class="form-control font-size-13 custom-shadow" name="plan_name">
                                     @if ($errors->has('plan_name'))
                                        <span class="text-danger">{{ $errors->first('plan_name') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Price($):<span class="text-danger">*</span></label>
                                  <div class="col-lg-6">
                                     <input type="number" class="form-control font-size-13 custom-shadow" name="plan_price">
                                     @if ($errors->has('plan_price'))
                                        <span class="text-danger">{{ $errors->first('plan_price') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">Duration:<span class="text-danger">*</span></label>
                                  <div class="col-lg-6">
                                   <select class="form-control font-size-13 custom-shadow" name="duration">
                                    <option value="Per Year">Per Year</option>
                                    <option value="Per Month">Per Month</option>
                                   </select>
                                     @if ($errors->has('duration'))
                                        <span class="text-danger">{{ $errors->first('duration') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div class="form-group mb-3">
                               <div class="row align-items-center">
                                  <label class="col-lg-3 fw-bold font-size-13">This plan is for: <span class="text-danger">*</span></label>
                                  <div class="col-lg-6">
                                     <select class="form-control font-size-13 custom-shadow" name="user_type" id="user-type">
                                        <option value="">select user type</option>
                                        <option value="gallerist">Gallerist</option>
                                        <option value="buyer">Buyer</option>
                                        <option value="artist">Artist</option>
                                     </select>
                                     @if ($errors->has('user_type'))
                                        <span class="text-danger">{{ $errors->first('user_type') }}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                            <div id="plan-feature">
                                
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
               
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
@section('showDivUserType')
<script>
    $(document).ready(function(){
    $('#user-type').on('change', function(){
    	var demovalue = $(this).val();
        // alert(demovalue)
        if(demovalue == "artist"){
            subscription_feature_form = '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">No. of video:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_video"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">No. of statues:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_statues"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Maximum No. of exhibition:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="max_exhibition"></div></div></div>';
        }else if(demovalue == "buyer") {
            subscription_feature_form = '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Buyer:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_video"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">No. of statues:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_statues"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Maximum No. of exhibition:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="max_exhibition"></div></div></div>';

        }else if(demovalue == "gallerist") {
            subscription_feature_form = '<div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">gallerist:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_video"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">No. of statues:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="num_of_statues"></div></div></div><div class="form-group mb-3"><div class="row align-items-center"><label class="col-lg-3 fw-bold font-size-13">Maximum No. of exhibition:</label><div class="col-lg-6"><input type="number" class="form-control font-size-13 custom-shadow" name="max_exhibition"></div></div></div>';
        }else {
            subscription_feature_form = "";

        }
        $('#plan-feature').html(subscription_feature_form);


    });
});
</script>
@endsection