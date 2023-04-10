@extends('User.Main.mainLayout')
@section('title', 'Checkout | Art360D')
@section('content')
<div class="gallery_details">

    <div class="container">
        <h3 class="artwork_auction">Choose a payment option</h3>
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <div class="contact_right">
                    <h3>Payment Summary</h3>
                    <p>Payable Now - ₹3450</p>
                    <i>Transaction Id: 8499_230404:89</i>
                    <div class="product_summery">
                        <div class="payment_option">
                            <h3><i class="fa fa-credit-card" aria-hidden="true"></i> Cards (Credit/Debit)  <i class="fa fa-angle-right" aria-hidden="true"></i></h3>
                            <span>Pay using any credit or debit card</span>
                            <div class="payment_inner contact_left ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Card Number</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Card Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expiry</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CVV</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter CVV">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name on Card</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name on Card">
                                        </div>
                                    </div>
                                    <a href="{{ route('user.paymentResult') }}" class="btn btn-primary checkout">Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="payment_option">
                            <h3><i class="fa fa-university" aria-hidden="true"></i> Net Banking  <i class="fa fa-angle-right" aria-hidden="true"></i></h3>
                            <span>Pay using any of 47 supported banks</span>
                            <div class="payment_inner contact_left ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Bank</label>
                                            <select class="form-select form-group" aria-label="Default select example">
                                              <option selected>Select Bank</option>
                                              <option value="1">SBI</option>
                                              <option value="2">Bank Of Baroda</option>
                                              <option value="3">AXIS Bank</option>
                                            </select>
                                            <i>You will be redirected to bank's page. Login with netbanking ID and password to complete transaction.</i>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('user.paymentResult') }}" class="btn btn-primary checkout">Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
                
    </div>
</div>
@endsection