@extends('Admin.Master.masterLayout')
@section('title', 'Dashboard|Art360')

@section("content")
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="row h-100">
                        <div class="col-md-6 col-xl-4">
                            <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="font-size-15 text-uppercase mb-0">Buyers</h5>
                                        <div class="avatar-xs">
                                            <span
                                                class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                                <i class="fas fa-hands-helping text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="font-size-24">5</h3>
                                    <p class="text-muted mb-0">List of registered Buyers</p>
                                </div>
                                <!-- end card-body -->
                                <!-- Project chart -->
                                <div id="project-chart"></div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-->
                        <div class="col-md-6 col-xl-4">
                            <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="font-size-15 text-uppercase mb-0">Gallerists</h5>
                                        <div class="avatar-xs">
                                            <span
                                                class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                                <i class="fas fa-laptop-code  text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="font-size-24">2</h3>
                                    <p class="text-muted mb-0">List of registered Gallerist</p>
                                </div>
                                <!-- end card-body -->
                                <!-- user chart -->
                                <div id="ongoing-chart"></div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col-->
                        <div class="col-xl-4">
                            <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="font-size-15 text-uppercase mb-0">Artists</h5>
                                        <div class="avatar-xs">
                                            <span
                                                class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                                <i class="far fa-thumbs-up text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h3 class="font-size-24">{{ $total_artist }}</h3>
                                    <p class="text-muted mb-0">List of Registered Artists</p>
                                </div>
                                <!-- end card-body -->
                                <!-- order chart -->
                                <div id="completed-chart"></div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row-->


            <!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-shadow rounded-lg border">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Recent Projects Status</h4>
                            <div class="">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Assign Date</th>
                                            <th>Total Cost</th>
                                            <th>Status</th>
                                            <th width="80">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded bg-primary text-light font-size-20 mini-stat-icon">
                                                            <i class="fas fa-laptop-code"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>eSprayMe</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 05-06-2022</td>
                                            <td>$6000.00</td>
                                            <td><span
                                                    class="badge rounded-pill badge-soft-primary font-size-12">In
                                                    progress</span>
                                            </td>
                                            <td><a href="project-details.php"
                                                    class="btn btn-outline-primary btn-sm">View Details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded bg-primary text-light font-size-20 mini-stat-icon">
                                                            <i class="fas fa-laptop-code"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>Esycles</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 05-06-2022</td>
                                            <td>$6000.00</td>
                                            <td><span
                                                    class="badge rounded-pill badge-primary font-size-12">Completed</span>
                                            </td>
                                            <td><a href="project-details.php"
                                                    class="btn btn-outline-primary btn-sm">View Details</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title rounded bg-primary text-light font-size-20 mini-stat-icon">
                                                            <i class="fas fa-laptop-code"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div>eSprayMe</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 05-06-2022</td>
                                            <td>$6000.00</td>
                                            <td><span
                                                    class="badge rounded-pill badge-soft-primary font-size-12">In
                                                    progress</span>
                                            </td>
                                            <td><a href="project-details.php"
                                                    class="btn btn-outline-primary btn-sm">View Details</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end col -->
        </div>
    </div>

    
    </footer>
</div>
@endsection