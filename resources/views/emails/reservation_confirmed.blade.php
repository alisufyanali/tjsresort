<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmed</title>
</head>
<body>
    <h1>Reservation Confirmed</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for your reservation. Below are the details of your reservation:</p>
    <ul>
        <li>Date In: {{ $reservation->date_in }}</li>
        <li>Date Out: {{ $reservation->date_out }}</li>
        <li>Truck Number: {{ $reservation->truck_number }}</li>
        <li>Truck Color: {{ $reservation->truck_color }}</li>
        <li>Number of Spaces: {{ $reservation->number_of_spaces }}</li>
        <li>Total Price: ${{ $reservation->total_price }}</li>
        <li>Grand Price: ${{ $reservation->grand_price }}</li>
    </ul>
    <p>You can log in to your account using the following credentials:</p>
    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Password: member123</li> <!-- You should ideally generate a secure password and ask the user to reset it -->
    </ul>
    <p>Thank you for choosing our service!</p>
</body>
</html>
