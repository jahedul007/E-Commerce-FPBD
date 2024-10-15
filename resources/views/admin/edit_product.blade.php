<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <!-- plugins:css -->

    <base href='/public'>

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
                <h3 class="fs-2 font-bold my-4">Update Product</h3>

                <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mt-3">
                        <label for="">Product Title :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="title" placeholder="Write a title" value="{{ $product->title }}">
                        @if ($errors->has('title'))
                            <span class="text-danger h6">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">Product Code :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="code" placeholder="Write a Code..." value="{{ $product->title }}">
                        @if ($errors->has('code'))
                            <span class="text-danger h6">{{ $errors->first('code') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">Product Description :</label>
                        <textarea name="" id="" cols="30" rows="5" class="text-success font-semibold form-control rounded" name="description" placeholder="Write a Description" >{{ $product->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger h6">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">Product Price :</label>
                        <input type="number" class="text-success font-semibold form-control rounded" name="price" placeholder="Product Price" value="{{ $product->price }}">
                        @if ($errors->has('price'))
                            <span class="text-danger h6">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">Product Discount Price :</label>
                        <input type="number" class="text-success font-semibold form-control rounded" name="discount_price" placeholder="Product Discount Price" value="{{ $product->discount_price }}">
                        @if ($errors->has('discount_price'))
                            <span class="text-danger h6">{{ $errors->first('discount_price') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">Product quantity :</label>
                        <input type="number" min="0" class="text-success font-semibold form-control rounded" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}">
                        @if ($errors->has('quantity'))
                            <span class="text-danger h6">{{ $errors->first('quantity') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="" class="form-label h6">Credentials</label>
                        <textarea style="border: 2px solid; border-radius: 5px; background:cadetblue; height:100px;" name="credentials" placeholder="Product Full Details here...." id="editor" cols="30" rows="10" class="form-control ck-tolber" >{{ $product->credentials }}</textarea>
                        @if ($errors->has('credentials'))
                            <span class="text-danger h6">{{ $errors->first('credentials') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">youtube :</label>
                        <input type="text" class="text-success font-semibold form-control rounded" name="youtube" placeholder="youtube" value="{{ $product->youtube }}">
                        @if ($errors->has('youtube'))
                            <span class="text-danger h6">{{ $errors->first('youtube') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label class="text-danger">Product Category :</label>
                        <select class="custom-select" name="category">
                            @foreach ($categories as $category)
                            <option value="{{ $category->Category_name }}">{{ $category->Category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="">Current Product Image :</label>
                        <img src="/product/{{ $product->image }}" alt="" width="90" class="mx-auto">
                        @if ($errors->has('image'))
                            <span class="text-danger h6">{{ $errors->first('image') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="">Change Product Image :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue" type="file" class="form-control" name="image" placeholder="Image" >
                        @if ($errors->has('image'))
                            <span class="text-danger h6">{{ $errors->first('image') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="">Description Product Image :</label>
                        <img style="width: 100px;" src="/image/{{ $product->detailsImage }}" alt="" width="90" class="mx-auto">
                        @if ($errors->has('detailsImage'))
                            <span class="text-danger h6">{{ $errors->first('detailsImage') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="">Change Description Product Image :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue" type="file" class="form-control" name="detailsImage" placeholder="Image" >
                        @if ($errors->has('detailsImage'))
                            <span class="text-danger h6">{{ $errors->first('detailsImage') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="">Review Product Image :</label>
                        <img style="width: 100px;" src="/image/{{ $product->reviewImage }}" alt="" width="90" class="mx-auto">
                        @if ($errors->has('reviewImage'))
                            <span class="text-danger h6">{{ $errors->first('reviewImage') }}</span>
                        @endif
                    </div>


                    <div class="mt-3">
                        <label for="">Change Review Product Image :</label>
                        <input style="border: 2px solid; border-radius: 5px; background:cadetblue" type="file" class="form-control" name="reviewImage" placeholder="Image" >
                        @if ($errors->has('reviewImage'))
                            <span class="text-danger h6">{{ $errors->first('reviewImage') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="" class="form-label h6">Review Credentials</label>
                        <textarea style="border: 2px solid; border-radius: 5px; background:cadetblue; height:100px;" name="reviewCredentials" placeholder="Product Full Details here...." id="reviewEditor" cols="30" rows="10" class="form-control ck-tolber" >{{ $product->reviewCredentials }}</textarea>
                        @if ($errors->has('reviewCredentials'))
                            <span class="text-danger h6">{{ $errors->first('reviewCredentials') }}</span>
                        @endif
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-success form-control rounded">Update Product</button>
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
