<div class="header">
    <div class="container-fulid">
        <!-- <div class="row"> -->
        <div class="row">
            <div class="col-12 d-flex">
                <div class="col-md-6 header-info d-flex mt-3 mb-3 justify-content-between">
                    <div class="icon-areas">
                        <div class="icon">
                            <a href="tel:+8801627005005"><i class="fa fa-phone"></i></a>
                            <h2> :01627005005 <span>(Feel free ask any Question)</span></h2>
                        </div>
                    </div>

                    <div>
                            <!-- <button class="theme-toggle" id="theme-toggle"> -->
                            <input id="checkbox" type="checkbox">
                            <label class="switch" for="checkbox">
                                <svg viewBox="0 0 448 512" class="svg">
                                    <path d="M320 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM125.7 175.5c9.9-9.9 23.4-15.5 37.5-15.5c1.9 0 3.8 .1 5.6 .3L137.6 254c-9.3 28 1.7 58.8 26.8 74.5l86.2 53.9-25.4 88.8c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l28.7-100.4c5.9-20.6-2.6-42.6-20.7-53.9L238 299l30.9-82.4 5.1 12.3C289 264.7 323.9 288 362.7 288H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H362.7c-12.9 0-24.6-7.8-29.5-19.7l-6.3-15c-14.6-35.1-44.1-61.9-80.5-73.1l-48.7-15c-11.1-3.4-22.7-5.2-34.4-5.2c-31 0-60.8 12.3-82.7 34.3L57.4 153.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l23.1-23.1zM91.2 352H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h69.6c19 0 36.2-11.2 43.9-28.5L157 361.6l-9.5-6c-17.5-10.9-30.5-26.8-37.9-44.9L91.2 352z"></path>
                                </svg> Night
                            </label>
                            <!-- </button> -->
                        </div>

                    <div class="loginstyle">
                        <div class="d-flex" style="list-style: none;">
                            <li class="nav-link">
                                <div class="logDesign">
                                    @if (Route::has('login'))
                                    @auth

                            <li class="nav-item">
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>

                            @endauth
                            @endif
                        </div>
                        </li>
                    </div>
                </div>







                <div class="col-md-6 mt-3">
                    <div class="icon-area">
                        <div class="icon">
                            <a href="https://www.facebook.com/fpbd007"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="icon">
                            <a href="https://m.me/fpbd007"><i class="fa-brands fa-facebook-messenger"></i></a>
                        </div>
                        <div class="icon">
                            <a href=""><i class="fa fa-youtube"></i></a>
                        </div>
                        <div class="icon">
                            <a href="{{route('home')}}"><i class="fa fa-instagram"></i></a>
                        </div>
                        <!-- <div class="icon">
                            <a href="#"><i class="fa fa-info"></i></a>
                        </div> -->
                        <div class="icon">
                            <a href="https://wa.me/01627005005?text=Assalamu Olaikum"><i class="fa fa-whatsapp"></i></a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-area">
        <div class="col-12 col-md-1">
            <div class="header-icon">
                <a href="{{ route('home') }}"><img src="image/fplogo.png"></a>
            </div>
        </div>
        <div class="col-12 col-md-11">
            <div class="header-menu">
                <ul class="d-flex">
                    <li><a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house-flag"></i>
                            HOME</a></li>
                    <li><a class="nav-link" href="{{ route('home.allProduct') }}"><i
                                class="fa-solid fa-list"></i> ALL PRODUCTS</a></li>
                    {{-- /* From Uiverse.io by gharsh11032000 */ --}}
                    <div class="menu">
                        <div class="item">
                            <a href="{{ route('home.mensProduct') }}" class="link">
                                <span class="nav-link" style="font-weight: 700; font-size:13px;"><i
                                        class="fa-solid fa-person"></i> MEN'S CATEGORY</span>
                                <svg viewBox="0 0 360 360" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="XMLID_225_"
                                            d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <div class="submenu">
                                <div class="submenu-item">
                                    <a href="{{ route('home.menBracelet', ['category' => urlencode("Men's Bracelet")]) }}"
                                        class="submenu-link"><i class="fa-regular fa-gem"></i> MEN'S
                                        BRACELET</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.menRing', ['category' => urlencode("Men's Ring")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-ring"></i> MEN'S RING</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.menLocket', ['category' => urlencode("Men's Locket")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-spray-can"></i> MEN'S LOCKET
                                    </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.menWatch', ['category' => urlencode("Men's Watch")]) }}"
                                        class="submenu-link"><i class="fa-regular fa-clock"></i> MEN'S WATCH
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <div class="item">
                            <a href="{{ route('home.girlsProduct') }}" class="link">
                                <span class="nav-link" style="font-weight: 700; font-size:13px;"><i
                                        class="fa-solid fa-person-dress"></i> GIRL'S
                                    CATEGORY</span>
                                <svg viewBox="0 0 360 360" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="XMLID_225_"
                                            d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <div class="submenu">
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlRing', ['category' => urlencode("Girl's Ring")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-ring"></i> GIRL'S RING</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlLocket', ['category' => urlencode("Girl's Locket")]) }}"
                                        class="submenu-link"><i class="fa-regular fa-gem"></i> GIRL'S LOCKET /
                                        NECKLACE </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlFullSet', ['category' => urlencode("Girl's Jewelry Set")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-gem"></i> FULL SET JEWELRY
                                    </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlWatch', ['category' => urlencode("Girl's Watch")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-clock"></i> GIRL'S WATCH</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlAnklet', ['category' => urlencode("Girl's Aklet")]) }}"
                                        class="submenu-link"><i class="fa-regular fa-gem"></i>
                                        ANKLET/PAYEL</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.girlEarring', ['category' => urlencode("Girl's Earring Set")]) }}"
                                        class="submenu-link"><i class="fa-solid fa-ear-deaf"></i> EARRING
                                        SET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu">
                        <div class="item">
                            <a href="{{ route('home.coupleProduct') }}" class="link">
                                <span class="nav-link" style="font-weight: 700; font-size:13px;"><i
                                        class="fa-solid fa-children"></i> COUPLE PRODUCTS</span>
                                <svg viewBox="0 0 360 360" xml:space="preserve">
                                    <g id="SVGRepo_iconCarrier">
                                        <path id="XMLID_225_"
                                            d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <div class="submenu">
                                <div class="submenu-item">
                                    <a href="{{ route('home.coupleRing', ['category' => urlencode('Couple Ring')]) }}"
                                        class="submenu-link"><i class="fa-solid fa-ring"></i> COUPLE RING</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.coupleLocket', ['category' => urlencode('Couple Locket')]) }}"
                                        class="submenu-link"><i class="fa-regular fa-gem"></i> COUPLE LOCKET /
                                        NECKLACE</a>
                                </div>
                                <div class="submenu-item">
                                    <a href="{{ route('home.coupleBracelet', ['category' => urlencode('Couple Bracelets')]) }}"
                                        class="submenu-link"><i class="fa-regular fa-gem"></i> COUPLE
                                        BRACELETS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <li><a class="nav-link" href="{{ route('home.furniture') }}"><i class="fa-solid fa-couch"></i> Furniture</a></li>

                    <li><a class="nav-link" href="{{ route('home.others') }}"><i class="fa-brands fa-ethereum"></i> Others</a></li>

                    <li><a class="nav-link" href="{{ route('home.show_cart') }}"><i
                                class="fa-solid fa-cart-arrow-down"></i> CART</a></li>
                    <li><a class="nav-link" href="{{ route('home.show_order') }}"><i
                                class="fa-brands fa-jedi-order"></i> ORDER</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
