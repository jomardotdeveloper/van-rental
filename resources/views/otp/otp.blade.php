<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bataan Van Rental - OTP Email</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mt-5">Thanks for registering with Bataan Van Rental!</h1>
                <p class="text-center">Hello {{ $get_user_name }},</p>
                <p class="text-center">Thank you for registering with Bataan Van Rental. To activate your account, please use the following One-Time Password (OTP) code:</p>
                <div class="text-center mt-4">
                    <h2>{{ $validToken }}</h2>
                </div>
                <p class="text-center mt-4">If you did not initiate this registration or have any concerns, please ignore this email.</p>
                <p class="text-center">To log in, please click the button below:</p>
                <div class="text-center mt-4">
                    {{-- <a href="{{ url('login') }}" class="btn btn-primary">Log In</a> --}}

                </div>
                <p class="text-center mt-4">Thank you,</p>
                <p class="text-center">Bataan Van Rental Team</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
