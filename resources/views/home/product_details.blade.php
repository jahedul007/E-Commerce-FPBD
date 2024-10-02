@extends('layout.master')
@section('title', 'Product Details')

@section('content')



    <div class="product-item">
        <div class="container">
            @if (Session::has('success'))
                <div class="btn-17 mb-4">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="floating-img">
                        <ion-icon class="close-icon" name="close-outline"></ion-icon>

                        <button class="btn-swipe btn-swipe-left">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </button>
                    </div>

                    <div class="left-imgs">
                        <img class="main-img" alt="product image" src="/product/{{ $products->image }}" />
                        <div class="thumbnails">
                            @foreach ($images as $image)
                                <div class="thumb-img active-thumb">
                                    <img alt="{{ $image->image }}" src="/product_images/{{ $image->image }}" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="right-text">
                        <span class="heading-secondarys">Product Category: {{ $products->category }}</span>
                        <h1 class="heading-primary"> {{ $products->title }}</h1>
                        <p class="description">
                            Product Details :{{ $products->description }}
                        </p>
                        <h6 class="description">Available :{{ $products->quantity }}</h6>

                        @if ($products->discount_price != null)
                            <h6 class="price-discounts">TK
                                {{ $products->discount_price }}
                            </h6>

                            <h6 class="price-originals">TK
                                {{ $products->price }}
                            </h6>
                        @else
                            <h6 class="prices-original">TK
                                {{ $products->price }}
                            </h6>
                        @endif

                        <form action="{{ route('home.add_cart', $products->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 col-md-4">
                                    <input type="number" name="quantity" value="1" min="1">
                                </div>


                                <div class="col-8 col-md-4">
                                    {{-- <ion-icon name="cart-outline"></ion-icon>
                                            <button class="add-cart">Add to cart</button> --}}

                                    <div class='btn-2'>
                                        <button class='two btn-2'> Add to <b>Cart</b></button>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="youtube-info">
                    <span>Youtube Video Section</span>
                </div>
                <iframe src="https://www.youtube.com/embed/{{ $products->youtube }}" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>





    <div class="product-info">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1>Product Deatils</h1>
                    <div class="product-description">
                        <img class="main-img" alt="product image" src="/image/{{ $products->detailsImage }}" />
                    </div>
                    @foreach ($detailsImage as $image)
                        <div class="product-description">
                            <img alt="{{ $image->detailsImage }}"
                                src="/product_another_image/{{ $image->detailsImage }}" />
                        </div>
                    @endforeach

                    <div class="details-text">
                        {!! $products->credentials !!}
                    </div>

                </div>
                <div class="col-12 col-md-6">

                    <h1>Customer Review And Real Pictures</h1>

                    <div class="details-text">
                        <span>{!! $products->reviewCredentials !!}</span>
                    </div>

                    <div class="product-description">
                        <img class="main-img" alt="product image" src="/image/{{ $products->reviewImage }}" />
                    </div>
                    @foreach ($reviewImage as $image)
                        <div class="product-description">
                            <img alt="{{ $image->reviewImage }}" src="/product_review_images/{{ $image->reviewImage }}" />
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>



<div class="comment">
    <div class="container">
        <div class="row">

            <div style="text-align: center; padding-bottom:30px;">

                <h1
                    style="font-size: 30px; text-align:center; padding-top: 20px; padding-bottom: 20px; color: rgb(2, 99, 39)">
                    Customer Comments</h1>

                <form action="{{ route('home.addComment') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $products->id }}">


                    <textarea  name="comment" placeholder="Comments something here"></textarea>

                    <br>

                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>

            </div>



            <div style="padding-left:20%">
                <h1 style="font-size: 20px; padding-bottom:20px; padding-bottom: 10px;">All Comments</h1>


                @foreach ($comment as $comment)
                    <div>
                        <b>{{ $comment->name }}</b>
                        <p>{{ $comment->comment }}</p>
                        <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}"
                            class="btn btn-info">Reply</a>


                        @foreach ($reply as $rep)
                            @if ($rep->comment_id == $comment->id)
                                <div style="padding-left: 3%; padding-bottom: 20px;">

                                    <b>{{ $rep->name }}</b>
                                    <p>{{ $rep->reply }}</p>

                                    <a href="javascript::void(0);" onclick="reply(this)"
                                        data-Commentid="{{ $comment->id }}" class="btn btn-warning">Reply</a>


                                </div>
                            @endif
                        @endforeach


                    </div>
                @endforeach


                <div style="display: none;" class="replyDiv">

                    <form action="{{ route('home.reply') }}" method="POST">
                        @csrf


                        <input type="text" id="commentId" name="commentId" hidden="">
                        <textarea style="min-height: 100px; width:500px;" name="reply" placeholder="Write Something here" name=""
                            id=""></textarea>

                        <br>

                        <button type="submit" class="btn btn-warning">Reply</button>

                    </form>

                </div>
            </div>



        </div>
    </div>
</div>



@endsection