</div>





{{-- mobile menu --}}




<div class="mobile-menu">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <div class="header-icon">
                <a href="{{ route('home') }}"><img src="image/fplogo.png"></a>
            </div>


            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fa-solid fa-house-flag"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.allProduct') }}"><i
                                class="fa-solid fa-list"></i> ALL PRODUCTS</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('home.mensProduct') }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i
                                class="fa-solid fa-person"></i> MEN'S CATEGORY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home.mensProduct') }}"><i
                                        class="fa-solid fa-person"></i> MEN'S ALL PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.menBracelet', ['category' => urlencode("Men's Bracelet")]) }}"><i class="fa-regular fa-gem"></i> MEN'S
                                    BRACELET</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.menRing', ['category' => urlencode("Men's Ring")]) }}"><i class="fa-solid fa-ring"></i> MEN'S RING</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.menLocket', ['category' => urlencode("Men's Locket")]) }}"><i class="fa-solid fa-spray-can"></i> MEN'S LOCKET</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.menWatch', ['category' => urlencode("Men's Watch")]) }}"><i class="fa-regular fa-clock"></i> MEN'S WATCH</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('home.girlsProduct') }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i
                                class="fa-solid fa-person-dress"></i> GIRL'S
                            CATEGORY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home.girlsProduct') }}"><i
                                        class="fa-solid fa-person-dress"></i> GIRL'S ALL PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlRing', ['category' => urlencode("Girl's Ring")]) }}"><i class="fa-solid fa-ring"></i> GIRL'S RING</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlLocket', ['category' => urlencode("Girl's Locket")]) }}"><i class="fa-regular fa-gem"></i> GIRL'S LOCKET /
                                    NECKLACE</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlFullSet', ['category' => urlencode("Girl's Jewelry Set")]) }}"><i class="fa-solid fa-gem"></i> FULL SET JEWELRY</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlWatch', ['category' => urlencode("Girl's Watch")]) }}"><i class="fa-solid fa-clock"></i> GIRL'S WATCH</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlAnklet', ['category' => urlencode("Girl's Aklet")]) }}"><i class="fa-regular fa-gem"></i>
                                    ANKLET/PAYEL</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.girlEarring', ['category' => urlencode("Girl's Earring Set")]) }}"><i class="fa-solid fa-ear-deaf"></i> EARRING
                                    SET</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('home.coupleProduct') }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i
                                class="fa-solid fa-children"></i> COUPLE PRODUCTS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('home.coupleProduct') }}"><i
                                        class="fa-solid fa-children"></i> COUPLE ALL PRODUCTS</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.coupleRing', ['category' => urlencode('Couple Ring')]) }}"><i class="fa-solid fa-ring"></i> COUPLE RING</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.coupleBracelet', ['category' => urlencode('Couple Bracelets')]) }}"><i class="fa-regular fa-gem"></i> COUPLE
                                    BRACELETS</a></li>
                            <li><a class="dropdown-item" href="{{ route('home.coupleLocket', ['category' => urlencode('Couple Locket')]) }}"><i class="fa-regular fa-gem"></i> COUPLE LOCKET /
                                    NECKLACE</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.furniture') }}"><i class="fa-solid fa-couch"></i> Furniture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.others') }}"><i class="fa-brands fa-ethereum"></i> Others</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.show_cart') }}"><i
                                class="fa-solid fa-cart-arrow-down"></i> CART</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.show_order') }}"><i
                                class="fa-brands fa-jedi-order"></i> ORDER</a>
                    </li>
                    <li>
                        <div class="loginstyles">
                            <div class="d-flex" style="list-style: none; margin-left:33%; margin-bottom: 10px;">
                    <li class="nav-link">
                        <div class="logDesign">
                            @if (Route::has('login'))
                            @auth

                    <li class="nav-item">
                        <x-app-layout>

                        </x-app-layout>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                    </li>

                    @endauth
                    @endif
            </div>
            </li>
        </div>
</div>
</li>
</ul>
</div>
</div>
</nav>
</div>