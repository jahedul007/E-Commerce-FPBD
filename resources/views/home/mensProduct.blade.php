@extends('layout.master')
@section('title', 'Products by Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="heading_container heading_center">
            <h2>
                Products in <span class="red">Mens</span>
            </h2>
        </div>



        <div class="row">
            @foreach ($products as $product)
            <div class="col-6 col-md-3">
                <div class="single-card">
                    <div class="img-area">
                        <a href="{{ route('home.product_details', $product->id) }}"><img src="/product/{{ $product->image }}" alt=""></a>
                        <div class="overlay">
                            <form action="{{ route('home.add_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4" style="margin-left: 34%;line-height: 0;" style="margin-left: 34%;line-height: 0;">
                                        <input type="number" name="quantity" value="1" min="1" style="border-radius: 5px;">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="add-to-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('home.product_details', $product->id) }}" class="view-details">Product Details</a>
                        </div>
                    </div>

                    <div class="info">
                        <h3>{{ $product->title }}</h3>
                        <h2 style="font-size: 14px; margin-top:7px; color:rgb(76, 172, 255);">
                            {{ $product->category }}
                        </h2>
                        <h2 style="font-size: 14px; margin-top:7px;">{{ $product->category_name }}</h2>
                        @if ($product->discount_price)
                            <h6 class="price-discount">TK {{ $product->discount_price }}</h6>
                            <h6 class="price-original">TK {{ $product->price }}</h6>
                        @else
                            <h6 class="price-original">TK {{ $product->price }}</h6>
                        @endif
                        <div class="custom-btn">
                            <div class="btn-11"><a href="{{ route('home.product_details', $product->id) }}" class="option1">Buy Now</a></div>
                            <div class="btn-11"></div>
                        </div>

                        {{-- <button class="btn-17">
                            <span class="text-container">
                                <span class="text">
                                    <a href="{{ route('home.product_details', $product->id) }}" class="option1">Buy Now</a>
                                </span>
                            </span>
                        </button> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination">
            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>

@endsection
