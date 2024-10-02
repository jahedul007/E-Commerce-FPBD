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
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="text-center">Location Set</h1>

                    <div class="location">
                        <div class="container">

                            @if ($message = Session::get('success'))
                                <div class="btn btn-outline-success mb-3">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif


                            <div class="row">
                                <a href="" class="btn btn-warning">Check Your Location <h3>Click here</h3></a>
                                <div class="col-lg-12 d-flex">
                                    <div class="Location">
                                        <form action="{{ route('storeLocation') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="district">District</label>
                                                <input type="text" name="district" placeholder="District"
                                                    class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="thana">Thana</label>
                                                <!-- Container to hold multiple input fields for Thana -->
                                                <div id="thana-fields">
                                                    <input type="text" name="thana[]" placeholder="Thana"
                                                        class="form-control mb-2" required>
                                                </div>
                                                <button type="button" id="add-thana" class="btn btn-secondary mb-2">Add
                                                    Thana</button>
                                            </div>



                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="btn btn-success form-control">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="location-area">
                                <div class="container">
                                    <div class="row">
                                        <h1>Contact</h1>
                                        <div class="col-lg-12 d-flex">
                                            <div class="contact-part">
                                                <a href="" class="btn btn-warning">
                                                    <h2>All Appointment List Here</h2>
                                                </a>
                                                {{-- <a href="{{ route('appointment.index') }}">Don't edit Appoinment Time</a> --}}
                                                @if ($message = Session::get('fail'))
                                                    <div class="alert alert-danger mb-3">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif


                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Sno.</th>
                                                            <th scope="col">District</th>
                                                            <th scope="col">Thana(s)</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $groupedLocations = $location->groupBy('district'); // Group by district
                                                        @endphp

                                                        @foreach ($groupedLocations as $district => $areas)
                                                            <tr>
                                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                                <td>{{ $district }}</td>
                                                                <td>{{ implode(', ', $areas->pluck('thana')->toArray()) }}
                                                                </td> <!-- Comma-separated Thanas -->
                                                                <td>
                                                                    <!-- Add your delete functionality here -->
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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


    <!-- Include jQuery for handling dynamic input fields -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Add more Thana input fields dynamically
            $('#add-thana').click(function() {
                $('#thana-fields').append(
                    '<input type="text" name="thana[]" placeholder="Thana" class="form-control mb-2" required>'
                );
            });
        });
    </script>
</body>

</html>
