@extends('Admin.Master.masterLayout')
@section('title', 'Artists | Art360')
@section('content')
<div class="main-content">
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-12">
            <div class="card custom-shadow rounded-lg border">
               <div class="card-body">
                  <h4 class="card-title mb-4">Artists</h4>
                  @if (Session::has('msg'))
                     <p class="alert alert-info">{{ Session::get('msg') }}</p>
                  @endif
                  <div class="">
                     <table id="datatable" class="table table-bordered dt-responsive nowrap">
                        <thead class="thead-light">
                           <tr>
                              <th> Name</th>
                              <th>Join date</th>
                              <th>Artist type</th>
                              <th>Feature artst</th>
                              <th width="80">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($artists as $artist)
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                   
                                    <div class="flex-grow-1 ms-3">
                                       <div>{{ $artist->first_name }} {{ $artist->last_name }}</div>
                                    </div>
                                 </div>
                              </td>
                              <td> {{$artist->created_at->toDayDateTimeString() }}</td>
                              {{-- @php
                                  $type_name = DB::table("artist_types")->where("id",$artist->user_artist->artist_type)->select("artist_type")->first();
                              @endphp --}}
                              <td>{{ $artist->user_artist->type_artist->artist_type }}</td>
                              <td><span class="badge rounded-pill badge-soft-primary font-size-12">{{ @$artist->user_artist->feature_artist }}</span>
                              </td>
                              <td>
                                <a href="{{ route("artists.show", $artist->id) }}" class="btn btn-success btn-xs"><i class="far fa-eye"></i></a>
                                <a href="{{ route("artists.edit", $artist->id) }}" class="btn btn-outline-primary btn-xs"><i class="fas fa-pen"></i></a>
                              <form method="POST" action="{{ route('artists.destroy', $artist->id) }}" class="action-icon">
                                 @csrf
                                 <input name="_method" type="hidden" value="DELETE">

                                 <button type="submit" class="btn btn-outline-danger btn-xs delete-icon show_confirm" data-toggle="tooltip" title='Delete'>

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
<!-- End Page-content -->