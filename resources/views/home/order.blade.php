@extends('layout.master')
@section('title', 'Your Orders')

@section('content')
<div class="container">
    <h2>Your Orders</h2>



    @if ($orders->count()==0)  <!-- Check if the collection is empty -->
        <p>No orders found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{ route('home.product_details', $order->id) }}" class="text-dark">{{ $order->product_title }}</a></td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }} TK</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img src="{{ asset('product/' . $order->product_image) }}" alt="{{ $order->product_title }}" style="width: 100px; height: auto;">                        </td>
                        <td>

                            @if ($order->delivery_status=='processing')


                            <a href="{{ route('home.cancel_order', $order->id) }}" onclick="return confirm('Are you sure to Cancel this Order!!!')" class="btn btn-outline-danger">Cancel Order</a>


                            @else

                            <p>Not Allowed</p>

                            @endif
                          </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
