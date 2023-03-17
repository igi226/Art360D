@extends('User.Main.mainLayout')
@section('title', 'No Page Found | Art360D')

@section('content')

<div class="container">
    <div class="text-center m-5">
        <div>
            <h1>No Page Found for <span class="text-danger">{{ Request::segment(1) }}</span> </h1><br>
            <a href="{{ url('/') }}" class="btn btn-danger btn-lg">Back To Home</a>
        </div>
    </div>
</div>
@endsection