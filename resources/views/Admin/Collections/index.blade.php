@extends('Admin.Master.masterLayout')
@section('title', 'Collection | Art360')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Collections</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="t-Body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                {{-- <th>Image</th> --}}
                                                <th>Create at</th>
                                                <th>Status</th>
                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            @foreach ($collections as $collection)
                                                <tr>
                                                    <td><span class="fw-bold text-primary">{{ $collection->name }}</span>
                                                    </td>
                                                    {{-- <td><img height="80px" width="80px"
                                                            src="{{ asset('storage/CollectionImage/' . $collection->image) }}"
                                                            alt=""></td> --}}
                                                    <td><span
                                                            class="fw-bold text-primary">{{ $collection->created_at }}</span>
                                                    </td>
                                                   
                                                    <td onclick="changeCollectionStatus('{{ $collection->slug }}')">
                                                        <span class="fw-bold {{ $collection->status == 1 ? 'text-primary' : 'text-danger' }}">
                                                           
                                                                {{ $collection->status == 1 ? 'Published' : 'Unpublished' }}
                                                            
                                                           
                                                        </span>
                                                    </td>
                                                
                                                    <td>
                                                        <a href="{{ route('collections.edit', $collection->slug) }}"
                                                            class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('collections.destroy', $collection->slug) }}"
                                                            class="action-icon">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs delete-icon show_confirm"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        {{-- @endif --}}

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

@section('changeCollectionStatus')
    <script>
        function changeCollectionStatus(collection_slug) {
            swal({

                    title: `Are you sure to change the status?`,
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: "POST",
                            url: "{{ url('admin/collections/changeS') }}",
                            data: {
                                'slug': collection_slug,
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "JSON",
                            success: function(response) {
                                // $('#t-Body').load(' #t-Body')
                                // $("#t-Body").load(window.location.href + " #t-Body" );
                                location.reload();
                            }
                        });
                    } else {
                        swal.fire("Your data file is safe!");
                    }
                });
        }
    </script>
@endsection
