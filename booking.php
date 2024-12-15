<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $booking_date = $_POST['booking_date'];
    $num_of_people = $_POST['num_of_people'];

    $query = "INSERT INTO table_bookings (user_id, booking_date, num_of_people) VALUES ('$user_id', '$booking_date', '$num_of_people')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Table booked successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to book table.'); window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Book a Table</h2>
        <form method="POST" action="">
            <label for="booking_date">Date & Time:</label>
            <input type="datetime-local" id="booking_date" name="booking_date" required>
            <label for="num_of_people">Number of People:</label>
            <input type="number" id="num_of_people" name="num_of_people" min="1" required>
            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>
