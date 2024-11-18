<?php
session_start(); // Starting Session

if (isset($_SESSION['login_agency'])) {
    header("location: ../home/index.php"); // Redirecting to the dashboard if already logged in
    exit; // Ensure the script stops here
}

require '../config/connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agency_username = $_POST['agency_username'];
    $agency_password = $_POST['agency_password'];

    $conn = Connect(); // Establish database connection

    // Prepare a SQL query (replace 'your_table' with the actual table name)
    $query = "SELECT * FROM agency WHERE agency_username = ? AND agency_password = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $agency_username, $agency_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Valid login, set the session
        $_SESSION['login_agency'] = $agency_username;
        $stmt->close();
        $conn->close();
        header("location: ../home/index.php"); // Redirect after successful login
        exit;
    } else {
        // Invalid login, show an error message
        $error_message = "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Agency Login</title>
    <link rel="stylesheet" href="../css/agency_login.css">
</head>
<body>
<header>
        <h1 style="color:#fff;">Car Rental System</h1>
        <p style="color:#fff;">"Experience the freedom of the open road with our reliable car rental service. Choose from our wide selection of vehicles and enjoy a smooth, stress-free journey."</p>

    </header>

<?php
    if (isset($_SESSION['login_agency'])) {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar" href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_agency']; ?></a></li>
                        <li><a class="nav-bar"  href="../agency/addcar.php">Add Car</a></li>
                        <li><a class="nav-bar"  href="../agency/agencyview.php">View Booked Cars</a></li>

                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php
    } else if (isset($_SESSION['login_customer'])) {
    ?>
        <div class="">
            <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="#">Welcome <?php echo $_SESSION['login_customer']; ?></a></li>

                        <li><a class="nav-bar"  href="../customer/prereturncar.php">Return Now</a></li>
                        <li><a class="nav-bar"  href="../customer/mybookings.php"> My Bookings</a></li>
                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
                <li><a class="nav-bar"  href="../config/logout.php">Logout</a></li>


            </ul>
        </div>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <li><a class="nav-bar"  href="../home/index.php">Home</a></li>
                <li><a class="nav-bar"  href="../agency/agency_login.php">Agency Login</a></li>
                <li><a class="nav-bar"  href="../customer/customer_login.php">Customer Login</a></li>
                <li><a class="nav-bar"  href="../home/about.php">About US</a></li>
            </ul>
        </nav>
    <?php
    }
    ?>



<h1>Agency Login</h1>


<form method="post">
    <label for="agency_username">Username:</label>
    <input type="text" name="agency_username" id="agency_username" required><br>
    <label for="agency_password">Password:</label>
    <input type="password" name="agency_password" id="agency_password" required><br>
    <input type="submit" value="Login">

    <p>Don't have an account? <span><a href="agency_registration.php">Sign Up</a></span></p>

    <?php
        if (isset($error_message) && !empty($error_message)) {
            echo '<p class="error">' . $error_message . '</p>';
            $error_message = ""; // Clear the error message
        }
        ?>
</form>




<footer>

<div>
    <ul>
        <li><a class="footer" href="contact.php">Contact Us</a></li>
        <li><a class="footer" href="blog.php">Blog</a></li>
    </ul>
</div>
<div>
    <ul class="social-media">
        <li ><a href="https://www.facebook.com/">Facebook<i class="fab fa-facebook"></i></a>
        </li>
        <li><a href="https://x.com/">X<i class="fab fa-twitter"></i></a></li>
        <li><a href="https://www.instagram.com/">Instagram<i class="fab fa-instagram"></i></a></li>
    </ul>
</div>
<div>
    <p class="copyright">&copy;
        <?php echo date("Y"); ?> Car rental System
    </p>
</div>
</footer>
</body>




</html>
