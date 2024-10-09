<div class="slider">
    <div class="container-fulid">
        <div class="row">


            <div class="col-12 col-md-9">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($slider as $item)
                        <div class="carousel-item active">
                            <img src="/product/{{ $item->image }}" alt="{{ $item->image }}">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="info-menu"> 
                    <h2>
                    <i class="fa-solid fa-circle-info"></i> Information
                    </h2>
                        <div class="containers-btn">
                            <a href="{{ route('home.coupleProduct') }}">
                                <span>How To Order?</span>
                            </a>
                        </div>
                        <div class="containers-btn">
                            <a href="{{ route('home.coupleProduct') }}">
                                <span>Inside Dhaka City <br> Delivery System</span>
                            </a>
                        </div>
                        <div class="containers-btn">
                            <a href="{{ route('home.coupleProduct') }}">
                                <span>Outside Dhaka City <br> Delivery System</span>
                            </a>
                        </div>
                        <div class="containers-btn">
                            <a href="{{ route('home.coupleProduct') }}">
                                <span>Payment Method</span>
                            </a>
                        </div>

                        <h2><i class="fa-regular fa-circle-question"></i> Feel Free Ask Any Question</h2>
                        <h3>
                            <i class="fa-solid fa-phone"></i> 01627-005005
                        </h3>
                        <h3>
                            <i class="fa-solid fa-phone"></i> 017249-38377
                        </h3>
                </div>
            </div>

        </div>


    </div>
</div>