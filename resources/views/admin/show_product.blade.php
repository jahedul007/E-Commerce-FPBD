<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')

    <style>
        .img_size{
            width: 70px!important;
            height: 70px!important;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

            @if (Session::has('fail'))
            <div class="btn btn-outline-success my-3">
                {{ Session::get('fail') }}
            </div>
            @endif

            @if (Session::has('success'))
            <div class="btn btn-outline-success my-3">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="table-responsive">

                <table class="table table-dark table-striped table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th>Credentials</th>
                        <th scope="col">Youtube Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Images</th>
                        <th scope="col">Review Images</th>
                        <th scope="col">Review Credentials</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($product as $product)
                      <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>{{ $product->credentials }}</td>
                        <td>{{ $product->youtube }}</td>
                        <td>
                            <img src="/product/{{ $product->image }}" alt="{{ $product->image }}" class="img_size">
                            <a href="{{ route('admin.multiImage', $product->id) }}">+</a>
                        </td>

                        <td>
                            <img src="/image/{{ $product->detailsImage }}" alt="{{ $product->detailsImage }}" class="img_size">
                            <a href="{{ route('admin.anotherMultiImage', $product->id) }}">++</a>
                        </td>


                        <td>
                            <img src="/image/{{ $product->reviewImage }}" alt="{{ $product->reviewImage }}" class="img_size">
                            <a href="{{ route('admin.reviewMultiImage', $product->id) }}">+++</a>
                        </td>

                        <td>{{ $product->reviewCredentials }}</td>


                        <td>
                            <a href="{{ route('admin.editProduct',$product->id) }}" class="btn btn-dark">Edit</a>

                            <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" class="d-inline" onclick="return confirm('Are u sure to delete this')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
