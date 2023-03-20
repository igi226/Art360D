@extends('Admin.Master.masterLayout')
@section('title', 'View-Artist | Art360')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Artist details</h4>
                        </div>
                    </div>
                </div>

                <div class="card custom-shadow rounded-lg border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <h2 class="fs-4 mb-1">{{ $specific_artist->first_name }} {{ $specific_artist->last_name }}
                                </h2>
                                <p class="mb-2">Email: <span class="fw-bold">{{ $specific_artist->email }}</span></p>
                                <p class="mb-2">Country: <span class="fw-bold">{{ $specific_artist->country }}</span></p>
                                <p class="mb-2">Company name: <span
                                        class="fw-bold">{{ $specific_artist->company_name }}</span></p>
                                <p class="mb-2">Phone: <span class="fw-bold">{{ $specific_artist->phone }}</span></p>
                                <p class="mb-2">Date of birth : <span class="fw-bold">{{ $specific_artist->dob }}</span>
                                </p>
                                <p class="mb-2">Address: <span class="fw-bold">{{ $specific_artist->address }}</span></p>
                                <p class="mb-2">City: <span class="fw-bold">{{ $specific_artist->city }}</span></p>
                                <p class="mb-2">State: <span class="fw-bold">{{ $specific_artist->state }}</span></p>

                                <p class="mb-2">Artist type: <span
                                        class="badge rounded-pill badge-soft-primary font-size-12">{{ $specific_artist->user_artist->type_artist->artist_type }}</span>
                                </p>
                                <p class="mb-2">Artist type: <span
                                        class="badge rounded-pill badge-soft-primary font-size-12">{{ $specific_artist->user_artist->feature_artist }}</span>
                                </p>

                                <h6 class="h5 text-primary">Bio:</h6>
                                <p><?php echo html_entity_decode(
                                    $specific_artist->bio
                                ); ?></p>

                                <h6 class="h5 text-primary">Condition Report:</h6>
                                <p><?php echo html_entity_decode(
                                    $specific_artist->user_artist
                                        ->condition_report
                                ); ?></p>

                                <h6 class="h5 text-primary">History and Provenance:</h6>
                                <p><?php echo html_entity_decode(
                                    $specific_artist->user_artist
                                        ->history_and_Provenance
                                ); ?></p>

                                <h6 class="h5 text-primary">Shipping Information:</h6>
                                <p><?php echo html_entity_decode(
                                    $specific_artist->user_artist
                                        ->shipping_information
                                ); ?></p>

                                <h6 class="h5 text-primary">Payment and return Policies:</h6>
                                <p><?php echo html_entity_decode(
                                    $specific_artist->user_artist
                                        ->payment_and_return_policies
                                ); ?></p>


                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="text-white-50 float-left">
                                    @if (isset($specific_artist->image) &&
                                            !empty($specific_artist->image) &&
                                            File::exists(public_path('storage/UserImage/' . $specific_artist->image)))
                                        <img height="200px" width="200px" class="rounded"
                                            src="{{ asset('storage/UserImage/' . $specific_artist->image) }}"
                                            alt="">
                                    @else
                                        <img height="80" width="100" src="{{ asset('noimg.png') }}" alt="no-p_image">
                                    @endif
                                    {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQX8o3jE89_DkZqgzPUm9XfPpZHMBiMirZqrlgwtF9q&s" height="200px" width="200px" class="rounded"> --}}

                                </div>
                                <div class="card congo-widget bg-primary text-white-50 custom-shadow rounded-lg border">
                                    <div class="card-body">
                                        @php
                                            foreach ($specific_artist->subscription_taken as $taken_sub) {
                                                if ($taken_sub->end_date > now()) {
                                                    $plan_name = $taken_sub->subscription_plan->plan_name;
                                                    $end_date = $taken_sub->end_date;
                                                    $price = $taken_sub->subscription_plan->plan_price;
                                                } else {
                                                    $plan_name = 'No Plan';
                                                }
                                            }
                                        @endphp
                                        <h3 class="text-white">Plan name:{{ $plan_name ?? 'No plan taken' }}</h3>
                                        <h5 class="mb-1 text-white">Plan cost: ${{ $price ?? '' }}</h5>
                                        <h5 class="text-white fs-6 mb-0">End date: {{ $end_date ?? '' }}</h5>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="raiseticketmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="raiseticketmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 modal-border">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase fw-bold" id="staticBackdropLabel">Raise a Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-2">
                                <label class="mb-0 font-size-13">Task Title</label>
                                <input type="text" class="form-control" name="">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-0 font-size-13">Task Description</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-0 font-size-13">Allocate time</label>
                                <input type="text" class="form-control " name="">
                            </div>
                            <div class="form-group text-end mt-3">
                                <button type="button" class="btn btn-primary custom-shadow w-100">Ticket Raise</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="completionmodal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="completionmodal1Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0 modal-border">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase fw-bold" id="staticBackdropLabel">Completion Status (Stage
                            1)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol class="activity-feed mb-0 ps-2">
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <p class="text-muted mb-1">UI Mockup Design</p>
                                    <p class="mt-0 mb-0"> <span class="text-primary d-block font-size-13">Update:
                                            10-08-2022</span></p>
                                </div>
                            </li>
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <p class="text-muted mb-1">HTML Design</p>
                                    <p class="mt-0 mb-0"> <span class="text-primary d-block font-size-13">Update:
                                            20-08-2022</span></p>
                                </div>
                            </li>
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <p class="text-muted mb-1">Database Creation</p>
                                    <p class="mt-0 mb-0"> <span class="text-primary d-block font-size-13">Update:
                                            22-08-2022</span></p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
