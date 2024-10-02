<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">


          <div>
            <form action="{{ route('home.searchProduct') }}" method="GET">
                @csrf

                <input style="width:500px" type="text" name="search" placeholder="Search for anything">
                <input type="submit" value="search">
            </form>
          </div>


       </div>
       <div class="row">

        @foreach ($products as $product)

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
                <div class="option_container">
                    <div class="options">
                      <a href="{{ route('home.product_details', $product->id) }}" class="option1">
                          Product Details
                        </a>
                        <form action="{{ route('home.add_cart', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="number" name="quantity" value="1" min="1">
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Add To Cart">
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
                <div class="img-box">
                    <a href="{{ route('home.product_details', $product->id) }}"><img src="/product/{{ $product->image }}" alt=""></a>
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->title }}
                    </h5>

                    @if ($product->discount_price!=null)

                    <h6 style="color:red">
                        Dicount Price
                        <br>
                        {{ $product->discount_price }}
                    </h6>

                    <h6 style="color: blue; text-decoration: line-through " >
                        Price
                        <br>
                        {{ $product->price }}
                    </h6>

                    @else

                    <h6 style="color: blue" >
                        Price
                        <br>
                        {{ $product->price }}
                    </h6>

                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>

 <span style="padding: 20px">
    {!!$products->WithQueryString()->links('pagination::bootstrap-5')!!}
 </span>

    </div>
 </section>
