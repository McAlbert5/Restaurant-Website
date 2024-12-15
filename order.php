<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $item_name = $_GET['item'];
    $item_price = $_GET['price'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO orders (user_id, item_name, item_price) VALUES ('$user_id', '$item_name', '$item_price')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Order placed successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to place order.'); window.location.href='index.php';</script>";
    }
}
?>
