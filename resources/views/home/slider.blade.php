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
            <img src="product/1724744533.jpg" alt="">
           </div>

        </div>


    </div>
</div>

