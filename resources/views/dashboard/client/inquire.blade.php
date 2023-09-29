<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquiry form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"
        integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <style>
        .inquire-header-info {
            top: -45px;
            right: 30px;
        }

        .border-bottom-only {
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
            padding: 5px;
        }
        .section-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 500;
            color: rgb(96, 150, 186);
        }
    </style>
</head>

<body>
    <div class="row justify-content-center align-items-center p-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="inquire-header position-relative">
                    <div class="row">
                        <div class="col-sm-12 row">
                            <h1 class="inquire-header-info position-absolute text-black">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('about') }}">
                                        <i class='bx bx-left-arrow-alt h1 text-black'></i>
                                    </a>
                                    <span class="h3"> Inquiry Form</span>

                                    {{-- <div class="ms-auto">
                                        <a href="{{ route('about') }}">
                                            <i class='bx bxs-x-circle text-white h1'></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </h1>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="#" method="POST" class="row g-3">
                        @csrf
                        <div class="section-title p-2">Personal Information</div>
                        {{-- first name --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="text" name="firstname" class="border-bottom-only" id="firstname"
                                    placeholder="First Name" required>
                            </div>
                        </div>
                        {{-- last name --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="text" name="lastname" class="border-bottom-only" id="lastname"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        {{-- middle name --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="text" name="middlename" class="border-bottom-only" id="middlename"
                                    placeholder="Middle Name" required>
                            </div>
                        </div>
                        {{-- Contact --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="tel" name="contact" class="border-bottom-only" id="contact"
                                    placeholder="Contact: +63" required pattern="[0-9]{10}"
                                    title="Please enter a valid 10-digit mobile number">
                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                            </div>
                        </div>
                        {{-- email --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="email" name="email" class="border-bottom-only" id="email"
                                    placeholder="Email" required>
                            </div>
                        </div>
                        <div class="section-title p-2">Rental Information</div>
                        {{-- destination --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="destination" class="border-bottom-only" id="destination"
                                    placeholder="Destination Exact Address" required>
                            </div>
                        </div>
                        {{-- pickup --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="pickup" class="border-bottom-only" id="pickup"
                                    placeholder="Complete Address / Pickup Location" required>
                            </div>
                        </div>
                        {{-- landmark --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="landmark" class="border-bottom-only" id="landmark"
                                    placeholder="Landmark" required>
                            </div>
                        </div>
                        {{-- Date --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="text" name="dateoftrip" class="border-bottom-only" onfocus="(this.type='date')" id="dateoftrip"
                                    placeholder="Date of Trip" required>
                            </div>
                        </div>
                        {{-- no of pax --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="number" name="pax" class="border-bottom-only" id="pax"
                                    placeholder="No. Of Pax" required>
                            </div>
                        </div>
                        {{-- days and hour --}}
                        <div class="col-md-4">
                            <div class="mb-3">
                                <input type="number" name="daysandhours" class="border-bottom-only" id="daysandhours"
                                    placeholder="No. of Days/Hours" required>
                            </div>
                        </div>
                        {{-- pick up time --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" name="pickuptime" class="border-bottom-only" onfocus="(this.type='time')" id="pickuptime"
                                    placeholder="Pick Up Time" required>
                            </div>
                        </div>

                        {{-- down payment --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="number" name="downpayment" class="border-bottom-only" id="downpayment"
                                    placeholder="Down Payment" required>
                            </div>
                        </div>

                        <div class="mb-3 text-center d-flex justify-content-center">
                            <div class="d-grid">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Agree to <a href="#">terms and conditions.</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary"><b>Submit Form</b></button>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="d-grid">
                                <a href="{{ route('register.driver') }}" class="btn btn-primary">Driver</a>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
