@extends('User.Main.mainLayout')
@section('title', 'Checkout | Art360D')
@section('content')
<div class="gallery_details">

    <div class="container">
        <h3 class="artwork_auction">CHECKOUT</h3>
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                <div class="contact_left checkout_left">
                    <h2>Enter your shipping address & billing details.</h2>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone no">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email *</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone no">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address Line 1 *</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address Line 2 *</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">State *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter State">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Zip code *</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter State">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country *</label>
                                <select class="form-select form-group" aria-label="Default select example">
                                  <option selected>Select Country</option>
                                  <option value="1">India</option>
                                  <option value="2">America</option>
                                  <option value="3">Japan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Shipping method</label>
                                <select class="form-select form-group" aria-label="Default select example">
                                  <option selected>Select One</option>
                                  <option value="1">UPS</option>
                                  <option value="2">FedEx</option>
                                  <option value="3">Local Pickup</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="contact_right">
                    <h3>Order Summary</h3>
                    <div class="product_summery">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Subtotal</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>BCZ0002- By Baochun Huang Calligraphy</td>
                              <td>$25000</td>
                              <td><i class="fa fa-times" aria-hidden="true"></i></td>
                            </tr>
                            <tr>
                              <td>Discount</td>
                              <td>0(%)</td>
                            </tr>
                            <tr>
                              <td>Discount Amount</td>
                              <td>0</td>
                            </tr>
                            <tr>
                              <td>Shipping total</td>
                              <td>$0</td>
                            </tr>
                            <tr>
                              <td>Grand Total</td>
                              <td>$25000</td>
                            </tr>
                          </tbody>
                        </table>

                        <div class="coupon">
                            <form class="row g-3 ">
                              <div class="col-auto d-flex">
                                <input type="text" class="form-control" id="inputPassword2" placeholder="Coupon Code Here">
                                <button type="submit" class="btn btn-primary mb-3">Apply Coupon</button>
                              </div>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('user.payment') }}" class="btn btn-primary checkout">Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection