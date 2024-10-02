<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <div class="main-panel">
          <div class="content-wrapper">

            @if (Session::has('success'))
            <div class="btn btn-outline-success">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="text-center mt-4">
                <h3 class="fs-2 font-bold my-4">Add Product</h3>

                <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label for="">Product Title :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="title" placeholder="Write a title">
                    </div>

                    <div class="mt-3">
                        <label for="">Product Code :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="code" placeholder="Write a Product Code...">
                    </div>

                    <div class="mt-3">
                        <label for="">Product Description :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="description" placeholder="Write a Description">
                    </div>

                    <div class="mt-3">
                        <label for="">Product Price :</label>
                        <input type="number" class="text-success font-semibold form-control rounded" name="price" placeholder="Product Price">
                    </div>

                    <div class="mt-3">
                        <label for="">Product Discount Price :</label>
                        <input type="number" class="text-success font-semibold form-control rounded" name="discount_price" placeholder="Product Discount Price">
                    </div>

                    <div class="mt-3">
                        <label for="">Product quantity :</label>
                        <input type="number" min="0" class="text-success font-semibold form-control rounded" name="quantity" placeholder="Product Quantity">
                    </div>

                    <div class="mt-3">
                        <label class="text-danger">Product Category :</label>
                        <select class="custom-select" name="category">
                            @foreach ($category as $category)
                            <option value="{{ $category->Category_name }}">{{ $category->Category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Product Image :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue;" type="file" class="form-control" name="image" placeholder="Image">
                    </div>


                    <div class="mt-3">
                        <label for="">Youtube Link :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="youtube" placeholder="Youtube link here...">
                    </div>

                    <div class="mt-3">
                        <label for="">Product Details Images :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue;" type="file" class="form-control" name="detailsImage" placeholder="Image for details">
                    </div>

                    <div class="mt-3">
                        <label for="" class="form-label h6">Credentials</label>
                        <textarea style="border: 2px solid; border-radius: 5px; background:cadetblue;" name="credentials" placeholder="Product Full Details here...." id="editor" cols="30" rows="30" class="form-control ck-tolber" ></textarea>
                    </div>

                    <div class="mt-3">
                        <label for="">Product Real Images and Review :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue;" type="file" class="form-control" name="reviewImage" placeholder="Image for details">
                    </div>

                    <div class="mt-3">
                        <label for="" class="form-label h6">Product Real Images and Review Credentials</label>
                        <textarea style="border: 2px solid; border-radius: 5px; background:cadetblue;" name="reviewCredentials" placeholder="Product Full Details here...." id="reviewEditor" cols="30" rows="30" class="form-control ck-tolber" ></textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-success form-control rounded">Add Product</button>
                    </div>
                </form>

            </div>

          </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
