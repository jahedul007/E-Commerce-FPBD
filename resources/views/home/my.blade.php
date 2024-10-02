<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>





<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_order') }}">Order</a>
                </li>


                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

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

            </ul>
          </div>
       </nav>
    </div>
 </header>



 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>

 <div class="header">
    <div class="container">
        <div class="row">
            <div class="header-area">
                <div class="col-12 col-md-4">
                    <div class="header-icon">
                        <a href="#"><img src="/image/icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="header-menu">
                        <ul class="d-flex">
                            <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></li>


                              <li><a href="{{ route('home.allProduct') }}">Products</a></li>
                              <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.show_cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.show_order') }}">Order</a></li>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                             </form>


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


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_order') }}">Order</a>
                </li>


                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

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

            </ul>
          </div>
       </nav>
    </div>
 </header>



 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>

 <div class="header">
    <div class="container">
        <div class="row">
            <div class="header-area">
                <div class="col-12 col-md-4">
                    <div class="header-icon">
                        <a href="#"><img src="/image/icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="header-menu">
                        <ul class="d-flex">
                            <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></li>

                            <div class="menu">
                                <div class="item">
                                  <a href="#" class="link">
                                    <span> Men's </span>
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                      <g id="SVGRepo_iconCarrier">
                                        <path
                                          id="XMLID_225_"
                                          d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                                        ></path>
                                      </g>
                                    </svg>
                                  </a>
                                  <div class="submenu">
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Development </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Design </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Marketing </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> SEO </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <li><a href="{{ route('home.allProduct') }}">Products</a></li>
                              <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.show_cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.show_order') }}">Order</a></li>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                             </form>


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


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_order') }}">Order</a>
                </li>


                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

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

            </ul>
          </div>
       </nav>
    </div>
 </header>



 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>

 <div class="header">
    <div class="container">
        <div class="row">
            <div class="header-area">
                <div class="col-12 col-md-4">
                    <div class="header-icon">
                        <a href="#"><img src="/image/icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="header-menu">
                        <ul class="d-flex">
                            <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></li>

                            <div class="menu">
                                <div class="item">
                                  <a href="#" class="link">
                                    <span> Men's </span>
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                      <g id="SVGRepo_iconCarrier">
                                        <path
                                          id="XMLID_225_"
                                          d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                                        ></path>
                                      </g>
                                    </svg>
                                  </a>
                                  <div class="submenu">
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Development </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Design </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Marketing </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> SEO </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <li><a href="{{ route('home.allProduct') }}">Products</a></li>
                              <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.show_cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.show_order') }}">Order</a></li>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                             </form>


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


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_order') }}">Order</a>
                </li>


                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

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

            </ul>
          </div>
       </nav>
    </div>
 </header>



 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>

 <div class="header">
    <div class="container">
        <div class="row">
            <div class="header-area">
                <div class="col-12 col-md-4">
                    <div class="header-icon">
                        <a href="#"><img src="/image/icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="header-menu">
                        <ul class="d-flex">
                            <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></li>

                            <div class="menu">
                                <div class="item">
                                  <a href="#" class="link">
                                    <span> Men's </span>
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                      <g id="SVGRepo_iconCarrier">
                                        <path
                                          id="XMLID_225_"
                                          d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                                        ></path>
                                      </g>
                                    </svg>
                                  </a>
                                  <div class="submenu">
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Development </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Design </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Marketing </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> SEO </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <li><a href="{{ route('home.allProduct') }}">Products</a></li>
                              <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.show_cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.show_order') }}">Order</a></li>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                             </form>


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


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.show_order') }}">Order</a>
                </li>


                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

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

            </ul>
          </div>
       </nav>
    </div>
 </header>



 <header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">

               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>








            </ul>
          </div>
       </nav>
    </div>
 </header>

 <div class="header">
    <div class="container">
        <div class="row">
            <div class="header-area">
                <div class="col-12 col-md-4">
                    <div class="header-icon">
                        <a href="#"><img src="/image/icon.png" alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="header-menu">
                        <ul class="d-flex">
                            <li><a href="{{ route('home') }}">Home <span class="sr-only">(current)</span></li>

                            <div class="menu">
                                <div class="item">
                                  <a href="#" class="link">
                                    <span> Men's </span>
                                    <svg viewBox="0 0 360 360" xml:space="preserve">
                                      <g id="SVGRepo_iconCarrier">
                                        <path
                                          id="XMLID_225_"
                                          d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                                        ></path>
                                      </g>
                                    </svg>
                                  </a>
                                  <div class="submenu">
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Development </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Design </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> Marketing </a>
                                    </div>
                                    <div class="submenu-item">
                                      <a href="#" class="submenu-link"> SEO </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <li><a href="{{ route('home.allProduct') }}">Products</a></li>
                              <li><a href="#">About</a></li>
                            <li><a href="{{ route('home.show_cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.show_order') }}">Order</a></li>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                             </form>


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


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





header part

<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}"><img width="250" src="images/logo.png"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        {{-- <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a> --}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="product.html">Products</a> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <div class="menu">
                        <div class="item">
                            <a href="#" class="link">
                                <span> Category </span>
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
                                    <a href="#" class="submenu-link"> Development </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="#" class="submenu-link"> Design </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="#" class="submenu-link"> Marketing </a>
                                </div>
                                <div class="submenu-item">
                                    <a href="#" class="submenu-link"> SEO </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('home.show_cart') }}">Cart</a> --}}
                    </li>

                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('home.show_order') }}">Order</a> --}}
                    </li>


                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

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

                </ul>
            </div>
        </nav>
    </div>
</header>

header part end all ok

















prodcut





<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span class="red">products</span>
          </h2>

          <br> <br>


          <div>
            <form action="{{ route('home.productSearch') }}" method="GET">
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
                    <img src="/product/{{ $product->image }}" alt="">
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



 <div class="container-fuild">
    <div class="row">
        <div class="col-12 col-md-3">

            <div class="single-card">
                <div class="img-area">
                  <img src="img/1.jpg" alt="">
                  <div class="overlay">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="view-details">View Details</button>
                  </div>
                </div>

                <div class="info">
                  <h3>Mobile Phone</h3>
                  <p class="price">$199.99</p>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
                </div>
              </div>

        </div>

    </div>
</div>



