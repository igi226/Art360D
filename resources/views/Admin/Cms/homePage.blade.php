@extends('Admin.Master.masterLayout')
@section('title', 'Home-Cms | Art360')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Home-Cms</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="t-Body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                
                                                <th>Image</th>
                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($homePage as $cms)
                                                <tr>
                                                    <td><span class="fw-bold text-primary">{{ $cms->title }}</span>
                                                    </td>
                                                   
                                                    <td><span
                                                            class="fw-bold text-primary">{{ $cms->short_desc }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-bold text-primary">
                                                            @if (!empty($cms->image))
                                                            <img src="{{ asset('storage/CmsImage/' . $cms->image) }}" height="200px" width="250px"
                                                                rel="noopener noreferrer" class="download-icon text-success" />
                                                        @else
                                                            <p class="text-danger">No Image</p>
                                                        @endif
                                                        </span>
                                                    </td>
                                                
                                                    <td>
                                                        <a href="{{ route('cms.edit', $cms->slug) }}"
                                                            class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        
                                                  
                                                    </td>
                                                </tr>
                                            @endforeach
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
    </div>
@endsection

