@extends('layout.master')
@section('title', 'Products by Category')

@section('content')

<div class="container">
    <div class="row">
        <div class="heading_container heading_center">
            <h2>
                Products in <span class="red">Furniture</span>
            </h2>
        </div>
        <div class="info-menu mb-5">
        <h2><i class="fa-regular fa-circle-question"></i> More Information Call us: </h2>
                        <h4>
                            <i class="fa-solid fa-phone"></i> 01908-544309
                        </h4>
                        <h4>
                            <i class="fa-solid fa-phone"></i> 01627-005005
                        </h4>
        </div>



        <div class="row"> 
            <!-- =1 -->
            <div class="col-6 col-sm-4 col-md-3">
                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureTable') }}">
                        <span>Office Table</span>
                    </a>
                </div>

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureBed') }}">
                        <span>Bed</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureAlmirah') }}">
                        <span>Almirah</span>
                    </a>
                </div>

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureStool') }}">
                        <span>Stool</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureBookShelf') }}">
                        <span>BOOK SHELF</span>
                    </a>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3"> 
                <!-- =2 -->
                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureChair') }}">
                        <span>Chair</span>
                    </a>
                </div>

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureCarftDecor') }}">
                        <span>Carft $ Decor</span>
                    </a>
                </div>




                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureShowcase') }}">
                        <span>Showcase</span>
                    </a>
                </div>



                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureWardrobe') }}">
                        <span>Wardrobe</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureOvenRack') }}">
                        <span>Oven Rack</span>
                    </a>
                </div>



            </div>
            <div class="col-6 col-sm-4 col-md-3"> 
                <!-- =3 -->
                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureRockingChair') }}">
                        <span>Rocking Chair</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureTeaTable') }}">
                        <span>Tea Table</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureAlna') }}">
                        <span>Alna</span>
                    </a>
                </div>



                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureDressingTable') }}">
                        <span>Dressing Table</span>
                    </a>
                </div>

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureTvTrolley') }}">
                        <span>TV Trolley </span>
                    </a>
                </div>


            </div>
            <div class="col-6 col-sm-4 col-md-3">   
                <!-- =4 -->
                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureSofaSet') }}">
                        <span>Sofa Set</span>
                    </a>
                </div>
                

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureShowRack') }}">
                        <span>Show Rack</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureDivan') }}">
                        <span>Divan</span>
                    </a>
                </div>

                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureKitchenCabinet') }}">
                        <span>Kitchen Cabinet</span>
                    </a>
                </div>


                <div class="furniture-btn">
                    <a href="{{ route('home.furnitureParts') }}">
                        <span>Accessories & Parts</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection