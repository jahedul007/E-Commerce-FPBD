@extends('layout.master')
@section('title', 'Product Details')

@section('content')

<div class="hero_area">
    <!-- slider section -->
    @include('home.slider')
    <!-- end slider section -->
</div>

<!-- product section -->
@include('home.product')
<!-- end product section -->

{{-- Couple Section  --}}


<div class="couple_area">
    <div class="container-fulid">
        <div class="row">
            <div class="heading_container heading_center">
                <h2>
                    Products in <span class="red">Couple Rings/ Bracelets/ Locket</span>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="container-btn">
                <a href="{{ route('home.coupleProduct') }}">
                    <span>View All</span>
                </a>
            </div>
            @foreach ($products_couple as $product)
            <div class="col-6 col-lg-2 col-md-3 col-sm-2">
                <div class="single-cards">
                    <div class="img-area">
                        <a href="{{ route('home.product_details', $product->id) }}"><img
                                src="/product/{{ $product->image }}" alt=""></a>
                        <div class="overlay">
                            <form action="{{ route('home.add_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4" style="margin-left: 34%;line-height: 0;"
                                        style="margin-left: 34%;line-height: 0;">
                                        <input type="number" name="quantity" value="1" min="1"
                                            style="border-radius: 5px;">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="add-to-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('home.product_details', $product->id) }}"
                                class="view-details">Product Details</a>
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
                    <div class="btn-10"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i>Buy Now</a></div>
                </div>

                    <div class="btn-my"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a></div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>




<div class="girl_area">
    <div class="container-fulid">
        <div class="row">
            <div class="heading_container heading_center">
                <h2>
                    Girls All <span class="red">Products</span>
                </h2>
            </div>
        </div>



        <div class="row">

            <div class="container-btn">
                <a href="{{ route('home.girlsProduct') }}">
                    <span>View All</span>
                </a>
            </div>

            @foreach ($products_girls as $product)
            <div class="col-6 col-lg-2 col-md-3">
                <div class="single-cards">
                    <div class="img-area">
                        <a href="{{ route('home.product_details', $product->id) }}"><img
                                src="/product/{{ $product->image }}" alt=""></a>
                        <div class="overlay">
                            <form action="{{ route('home.add_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4" style="margin-left: 34%;line-height: 0;"
                                        style="margin-left: 34%;line-height: 0;">
                                        <input type="number" name="quantity" value="1" min="1"
                                            style="border-radius: 5px;">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="add-to-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('home.product_details', $product->id) }}"
                                class="view-details">Product Details</a>
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
                    <div class="btn-10"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i>Buy Now</a></div>
                </div>

                    <div class="btn-my"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a></div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>





<div class="mens_area">

    <div class="container-fulid">
        <div class="row">
            <div class="heading_container heading_center">
                <h2>
                    Mens All <span class="red">Products</span>
                </h2>
            </div>
        </div>


        <div class="row">
            <div class="container-btn">
                <a href="{{ route('home.mensProduct') }}">
                    <span>View All</span>
                </a>
            </div>
            @foreach ($products_mens as $product)
            <div class="col-6 col-lg-2 col-md-3">
                <div class="single-cards">
                    <div class="img-area">
                        <a href="{{ route('home.product_details', $product->id) }}"><img
                                src="/product/{{ $product->image }}" alt=""></a>
                        <div class="overlay">
                            <form action="{{ route('home.add_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4" style="margin-left: 34%;line-height: 0;"
                                        style="margin-left: 34%;line-height: 0;">
                                        <input type="number" name="quantity" value="1" min="1"
                                            style="border-radius: 5px;">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="add-to-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('home.product_details', $product->id) }}"
                                class="view-details">Product Details</a>
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
                    <div class="btn-10"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i>Buy Now</a></div>
                </div>

                    <div class="btn-my"><a href="{{ route('home.product_details', $product->id) }}" class="option1"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a></div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<!-- why section -->
<!-- @include('home.why') -->
<!-- end why section -->



<!-- client section -->
@include('home.reviewSlider')
<!-- end client section -->
<!-- footer start -->

@endsection