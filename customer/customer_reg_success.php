<?php 
session_start(); 
require '../config/connection.php';
$conn = Connect();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration Success</title>
</head>
<body>

<header>
        <h1>Car Rental System</h1>
        <p>"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>

    <h1>Registration Successful</h1>
    <p>Your registration was successful. You can now log in using your credentials.</p>

    <button onclick="location.href='customer_login.php'">Customer Login</button>
</body>
</html>
