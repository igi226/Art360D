@extends('Admin.Master.masterLayout')
@section('title', 'view-Blog|Art360')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Blog details</h4>
                    </div>
                </div>
            </div>

            <div class="card custom-shadow rounded-lg border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mb-3">
                            <h2 class="fs-4 mb-1">{{ $blog->title }}
                            </h2>
                            

                            <h6 class="h5 text-primary">Description:</h6>
                            <p><?php echo html_entity_decode(
                                $blog->description
                            ); ?></p>


                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="text-white-50 float-left">
                                @if (isset($blog->image) &&
                                        !empty($blog->image) &&
                                        File::exists(public_path('storage/BlogImage/' . $blog->image)))
                                    <img height="200px" width="200px" class="rounded"
                                        src="{{ asset('storage/BlogImage/' . $blog->image) }}"
                                        alt="">
                                @else
                                    <img height="80" width="100" src="{{ asset('noimg.png') }}" alt="no-p_image">
                                @endif
                                

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