@extends('Admin.Master.masterLayout')
@section('title', 'Artworks | Art360')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-shadow rounded-lg border">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Artworks</h4>
                                @if (Session::has('msg'))
                                    <p class="alert alert-info">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="t-Body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Created at</th>

                                                <th>Estimated value</th>
                                                <th width="80">On/Off Market</th>
                                                <th width="80">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($artworks as $artwork)
                                                <tr>
                                                    <td><span class="fw-bold text-primary">{{ $artwork->title }}</span>
                                                    </td>
                                                    @php
                                                        $image = DB::table('artwork_images')
                                                            ->where('artwork_id', $artwork->id)
                                                            ->latest('created_at')
                                                            ->first();
                                                    @endphp
                                                    @if (!empty($image->image))
                                                        <td><img style="height=120px !important; width:100px !important;"
                                                                src="{{ asset('storage/ArtworkImage/' . @$image->image) }}"
                                                                alt=""></td>
                                                    @else
                                                        <td><img style="height=120px !important; width:100px !important;"
                                                                src="{{ asset('noimg.png') }}" alt=""></td>
                                                    @endif





                                                    <td><span class="fw-bold text-primary">{{ $artwork->created_at }}</span>
                                                    </td>
                                                    <td><span class="fw-bold text-primary">{{ $artwork->price }}</span></td>
                                                    <td><span id="market-button{{ $artwork->id }}" class="fw-bold">
                                                            <button onclick="putOnOffMarket({{ $artwork->id }})" class="btn btn-sm {{ $artwork->on_market == 0 ? 'btn-danger' : 'btn-success' }}"
                                                                type="button">{{ $artwork->on_market == 0 ? 'Off market' : 'On market' }}
                                                            </button>
                                                        </span>
                                                    </td>


                                                    <td>
                                                        <a href="{{ route('artworks.edit', $artwork->id) }}" class="btn btn-outline-primary btn-xs">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-outline-success btn-xs">
                                                            {{-- {{ route("artworks.show", $artwork->id) }} --}}
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        <form action="#" {{-- {{ route('artworks-subjects.destroy', $artwork->id) }} --}} class="action-icon">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="button"
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
@section('artWorkIndex')

    <script>
        function putOnOffMarket(artwork_id) {
            
            swal({
                title: 'You are cganging the status, press Ok to confirm.',
                // text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/artworks/put-on-off-market') }}",
                        data: {
                            'id': artwork_id,
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "JSON",
                        success: function(response) {
                            swal(response.msg);
                            $("#market-button"+ artwork_id).load(window.location.href + " #market-button"+ artwork_id);
                        }

                    });
                } else if (result.isDenied) {
                    swal('Market status is not changed', '', 'info')
                }
            });
        }
    </script>

@endsection
