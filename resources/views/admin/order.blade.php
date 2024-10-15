<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="text-center">All Orders</h1>

                    <div class="my-3 mx-3">
                        <form action="{{ route('admin.search') }}" method="GET">
                            @csrf
                            <input type="text" name="search" placeholder="Search for something..." style="color: red">
                            <input type="submit" value="search" name="" id="" class="btn btn-success">
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name <br> <br> Phone <br><br>Email</th>
                                    <th scope="col">Address <br><br>Thana <br><br> district</th>
                                    <th>Date & Time</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Quantity <br> <br>Product Code</th>
                                    <th scope="col">Price <br><br>Delivery Charge</th>
                                    <th scope="col">Payment Status <br> <br> Delivery Status</th>
                                    <th scope="col">Image</th>
                                    <th>Delivered <br> <br>PDF Download <br> <br>Send Email</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($orders as $order)
                                    <tr>
                                        <th>{{ $order->name }} <br><br>

                                            {{ $order->phone }} <br> <br>

                                            {{ $order->email }}
                                        </th>
                                        <th>
                                            {{ $order->address }} <br> <br>
                                            {{ $order->thana }} <br> <br>
                                            {{ $order->district }}
                                        </th>
                                        <th>{{ $order->created_at }}</th>
                                        <th>{{ $order->product_title }}</th>
                                        <th>{{ $order->quantity }} <br><br> {{$order->product_code}}</th>
                                        <th>
                                            {{ $order->price }} <br> <br>
                                            {{ $order->delivery_charge }}
                                        </th>
                                        <th>
                                            {{ $order->payment_status }} <br><br>
                                            {{ $order->delivery_status }}
                                        </th>
                                        <td>
                                            {{-- <img src="/product/{{ $order->image }}" alt=""> --}}
                                            <img src="{{ asset('product/'.$order->product_image) }}" alt="">
                                        </td>
                                        <td>

                                            @if ($order->delivery_status=='processing')

                                            <a href="{{ route('admin.ontheway', $order->id) }}" class="btn btn-warning">On The Way</a>

                                            @elseif ($order->delivery_status=='on_the_way')

                                            <a href="{{ route('admin.delivered', $order->id) }}" class="btn btn-success" onclick="return confirm('Are you sure to delivered this PRODUCT')">Delivered</a>

                                            @else

                                            <p>Delivered Compeleted</p>

                                            @endif

                                            <br><br>
                                            <a href="{{ route('admin.pdf',$order->id) }}" class="btn btn-success">Download PDF</a>

                                            <br><br>
                                            <a href="{{ route('admin.emailInfo',$order->id) }}" class="btn btn-info">Send Email</a>

                                        </td>
                                    </tr>


                                    @empty

                                    <div>

                                    <a href="{{ route('admin.order') }}" class="form-control btn btn-info my-3 text-sm" >No Data Found... Back -> order list</a>

                                    </div>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
</body>

</html>
