@extends('Admin.Master.masterLayout')
@section('title', 'Index-Blog|Art360')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Blogs</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="t-Body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                {{-- <th> Description</th> --}}
                                                
                                                <th>Image</th>
                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($blogs as $blog)
                                                <tr>
                                                    <td><span class="fw-bold text-primary">{{ $blog->title }}</span>
                                                    </td>
                                                   
                                                    {{-- <td><span
                                                            class="fw-bold text-primary">{{ $blog->description }}</span>
                                                    </td> --}}
                                                    <td>
                                                        <span class="fw-bold text-primary">
                                                            @if (!empty($blog->image))
                                                            <img src="{{ asset('storage/BlogImage/' . $blog->image) }}" height="200px" width="250px"
                                                                rel="noopener noreferrer" class="download-icon text-success" />
                                                        @else
                                                            <p class="text-danger">No Image</p>
                                                        @endif
                                                        </span>
                                                    </td>
                                                
                                                    <td>
                                                        <a title="Edit" href="{{ route('blogs.edit', $blog->slug) }}"
                                                            class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-pen" ></i>
                                                        </a>
                                                        <a title="View" href="{{ route('blogs.show', $blog->slug) }}"
                                                            class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-eye" ></i>
                                                        </a>
                                                        
                                                  
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                     
                    </div>
                   
                </div>
               
            </div>
        </div>
    </div>



@endsection