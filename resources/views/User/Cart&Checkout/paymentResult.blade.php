@extends('User.Main.mainLayout')
@section('title', 'Result | Art360D')
@section('content')
<div class="success_main">
    <div class="container">
        <div class="success_main_inner">
            <img src="{{ asset('User/assets/images/tick-circle.png') }}" alt="">
            <h3>Thank You!</h3>
            <p>Your payment is successfully completed.</p>
        </div>
    </div>
</div>
@endsection