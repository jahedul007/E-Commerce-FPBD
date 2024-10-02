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
    <form action="{{ route('admin.saveMultipleImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="form-group">
            <label for="image">Product Images:</label>
            <input type="file" name="image[]" class="form-control" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Upload Images</button>
    </form>



    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
