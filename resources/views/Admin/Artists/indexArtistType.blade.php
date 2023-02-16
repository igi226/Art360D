@extends('Admin.Master.masterLayout')
@section('title', 'Artists types | Art360')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Artist types</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th> Type name</th>

                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($artisttypes as $artisttype)
                                                <tr>
                                                    <td><span
                                                            class="fw-bold text-primary">{{ $artisttype->artist_type }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('artisttypes.edit', $artisttype->id) }}"
                                                            class="btn btn-outline-primary btn-xs"><i
                                                                class="fas fa-pen"></i></a>
                                                        {{-- <a href="#" class="btn btn-outline-danger btn-xs"><i class="fas fa-trash"></i></a> --}}
                                                        @if (DB::table('user_artists')->where('artist_type', $artisttype->id)->first())
                                                        <button type="submit" class="btn btn-outline-danger btn-xs delete-icon" data-toggle="tooltip" title='Delete' onclick="deleteType()">
                                                                <i class="fas fa-trash"></i>
                                                        </button>
                                                        @else
                                                        <form method="POST"
                                                            action="{{ route('artisttypes.destroy', $artisttype->id) }}"
                                                            class="action-icon">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs delete-icon show_confirm"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @endif
                                                        
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
<!-- End Page-content -->
