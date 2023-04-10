@extends('User.Main.mainLayout')
@section('title', 'Cart-Details | Art360D')
@section('content')
    <div class="gallery_details">

        <div class="container">
            <h3 class="artwork_auction">SHOPPING CART</h3>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact_left checkout_left cart_table_outer">

                        <table class="table cart_table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <div class="cross"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    </td>
                                    <td scope=""><span><img src="{{ asset('User/assets/images/featured4.jpg') }}"
                                                alt=""></span></td>
                                    <td>BCZ0008 | by Baochun Huang Calligraphy</td>
                                    <td><b>₹3,450.00</b><strong>₹4,600.00</strong> </td>
                                    <td>
                                        <div class="calendar-input">

                                            <button class="minus_plus" type="button">-</button>
                                            <span class="number"> <span id="person_num" name="person_total"></span></span>
                                            <button class="plus_minus" type="button">+</button>

                                        </div>
                                    </td>
                                    <td>₹6,900.00</td>
                                </tr>
                                <tr>
                                    <td scope="row">
                                        <div class="cross"><i class="fa fa-times" aria-hidden="true"></i></div>
                                    </td>
                                    <td scope=""><span><img src="{{ asset('User/assets/images/g1.jpg') }}"
                                                alt=""></span></td>
                                    <td>BCZ0008 </td>
                                    <td><b>₹3,450.00</b><strong>₹4,600.00</strong> </td>
                                    <td>
                                        <div class="calendar-input">

                                            <button class="minus_plus" type="button">-</button>
                                            <span class="number"> <span id="person_num" name="person_total"></span></span>
                                            <button class="plus_minus" type="button">+</button>

                                        </div>
                                    </td>
                                    <td>₹6,900.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact_right">
                        <h3>Cart totals</h3>
                        <div class="product_summery">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BCZ0002- By Baochun Huang Calligraphy</td>
                                        <td>₹3,450.00</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>BCZ0002</td>
                                        <td>₹3,450.00</td>
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
                                        <td>₹6,900.00</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="coupon">
                                <form class="row g-3 ">
                                    <div class="col-auto d-flex">
                                        <input type="text" class="form-control" id="inputPassword2"
                                            placeholder="Coupon Code Here">
                                        <button type="submit" class="btn btn-primary mb-3">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <a href="{{ route('user.checkout') }}" class="btn btn-primary checkout">Proceed to checkout <i
                                class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('cartScript')
    <script>
        const plus = document.querySelector('.plus_minus'),
            minus = document.querySelector('.minus_plus');

        let number_el = document.getElementById('person_num');
        number_el.innerText = 1;

        plus.addEventListener('click', () => {
            let val = parseInt(number_el.innerText);
            if (val >= 12) {
                return;
            } else {
                number_el.innerText = ++val;
            }

        });

        minus.addEventListener('click', () => {
            let val = parseInt(number_el.innerText);
            if (val <= 1) {
                return;
            } else {
                number_el.innerText = --val;

            }


        });

        $(".payment_option h3").click(function() {
            $(".payment_inner").toggle();
        });
    </script>
@endsection
