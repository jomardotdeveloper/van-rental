<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bataan Van Rental - Verify Book Email</title>
</head>
<body>
    <p>Hello {{ $user_name }},</p>
    <p>We're excited to let you know that your booking has been confirmed!</p>
    <p>Booking Details:</p>
    <ul>
        <li>Booking ID: {{ $booking_id }}</li>
        <li>Vehicle Model: {{ $vehicle_name }}</li>
        <li>Driver Name: {{ $driver_name }}</li>
        <li>Pick-up: {{ $pickup }}</li>
        <li>Drop-off: {{ $dropoff }}</li>
        <li>Date: {{ $booking_date }}</li>
        <li>Total Amount: {{ $total_amount }}</li>
        <li>Status: {{ $status }}</li>
    </ul>
    <p>Thank you for choosing Bataan Van Rental. We look forward to serving you.</p>
</body>
</html>