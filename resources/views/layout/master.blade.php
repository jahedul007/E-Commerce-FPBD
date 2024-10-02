
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
<!DOCTYPE html>
<html>
   <head>

    @include('home.css')

    <title>@yield('title')</title>

   </head>
   <body>

    @include('home.header')
     <!-- end header section -->



      @yield('content')



      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      @include('home.js')

   </body>
</html>

