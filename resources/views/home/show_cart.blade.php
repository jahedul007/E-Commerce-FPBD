@extends('layout.master')
@section('title', 'Cart Show / Checkout')

@section('content')
<div class="cart">
    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-info my-3">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="col-12 col-md-6">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalprice = 0; ?>
                        @foreach ($carts as $index => $cart)
                            <tr>
                                <td>
                                    <a href="{{ route('home.product_details', $cart['product_id'] ?? '') }}"
                                        class="text-light">{{ $cart['product_title'] ?? '' }}</a>
                                </td>
                                <td>{{ $cart['quantity'] ?? 0 }}</td>
                                <td>{{ $cart['price'] ?? 0 }} TK</td>
                                <td>
                                    <img src="{{ isset($cart['image']) ? '/product/' . $cart['image'] : '' }}" alt=""
                                            style="height: auto; width:100px;">
                                </td>
                                <td>
                                    <form action="{{ route('home.remove_cart', $cart['product_id'] ?? '') }}" method="POST" onsubmit="return confirm('Are you sure to remove this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>

                            <?php $totalprice += $cart['price'] ?? 0; ?>
                        <form action="{{ route('home.cash_order') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Hidden inputs for passing product details to the controller -->
                            <input type="hidden" name="products[{{ $index }}][product_id]" value="{{ $cart['product_id'] ?? '' }}">
                            <input type="hidden" name="products[{{ $index }}][product_title]" value="{{ $cart['product_title'] ?? '' }}">
                            <input type="hidden" name="products[{{ $index }}][quantity]" value="{{ $cart['quantity'] ?? 0 }}">
                            <input type="hidden" name="products[{{ $index }}][price]" value="{{ $cart['price'] ?? 0 }}">
                            <input type="hidden" name="products[{{ $index }}][image]" value="{{ $cart['image'] ?? '' }}">
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <?php
                        $deliveryCharge = request()->input('delivery_charge', 0); // Assuming you get the delivery charge from the request
                        $finalTotalPrice = $totalprice + $deliveryCharge;
                    ?>
                    <h1 style="font-size: 25px; color:rgb(179, 5, 5); font-weight:600 ">Total Price: {{ $finalTotalPrice }} TK</h1>
                    <input type="hidden" name="total_price" value="{{ $finalTotalPrice }}">
                    <input type="hidden" name="delivery_charge" value="{{ $deliveryCharge }}">
                </div>
            </div>

            <div class="col-12 col-md-6 ">
                <h2 style="color: rgb(179, 5, 5); margin-bottom: 20px; font-size: 30px; font-weight:700;">Checkout</h2>
                <div class="checkout">

                    <div class="mt-4">
                        <label for="name" class="form-label"><span>Name / আপনার নাম লিখুন:</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="সম্পূর্ণ নামটি লিখুন" required>
                    </div>

                    <div class="mt-4">
                        <label for="mobile"><span>Mobile Number / আপনার মোবাইল নাম্বারটি লিখুন:</span></label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="১১ ডিজিটের মোবাইল নাম্বারটি লিখুন" required>
                    </div>

                    <div class="mt-4">
                        <label for="district"><span>District / জেলা সিলেক্ট করুন:</span></label>
                        <select id="district" class="form-control" name="district" required>
                            <option value="">Select your District</option>
                            @foreach ($location as $area)
                                <option value="{{ $area->district }}">{{ $area->district }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="thana"><span>Thana / থানা সিলেক্ট করুন:</span></label>
                        <select id="thana" class="form-control" name="thana" required>
                        <option value="">Select your Thana</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="delivery_charge"><span>Delivery Charge (TK):</span></label>
                        <input type="number" id="delivery_charge" name="delivery_charge" placeholder="Delivery Charge (TK)"
                               class="form-control" value="0" readonly required>
                    </div>

                    <div class="mt-4">
                        <label for="address"><span>Full Address / সম্পূর্ণ ঠিকানা:</span></label>
                        <textarea id="address" name="address" cols="30" rows="4" class="form-control"
                                  placeholder="রোড নাম্বার, বাড়ি নাম্বার, ফ্ল্যাট নাম্বার" required></textarea>
                    </div>

                    <div class="mt-4">
                        <label for="instructions"><span>Instructions / নির্দেশনা:</span></label>
                        <textarea id="instructions" class="form-control" name="instructions"
                                  placeholder="আপনার স্পেশাল কোন নির্দেশনা থাকলে এখানে লিখুন"></textarea>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-lg btn-success">Confirm and Submit your Order</button>
                    </div>
                    </form>
                </div>
            </div>

{{-- 
            <div class="text-center">
                <br>
                <h1>Proceed to Order</h1>
                <br>
                <form action="{{ route('home.cash_order') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Cash On Delivery</button>
                </form>
                <a href="" class="btn btn-outline-danger">Pay Using Bkash/ Nagad/ Rocket</a>
            </div> --}}



        </div>
    </div>
</div>







{{-- demo start --}}




{{-- demo end --}}

















<script>
    // Dynamic delivery charge calculation based on district
    document.getElementById('district').addEventListener('change', function () {
        const district = this.value;
        const deliveryChargeInput = document.getElementById('delivery_charge');

        if (district === 'Dhaka City') {
            deliveryChargeInput.value = 60;
        } else {
            deliveryChargeInput.value = 110;
        }
    });
</script>
@endsection
