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
                <form action="{{ route('home.cash_order') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Product Title</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>

                        <?php $totalprice = 0; ?>

                        @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <a href="{{ route('home.product_details', $cart->product_id) }}"
                                        class="text-light">{{ $cart->product_title }}</a>
                                </td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->price }} TK</td>
                                <td><img src="/product/{{ $cart->image }}" alt=""
                                        style="height: auto; width:100px;">
                                </td>
                                <td><a href="{{ route('home.remove_cart', $cart->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to Remove this Product')">Remove Product</a>
                                </td>
                            </tr>

                            <?php $totalprice = $totalprice + $cart->price; ?>
                        @endforeach

                    </tbody> --}}

                    <tbody>
                        <?php $totalprice = 0; ?>

                        @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <a href="{{ route('home.product_details', isset($cart['product_id']) ? $cart['product_id'] : '') }}"
                                        class="text-light">{{ isset($cart['product_title']) ? $cart['product_title'] : '' }}</a>
                                </td>
                                <td>{{ isset($cart['quantity']) ? $cart['quantity'] : 0 }}</td>
                                <td>{{ isset($cart['price']) ? $cart['price'] : 0 }} TK</td>
                                <td><img src="{{ isset($cart['image']) ? '/product/' . $cart['image'] : '' }}" alt=""
                                        style="height: auto; width:100px;">
                                </td>
                                <td>
                                    <a href="{{ route('home.remove_cart', $cart['product_id'] ?? '') }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to Remove this Product')">Remove Product</a>
                                </td>
                            </tr>

                            <?php $totalprice += $cart['price'] ?? 0; ?>
                        @endforeach

                    </tbody>



                </table>
            </div>

            {{-- <div class="col-12 col-md-6">
                <h2>Checkout</h2>

                <form action="{{ route('admin.order') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden">

                    <div class="mt-3">
                        <label for="name" class="form-label">Name: / আপনার নাম লিখুন:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="সম্পূর্ণ নামটি লিখুন" required>
                    </div>

                    <div class="mt-3">
                        <label for="mobile">আপনার মোবাইল নাম্বারটি লিখুন: / Mobile Number:</label>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="১১ ডিজিটের মোবাইল নাম্বারটি লিখুন" required>
                    </div>

                    <div class="mt-3">
                        <label for="district">District / জেলা সিলেক্ট করুন:</label>
                        <select id="district" class="form-control" name="district" required>
                            <option value="">Select your District</option>
                            @foreach ($location as $area)
                                <option value="{{ $area->district }}">{{ $area->district }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="thana">Thana / থানা সিলেক্ট করুন:</label>
                        <select id="thana" class="form-control" name="thana" required>
                            <option value="">Select your Thana</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="delivery_charge">Delivery Charge (TK)</label>
                        <input type="number" id="delivery_charge" name="delivery_charge" placeholder="Delivery Charge (TK)"
                               class="form-control" value="0" readonly required>
                    </div>


                    <div class="mt-3">
                        <label for="address">Full Address / সম্পূর্ণ ঠিকানা:</label>
                        <textarea id="address" name="address" cols="30" rows="4" class="form-control" placeholder="রোড নাম্বার, বাড়ি নাম্বার, ফ্ল্যাট নাম্বার" required></textarea>
                    </div>


                    <div class="mt-3">
                        <label for="instructions">Instructions / নির্দেশনা:</label>
                    <textarea id="instructions" class="form-control" name="instructions" placeholder="আপনার স্পেশাল কোন নির্দেশনা থাকলে এখানে লিখুন"></textarea>
                    </div>
                </form>

            </div> --}}

            <div class="col-12 col-md-6">
                <h2>Checkout</h2>
                    <div class="mt-3">
                        <label for="name" class="form-label">Name: / আপনার নাম লিখুন:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="সম্পূর্ণ নামটি লিখুন" required>
                    </div>

                    <div class="mt-3">
                        <label for="mobile">আপনার মোবাইল নাম্বারটি লিখুন: / Mobile Number:</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="১১ ডিজিটের মোবাইল নাম্বারটি লিখুন" required>
                    </div>

                    <div class="mt-3">
                        <label for="district">District / জেলা সিলেক্ট করুন:</label>
                        <select id="district" class="form-control" name="district" required>
                            <option value="">Select your District</option>
                            @foreach ($location as $area)
                                <option value="{{ $area->district }}">{{ $area->district }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="thana">Thana / থানা সিলেক্ট করুন:</label>
                        <select id="thana" class="form-control" name="thana" required>
                            <option value="">Select your Thana</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="delivery_charge">Delivery Charge (TK)</label>
                        <input type="number" id="delivery_charge" name="delivery_charge" placeholder="Delivery Charge (TK)"
                               class="form-control" value="0" readonly required>
                    </div>

                    <div class="mt-3">
                        <label for="address">Full Address / সম্পূর্ণ ঠিকানা:</label>
                        <textarea id="address" name="address" cols="30" rows="4" class="form-control" placeholder="রোড নাম্বার, বাড়ি নাম্বার, ফ্ল্যাট নাম্বার" required></textarea>
                    </div>

                    <div class="mt-3">
                        <label for="instructions">Instructions / নির্দেশনা:</label>
                        <textarea id="instructions" class="form-control" name="instructions" placeholder="আপনার স্পেশাল কোন নির্দেশনা থাকলে এখানে লিখুন"></textarea>
                    </div>

                    <div class="text-center">
                        <br>
                        <h1>Proceed to Order</h1>
                        <br>
                        <button type="submit" class="btn btn-outline-danger">Submit Order</button>
                    </div>
                </form>
            </div>







            <div>
                <h1 class="text-end">Total Price: {{ $totalprice }} TK</h1>
            </div>

            <div class="text-center">
                <br>
                <h1>Procees to Order</h1>
                <br>
                <a href="{{ route('home.cash_order') }}" class="btn btn-outline-danger">Cash On Delivery</a>
                <a href="" class="btn btn-outline-danger">Pay Using Bkash/ Nagad/ Rocket</a>

            </div>
        </div>
    </div>
</div>




@endsection

