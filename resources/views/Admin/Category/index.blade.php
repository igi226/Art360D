@extends('Admin.Master.masterLayout')
@section('title', 'artwork-category | Art360')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Artwork category</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="t-Body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                
                                                <th>Create at</th>
                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td><span class="fw-bold text-primary">{{ $category->name }}</span>
                                                    </td>
                                                   
                                                    <td><span
                                                            class="fw-bold text-primary">{{ $category->created_at }}</span>
                                                    </td>
                                                   
                                                
                                                    <td>
                                                        <a href="{{ route('artwork-category.edit', $category->slug) }}"
                                                            class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('artwork-category.destroy', $category->slug) }}"
                                                            class="action-icon">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs delete-icon show_confirm"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                  
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

