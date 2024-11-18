<?php 
session_start(); 
require '../config/connection.php';
$conn = Connect();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Agency Registration Success</title>
</head>
<body>

<header>
        <h1>Car Rental System</h1>
        <p>"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>
    <h1>Registration Successful</h1>
    <p>Your agency registration was successful. You can now log in using your credentials.</p>

    <button onclick="location.href='agency_login.php'">Agency Login</button>
</body>
</html>
