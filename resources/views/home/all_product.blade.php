@extends('layout.master')
@section('title', 'All Products')

@section('content')

<div class="hero_area">
    <!-- header section strats -->

{{-- new edit item --}}

<div class="container-fuild">
    <div class="row">
        <div class="heading_container heading_center">
            <h2>
               All <span class="red">Products in One Place</span>
            </h2>
            <br> <br>
            <div>
              <form action="{{ route('home.productSearch') }}" method="GET">
                  @csrf

                  <input style="width:450px; text-align:center;" type="text" name="search" placeholder="Search for anything">
                  <input type="submit" value="search">
              </form>
            </div>
         </div>




         <div class="row">
            @foreach ($products as $product)
            <div class="col-6 col-md-3">

                <div class="single-card">
                    <div class="img-area">
                        <a href="{{ route('home.product_details', $product->id) }}"><img src="/product/{{ $product->image }}" alt=""></a>
                      <div class="overlay">
                        {{-- <button class="add-to-cart">Add to Cart</button> --}}
                        <form action="{{ route('home.add_cart', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4" style="margin-left: 34%;line-height: 0;" >
                                    <input type="number" name="quantity" value="1" min="1" style="border-radius: 5px;">
                                </div>
                                <div class="col-md-8">
                                    {{-- <input type="submit" value="Add To Cart"> --}}
                                    <button  type="submit" class="add-to-cart">Add to Cart</button>
                                </div>
                            </div>
                        </form>
                        {{-- <button class="view-details">View Details</button> --}}
                        <a href="{{ route('home.product_details', $product->id) }}" class="view-details">Product Details</a>
                      </div>
                    </div>

                    <div class="info">
                      <h3>
                        {{ $product->title }}
                    </h3>
                    <h2 style="font-size: 14px; margin-top:7px;">
                        {{ $product->category }}
                    </h2>
                    @if ($product->discount_price != null)
                    <h6 class="price-discount">TK
                        {{ $product->discount_price }}
                    </h6>

                    <h6 class="price-original">TK
                        {{ $product->price }}
                    </h6>
                @else
                    <h6 class="price-original">TK
                        {{ $product->price }}
                    </h6>
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


    </div>
</div>


<section class="product_section layout_padding">
    <div class="container">
       <div class="row">

    </div>

 <span style="padding: 20px">
    {!!$products->WithQueryString()->links('pagination::bootstrap-5')!!}
 </span>

    </div>
 </section>




@endsection
