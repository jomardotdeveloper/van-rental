<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Registration Page</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"
        integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />





</head>

<body>
    {{-- <div class="main-wrapper"> --}}
    {{-- @include('components.navigation.nav')

        @yield('navigation') --}}

    <div class="container">
        <div class="row justify-content-center p-2">
            <form action="{{ route('register.vehicle') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-sm-12">
                    <div class="card border-0">
                        <div class="card-body">
                            {{-- <h2 class="">Welcome, {{ Auth::user()->firstname }}</h2> --}}
                            <div class="d-flex align-items-center">
                                <a href="{{ route('driver.home') }}" class="text-info h2">
                                    <i class='bx bx-left-arrow-alt'></i>
                                </a>
                                <h2 class="h3">Welcome, {{ Auth::user()->firstname }}</h2>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card p-2">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-12 row bg-white">
                                    <h1 class="card-title">
                                        <div class="d-flex align-items-center">
                                            <span class="h3" style="color: #274C77">Vehicle Application Form</span>
                                        </div>
                                    </h1>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            {{-- @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif --}}
                            @if (Session::has('approved'))
                                <div class="alert alert-danger">
                                    {{ Session::get('approved') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{-- <form action="{{ route('register.vehicle') }}" method="POST" enctype="multipart/form-data" --}}
                            {{-- class="row g-3">
                                @csrf --}}
                            <div class="col-md-12 row p-3">


                                {{-- ID No --}}
                                <input type="number" name="id" class="form-control" id="idNumber"
                                    value="{{ Auth::user()->id }}" hidden required>
                                {{-- ID No --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="number" name="idNumber" class="form-control" id="idNumber"
                                            placeholder="ID NO." required>
                                    </div>
                                </div>

                                {{-- ORCR --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="number" name="orcr" class="form-control" id="orcr"
                                            placeholder="ORCR" required>
                                    </div>
                                </div>

                                {{-- Vehicle Plate Number --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="plateNumber" class="form-control" id="plateNumber"
                                            placeholder="Vehicle Plate Number" required>
                                    </div>
                                </div>

                                {{-- driver licensed and Profile --}}
                                <div class="col-md-12">
                                    <div class="col-md-12 mx-auto text-center">
                                        <div class="mb-3">
                                            <label for="image" class="form-label text-center h6">Upload
                                                your
                                                Driver's Licensed</label>
                                            <input type="file" name="imageLicensed" class="form-control"
                                                id="vehicle-licensed" credits="false" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="card p-2">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-sm-12 row text-center bg-white">
                                    <h1 class="card-title">
                                        <div class="d-flex align-items-center">
                                            <span class="h3" style="color: #274C77">Add your Services</span>
                                        </div>
                                    </h1>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            {{-- @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif --}}
                            @if (Session::has('approved'))
                                <div class="alert alert-danger">
                                    {{ Session::get('approved') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="col-md-12 row p-3">

                                {{-- fullname --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="fullname" class="form-control" id="fullname"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                {{-- Company Name --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="companyName" class="form-control"
                                            id="companyName" placeholder="Company Name" required>
                                    </div>
                                </div>
                                {{-- Address --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="Company Address" required>
                                    </div>
                                </div>
                                {{-- model --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" name="model" class="form-control" id="model"
                                            placeholder="Model" required>
                                    </div>
                                </div>

                                {{-- Vehicle Profile --}}
                                <div class="col-md-12">
                                    <div class="col-md-12 mx-auto text-center">
                                        <div class="mb-3">
                                            <label for="image" class="form-label text-center h6">Upload
                                                your
                                                Vehicle Picture</label>
                                            <input type="file" name="imageVehicleProfile" class="form-control"
                                                id="vehicle-image" credits="false" required>

                                        </div>
                                    </div>
                                </div>

                                {{-- Specification --}}
                                <div class="col-md-12 row">
                                    <div class="col-md-12 mx-auto text-center">
                                        <div class="mb-3">
                                            <label for="specification" class="form-label text-center h6">
                                                VEHICLE SPECIFICATION
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <input type="number" name="bags" class="form-control" id="bags"
                                                placeholder="No. of Bags" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <input type="number" name="seats" class="form-control" id="seats"
                                                placeholder="No. of Seats" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <select name="ac" class="form-control text-secondary" id="ac"
                                                required>
                                                <option value="">Aircon Type</option>
                                                <option value="Dual">Dual Aircon</option>
                                                <option value="Single">Single Aircon</option>
                                                <option value="NA">Not Available</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mx-auto text-center">
                                        <div class="mb-3">
                                            <select name="fuel" class="form-control text-secondary" id="fuel"
                                                required>
                                                <option value="">Fuel Type</option>
                                                <option value="Gasoline">Gasoline</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="E-Batteries">E-Batteries</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <div class="d-flex justify-content-center">
                            <div class="d-grid w-50">
                                <button class="btn btn-info">Register Vehicle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- </div> --}}



    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        // Register the plugin
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const vehicleLicensed = document.querySelector('#vehicle-licensed');
        const vehicleImage = document.querySelector('#vehicle-image');

        // Create a FilePond instance for Licensed
        const pond1 = FilePond.create(vehicleLicensed, {
            server: {
                process: '/tmp-UploadLicensed',
                revert: '/tmp-deleteLicensed',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        // Create a FilePond instance for Vehicle image
        const pond2 = FilePond.create(vehicleImage, {
            server: {
                process: '/tmp-UploadVehicleProfile',
                revert: '/tmp-deleteVehicleProfile',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
</body>

</html>
