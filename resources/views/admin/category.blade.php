<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="text-center mt-4 fs-2">
                    <h3>Add Category</h3>

                    @if (Session::has('success'))
                        <div class="btn btn-outline-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.addCategory') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <input type="text" name="name" class="text-primary-emphasis" placeholder="Write Category Name">
                            <input type="submit" class="btn btn-outline-success" name="submit" value="Add Category">
                        </div>
                    </form>

                    @if (Session::has('fail'))
                            <div class="btn btn-outline-danger mt-4 text-end">
                                {{ Session::get('fail') }}
                            </div>
                    @endif

                </div>


                <table class="table table-dark mt-8">
                    <thead>
                      <tr>
                        <th scope="col">S No.</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{ $loop->index+1 }}</th>
                          <td>{{ $item->Category_name }}</td>
                          <td>
                            <form action="{{ route('admin.deleteCategory', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete This Category')">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>



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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


