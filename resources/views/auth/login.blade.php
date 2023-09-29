<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bataan Van Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"
        integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ asset('assets/client/toastr/toastr.min.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_v2.css') }}">
    <link rel="stylesheet" href="{{ asset('loader/loader.css') }}">

    {{-- custom popups --}}
    <style>
        /* Style for the custom popup container */
        #custom-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            z-index: 1000;
        }

        /* Style for the popup content */
        .popup-content {
            background-color: rgb(253, 253, 253);
            /* Red background for the popup */
            padding: 20px;
            width: 300px;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
            /* color: #fff; */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    {{-- loader --}}
    <div class="modal-loader">
        <div class="loader-wrapper">
          <div class="loader"></div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center p-5">
        <div class="col-lg-4">
            <div class="login-form">
                <div class="login-form-header">
                    <div class="form-info">
                        <i class='bx bxs-user'></i>
                        <span class="h3"> Login</span>
                    </div>
                    <a class="close-btn" href="{{ route('home') }}">
                        <i class='bx bxs-x-circle h1'></i>
                    </a>
                </div>
                <div class="login-form-body">
                    {{-- Error Message --}}
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    {{-- Status --}}
                    @if (Session::has('approved'))
                        <div class="alert alert-danger">
                            {{ Session::get('approved') }}
                        </div>
                    @endif
                    @if (Session::has('is_activated'))
                            @if (Session::get('is_activated') == 0)
                                {{-- OTP --}}
                                {{-- <div class="mb-3">
                                    <input type="text" name="otp" class="form-control" id="otp" placeholder="Enter your OTP" required>
                                </div> --}}
                                <form action="{{ route('login.otp') }}" method="post" id="otp-form">
                                    @csrf
                                    <div class="custom-popup" id="custom-popup">
                                        <div class="popup-content text-center">
                                            <input type="text" name="email" class="form-control text-center"
                                                placeholder="Enter your OTP" required value="{{ Session::get('email') }}">
                                            <input type="text" name="password" class="form-control text-center"
                                                placeholder="Enter your OTP" required value="{{ Session::get('password') }}">
                                            <label for="otp">Enter Your One Time Password</label>
                                            <div class="mb-3">
                                                <input type="text" name="otp" class="form-control text-center"
                                                    id="otp" placeholder="Enter your OTP" required>
                                            </div>
                                            <div class="mb-3">
                                                <button class="form-control btn btn-success" id="otp-submit">Verify
                                                    OTP</button>
                                            </div>
                                            <span id="otp-status"></span> <!-- Display OTP status here -->
                                            <p>Your forms are currently awaiting review by an administrator. You will
                                                receive the OTP after your forms have been reviewed.</p>
                                            {{-- Other popup content goes here --}}
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-4">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                        </div>
                        <div class="mb-4 text-center text-primary">
                            <div class="d-grid">
                                <a class="forgot-password" href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="mb-4 d-flex justify-content-center">
                            <button class="btn btn-success login-btn"><b>Sign in</b></button>
                        </div>
                        {{-- <div class="mb-4">
                            <div class="d-grid">
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            </div>
                        </div> --}}

                        <div class="mb-3 text-center d-flex justify-content-center">
                            <div class="d-grid">
                                <span class="register-here text-secondary">Don't have an account ? <a
                                        href="{{ route('register') }}" class="text-primary "><b>Register here</b></a>
                                </span>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/client/toastr/toastr.min.js') }}"></script>
    {{-- script for otp --}}
    <script>
        $(document).ready(function() {
            $('#custom-popup').fadeIn();

            // Add event listener for OTP input changes
            // $('#otp-submit').on('click', function() {
            //     var enteredOtp = $('#otp').val();
            //     var enteredEmail = $('#email').val();
            //     var enteredPassword = $('#password').val();

            //     // Make an AJAX request to check OTP validity
            //     // $.ajax({
            //     //     url: '/check-otp', // Replace with your server route
            //     //     method: 'POST',
            //     //     data: {
            //     //         otp: enteredOtp,
            //     //         email: enteredEmail,
            //     //         password: enteredPassword
            //     //     },
            //     //     headers: {
            //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     //     },
            //     //     success: function(response) {
            //     //         // console.log(response)
            //     //         if (response.valid) {
            //     //             $('#otp-status').text('OTP is valid');
            //     //         } else {
            //     //             $('#otp-status').text('OTP is not valid');
            //     //         }
            //     //     },
            //     //     error: function() {
            //     //         $('#otp-status').text('Error occurred while checking OTP');
            //     //     }
            //     // });
            // });

        });
    </script>
    <script src="{{ asset('loader/loader.js') }}"></script>

     {{-- // notification --}}
     @if (session()->has('notification'))
     <script>
         $(document).ready(function() {
             // Set Toastr options
             toastr.options = {
                 "closeButton": false,
                 "debug": false,
                 "newestOnTop": false,
                 "progressBar": false,
                 "positionClass": "toast-top-right",
                 "preventDuplicates": false,
                 "onclick": null,
                 "showDuration": 300,
                 "hideDuration": 1000,
                 "timeOut": 5000,
                 "extendedTimeOut": 1000,
                 "showEasing": "swing",
                 "hideEasing": "linear",
                 "showMethod": "fadeIn",
                 "hideMethod": "fadeOut"
             };
             var notificationJson = {!! json_encode(session('notification')) !!};
             var notification = JSON.parse(notificationJson);
             console.log(notification)
             toastr[notification.status](notification.message);
         });
     </script>
 @endif
</body>

</html>
