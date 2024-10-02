<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
    <base href="/public">
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

                    @if (Session::has('success'))
                    <div class="btn btn-outline-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif


                    @if (Session::has('fail'))
                    <div class="btn btn-outline-success">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    <h1>Send Email to {{ $order->email }}</h1>


                    <form action="{{ route('admin.sendUserEmail', $order->id) }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label>Email Greeting :</label>
                            <input style="color: red;" type="text" name="greeting" class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Email First line :</label>
                            <input style="color: red;" type="text" name="firstline" class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Email Body :</label>
                            <input style="color: red;" type="text" name="body" class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Email Button Name :</label>
                            <input style="color: red;" type="text" name="button" class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Email Url :</label>
                            <input style="color: red;" type="text" name="url" class="form-control">
                        </div>

                        <div class="my-3">
                            <label>Email Last Line :</label>
                            <input style="color: red;" type="text" name="lastline" class="form-control">
                        </div>

                        <div class="mt-3">

                            <input type="submit" value="Send Email" class="btn btn-primary form-control">

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
